@extends('layouts.app')

@section('title', 'Tambah Buku - Perpustakaan Reihan')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-extrabold text-slate-800">Tambah Buku Baru</h3>
        <a href="{{ route('books.index') }}" class="text-sm font-semibold text-slate-600 hover:text-indigo-600">&larr; Kembali</a>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
        <form action="{{ route('books.store') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label for="title" class="block text-sm font-semibold text-slate-700 mb-1.5">Judul Buku</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" 
                       class="w-full px-4 py-2.5 rounded-lg border @error('title') border-rose-500 @else border-slate-300 @enderror focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm" placeholder="Masukkan judul buku">
                @error('title')
                    <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="author" class="block text-sm font-semibold text-slate-700 mb-1.5">Penulis</label>
                <input type="text" id="author" name="author" value="{{ old('author') }}" 
                       class="w-full px-4 py-2.5 rounded-lg border @error('author') border-rose-500 @else border-slate-300 @enderror focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm" placeholder="Masukkan nama penulis">
                @error('author')
                    <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="publisher" class="block text-sm font-semibold text-slate-700 mb-1.5">Penerbit</label>
                <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}" 
                       class="w-full px-4 py-2.5 rounded-lg border @error('publisher') border-rose-500 @else border-slate-300 @enderror focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm" placeholder="Masukkan nama penerbit">
                @error('publisher')
                    <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="publish_year" class="block text-sm font-semibold text-slate-700 mb-1.5">Tahun Terbit</label>
                <input type="number" id="publish_year" name="publish_year" value="{{ old('publish_year') }}" 
                       class="w-full px-4 py-2.5 rounded-lg border @error('publish_year') border-rose-500 @else border-slate-300 @enderror focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm" placeholder="Contoh: 2024">
                @error('publish_year')
                    <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-semibold py-2.5 rounded-lg shadow transition-colors text-sm">
                Simpan Buku
            </button>
        </form>
    </div>
</div>
@endsection