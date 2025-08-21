@extends('layouts.main')

@section('content')
    {{-- HERO SECTION --}}
    <div class="bg-gradient-to-r from-orange-600 to-red-700 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Materi Pembelajaran</h1>
                <p class="text-xl opacity-90">Kumpulan materi pembelajaran spektrum frekuensi radio</p>
            </div>
        </div>
    </div>

    {{-- SEARCH SECTION --}}
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('materi') }}" method="GET">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" 
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Cari materi pembelajaran..." 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>
                    <select name="category" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        <option value="">Semua Kategori</option>
                        <option value="dasar" {{ request('category') == 'dasar' ? 'selected' : '' }}>Dasar</option>
                        <option value="menengah" {{ request('category') == 'menengah' ? 'selected' : '' }}>Menengah</option>
                        <option value="lanjutan" {{ request('category') == 'lanjutan' ? 'selected' : '' }}>Lanjutan</option>
                        <option value="teknis" {{ request('category') == 'teknis' ? 'selected' : '' }}>Teknis</option>
                    </select>
                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-300">
                        Cari
                    </button>
                    @if(request('search') || request('category'))
                        <a href="{{ route('materi') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-300">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- CONTENT SECTION --}}
    <div class="container mx-auto px-4 py-12">
        @if($materi->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($materi as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="text-3xl mr-3">📖</div>
                            <div>
                                <span class="px-2 py-1 bg-orange-100 text-orange-800 text-xs rounded-full">{{ $item->category }}</span>
                            </div>
                        </div>
                        
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $item->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($item->short_description, 150) }}</p>
                        
                        @if($item->content)
                        <div class="prose prose-sm text-gray-700 mb-4">
                            {!! Str::limit(strip_tags($item->content), 200) !!}
                        </div>
                        @endif
                        
                        @if($item->level)
                        <div class="mb-3">
                            <span class="text-sm font-medium text-gray-700">Level:</span>
                            <span class="text-sm text-gray-600">{{ $item->level }}</span>
                        </div>
                        @endif
                        
                        @if($item->duration)
                        <div class="mb-3">
                            <span class="text-sm font-medium text-gray-700">Durasi:</span>
                            <span class="text-sm text-gray-600">{{ $item->duration }}</span>
                        </div>
                        @endif
                        
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <span>{{ $item->author ?? 'Admin' }}</span>
                            <span>{{ $item->created_at->format('d/m/Y') }}</span>
                        </div>
                        
                        @if($item->tags)
                        <div class="mt-3">
                            @foreach(explode(',', $item->tags) as $tag)
                                <span class="inline-block bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded mr-1 mb-1">
                                    {{ trim($tag) }}
                                </span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-6xl mb-4">📖</div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-2">
                    @if(request('search') || request('category'))
                        Tidak ada hasil pencarian
                    @else
                        Belum Ada Data Materi
                    @endif
                </h3>
                <p class="text-gray-600 mb-4">
                    @if(request('search') || request('category'))
                        Coba ubah kata kunci pencarian atau filter kategori.
                    @else
                        Materi pembelajaran akan ditampilkan di sini setelah admin menambahkan konten dengan status "Aktif".
                    @endif
                </p>
                <div class="bg-orange-50 border border-orange-200 rounded-lg p-4 max-w-md mx-auto">
                    <p class="text-sm text-orange-800">
                        <strong>Info:</strong> Admin dapat menambahkan data materi melalui panel admin dengan status "Aktif" agar muncul di halaman ini.
                    </p>
                </div>
            </div>
        @endif
    </div>
@endsection
