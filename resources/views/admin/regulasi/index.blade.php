@extends('layouts.admin')

@section('page-title', 'Kelola Regulasi')
@section('page-description', 'Tambah, edit, dan hapus regulasi spektrum frekuensi radio')

@section('content')
    {{-- HEADER WITH ADD BUTTON --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">Daftar Regulasi</h2>
            <p class="text-sm text-gray-600">Kelola semua regulasi spektrum frekuensi radio</p>
        </div>
        <a href="{{ route('admin.regulasi.create') }}" 
           class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition duration-200">
            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Tambah Regulasi
        </a>
    </div>

    {{-- SEARCH AND FILTER --}}
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form action="{{ route('admin.regulasi.index') }}" method="GET">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <input type="text" 
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Cari regulasi..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <option value="">Semua Kategori</option>
                    <option value="nasional" {{ request('category') == 'nasional' ? 'selected' : '' }}>Nasional</option>
                    <option value="internasional" {{ request('category') == 'internasional' ? 'selected' : '' }}>Internasional</option>
                    <option value="teknis" {{ request('category') == 'teknis' ? 'selected' : '' }}>Teknis</option>
                    <option value="administratif" {{ request('category') == 'administratif' ? 'selected' : '' }}>Administratif</option>
                </select>
                <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                    Cari
                </button>
                @if(request('search') || request('category'))
                    <a href="{{ route('admin.regulasi.index') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($regulasi as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-semibold">{{ $item->regulation_number ?? '-' }}</td>
                        <td class="px-6 py-4">
                            <div class="font-medium">{{ $item->title }}</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($item->description, 110) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">{{ $item->category ?? 'lainnya' }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $item->published_date ? \Carbon\Carbon::parse($item->published_date)->translatedFormat('d F Y') : '-' }}</td>
                        <td class="px-6 py-4">
                            @if(($item->status ?? 'draft') === 'active' || ($item->status ?? 'Berlaku') === 'Berlaku')
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Berlaku</span>
                            @else
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.regulasi.edit', $item->id) }}" 
                                   class="text-red-600 hover:text-red-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.regulasi.destroy', $item->id) }}" method="POST" class="inline">
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
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            Belum ada data regulasi. <a href="{{ route('admin.regulasi.create') }}" class="text-red-600 hover:text-red-900">Tambah regulasi pertama</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
