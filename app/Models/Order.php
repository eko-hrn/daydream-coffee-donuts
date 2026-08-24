<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'product_name',
        'product_price',
        'customer_name',
        'customer_phone',
        'customer_email',
        'quantity',
        'total_price',
        'note',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}