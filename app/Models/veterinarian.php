<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinarian extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'hours',
        'services_offered',
    ];

    public function requestAppointments()
    {
        return $this->hasMany(RequestAppointment::class);
    }

    public function adoptionRequests()
    {
        return $this->hasMany(AdoptionRequest::class);
    }
}
