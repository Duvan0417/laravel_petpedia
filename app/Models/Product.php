<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'stock',
        'category_id',
    ];
    /**
     * Relación Uno a Muchos (Inversa) con Category
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Relación Uno a Uno con Inventory
     * (Asegura que siempre exista un inventario)
     */
    public function inventory()
    {
        return $this->hasOne('App\Models\Inventory')->withDefault([
            'quantity_available' => 0,
            'min_stock' => 10
        ]);
    }

    /**
     * Relación Uno a Muchos con OrderItem
     */
    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem');
    }
 public function shoppingCart()
    {
        return $this->hasMany('App\Models\ShoppingCart');
    }

    /**
     * Eventos del modelo para garantizar inventario
     */
    protected static function booted()
    {
        static::created(function ($product) {
            $product->inventory()->create([
                'quantity_available' => request('initial_quantity', 0),
                'min_stock' => 10
            ]);
        });
    }
}