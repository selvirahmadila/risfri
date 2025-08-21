<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard - RISFRI</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans text-gray-800 min-h-screen">
    <div class="flex">
        {{-- SIDEBAR --}}
        <div class="w-64 bg-indigo-900 min-h-screen fixed">
            <div class="p-6">
                <div class="flex items-center space-x-3 text-white">
                    <img src="{{ asset('images/komdigi.png') }}" alt="Logo RISFRI" class="h-12 w-auto" />
                    <div>
                        <h1 class="font-bold text-lg">RISFRI</h1>
                        <p class="text-sm opacity-75">Admin Panel</p>
                    </div>
                </div>
            </div>
            
            <nav class="mt-8">
                <div class="px-6 mb-4">
                    <h3 class="text-xs font-semibold text-indigo-300 uppercase tracking-wider">Menu Utama</h3>
                </div>
                
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center px-6 py-3 text-white hover:bg-indigo-800 transition duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-800' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                    </svg>
                    Dashboard
                </a>
                
                <div class="px-6 mt-6 mb-4">
                    <h3 class="text-xs font-semibold text-indigo-300 uppercase tracking-wider">Kelola Konten</h3>
                </div>
                
                <a href="{{ route('admin.info-frekuensi.index') }}" 
                   class="flex items-center px-6 py-3 text-white hover:bg-indigo-800 transition duration-200 {{ request()->routeIs('admin.info-frekuensi.*') ? 'bg-indigo-800' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Info Frekuensi
                </a>
                
                <a href="{{ route('admin.kamus.index') }}" 
                   class="flex items-center px-6 py-3 text-white hover:bg-indigo-800 transition duration-200 {{ request()->routeIs('admin.kamus.*') ? 'bg-indigo-800' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Kamus SFR
                </a>
                
                <a href="{{ route('admin.tabel-spektrum.index') }}" 
                   class="flex items-center px-6 py-3 text-white hover:bg-indigo-800 transition duration-200 {{ request()->routeIs('admin.tabel-spektrum.*') ? 'bg-indigo-800' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Tabel Spektrum
                </a>
                
                <a href="{{ route('admin.materi.index') }}" 
                   class="flex items-center px-6 py-3 text-white hover:bg-indigo-800 transition duration-200 {{ request()->routeIs('admin.materi.*') ? 'bg-indigo-800' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Materi Pembelajaran
                </a>
                
                <a href="{{ route('admin.regulasi.index') }}" 
                   class="flex items-center px-6 py-3 text-white hover:bg-indigo-800 transition duration-200 {{ request()->routeIs('admin.regulasi.*') ? 'bg-indigo-800' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Regulasi
                </a>
                
                <div class="px-6 mt-6 mb-4">
                    <h3 class="text-xs font-semibold text-indigo-300 uppercase tracking-wider">Pengaturan</h3>
                </div>
                
                <a href="{{ route('admin.users.index') }}" 
                   class="flex items-center px-6 py-3 text-white hover:bg-indigo-800 transition duration-200 {{ request()->routeIs('admin.users.*') ? 'bg-indigo-800' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                    Kelola User
                </a>
                
                <a href="{{ route('home') }}" 
                   class="flex items-center px-6 py-3 text-white hover:bg-indigo-800 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Kembali ke Website
                </a>
            </nav>
        </div>

        {{-- MAIN CONTENT --}}
        <div class="ml-64 flex-1">
            {{-- HEADER --}}
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-sm text-gray-600">@yield('page-description', 'Kelola konten RISFRI')</p>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                                <img src="https://ui-avatars.com/api/?name=Admin&background=6366f1&color=fff" 
                                     alt="Admin" class="w-8 h-8 rounded-full">
                                <span class="font-medium">Admin</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            {{-- CONTENT --}}
            <main class="p-6">
                @if(session('success'))
                    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
