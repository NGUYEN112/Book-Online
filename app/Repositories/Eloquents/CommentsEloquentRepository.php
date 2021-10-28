<?php 

namespace App\Repositories\Eloquents;

use App\Models\Comment;
use App\Repositories\Contracts\CommentsRepository;

class CommentsEloquentRepository implements CommentsRepository {
    public function getAll()
    {
        return Comment::all();
    }
    public function getOfProduct($id)
    {
        return Comment::where('product_id',$id)->inRandomOrder()
        ->limit(3)->get();
    }

    public function get($id)
    {
        return Comment::findOrFail($id);
    }

    public function create($attributes)
    {
        return Comment::create($attributes);
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