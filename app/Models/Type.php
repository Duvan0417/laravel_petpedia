<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $fillable = [
        'name',
        'category',
    ];
    public function request()
    {
        return $this->hasMany(Request::class);
    }
}
