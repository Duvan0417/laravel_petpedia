<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_id',
        'application_date',
        'status',
        'comments',
        'request_id',
        'shelter_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function request()
    {
        return $this->belongsTo(Request::class);
    }

    public function shelter()
    {
        return $this->belongsTo(Shelter::class);
    }
}
