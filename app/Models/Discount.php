<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_date',
        'end_date',
        'discount_value',
        'category_id',
        'group_id',
        'genre_id',
        // 'the_range_from',
        // 'the_range_to'
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


