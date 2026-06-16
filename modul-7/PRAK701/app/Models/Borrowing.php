<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = [
        'member_name',
        'book_id',
        'borrow_date',
        'return_date',
    ];

    /**
     * Get the book associated with this borrowing transaction.
     */
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}