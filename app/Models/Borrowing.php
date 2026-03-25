<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    //
    protected $fillable = [
        'user_id',
        'borrow_date',
        'due_date',
        'return_date',
        'status',
        'fine'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(BorrowDetail::class);
    }
}
