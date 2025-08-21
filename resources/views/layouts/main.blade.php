<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>RISFRI</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans text-gray-800 min-h-screen flex flex-col">

    {{-- Header / Navbar --}}
    <header class="bg-indigo-900 shadow-md">
        <nav class="container mx-auto px-6 py-4 flex flex-wrap items-center justify-center md:justify-start gap-6">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 text-white font-bold text-xl">
                <img src="{{ asset('images/komdigi.png') }}" alt="Logo RISFRI" class="h-20 w-auto" />
                <img src="{{ asset('images/risfri.png') }}" alt="Logo RISFRI" class="h-10 w-auto" />
            </a>
            <a href="{{ route('info-frekuensi') }}" class="text-white hover:text-black">Info Frekuensi</a>
            <a href="{{ route('kamus') }}" class="text-white hover:text-black">Kamus</a>
            <a href="{{ route('tabel-spektrum') }}" class="text-white hover:text-black">Tabel Spektrum</a>
            <a href="{{ route('materi') }}" class="text-white hover:text-black">Materi</a>
            <a href="{{ route('regulasi') }}" class="text-white hover:text-black">Regulasi</a>
        </nav>
    </header>

    {{-- Main Content --}}
    <main class="flex-grow container mx-auto px-6 py-10">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t border-gray-200 text-center py-6 text-gray-500 text-sm">
        © 2025 RISFRI. All rights reserved.
    </footer>

</body>
</html>
