<?php 

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ProductsRepository;
use App\Models\Product;
use Illuminate\Support\ProcessUtils;

class ProductsEloquentRepository implements ProductsRepository {
    public function getAll()
    {
        return Product::orderBy('genre_id','asc')->paginate(15);
    }
    public function getRandomProduct()
    {
        return Product::inRandomOrder()
        ->limit(8)->get();
    }
    public function getProductOfCategory($id) {
        return Product::where('category_id',$id)->paginate(15);
    }

    public function getProductOfGroup($id) {
        return Product::where('group_id',$id)->paginate(15);
    }

    public function getProductOfGenre($id) {
        return Product::where('genre_id',$id)->paginate(15);
    }

    public function get($id)
    {
        return Product::findOrFail($id);
    }

    public function create($attributes)
    {
        return Product::create($attributes);
    }

    public function update($id, $attributes)
    {
        $product = $this->get($id);
        $product->product_name = $attributes['product_name'];
        // $product->product_format = $attributes['product_format'];
        $product->product_content = $attributes['product_content'];
        $product->product_info = $attributes['product_info'];
        $product->other_detail = $attributes['other_detail'];
        $product->product_image = $attributes['product_image'];
        $product->product_price = $attributes['product_price'];
        $product->category_id = $attributes['category_id'];
        $product->group_id = $attributes['group_id'];
        $product->genre_id = $attributes['genre_id'];



        return $product->save();

    }

    public function delete($id)
    {
        $product = $this->get($id);
        $product->destroy($id);
    }
}