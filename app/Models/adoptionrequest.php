<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptionRequest extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function veterinarian(){
        return $this->belongsTo(Veterinarian::class);
    }
}
