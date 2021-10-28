<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoriesRepository;
use App\Repositories\Contracts\DiscountsRepository;
use App\Repositories\Contracts\ProductsRepository;
use Illuminate\Http\Request;

class DiscountManagerController extends Controller
{
    protected $discountRepository;
    protected $categoryRepository;
    public function __construct(
        DiscountsRepository     $discountsRepository,
        CategoriesRepository    $categoriesRepository
    )
    {
        $this->discountRepository = $discountsRepository;
        $this->categoryRepository = $categoriesRepository;
    }

    public function discountManagerPage() {
        $discounts = $this->discountRepository->getAll();
        return view('managers.discounts.list',compact('discounts'));
    }

    public function createDiscountPage() {
        $categories = $this->categoryRepository->getAll();
        return view('managers.discounts.create',compact('categories'));
    }

    public function createDiscount(Request $request) {
        $attributes = [
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'discount_value' => $request->discount_value,
            'category_id' => $request->category_id,
            'group_id' => $request->group_id,
            'genre_id' => $request->genre_id
        ];
        $this->discountRepository->create($attributes);
        return redirect('/manager/discounts');
    }

    public function editDiscountPage($id) {
        $discount = $this->discountRepository->get($id);
        $categories = $this->categoryRepository->getAll();

        return view('managers.discounts.edit',compact('discount','categories'));
    }

    public function updateDiscount($id, Request $request) {
        $attributes = [
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'discount_value' => $request->discount_value,
            'category_id' => $request->category_id,
            'group_id' => $request->group_id,
            'genre_id' => $request->genre_id
        ];
        $this->discountRepository->update($id,$attributes);
        return redirect('/manager/discounts');
    }
    public function detailDiscountPage($id) {
        $discount = $this->discountRepository->get($id);
        return view('managers.discounts.detail',compact('discount'));
    }

    public function delete($id) {
        $this->discountRepository->delete($id);
        return redirect('/manager/discounts');
    }
}
