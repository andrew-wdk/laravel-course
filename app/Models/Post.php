<?php

namespace App\Models;

use App\Traits\HasMediaAttributes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    // use HasMediaAttributes;

    // protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'status',
        'type',
        'publish_at',
        'expires_at',
        // 'image',
    ];

    // protected $media_attributes = [
    //     'image[]',
    // ];

    public const STATUSES = [
        0 => 'inactive',
        1 => 'active',
    ];

    public const TYPES = [
        1 => 'important',
        2 => 'note',
        3 => 'news',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: function(int $value) {
                return Post::STATUSES[$value];
            },
            set: function(string $value) {
                return array_flip(Post::STATUSES)[$value];
            }
        );
    }

    // the accessor and mutator function to give numbers to database and get the text instead
    public function type(): Attribute
    {
        return Attribute::make(
            get: function(int $value) {
                return self::TYPES[$value];
            },
            set: function(string $value) {
                return array_flip(self::TYPES)[$value];
            }
        );
    }
}
