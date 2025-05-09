<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',  // Si decides mantener este campo
        'total',
        'status'
    ];
    // Relación Muchos a Uno con User
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Relación Uno a Muchos con OrderItem
    public function orderItems(){
        return $this->hasMany('App\Models\OrderItem');
    }

    // Relación Uno a Uno con Shipment
    public function shipment(){
        return $this->hasOne('App\Models\Shipment');
    }
}
