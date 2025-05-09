<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user(){
        return $this ->belongsToMany(user::class);
    }
   
    public function trainer(){
        return $this ->hasOne(trainer::class);
    }
    
    public function shelter(){
        return $this ->hasOne(shelter::class);
    }
    public function veterinary(){
        return $this ->hasOne(veterinary::class);
    }
    protected $fillable = [
        'name',
        'description',
        'trainer_id',
        'shelter_id',
        'veterinary_id',
        'user_id',
    ];

}
