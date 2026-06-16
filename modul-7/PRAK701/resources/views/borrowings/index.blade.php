@extends('layouts.app')

@section('title', 'Daftar Peminjaman - Perpustakaan Reihan')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-extrabold text-slate-800">Daftar Transaksi Peminjaman</h3>
        <a href="{{ route('borrowings.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-lg text-sm font-semibold shadow transition-colors">
            + Tambah Transaksi Peminjaman
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
                        <th class="px-6 py-4 text-sm font-bold text-slate-700 style='width: 10%;'">ID</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-700">Nama Member</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-700">Buku yang Dipinjam</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-700">Tanggal Pinjam</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-700">Tanggal Kembali</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-700 text-center" style="width: 20%;">Opsi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($borrowings as $borrow)
                        <tr class="hover:bg-slate-50/55 transition-colors">
                            <td class="px-6 py-4 text-sm font-semibold text-slate-900">{{ $borrow->id }}</td>
                            <td class="px-6 py-4 text-sm font-semibold text-indigo-600">{{ $borrow->member_name }}</td>
                            <td class="px-6 py-4 text-sm">{{ $borrow->book ? $borrow->book->title : 'Buku tidak ditemukan' }}</td>
                            <td class="px-6 py-4 text-sm">{{ date('d-m-Y', strtotime($borrow->borrow_date)) }}</td>
                            <td class="px-6 py-4 text-sm">{{ date('d-m-Y', strtotime($borrow->return_date)) }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('borrowings.edit', $borrow->id) }}" class="bg-amber-100 text-amber-800 hover:bg-amber-200 px-3 py-1.5 rounded-full text-xs font-bold transition-colors">
                                        Ubah
                                    </a>
                                    <form action="{{ route('borrowings.destroy', $borrow->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan transaksi peminjaman ini?')">
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
                            <td colspan="6" class="text-center text-muted py-6 text-sm">Belum ada transaksi peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection