<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = [
        'name',
        'price',
        'duration',
        'description',
        'veterinarian_id',
        'trainer_id',
        'request_id'
    ];

    protected $dates = ['duration'];

    /**
     * Relación con el veterinario
     */
    public function veterinarian(): BelongsTo
    {
        return $this->belongsTo(Veterinarian::class);
    }

    /**
     * Relación con el entrenador
     */
    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }

    /**
     * Relación con la solicitud
     */
    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
    
    // public function schedules()
    // {
    //     return $this->hasMany(Schedule::class);
    // }
}
