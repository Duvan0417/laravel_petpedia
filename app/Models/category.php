<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Relacion Uno a Muchos con product
    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
