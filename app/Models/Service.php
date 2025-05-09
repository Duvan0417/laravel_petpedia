<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // public function schedule(){
    //     return $this ->hasone(schedule::class);
    // }
    public function request(){
        return $this ->belongs(RequestModel::class);
    }
    public function veterinary(){
        return $this ->belongsTo(Veterinarian::class);
    }
    public function trainer(){
        return $this ->belongsTo(trainer::class);
    }
    protected $fillable = [
        'name',
        'price',
        'duration',
        'description',
        'trainer_id',
        'veterinary_id',
        'request_id'
    ];
    
}
