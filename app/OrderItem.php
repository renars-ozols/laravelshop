<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'name', 'qty', 'price'
    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
