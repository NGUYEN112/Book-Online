<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_name',
        'category_id',
        'group_id'
    ];

    public function category() {
        return $this->belongsTo('App\Models\Categories');
    }

    public function group() {
        return $this->belongsTo('App\Models\GenreGroup');
    }

    public function product() {
        return $this->hasMany('App\Models\Product');
    }

    public function discount() {
        return $this->hasMany('App\Models\Discount');
    }
}
