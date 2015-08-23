<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'slug',
        'published_at'
    ];

    protected $dates = ['published_at'];


    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->toArray();

    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=' , Carbon::now());
    }

    public function scopeUnpublished($query)
    {
        return $query->where('published_at', '>=' , Carbon::now());
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (! $this->exists) {
          $this->attributes['slug'] = str_slug($value);
        }
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function getPublishedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
