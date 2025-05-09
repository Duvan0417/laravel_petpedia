<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public function request(){
        return $this ->belongsTo(request::class);
    }
    public function user(){
        return $this ->belongsTo(user::class);
    }
    public function appointment(){
        return $this ->belongsTo(appointment::class);
    }
    public function trainer(){
        return $this ->belongsTo(trainer::class);
    }
    protected $fillable = [
        'specialty',
        'experience',
        'qualifications',
        'phone',
        'email',
        'biography',
    ];

}
