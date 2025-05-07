<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function schedule(){
        return $this ->hasone(schedule::class);
    }
    public function request(){
        return $this ->belongs(request::class);
    }
    public function veterinary(){
        return $this ->belongsTo(veterinary::class);
    }
    public function trainer(){
        return $this ->belongsTo(trainer::class);
    }
}
