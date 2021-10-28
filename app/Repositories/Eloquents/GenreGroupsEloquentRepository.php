<?php 

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\GenreGroupsRepository;
use App\Models\GenreGroup;



class GenreGroupsEloquentRepository implements GenreGroupsRepository {
    public function getAll()
    {
        return GenreGroup::paginate(5);
    }
    public function getDataWithCategory($id)
    {
        return GenreGroup::where('category_id',$id)->get();
    }

    
    public function get($id)
    {
        return GenreGroup::findOrFail($id);
    }

    public function create($attributes)
    {
        return GenreGroup::create($attributes);
    }

    public function update($id, $attributes)
    {
        $group = $this->get($id);
        $group->group_name = $attributes['group_name'];
        $group->category_id = $attributes['category_id'];


        return $group->save();

    }

    public function delete($id)
    {
        $user = $this->get($id);
        $user->destroy($id);
    }
}