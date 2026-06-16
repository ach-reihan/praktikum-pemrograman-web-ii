@extends('layouts.app')

@section('title', 'Daftar Buku - Perpustakaan Reihan')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-extrabold text-slate-800">Daftar Buku</h3>
        <a href="{{ route('books.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-lg text-sm font-semibold shadow transition-colors">
            + Tambah Data Buku
        </a>
    </div>

    @if (session('success'))
        <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-r-lg mb-6 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-100 border-b border-slate-200">
                        <th class="px-6 py-4 text-sm font-bold text-slate-700 style='width: 10%;'">ID Buku</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-700">Judul Buku</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-700">Penulis</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-700">Penerbit</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-700">Tahun Terbit</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-700 text-center" style="width: 20%;">Opsi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($books as $book)
                        <tr class="hover:bg-slate-50/55 transition-colors">
                            <td class="px-6 py-4 text-sm font-semibold text-slate-900">{{ $book->id }}</td>
                            <td class="px-6 py-4 text-sm">{{ $book->title }}</td>
                            <td class="px-6 py-4 text-sm">{{ $book->author }}</td>
                            <td class="px-6 py-4 text-sm">{{ $book->publisher }}</td>
                            <td class="px-6 py-4 text-sm">{{ $book->publish_year }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('books.edit', $book->id) }}" class="bg-amber-100 text-amber-800 hover:bg-amber-200 px-3 py-1.5 rounded-full text-xs font-bold transition-colors">
                                        Ubah
                                    </a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-rose-100 text-rose-800 hover:bg-rose-200 px-3 py-1.5 rounded-full text-xs font-bold transition-colors">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-6 text-sm">Belum ada data buku.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection