@extends('layouts.app')

@section('title', 'Profil - Portofolio Reihan')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
    @php
        $profilePhoto = $profile->photo && \Illuminate\Support\Str::startsWith($profile->photo, ['http://', 'https://', '//'])
            ? $profile->photo
            : ($profile->photo ? asset($profile->photo) : null);
    @endphp
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-xs h-fit">
            <div class="flex flex-col items-center text-center">
                @if ($profilePhoto)
                    <img src="{{ $profilePhoto }}" alt="Foto Profil" class="w-32 h-32 rounded-full object-cover border-4 border-indigo-50 shadow-md mb-4">
                @endif
                <h3 class="text-xl font-bold text-slate-900">{{ $profile->name }}</h3>
                <p class="text-sm text-slate-500 font-medium mb-1">{{ $profile->nim }}</p>
                <p class="text-xs bg-indigo-50 text-indigo-700 font-semibold px-2.5 py-0.5 rounded-full mb-6">{{ $profile->major }}</p>
            </div>

            <hr class="border-slate-100 my-4">

            <div class="mb-5">
                <h4 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-2">Hobi</h4>
                <div class="flex flex-wrap gap-1.5">
                    @foreach(explode(', ', $profile->hobbies) as $hobby)
                        <span class="text-xs bg-slate-100 text-slate-600 px-2.5 py-1 rounded-md font-medium">{{ $hobby }}</span>
                    @endforeach
                </div>
            </div>

            <div>
                <h4 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-2">Skill</h4>
                <div class="flex flex-wrap gap-1.5">
                    @foreach(explode(', ', $profile->skills) as $skill)
                        <span class="text-xs bg-indigo-50 text-indigo-600 px-2.5 py-1 rounded-md font-medium">{{ $skill }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="lg:col-span-2">
            <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Pengalaman Kuliah Paling Berkesan</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($experiences as $experience)
                    @php
                        $cardImage = $experience->image && \Illuminate\Support\Str::startsWith($experience->image, ['http://', 'https://', '//'])
                            ? $experience->image
                            : ($experience->image ? asset($experience->image) : null);
                    @endphp
                    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-xs flex flex-col h-full transition-transform hover:scale-[1.01]">
                        @if ($cardImage)
                            <img src="{{ $cardImage }}" alt="{{ $experience->title }}" class="w-full h-44 object-cover">
                        @endif
                        <div class="p-5 flex flex-col grow">
                            <span class="text-xs font-semibold text-indigo-600 mb-1">{{ $experience->time }}</span>
                            <h4 class="text-lg font-bold text-slate-900 mb-2 leading-snug">{{ $experience->title }}</h4>
                            <p class="text-sm text-slate-500 line-clamp-3 mb-4 grow">{{ $experience->description }}</p>
                            <a href="{{ route('detail', $experience->id) }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-500 gap-1 mt-auto">
                                Detail Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection