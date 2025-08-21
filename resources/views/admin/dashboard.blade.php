@extends('layouts.admin')

@section('page-title', 'Dashboard')
@section('page-description', 'Ringkasan dan statistik konten RISFRI')

@section('content')
    {{-- STATISTICS CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Info Frekuensi</p>
                    <p class="text-2xl font-semibold text-gray-900">12</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Kamus SFR</p>
                    <p class="text-2xl font-semibold text-gray-900">25</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Tabel Spektrum</p>
                    <p class="text-2xl font-semibold text-gray-900">8</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Materi Pembelajaran</p>
                    <p class="text-2xl font-semibold text-gray-900">15</p>
                </div>
            </div>
        </div>
    </div>

    {{-- QUICK ACTIONS --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
            <div class="space-y-3">
                <a href="{{ route('admin.info-frekuensi.create') }}" 
                   class="flex items-center p-3 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition duration-200">
                    <svg class="w-5 h-5 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span class="text-indigo-700 font-medium">Tambah Info Frekuensi Baru</span>
                </a>
                
                <a href="{{ route('admin.kamus.create') }}" 
                   class="flex items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition duration-200">
                    <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span class="text-blue-700 font-medium">Tambah Istilah Kamus Baru</span>
                </a>
                
                <a href="{{ route('admin.materi.create') }}" 
                   class="flex items-center p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition duration-200">
                    <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span class="text-purple-700 font-medium">Tambah Materi Pembelajaran</span>
                </a>
                
                <a href="{{ route('admin.regulasi.create') }}" 
                   class="flex items-center p-3 bg-red-50 rounded-lg hover:bg-red-100 transition duration-200">
                    <svg class="w-5 h-5 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span class="text-red-700 font-medium">Tambah Regulasi Baru</span>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Konten Terbaru</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-medium text-gray-900">Apa Itu Spektrum Frekuensi Radio?</p>
                        <p class="text-sm text-gray-600">Info Frekuensi • 2 jam yang lalu</p>
                    </div>
                    <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs rounded-full">Info</span>
                </div>
                
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-medium text-gray-900">Bandwidth</p>
                        <p class="text-sm text-gray-600">Kamus SFR • 1 hari yang lalu</p>
                    </div>
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Kamus</span>
                </div>
                
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-medium text-gray-900">Dasar-Dasar Spektrum Frekuensi Radio</p>
                        <p class="text-sm text-gray-600">Materi Pembelajaran • 3 hari yang lalu</p>
                    </div>
                    <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">Materi</span>
                </div>
            </div>
        </div>
    </div>

    {{-- RECENT ACTIVITIES --}}
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Aktivitas Terbaru</h3>
        <div class="space-y-4">
            <div class="flex items-center space-x-4">
                <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900">Konten "Apa Itu Spektrum Frekuensi Radio?" telah ditambahkan</p>
                    <p class="text-xs text-gray-500">2 jam yang lalu</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900">Istilah "Bandwidth" telah diperbarui</p>
                    <p class="text-xs text-gray-500">1 hari yang lalu</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="w-2 h-2 bg-purple-400 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900">Materi "Dasar-Dasar Spektrum Frekuensi Radio" telah dipublikasikan</p>
                    <p class="text-xs text-gray-500">3 hari yang lalu</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900">Regulasi "UU No. 36 Tahun 1999" telah diperbarui</p>
                    <p class="text-xs text-gray-500">1 minggu yang lalu</p>
                </div>
            </div>
        </div>
    </div>
@endsection
