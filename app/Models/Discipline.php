<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'distance_to_complete',
        'from_date',
        'to_date'
    ];

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return Discipline
     */
    public function scopeCurrent(Builder $query)
    {
        $today = now()->toDateString();

        return $query
            ->where('from_date', '<=', $today)
            ->where('to_date', '>=', $today)
            ->first();
    }

    /**
     * @return bool
     */
    public function getIsActiveDisciplineAttribute()
    {
        $today = now()->toDateString();

        if ( ($today >= $this->from_date) && ($today <= $this->to_date) )  {
            return true;
        }

        return false;
    }

    public function distanceRemainingForUser(User $user)
    {
        /** @var Collection */
        $userActivities = $user->activities()->whereDisciplineId($this->id)->get();
        /** @var int $completedDistance */
        $completedDistance = $userActivities->sum('distance');

        if ($completedDistance >= $this->distance_to_complete) {
            return 0;
        }

        return $this->distance_to_complete - $completedDistance;
    }
}
