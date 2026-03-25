<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
        'stock',
        'description'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function borrowDetails()
    {
        return $this->hasMany(BorrowDetail::class);
    }
}
