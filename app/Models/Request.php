<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shelter_id',
        'services_id',
        'date',
        'priority',
        'solicitation_status',
        'appointment_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shelter()
    {
        return $this->belongsTo(Shelter::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
    public function services(){
        return $this->hasMany(service::class);
    }
    
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
