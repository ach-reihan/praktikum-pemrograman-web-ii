@extends('layouts.app')

@section('title', 'Beranda - Portofolio Reihan')

@section('content')
<div class="relative overflow-hidden bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-4xl px-6 lg:px-8 text-center flex flex-col items-center">
        <span class="text-sm font-semibold leading-7 text-indigo-600 tracking-wider uppercase mb-3">Selamat Datang di Portofolio Saya</span>
        
        <h1 class="text-4xl font-extrabold tracking-tight text-slate-900 sm:text-6xl mb-6">
            {{ $profile->name }}
        </h1>
        <p class="text-lg font-medium text-slate-500 max-w-xl mb-10">
            NIM: <span class="text-indigo-600 font-semibold">{{ $profile->nim }}</span> | Mahasiswa {{ $profile->major }} Universitas Lambung Mangkurat.
        </p>

        <div class="flex gap-4">
            <a href="{{ route('profil') }}" class="rounded-md bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 transition-all">
                Lihat Profil Lengkap &rarr;
            </a>
        </div>
    </div>
</div>
@endsection