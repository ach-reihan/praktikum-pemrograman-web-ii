<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the borrowings with their associated books.
     */
    public function index()
    {
        $borrowings = Borrowing::with('book')->get();
        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Show the form for creating a new borrowing transaction.
     */
    public function create()
    {
        $books = Book::all();
        return view('borrowings.create', compact('books'));
    }

    /**
     * Store a newly created borrowing transaction in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_name' => 'required|string',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:borrow_date',
        ], [
            'member_name.required' => 'Nama member wajib diisi.',
            'member_name.string' => 'Nama member harus berupa teks.',
            'book_id.required' => 'Buku wajib dipilih.',
            'book_id.exists' => 'Buku yang dipilih tidak valid.',
            'borrow_date.required' => 'Tanggal pinjam wajib diisi.',
            'borrow_date.date' => 'Tanggal pinjam harus berupa tanggal yang valid.',
            'return_date.required' => 'Tanggal kembali wajib diisi.',
            'return_date.date' => 'Tanggal kembali harus berupa tanggal yang valid.',
            'return_date.after_or_equal' => 'Tanggal kembali harus sama dengan atau setelah tanggal pinjam.',
        ]);

        Borrowing::create($validated);

        return redirect()->route('borrowings.index')->with('success', 'Transaksi peminjaman berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified borrowing transaction.
     */
    public function edit($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $books = Book::all();
        return view('borrowings.edit', compact('borrowing', 'books'));
    }

    /**
     * Update the specified borrowing transaction in storage.
     */
    public function update(Request $request, $id)
    {
        $borrowing = Borrowing::findOrFail($id);

        $validated = $request->validate([
            'member_name' => 'required|string',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:borrow_date',
        ], [
            'member_name.required' => 'Nama member wajib diisi.',
            'member_name.string' => 'Nama member harus berupa teks.',
            'book_id.required' => 'Buku wajib dipilih.',
            'book_id.exists' => 'Buku yang dipilih tidak valid.',
            'borrow_date.required' => 'Tanggal pinjam wajib diisi.',
            'borrow_date.date' => 'Tanggal pinjam harus berupa tanggal yang valid.',
            'return_date.required' => 'Tanggal kembali wajib diisi.',
            'return_date.date' => 'Tanggal kembali harus berupa tanggal yang valid.',
            'return_date.after_or_equal' => 'Tanggal kembali harus sama dengan atau setelah tanggal pinjam.',
        ]);

        $borrowing->update($validated);

        return redirect()->route('borrowings.index')->with('success', 'Transaksi peminjaman berhasil diperbarui!');
    }

    /**
     * Remove the specified borrowing transaction from storage.
     */
    public function destroy($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $borrowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'Transaksi peminjaman berhasil dihapus!');
    }
}