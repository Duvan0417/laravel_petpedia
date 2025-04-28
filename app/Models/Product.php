<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'stock', 
        'image' // Campo opcional para la imagen del producto
    ];

    // Relación con categorías (incluye is_principal)
    public function categories()
    {
        return $this->belongsToMany(Category::class)
            ->withPivot('is_principal')
            ->withTimestamps();
    }
}
