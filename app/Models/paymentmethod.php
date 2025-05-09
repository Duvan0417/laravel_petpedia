<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'paymentmethods';

    protected $fillable = [
        'user_id',
        'type',
        'details',
        'issue_date',
        'CCV',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
