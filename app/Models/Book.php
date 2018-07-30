<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'introduction',
        'content',
        'publish_date',
        'author',
        'picture',
        'total_page',
        'average_rating',
        'counter_view',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function favorite()
    {
        return $this->belongsTo(Favorite::class);
    }

    public function bookmark()
    {
        return $this->belongsTo(Bookmark::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
