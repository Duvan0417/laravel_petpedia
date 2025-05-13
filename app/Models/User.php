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
    public function paymentmethods() {
        return $this->hasMany(PaymentMethod::class);
    }

    public function forums() {
        return $this->hasMany(Forum::class);
    }
    public function shoppingcarts() {
        return $this->hasMany(shoppingcart::class);
    }
    public function orders() {
        return $this->hasMany(order::class);
    }
    public function pets() {
        return $this->hasMany(pet::class);
    }
    public function paymentmethod() {
        return $this->hasMany(paymentmethod::class);
    }

    public function request() {
        return $this->hasMany(Request::class);
    }
    
    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }
    
    public function veterinarian() {
        return $this->belongsTo(veterinarian::class);
    }
};