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

    public function services()
    {
        return $this->hasMany(service::class);
    }

    public function appointment()
    {
        return $this->hasMany(appointment::class);
    }
      public function user()
    {
        return $this->hasOne(user::class);
    }
}
