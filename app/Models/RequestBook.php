<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestBook extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
