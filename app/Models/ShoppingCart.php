<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{

    protected $fillable = [
        'creation_date',
        'quantity',
        'user_id',
        'product_id',
        'order_id'
    ];

    // Relación Muchos a Uno con User
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Relación Muchos a Uno con Product
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    // Relación con Order (agrega esto)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
