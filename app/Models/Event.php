<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'departure_time',
        'return_time',
        'leader_id',
        'event_fees',
        'location',
        'notes',
    ];
}
