<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'shipping_address',
        'cost',
        'status',
        'shipping_method',
        'order_id',
        ];
    // Relación Muchos a Uno con Order
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
}
