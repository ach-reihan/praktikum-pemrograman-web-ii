@extends('layouts.app')

@section('title', $experience->title . ' - Portofolio Reihan')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    @php
        $experienceImage = $experience->image && \Illuminate\Support\Str::startsWith($experience->image, ['http://', 'https://', '//'])
            ? $experience->image
            : ($experience->image ? asset($experience->image) : null);
    @endphp
    
    <nav class="flex mb-8 text-sm font-medium text-slate-500" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('beranda') }}" class="hover:text-indigo-600 transition-colors">Beranda</a>
            </li>
            <li>
                <div class="flex items-center">
                    <span class="mx-2 text-slate-300">/</span>
                    <a href="{{ route('profil') }}" class="hover:text-indigo-600 transition-colors">Profil</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <span class="mx-2 text-slate-300">/</span>
                    <span class="text-slate-400 line-clamp-1">{{ $experience->title }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-xs">
        
        @if ($experienceImage)
            <img src="{{ $experienceImage }}" alt="{{ $experience->title }}" class="w-full h-96 object-cover">
        @endif

        <div class="px-4 py-4 md:px-6 md:py-6">
            <span class="text-sm font-semibold text-indigo-600 tracking-wider uppercase mt-4 mb-2 block">
                {{ $experience->time }}
            </span>

            <h1 class="text-3xl font-extrabold text-slate-900 sm:text-4xl mb-6 leading-tight">
                {{ $experience->title }}
            </h1>

            <div class="prose prose-slate max-w-none mb-10">
                <h3 class="text-lg font-bold text-slate-900 mb-3">Deskripsi Kegiatan</h3>
                <p class="text-slate-600 leading-relaxed">
                    {{ $experience->description }}
                </p>
            </div>

            <div class="bg-indigo-50 border-l-4 border-indigo-500 p-6 rounded-r-xl mb-4">
                <h3 class="text-lg font-bold text-indigo-900 mb-2">Kesan yang Dirasakan</h3>
                <p class="text-indigo-800 italic leading-relaxed">
                    "{{ $experience->impression }}"
                </p>
            </div>

            <div class="border-t border-slate-100 pt-8 flex justify-end">
                <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 rounded-md bg-white border border-slate-200 px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-xs hover:bg-slate-50 transition-colors">
                    &larr; Kembali ke Profil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection