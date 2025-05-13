<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    // Relación Muchos a Uno con Order
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
}
