<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ShowRate;

class Review extends Model
{
    use ShowRate;
    
    protected $fillable = [
        'user_id',
        'book_id',
        'content',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function likeActivities()
    {
        return $this->hasMany(LikeActivity::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
