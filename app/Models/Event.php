<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'departure_time',
        'return_time',
        'leader_id',
        'event_fees',
        'location',
        'notes',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot( 'created_at','updated_at')->withTimestamps();
    }

    public function leader()
    {
        return $this->belongsTo(User::class,'leader_id');
    }
}
