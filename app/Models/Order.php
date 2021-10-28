<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'discount_id',
        'count',
        'price',
        'status'
    ];

    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
}
