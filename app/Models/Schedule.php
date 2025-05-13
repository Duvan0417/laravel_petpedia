<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'date',
        'hour',
        'location',
        'service_id'
    ];
    public function service(){
        return $this ->belongsTo(service::class);
    }

    // public function  notification(){
    //     return $this ->hasOne( notification::class);
    // }
   
}
