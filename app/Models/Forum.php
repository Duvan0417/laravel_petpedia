<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public function user(){
        return $this ->belongsTo(user::class);
    }
    public function topic(){
        return $this ->hasMany(topic::class);
    }
   protected $fillable = [
    'forum_name',
    'description',
    'creation_date',
    'user_id',
];

}
