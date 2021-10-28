<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Clients\EducationController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\OrderController;
use App\Http\Controllers\Clients\ProductDetailController;
use App\Http\Controllers\Managers\CategoryManagerController;
use App\Http\Controllers\Managers\DiscountManagerController;
use App\Http\Controllers\Managers\GenreGroupManagerController;
use App\Http\Controllers\Managers\GenreManagerController;
use App\Http\Controllers\Managers\ManagerHomeController;
use App\Http\Controllers\Managers\ProductManagerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/Education');
});

Route::group(['prefix'=> 'auth'] , function() {
    Route::get('login',[AuthController::class,'loginPage']);
    Route::post('login',[AuthController::class,'login']);

    Route::get('register',[AuthController::class,'registerPage']);
    Route::post('register',[AuthController::class,'register']);
    Route::get('logout',[AuthController::class,'logOut']);
});


Route::group(['prefix' => '/'] , function () {
    Route::get('/Education',[EducationController::class,'educationPage']);
    Route::get('/Education/{id}',[EducationController::class,'educationPageSortByGroup']);
    Route::get('/Education/{id}/{genre_id}',[EducationController::class,'educationPageSortByGenre']);
    Route::get('/detail/{id}',[ProductDetailController::class,'detailPage']);
    Route::post('/detail/{id}',[ProductDetailController::class,'createComment']);
    Route::get('/checkout',[OrderController::class,'checkOutPage'])->middleware('check-auth');
    Route::post('/checkout',[OrderController::class,'checkOut']);
});

Route::group(['prefix' => 'manager' , 'middleware' => 'check-role'], function() {
    Route::get('/',[ManagerHomeController::class,'managerHomePage']);

    //Manager Category
    Route::group(['prefix' => 'categories'] , function() {
        Route::get('/',[CategoryManagerController::class,'categoriesManagerPage']);
        Route::get('/create',[CategoryManagerController::class,'createCategoryPage']);
        Route::post('/create',[CategoryManagerController::class,'createCategory']);
        Route::get('/edit/{id}',[CategoryManagerController::class,'editCategoryPage']);
        Route::post('/edit/{id}',[CategoryManagerController::class,'updateCategory']);
        Route::get('/delete/{id}',[CategoryManagerController::class,'deleteCategory']);
    });

    //Manager Genre Group
    Route::group(['prefix' => 'genre-group'] , function() {
        Route::get('/',[GenreGroupManagerController::class,'genreGroupManagerPage']);
        Route::get('/create',[GenreGroupManagerController::class,'createGenreGroupPage']);
        Route::post('/create',[GenreGroupManagerController::class,'createGenreGroup']);
        Route::get('/edit/{id}',[GenreGroupManagerController::class,'editGenreGroupPage']);
        Route::post('/edit/{id}',[GenreGroupManagerController::class,'updateGenreGroup']);
        Route::get('/delete/{id}',[GenreGroupManagerController::class,'delete']);
    });

    //Manager Genre
    Route::group(['prefix' => 'genres'] , function() {
        Route::get('/',[GenreManagerController::class,'genreManagerPage']);
        Route::get('/create',[GenreManagerController::class,'createGenrePage']);
        Route::post('/create',[GenreManagerController::class,'createGenre']);
        Route::get('/edit/{id}',[GenreManagerController::class,'editGenrePage']);
        Route::post('/edit/{id}',[GenreManagerController::class,'updateGenre']);
        Route::get('/delete/{id}',[GenreManagerController::class,'delete']);
    });

    Route::group(['prefix' => 'products'] , function() {
        Route::get('/',[ProductManagerController::class,'productManagerPage']);
        Route::get('/create',[ProductManagerController::class,'createProductPage']);
        Route::post('/create',[ProductManagerController::class,'createProduct']);
        Route::get('/edit/{id}',[ProductManagerController::class,'editProductPage']);
        Route::post('/edit/{id}',[ProductManagerController::class,'updateProduct']);
        Route::get('/delete/{id}',[ProductManagerController::class,'delete']);
    });

    Route::group(['prefix' => 'discounts'] , function() {
        Route::get('/',[DiscountManagerController::class,'discountManagerPage']);
        Route::get('/create',[DiscountManagerController::class,'createDiscountPage']);
        Route::post('/create',[DiscountManagerController::class,'createDiscount']);
        Route::get('/edit/{id}',[DiscountManagerController::class,'editDiscountPage']);
        Route::post('/edit/{id}',[DiscountManagerController::class,'updateDiscount']);
        Route::get('/info/{id}',[DiscountManagerController::class,'detailDiscountPage']);
        Route::get('/delete/{id}',[DiscountManagerController::class,'delete']);
    });
});

Route::get('/get-genre-data/{id}', [ProductManagerController::class,'getGenreData']);
Route::get('/get-group-data/{id}', [GenreManagerController::class,'getGroupData']);
// Route::get('get-category', [HomeController::class,'getListCategory']);
Route::get('/get-cart',[OrderController::class,'getUnpaidOrder']);
Route::post('/add-to-cart',[OrderController::class,'createOrder']);

