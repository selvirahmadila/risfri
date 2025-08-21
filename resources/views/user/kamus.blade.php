@extends('layouts.main')

@section('content')
    {{-- HERO SECTION --}}
    <div class="bg-gradient-to-r from-green-600 to-teal-700 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Kamus SFR</h1>
                <p class="text-xl opacity-90">Kamus istilah Spektrum Frekuensi Radio</p>
            </div>
        </div>
    </div>

    {{-- SEARCH SECTION --}}
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('kamus') }}" method="GET">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" 
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Cari istilah..." 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <select name="category" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Semua Kategori</option>
                        <option value="teknis" {{ request('category') == 'teknis' ? 'selected' : '' }}>Teknis</option>
                        <option value="regulasi" {{ request('category') == 'regulasi' ? 'selected' : '' }}>Regulasi</option>
                        <option value="perangkat" {{ request('category') == 'perangkat' ? 'selected' : '' }}>Perangkat</option>
                        <option value="sistem" {{ request('category') == 'sistem' ? 'selected' : '' }}>Sistem</option>
                    </select>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-300">
                        Cari
                    </button>
                    @if(request('search') || request('category'))
                        <a href="{{ route('kamus') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-300">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- CONTENT SECTION --}}
    <div class="container mx-auto px-4 py-12">
        @if($kamus->count() > 0)
            <div class="bg-white rounded-lg shadow divide-y">
                @foreach($kamus as $term)
                <div class="p-6 hover:bg-gray-50 transition-colors duration-200">
                    <div class="flex items-start justify-between gap-6">
                        <div class="flex items-start gap-4 min-w-0">
                            <div class="text-3xl">📚</div>
                            <div class="min-w-0">
                                <div class="flex items-center gap-3 mb-1">
                                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 truncate">{{ $term->term }}</h3>
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full whitespace-nowrap">{{ $term->category }}</span>
                                </div>
                                <p class="text-gray-700 mb-2">{{ Str::limit($term->definition, 180) }}</p>
                                @if($term->description)
                                <div class="text-gray-600 text-sm md:text-base mb-2 line-clamp-2">
                                    {!! Str::limit(strip_tags($term->description), 220) !!}
                                </div>
                                @endif
                                <div class="flex flex-wrap items-center gap-3 text-sm text-gray-600">
                                    @if($term->synonyms)
                                        <span><span class="font-medium text-gray-700">Sinonim:</span> {{ $term->synonyms }}</span>
                                    @endif
                                    @if($term->unit)
                                        <span><span class="font-medium text-gray-700">Satuan:</span> {{ $term->unit }}</span>
                                    @endif
                                    @if($term->tags)
                                        <span class="flex flex-wrap gap-2">
                                            @foreach(explode(',', $term->tags) as $tag)
                                                <span class="inline-block bg-gray-100 text-gray-700 text-xs px-2 py-0.5 rounded">{{ trim($tag) }}</span>
                                            @endforeach
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="shrink-0 text-sm text-gray-500 text-right">
                            <div>{{ $term->reference ?? 'SFR Database' }}</div>
                            <div>{{ $term->created_at->format('d/m/Y') }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-6xl mb-4">📚</div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-2">
                    @if(request('search') || request('category'))
                        Tidak ada hasil pencarian
                    @else
                        Belum Ada Istilah
                    @endif
                </h3>
                <p class="text-gray-600">
                    @if(request('search') || request('category'))
                        Coba ubah kata kunci pencarian atau filter kategori.
                    @else
                        Istilah kamus akan ditampilkan di sini setelah admin menambahkan data.
                    @endif
                </p>
            </div>
        @endif
    </div>
@endsection
