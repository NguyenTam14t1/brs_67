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

    public function requests()
    {
        return $this->hasMany(RequestBook::class);
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($category) { 
        // before delete() method call this
            $category->requests()->delete();
            // do the rest of the cleanup...
        });
    }
}
