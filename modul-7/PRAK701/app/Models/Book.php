<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'publish_year',
    ];

    /**
     * Get the borrowings associated with the book.
     */
    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}