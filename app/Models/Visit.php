<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'servant_id',
        'student_id',
        'date',
        'notes',
        'type',
    ];


    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function servant()
    {
        return $this->belongsTo(User::class, 'servant_id');
    }

}
