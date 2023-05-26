<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'price',
        'quantity',
        'cost',
    ];

    public $timestamps = false;
    
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
