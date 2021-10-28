<?php 

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\DiscountsRepository;
use App\Models\Discount;
use App\Models\Product;

class DiscountsEloquentRepository implements DiscountsRepository {
    public function getAll()
    {
        return Discount::paginate(5);
    }
    public function getDiscountOfCategory($id)
    {
        $today = date("Y/m/d");
        return Discount::where(function($query) use ($id){
            $query->where('category_id',null)
            ->orWhere('category_id',$id);
        })->where(function($queryr) use ($today){
            $queryr->where('start_date','<=',$today)
            ->where('end_date','>=',$today);
        })->get();
    }

    public function getDiscountAvailble($id)
    {
        $today = date("Y/m/d");
        $product = Product::findOrFail($id);
        $category_id = $product->category_id;
        $group_id = $product->group_id;
        $genre_id = $product->genre_id;
        $discount = Discount::where(function($query) use ($category_id,$group_id,$genre_id){
            $query->where('genre_id',$genre_id)
            ->orWhere('group_id',$group_id)
            ->orWhere('category_id',$category_id)
            ->orWhere('category_id',null);
        })->where(function($queryr) use ($today){
            $queryr->where('start_date','<=',$today)
            ->where('end_date','>=',$today);
        })->first();
        return $discount;
    }

    public function get($id)
    {
        return Discount::findOrFail($id);
    }

    public function create($attributes)
    {
        return Discount::create($attributes);
    }

    public function update($id, $attributes)
    {
        $disount = $this->get($id);
        $disount->start_date = $attributes['start_date'];
        $disount->end_date = $attributes['end_date'];
        $disount->discount_value = $attributes['discount_value'];

        // $disount->the_range_from = $attributes['the_range_from'];
        // $disount->the_range_to = $attributes['the_range_to'];
        $disount->category_id = $attributes['category_id'];
        $disount->group_id = $attributes['group_id'];
        $disount->genre_id = $attributes['genre_id'];


        return $disount->save();

    }

    public function delete($id)
    {
        $disount = $this->get($id);
        $disount->destroy($id);
    }
}