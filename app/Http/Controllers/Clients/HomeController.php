<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoriesRepository;
use App\Repositories\Contracts\OrdersRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoriesRepository $categoriesRepository,
    )
    {
        $this->categoryRepository = $categoriesRepository;
    }

    // public function getListCategory() {
    //     $categories = $this->categoryRepository->getAll();
    //     return json_encode(array('data' => $categories));
    // }
    
}
