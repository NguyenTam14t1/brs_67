<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeActivity extends Model
{
    protected $fillable = [
        'user_id',
        'review_id',
        'is_like',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
