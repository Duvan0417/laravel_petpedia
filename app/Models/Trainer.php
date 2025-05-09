<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    public function role(){
        return $this ->hasOne(role::class);
    }
    public function pet(){
        return $this ->hasMany(pet::class);
    }
    public function service(){
        return $this ->hasMany(service::class);
    }
    protected $fillable = [
        'specialty',
        'experience',
        'qualifications',
        'phone',
        'email',
        'biography'
    ];
}

