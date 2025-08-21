@extends('layouts.main')

@section('content')
    {{-- HERO SECTION --}}
    <div class="bg-gradient-to-r from-purple-600 to-pink-700 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Tabel Spektrum</h1>
                <p class="text-xl opacity-90">Data lengkap alokasi spektrum frekuensi radio</p>
            </div>
        </div>
    </div>

    {{-- SEARCH SECTION --}}
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('tabel-spektrum') }}" method="GET">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" 
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Cari data spektrum..." 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <select name="category" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">Semua Kategori</option>
                        <option value="VHF" {{ request('category') == 'VHF' ? 'selected' : '' }}>VHF</option>
                        <option value="UHF" {{ request('category') == 'UHF' ? 'selected' : '' }}>UHF</option>
                        <option value="SHF" {{ request('category') == 'SHF' ? 'selected' : '' }}>SHF</option>
                        <option value="EHF" {{ request('category') == 'EHF' ? 'selected' : '' }}>EHF</option>
                    </select>
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-300">
                        Cari
                    </button>
                    @if(request('search') || request('category'))
                        <a href="{{ route('tabel-spektrum') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-300">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- CONTENT SECTION --}}
    <div class="container mx-auto px-4 py-12">
        @if($tabelSpektrum->count() > 0)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-purple-800 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left font-semibold">Pita Frekuensi</th>
                                <th class="px-6 py-4 text-left font-semibold">Layanan</th>
                                <th class="px-6 py-4 text-left font-semibold">Status</th>
                                <th class="px-6 py-4 text-left font-semibold">Pengguna</th>
                                <th class="px-6 py-4 text-left font-semibold">Regulasi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($tabelSpektrum as $spektrum)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-purple-800">{{ $spektrum->frequency_band }}</div>
                                    <div class="text-sm text-gray-500">{{ $spektrum->band_category }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs font-medium">{{ $spektrum->service }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($spektrum->status == 'active')
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">Aktif</span>
                                    @else
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-medium">Draft</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    {{ $spektrum->users ?? 'Tidak ditentukan' }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <a href="#" class="text-purple-600 hover:text-purple-800">{{ $spektrum->regulation ?? 'ITU RR' }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-6xl mb-4">📊</div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-2">
                    @if(request('search') || request('category'))
                        Tidak ada hasil pencarian
                    @else
                        Belum Ada Data Spektrum
                    @endif
                </h3>
                <p class="text-gray-600 mb-4">
                    @if(request('search') || request('category'))
                        Coba ubah kata kunci pencarian atau filter kategori.
                    @else
                        Data tabel spektrum akan ditampilkan di sini setelah admin menambahkan konten dengan status "Aktif".
                    @endif
                </p>
                <div class="bg-purple-50 border border-purple-200 rounded-lg p-4 max-w-md mx-auto">
                    <p class="text-sm text-purple-800">
                        <strong>Info:</strong> Admin dapat menambahkan data spektrum melalui panel admin dengan status "Aktif" agar muncul di halaman ini.
                    </p>
                </div>
            </div>
        @endif
    </div>
@endsection
