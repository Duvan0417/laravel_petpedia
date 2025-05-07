<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function veterinary(){
        return $this ->belongsTo(veterinary::class);
    }
    public function request(){
        return $this ->hasOne(requets::class);
    }
    public function pet(){
        return $this ->hasMany(pet::class);
    }
}
