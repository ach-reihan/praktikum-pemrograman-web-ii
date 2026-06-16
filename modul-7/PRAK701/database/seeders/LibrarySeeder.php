<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Hash;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password')
        ]);

        $book1 = Book::create([
            'title' => 'Commentarii de Bello Gallico',
            'author' => 'Julius Caesar',
            'publisher' => 'Roman Senate Publishing',
            'publish_year' => 2005
        ]);

        $book2 = Book::create([
            'title' => 'The Art of War',
            'author' => 'Sun Tzu',
            'publisher' => 'Chambers Classics',
            'publish_year' => 2010
        ]);

        $book3 = Book::create([
            'title' => 'The Prince',
            'author' => 'Niccolo Machiavelli',
            'publisher' => 'Oxford World\'s Classics',
            'publish_year' => 2008
        ]);

        Borrowing::create([
            'member_name' => 'Alexander the Great',
            'book_id' => $book2->id,
            'borrow_date' => '2026-05-15',
            'return_date' => '2026-05-29'
        ]);

        Borrowing::create([
            'member_name' => 'Napoleon Bonaparte',
            'book_id' => $book3->id,
            'borrow_date' => '2026-05-20',
            'return_date' => '2026-06-03'
        ]);
    }
}