<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name'
    ];

    public function genreGroup() {
        return $this->hasMany('App\Models\GenreGroup');
    }

    public function genre() {
        return $this->hasMany('App\Models\Genre');
    }

    public function product() {
        return $this->hasMany('App\Models\Product');
    }

    public function discount() {
        return $this->hasMany('App\Models\Discount');
    }
}
