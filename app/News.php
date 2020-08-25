<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable=[
        'title',
        'text',
        'user_id',
        'published'
    ];

    protected function scopePublished($query){
        return $query->where('published', true);
    }
    protected function scopeNotPublished($query){
        return $query->where('published', false);
    }
}
