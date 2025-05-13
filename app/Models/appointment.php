<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'reason',
        'user_id',
        'veterinarian_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }
    
    public function pet()
    {
        return $this->hasMany(pet::class);
    }
    
    public function request()
    {
        return $this->hasOne(Request::class);
    }
}