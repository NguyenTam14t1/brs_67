<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ShowRate;

class Book extends Model
{
    use ShowRate;

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

    public function getPartOfIntroductionAttribute()
    {
        return str_limit($this->introduction, $limit = config('setting.show_introduce'));
    }

    public function getPictureAttribute($value)
    {
        return config('setting.path_img') . $value;
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($book) { 
        // before delete() method call this
            $book->reviews()->delete();
            // do the rest of the cleanup...
        });
    }   
}
