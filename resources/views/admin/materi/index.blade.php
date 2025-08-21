@extends('layouts.admin')

@section('page-title', 'Kelola Materi Pembelajaran')
@section('page-description', 'Tambah, edit, dan hapus materi pembelajaran spektrum frekuensi radio')

@section('content')
    {{-- HEADER WITH ADD BUTTON --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">Daftar Materi Pembelajaran</h2>
            <p class="text-sm text-gray-600">Kelola semua materi pembelajaran spektrum frekuensi radio</p>
        </div>
        <a href="{{ route('admin.materi.create') }}" 
           class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg font-medium transition duration-200">
            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Tambah Materi
        </a>
    </div>

    {{-- SEARCH AND FILTER --}}
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form action="{{ route('admin.materi.index') }}" method="GET">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <input type="text" 
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Cari materi pembelajaran..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>
                <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    <option value="">Semua Kategori</option>
                    <option value="dasar" {{ request('category') == 'dasar' ? 'selected' : '' }}>Dasar</option>
                    <option value="menengah" {{ request('category') == 'menengah' ? 'selected' : '' }}>Menengah</option>
                    <option value="lanjutan" {{ request('category') == 'lanjutan' ? 'selected' : '' }}>Lanjutan</option>
                    <option value="teknis" {{ request('category') == 'teknis' ? 'selected' : '' }}>Teknis</option>
                </select>
                <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                    Cari
                </button>
                @if(request('search') || request('category'))
                    <a href="{{ route('admin.materi.index') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    {{-- CONTENT TABLE --}}
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Materi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Level</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($materi as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($item->thumbnail)
                                    <img src="{{ asset($item->thumbnail) }}" alt="Thumbnail" class="w-12 h-12 rounded-lg object-cover mr-4">
                                @endif
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $item->title }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($item->short_description, 110) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">{{ $item->level ?? '-' }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $item->duration ?? '-' }}</td>
                        <td class="px-6 py-4">
                            @if(($item->status ?? 'draft') === 'active')
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Dipublikasikan</span>
                            @else
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.materi.edit', $item->id) }}" 
                                   class="text-purple-600 hover:text-purple-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.materi.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin menghapus?')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Belum ada materi. <a href="{{ route('admin.materi.create') }}" class="text-purple-600 hover:text-purple-900">Tambah materi pertama</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
