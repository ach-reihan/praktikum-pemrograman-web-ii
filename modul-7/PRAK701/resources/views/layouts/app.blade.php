<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Reihan')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen text-slate-800 antialiased">

    <div class="flex flex-col md:flex-row min-h-screen">
        <aside class="w-full md:w-64 bg-slate-900 text-slate-200 flex flex-col p-6 gap-6 shadow-md">
            <div>
                <h4 class="text-xl font-bold text-indigo-400">Perpustakaan</h4>
                <p class="text-sm font-semibold text-white">Reihan</p>
            </div>
            <hr class="border-slate-800 my-0">
            <nav class="flex flex-col gap-3 flex-grow">
                <a href="{{ route('books.index') }}" 
                   class="px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('books.*') ? 'bg-indigo-600 text-white font-semibold' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    Data Buku
                </a>
                <a href="{{ route('borrowings.index') }}" 
                   class="px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('borrowings.*') ? 'bg-indigo-600 text-white font-semibold' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    Data Peminjaman
                </a>
            </nav>
            <div class="border-t border-slate-800 pt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2.5 rounded-lg text-sm font-semibold text-rose-400 hover:bg-rose-950/30 transition-colors">
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-grow p-6 md:p-10">
            @yield('content')
        </main>
    </div>

</body>
</html>