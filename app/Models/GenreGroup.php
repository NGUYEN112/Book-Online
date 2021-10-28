<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Models\Categories');
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
