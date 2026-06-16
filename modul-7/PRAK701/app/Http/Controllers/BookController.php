<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new book.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'publish_year' => 'required|integer|gt:1800|lt:2026',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'author.required' => 'Penulis wajib diisi.',
            'author.string' => 'Penulis harus berupa teks.',
            'publisher.required' => 'Penerbit wajib diisi.',
            'publisher.string' => 'Penerbit harus berupa teks.',
            'publish_year.required' => 'Tahun terbit wajib diisi.',
            'publish_year.integer' => 'Tahun terbit harus berupa angka.',
            'publish_year.gt' => 'Tahun terbit harus lebih besar dari 1800.',
            'publish_year.lt' => 'Tahun terbit harus lebih kecil dari 2026.',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Buku baru berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified book.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified book in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'publish_year' => 'required|integer|gt:1800|lt:2026',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'author.required' => 'Penulis wajib diisi.',
            'author.string' => 'Penulis harus berupa teks.',
            'publisher.required' => 'Penerbit wajib diisi.',
            'publisher.string' => 'Penerbit harus berupa teks.',
            'publish_year.required' => 'Tahun terbit wajib diisi.',
            'publish_year.integer' => 'Tahun terbit harus berupa angka.',
            'publish_year.gt' => 'Tahun terbit harus lebih besar dari 1800.',
            'publish_year.lt' => 'Tahun terbit harus lebih kecil dari 2026.',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Detail buku berhasil diperbarui!');
    }

    /**
     * Remove the specified book from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus dari sistem!');
    }
}