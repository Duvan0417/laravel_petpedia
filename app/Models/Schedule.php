<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function service(){
        return $this ->hasone(service::class);
    }

    public function  notification(){
        return $this ->hasOne( notification::class);
    }
   
}
