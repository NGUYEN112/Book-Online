<?php 

namespace App\Repositories\Eloquents;

use App\Models\Categories;
use App\Repositories\Contracts\GenresRepository;
use App\Models\Genre;

class GenresEloquentRepository implements GenresRepository {
    public function getAll()
    {
        return Genre::orderBy('group_id','asc')->paginate(5);
    }
    public function getGenreWithGroup($id) {
        return Genre::where('group_id',$id)->get();
    }
    public function getGenreWithCategory($name) {
        $category = Categories::where('category_name',$name)->first();
        $id = $category->id;
        $groups = Genre::select('group_id')
        ->where('category_id', $id)
        ->groupBy('group_id')
        ->distinct()
        ->get();

        for ($i = 0; $i < count($groups); $i++) {
            $group = Genre::where([['category_id', $id], ['group_id', $groups[$i]->group_id]])
                ->get();

            $groups[$i]['genres'] = $group;
        }
        return $groups;
    }
    public function get($id)
    {
        return Genre::findOrFail($id);
    }

    public function create($attributes)
    {
        return Genre::create($attributes);
    }

    public function update($id, $attributes)
    {
        $genre = $this->get($id);
        $genre->genre_name = $attributes['genre_name'];
        $genre->category_id = $attributes['category_id'];
        $genre->group_id = $attributes['group_id'];
       


        return $genre->save();

    }

    public function delete($id)
    {
        $user = $this->get($id);
        $user->destroy($id);
    }
}