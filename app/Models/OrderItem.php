<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // Relación Muchos a Uno con Order
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }

    // Relación Muchos a Uno con Product
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
