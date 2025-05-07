<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pet extends Model
{

    protected $table = 'pets';
    protected $fillable = [
        'name',
        'age',
        'species',
        'breed',
        'size',
        'sex',
        'description',
    ];
}
