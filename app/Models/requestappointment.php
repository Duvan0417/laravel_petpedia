<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class requestappointment extends Model
{
    public function users (){
        return $this ->belongsTo(User::class);
    }
    public function vetrinarian(){
        return $this->belongsTo(Veterinarian::class);
    }
}
