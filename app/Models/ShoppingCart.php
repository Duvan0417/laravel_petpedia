<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = [
        'quantity',
        'user_id',
        'product_id'
    ];

    // Relación con User con valor por defecto
    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault([
            'name' => 'Usuario no encontrado',
            'email' => 'sin-email@ejemplo.com'
        ]);
    }

    // Relación con Product con valor por defecto
    public function product()
    {
        return $this->belongsTo('App\Models\Product')->withDefault([
            'name' => 'Producto eliminado',
            'price' => 0,
            'description' => 'Este producto ya no está disponible'
        ]);
    }
}
