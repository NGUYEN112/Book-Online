<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoriesRepository;
use App\Repositories\Contracts\GenreGroupsRepository;
use App\Repositories\Contracts\GenresRepository;
use App\Repositories\Contracts\ProductsRepository;
use Illuminate\Http\Request;

class ProductManagerController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $genreGroupRepository;
    protected $genreRepository;

    public function __construct(
        ProductsRepository      $productsRepository,
        CategoriesRepository    $categoriesRepository,
        GenreGroupsRepository   $genreGroupsRepository,
        GenresRepository        $genresRepository
        )
    {
        $this->productRepository = $productsRepository;
        $this->categoryRepository = $categoriesRepository;
        $this->genreGroupRepository = $genreGroupsRepository;
        $this->genreRepository = $genresRepository;
    }
    public function productManagerPage () {
        $products = $this->productRepository->getAll();
        return view('managers.products.list',compact('products'));
    }


    public function getGenreData($id) {
        $genres = $this->genreRepository->getGenreWithGroup($id);
        return json_encode(array('data' => $genres));
    }
    public function createProductPage() {
        $categories = $this->categoryRepository->getAll();
        return view('managers.products.create',compact('categories'));
    }
    public function createProduct(Request $request) {
        if ($request->hasFile('product_image')) {
            $path = base64_encode(file_get_contents($request->file('product_image')));
            $base64_image = 'data:image/jpg;base64,'.$path;
        }
        $attributes = [
            'product_name'      => $request->product_name,
            // 'product_format'    => $request->product_format,
            'product_content'   => $request->product_content,
            'other_detail'      => $request->other_detail,
            'product_info'      => $request->product_info,
            'product_image'     => $base64_image,
            'product_price'     => $request->product_price,
            'genre_id'          => $request->genre_id,
            'category_id'       => $request->category_id,
            'group_id'          => $request->group_id
        ];
        $this->productRepository->create($attributes);
        return redirect('/manager/products');
    }

    public function editProductPage($id) {
        $product = $this->productRepository->get($id);
        $categories = $this->categoryRepository->getAll();
        return view('managers.products.edit',compact('product','categories'));
    }

    public function updateProduct($id, Request $request) {
        if ($request->hasFile('product_image')) {
            $path = base64_encode(file_get_contents($request->file('product_image')));
            $base64_image = 'data:image/jpg;base64,'.$path;
        }
        $attributes = [
            'product_name'      => $request->product_name,
            // 'product_format'    => $request->product_format,
            'product_content'   => $request->product_content,
            'other_detail'      => $request->other_detail,
            'product_info'      => $request->product_info,
            'product_image'     => $base64_image,
            'product_price'     => $request->product_price,
            'genre_id'          => $request->genre_id,
            'category_id'       => $request->category_id,
            'group_id'          => $request->group_id
        ];
        $this->productRepository->update($id,$attributes);
        return redirect('/manager/products');
    }
}
