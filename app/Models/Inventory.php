<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    protected $fillable = [
        'quantity_available',
        'product_id',
    ];
    
    // Relación Muchos a Uno con Product
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
