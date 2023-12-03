<?php

namespace App\Models;

use App\Http\Controllers\user;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'meeting-date',
        'meeting-time',
        'Attendance',
    ];
}
public function Meeting()
    {
        return $this->belongsToMany(Meeting::class, 'Meeting_user', 'user_id', 'meeting-date');
    }