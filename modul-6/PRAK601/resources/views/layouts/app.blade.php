<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portofolio Reihan')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased min-height-screen flex flex-col">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-xs">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center gap-2">
                    <span class="text-lg font-bold text-indigo-600">Reihan</span>
                    <span class="text-sm bg-indigo-50 text-indigo-700 px-2 py-0.5 rounded-full font-semibold">Modul 6</span>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('beranda') }}" class="text-sm font-medium transition-colors {{ request()->routeIs('beranda') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }}">
                        Beranda
                    </a>
                    <a href="{{ route('profil') }}" class="text-sm font-medium transition-colors {{ request()->routeIs('profil') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }}">
                        Profil
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="grow">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-slate-100 py-6 text-center text-sm text-slate-400">
        <p>&copy; {{ date('Y') }} Achmad Reihan Alfaiz. All rights reserved.</p>
    </footer>

</body>
</html>