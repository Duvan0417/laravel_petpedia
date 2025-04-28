<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug']; // Slug para URLs amigables

    // Relación con productos
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('is_principal')
            ->withTimestamps();
    }
}