<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// Se eliminó la importación de HasApiTokens

class User extends Authenticatable
{
    use HasFactory, Notifiable; // Se eliminó HasApiTokens
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'registration_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'registration_date' => 'date',
        'password' => 'hashed',
    ];

    // relaciones
    public function payments() {
        return $this->hasMany(Payment::class);
    }
    
    public function requestAppointments() {
        return $this->hasMany(RequestAppointment::class);
    }
    
    public function adoptionRequests() {
        return $this->hasMany(AdoptionRequest::class);
    }
}
