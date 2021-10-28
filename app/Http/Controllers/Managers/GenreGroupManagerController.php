<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoriesRepository;
use App\Repositories\Contracts\GenreGroupsRepository;
use Illuminate\Http\Request;

class GenreGroupManagerController extends Controller
{
    protected $genreGroupRepository;
    protected $categoryRepository;
    public function __construct(GenreGroupsRepository $genreGroupsRepository
    , CategoriesRepository $categoriesRepository
    )
    {
        $this->genreGroupRepository = $genreGroupsRepository;
        $this->categoryRepository    = $categoriesRepository;
    }
    public function genreGroupManagerPage() {
        $groups = $this->genreGroupRepository->getAll();
        return view('managers.genre-groups.list', compact('groups'));
    }

    public function createGenreGroupPage() {
        $categories = $this->categoryRepository->getAll();
        return view('managers.genre-groups.create', compact('categories'));
    }

    public function createGenreGroup(Request $request) {
        $attributes = [
            'group_name'  => $request->group_name,
            'category_id' => $request->category_id
        ];
        $this->genreGroupRepository->create($attributes);
        return redirect('/manager/genre-group');
    }

    public function editGenreGroupPage($id) {
        $categories = $this->categoryRepository->getAll();
        $group = $this->genreGroupRepository->get($id);
        return view('managers.genre-groups.edit', compact('group','categories'));
    }

    public function updateGenreGroup($id, Request $request) {
        $attributes = [
            'group_name'  => $request->group_name,
            'category_id' => $request->category_id
        ];
        $this->genreGroupRepository->update($id,$attributes);
        return redirect('/manager/genre-group');
    }

    public function delete($id) {
        $this->genreGroupRepository->delete($id);
        return redirect('/manager/genre-group');
    }
}
