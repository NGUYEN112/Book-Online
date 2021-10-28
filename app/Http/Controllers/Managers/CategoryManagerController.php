<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoriesRepository;
use Illuminate\Http\Request;

class CategoryManagerController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoryRepository = $categoriesRepository;
    }

    public function categoriesManagerPage() {
        $categories = $this->categoryRepository->getAll();
        return view('managers.categories.list',compact('categories'));
    }

    public function createCategoryPage() {
        return view('managers.categories.create');
    }

    public function createCategory(Request $request) {
        $attributes = [
            'category_name' => $request->category_name
        ];
        $this->categoryRepository->create($attributes);
        return redirect('/manager/categories');
    }

    public function editCategoryPage($id) {
        $category = $this->categoryRepository->get($id);
        return view('managers.categories.edit',compact('category'));
    }

    public function updateCategory($id,Request $request ) {
        $attributes = [
            'category_name' => $request->category_name
        ];
        $this->categoryRepository->update($id,$attributes);
        return redirect('/manager/categories');
    }

    public function deleteCategory($id) {
        $this->categoryRepository->delete($id);
        return redirect('/manager/categories');
    }
}
