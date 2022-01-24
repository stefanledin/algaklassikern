<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'distance',
        'discipline_id',
        'user_id',
    ];

    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }
}
