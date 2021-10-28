<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CommentsRepository;
use App\Repositories\Contracts\DiscountsRepository;
use App\Repositories\Contracts\ProductsRepository;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    protected $productRepository;
    protected $commentRepository;
    protected $discountRepository;


    public function __construct(
        ProductsRepository       $productsRepository,
        CommentsRepository       $commentsRepository,
        DiscountsRepository      $discountsRepository,
    )
    {
        $this->productRepository = $productsRepository;
        $this->commentRepository = $commentsRepository;
        $this->discountRepository= $discountsRepository;
    }

    public function detailPage($id) {
        $product = $this->productRepository->get($id);
        $discount = $this->discountRepository->getDiscountAvailble($id);
        $comments = $this->commentRepository->getOfProduct($id);
        $products = $this->productRepository->getRandomProduct();
        return view('clients.detail',compact('product','comments','products','discount'));
    }

    public function createComment($id, Request $request) {
        $attributes= [
            'comment_content' => $request->comment_content,
            'product_id'       => $id,
            'user_id'          => auth()->user()->id
        ];
        $this->commentRepository->create($attributes);
        return redirect('/');
    }
}
