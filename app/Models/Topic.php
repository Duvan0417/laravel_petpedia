<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function answer(){
        return $this ->hasMany(answer::class);
    }
    public function average(){
        return $this ->hasOne(average::class);
    }
     public function forum(){
        return $this ->belongsTo(forum::class);
    }
    protected $fillable = [
        'title',
        'creation_date',
        'forum_id',
    ];
    
}
