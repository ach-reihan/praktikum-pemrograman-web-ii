@extends('layouts.app')

@section('title', 'Tambah Transaksi Peminjaman - Perpustakaan Reihan')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-extrabold text-slate-800">Tambah Transaksi Peminjaman</h3>
        <a href="{{ route('borrowings.index') }}" class="text-sm font-semibold text-slate-600 hover:text-indigo-600">&larr; Kembali</a>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
        <form action="{{ route('borrowings.store') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label for="member_name" class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Member</label>
                <input type="text" id="member_name" name="member_name" value="{{ old('member_name') }}" 
                       class="w-full px-4 py-2.5 rounded-lg border @error('member_name') border-rose-500 @else border-slate-300 @enderror focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm" placeholder="Masukkan nama member">
                @error('member_name')
                    <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="book_id" class="block text-sm font-semibold text-slate-700 mb-1.5">Buku yang Dipinjam</label>
                <select id="book_id" name="book_id" 
                        class="w-full px-4 py-2.5 rounded-lg border @error('book_id') border-rose-500 @else border-slate-300 @enderror focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm bg-white">
                    <option value="" disabled {{ old('book_id') === null ? 'selected' : '' }}>Pilih Buku</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                            {{ $book->title }} ({{ $book->author }})
                        </option>
                    @endforeach
                </select>
                @error('book_id')
                    <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="borrow_date" class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Pinjam</label>
                <input type="date" id="borrow_date" name="borrow_date" value="{{ old('borrow_date', date('Y-m-d')) }}" 
                       class="w-full px-4 py-2.5 rounded-lg border @error('borrow_date') border-rose-500 @else border-slate-300 @enderror focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
                @error('borrow_date')
                    <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="return_date" class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Kembali</label>
                <input type="date" id="return_date" name="return_date" value="{{ old('return_date') }}" 
                       class="w-full px-4 py-2.5 rounded-lg border @error('return_date') border-rose-500 @else border-slate-300 @enderror focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
                @error('return_date')
                    <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-semibold py-2.5 rounded-lg shadow transition-colors text-sm">
                Simpan Transaksi Peminjaman
            </button>
        </form>
    </div>
</div>
@endsection
