<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_format',
        'product_content',
        'other_detail',
        'product_info',
        'product_image',
        'product_price',
        'genre_id',
        'category_id',
        'group_id'
    ];

    public function category() {
        return $this->belongsTo('App\Models\Categories');
    }

    public function group() {
        return $this->belongsTo('App\Models\GenreGroup');
    }

    public function genre() {
        return $this->belongsTo('App\Models\Genre');
    }
}
