<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'meeting_date',
        'meeting_time',
    ];

    public function attendance()
    {
        return $this->belongsToMany(User::class, 'meeting_user', 'meeting_id', 'user_id')->withTimestamps();
    }


}
