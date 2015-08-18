<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published'
    ];

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
