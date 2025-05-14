<?php
// app/Models/Pet.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'age',
        'species',
        'breed',
        'size',
        'sex',
        'description',
        'gmail',
        'biography',
        'trainer_id',
        'appointment_id',
        'shelter_id',
        'user_id',
    ];
    
    // Relaciones
    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }

    public function appointment() {
        return $this->belongsTo(Appointment::class);
    }

    public function shelter() {
        return $this->belongsTo(Shelter::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
