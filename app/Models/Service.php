<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'name',
        'price',
        'duration',
        'description',
        'veterinary_id',
        'request_id'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'duration' => 'datetime'
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function veterinary()
    {
        return $this->belongsTo(Veterinarian::class);
    }

    public function request()
    {
        return $this->belongsTo(Request::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}