<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'NationalID',
        'choosingsection',
        'telephone-no',
        'address',
        'father',
        'otherinput',
        'servant_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function visits()
    {
        return $this->hasMany(Visit::class, 'student_id');
    }

    public function lastVisit()
    {
        return $this->hasOne(Visit::class, 'student_id')->latest();
    }

    public function followUpServant()
    {
        return $this->belongsTo(User::class, 'servant_id');
    }

    public function visitedBy()
    {
        return $this->belongsToMany(User::class, 'visits', 'student_id', 'servant_id');
    }

    public function studentsVisited()
    {
        return $this->belongsToMany(User::class, 'visits', 'servant_id', 'student_id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_user', 'user_id', 'event_id');
    }
}
