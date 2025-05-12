<?php

 namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'specialty',
        'experience',
        'rating',
        'phone',
        'email',
        'biography',
    ];
    
    public function pets()
    {
        return $this->hasMany(pet::class);
    }
    
    public function services()
    {
        return $this->hasMany(service::class);
    }
    
    public function users()
    {
        return $this->hasone(user::class);
    }
}


