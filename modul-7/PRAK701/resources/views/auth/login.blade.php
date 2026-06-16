<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Reihan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white p-8 rounded-2xl shadow-lg max-w-md w-full border border-slate-200">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-extrabold text-slate-800">Perpustakaan</h2>
            <h3 class="text-xl font-bold text-indigo-600">Reihan</h3>
        </div>

        @if (session('warning'))
            <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-800 p-4 rounded-r-lg mb-6 text-sm font-medium">
                {{ session('warning') }}
            </div>
        @endif

        @if ($errors->has('loginError'))
            <div class="bg-amber-50 border-l-4 border-amber-500 text-amber-800 p-4 rounded-r-lg mb-6 text-sm font-medium">
                {{ $errors->first('loginError') }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="username" class="block text-sm font-semibold text-slate-700 mb-1.5">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" 
                       class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm" 
                       placeholder="Masukkan username Anda" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">Password</label>
                <input type="password" id="password" name="password" 
                       class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm" 
                       placeholder="Masukkan password Anda" required>
            </div>

            <button type="submit" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-semibold py-2.5 rounded-lg shadow transition-colors text-sm">
                Masuk ke Sistem
            </button>
        </form>
    </div>

</body>
</html>