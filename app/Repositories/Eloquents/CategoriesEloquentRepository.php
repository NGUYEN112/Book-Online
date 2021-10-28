<?php 

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CategoriesRepository;
use App\Models\Categories;

class CategoriesEloquentRepository implements CategoriesRepository {
    public function getAll()
    {
        return Categories::paginate(5);
    }

    public function get($id)
    {
        return Categories::findOrFail($id);
    }
    public function getIdWithName($name) {
        return Categories::where('category_name',$name)->first();
    }

    public function create($attributes)
    {
        return Categories::create($attributes);
    }

    public function update($id, $attributes)
    {
        $categories = $this->get($id);
        $categories->category_name = $attributes['category_name'];

        return $categories->save();

    }

    public function delete($id)
    {
        $Categories = $this->get($id);
        $Categories->destroy($id);
    }
}