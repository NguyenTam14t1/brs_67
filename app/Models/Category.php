<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function request()
    {
        return $this->belongsTo(Request::class);
    }
}
