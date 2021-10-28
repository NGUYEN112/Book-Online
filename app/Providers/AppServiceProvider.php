<?php

namespace App\Providers;

use App\Repositories\Contracts\CategoriesRepository;
use App\Repositories\Contracts\CommentsRepository;
use App\Repositories\Contracts\DiscountsRepository;
use App\Repositories\Contracts\GenreGroupsRepository;
use App\Repositories\Contracts\GenresRepository;
use App\Repositories\Contracts\OrdersRepository;
use App\Repositories\Contracts\ProductsRepository;
use App\Repositories\Contracts\UsersRepository;
use App\Repositories\Eloquents\CategoriesEloquentRepository;
use App\Repositories\Eloquents\CommentsEloquentRepository;
use App\Repositories\Eloquents\DiscountsEloquentRepository;
use App\Repositories\Eloquents\GenreGroupsEloquentRepository;
use App\Repositories\Eloquents\GenresEloquentRepository;
use App\Repositories\Eloquents\OrdersEloquentRepository;
use App\Repositories\Eloquents\ProductsEloquentRepository;
use App\Repositories\Eloquents\UsersEloquentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(UsersRepository::class       , UsersEloquentRepository::class);
        $this->app->bind(CategoriesRepository::class  , CategoriesEloquentRepository::class);
        $this->app->bind(GenreGroupsRepository::class , GenreGroupsEloquentRepository::class);
        $this->app->bind(GenresRepository::class      , GenresEloquentRepository::class);
        $this->app->bind(ProductsRepository::class    , ProductsEloquentRepository::class);
        $this->app->bind(DiscountsRepository::class   , DiscountsEloquentRepository::class);
        $this->app->bind(CommentsRepository::class    , CommentsEloquentRepository::class);
        $this->app->bind(OrdersRepository::class      , OrdersEloquentRepository::class);


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
