<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'status',
        'type',
        'publish_at',
        'expires_at',
    ];

    public $types = [
        1 => 'important',
        2 => 'note',
        3 => 'news',
    ];
    // the accessor and mutator function to give numbers to database and get the text instead 
    public function type(): Attribute
    {
        return Attribute::make(
            get: function(int $value) {
                return $this->types[$value];
            },
            set: function(string $value) {
                return array_flip($this->types)[$value];
            }
        );
    }
}
