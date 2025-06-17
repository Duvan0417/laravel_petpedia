<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Service;
use App\Models\Notification;

class Schedule extends Model
{
    protected $fillable = [
        'date',
        'hour',
        'location',
        'service_id'
    ];

    protected $dates = ['date'];

    // Relaciones
    public function service()
    {
        return $this->hasOne(Service::class);
    }

    public function notification()
    {
        return $this->hasOne(Notification::class);
    }

    // Lista blanca para incluir relaciones
    protected $allowIncluded = ['service', 'notification'];
    protected $allowFilter = ['id', 'location', 'date'];

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
