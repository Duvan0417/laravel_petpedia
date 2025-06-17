<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Answer;
use App\Models\Average;
use App\Models\Forum;

class Topic extends Model
{
    protected $fillable = [
        'title',
        'description',
        'creation_date',
        'forum_id',
    ];

    protected $dates = ['creation_date'];

    // Relaciones
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

    public function average()
    {
        return $this->hasOne(Average::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }

    // Lista blanca
    protected $allowIncluded = ['forum', 'answer', 'average'];
    protected $allowFilter = ['id', 'title', 'creation_date'];

    // Scope para incluir relaciones
    public function scopeIncluded(Builder $query)
    {
        if (empty($this->allowIncluded) || empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included'));
        $allowIncluded = collect($this->allowIncluded);

        foreach ($relations as $key => $relationship) {
            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }

    // Scope para filtros
    public function scopeFilter(Builder $query)
    {
        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }

        $filters = request('filter');
        $allowFilter = collect($this->allowFilter);

        foreach ($filters as $filter => $value) {
            if ($allowFilter->contains($filter)) {
                $query->where($filter, 'LIKE', '%' . $value . '%');
            }
        }
    }
}
