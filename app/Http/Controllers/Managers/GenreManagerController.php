<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\GenresRepository;
use App\Repositories\Contracts\GenreGroupsRepository;
use App\Repositories\Contracts\CategoriesRepository;
use Illuminate\Http\Request;

class GenreManagerController extends Controller
{
    protected $genreRepository;
    protected $categoryRepository;
    protected $genreGroupRepository;
    public function __construct(
        GenresRepository      $genresRepository,
        GenreGroupsRepository $genreGroupsRepository,
        CategoriesRepository  $categoriesRepository
    ) {
        $this->genreRepository      = $genresRepository;
        $this->genreGroupRepository = $genreGroupsRepository;
        $this->categoryRepository    = $categoriesRepository;
    }
    public function genreManagerPage()
    {
        $genres = $this->genreRepository->getAll();
        return view('managers.genres.list', compact('genres'));
    }

    public function createGenrePage()
    {
        $categories = $this->categoryRepository->getAll();
        return view('managers.genres.create', compact('categories'));
    }

    public function createGenre(Request $request)
    {
        // dd($request);
        $attributes = [
            'genre_name'  => $request->genre_name,
            'group_id'    => $request->group_id,
            'category_id' => $request->category_id
        ];
        $this->genreRepository->create($attributes);
        return redirect('/manager/genres');
    }

    public function editGenrePage($id)
    {
        $genre = $this->genreRepository->get($id);
        $categories = $this->categoryRepository->getAll();
        return view('managers.genres.edit', compact('genre', 'categories'));
    }

    public function updateGenre($id,Request $request)
    {
        $attributes = [
            'genre_name'  => $request->genre_name,
            'group_id'    => $request->group_id,
            'category_id' => $request->category_id
        ];
        $this->genreRepository->update($id,$attributes);
        return redirect('/manager/genres');
    }


    public function getGroupData($id)
    {
        $groups = $this->genreGroupRepository->getDataWithCategory($id);
        return json_encode(array('data' => $groups));
    }
    public function delete($id)
    {
        $this->categoryRepository->delete($id);
        return redirect('/manager/genre-group');
    }
}
