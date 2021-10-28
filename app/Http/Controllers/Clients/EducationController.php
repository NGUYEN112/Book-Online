<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Repositories\Contracts\CategoriesRepository;
use App\Repositories\Contracts\DiscountsRepository;
use App\Repositories\Contracts\GenreGroupsRepository;
use App\Repositories\Contracts\GenresRepository;
use App\Repositories\Contracts\ProductsRepository;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    protected $categoryRepository;
    protected $genreGroupRepository;
    protected $genreRepository;
    protected $productRepository;
    protected $discountRepository;
    
    public function __construct(
        CategoriesRepository  $categoriesRepository,
        ProductsRepository    $productsRepository,
        GenreGroupsRepository $genreGroupsRepository,
        GenresRepository      $genresRepository,
        DiscountsRepository   $discountsRepository
    )
    {   
        $this->categoryRepository   = $categoriesRepository;
        $this->productRepository    = $productsRepository;
        $this->genreGroupRepository = $genreGroupsRepository;
        $this->genreRepository      = $genresRepository;
        $this->discountRepository   = $discountsRepository;
    }
    public function educationPage() {
        $name = "Education";
        
        
        $groups = $this->genreRepository->getGenreWithCategory($name);
        $category = $this->categoryRepository->getIdWithName($name);
        $products = $this->productRepository->getProductOfCategory($category->id);
        $discounts = $this->discountRepository->getDiscountOfCategory($category->id);

        return view('clients.education',compact('groups','products','discounts'));
    }

    public function educationPageSortByGroup($id){
        $products = $this->productRepository->getProductOfGroup($id);
        $discounts = $this->discountRepository->getDiscountOfCategory(3);
        return view('clients.educations.product-group',compact('products','discounts'));
    }

    public function educationPageSortByGenre($id,$genre_id){
        $products = $this->productRepository->getProductOfGenre($genre_id);
        $discounts = $this->discountRepository->getDiscountOfCategory(3);
        return view('clients.educations.product-genre',compact('products','discounts'));
    }
}
