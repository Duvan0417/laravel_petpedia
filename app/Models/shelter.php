<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shelter extends Model
{
    protected $table = 'shelters';
    protected $fillable = [
        'name',
        'phone',
        'responsible',
        'email',
        'address',
    ];
    public function adoptions()
    {
        return $this->hasMany(adoption::class);
    }
    public function pets()
    {
        return $this->hasMany(pet::class);
    }
    public function roles(){
        //return $this->hasOne(role::class);
    }
}
