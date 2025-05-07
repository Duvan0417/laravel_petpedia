<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shelter extends Model
{
    protected $table = 'shelters';
    protected $fillable = [
        'name',
        'phone',
        'responsible',
        'email',
        'address',
    ];
}
