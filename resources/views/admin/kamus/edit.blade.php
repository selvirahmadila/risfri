@extends('layouts.admin')

@section('page-title', 'Edit Istilah Kamus')
@section('page-description', 'Edit istilah kamus spektrum frekuensi radio')

@section('content')
    <div class="max-w-4xl mx-auto">
        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Edit Istilah Kamus</h2>
                <p class="text-sm text-gray-600">Edit istilah "{{ $kamus->term ?? 'Kamus SFR' }}"</p>
            </div>
            <a href="{{ route('admin.kamus.index') }}" 
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition duration-200">
                ← Kembali
            </a>
        </div>

        {{-- FORM --}}
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.kamus.update', $kamus->id ?? 1) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {{-- LEFT COLUMN --}}
                    <div class="space-y-6">
                        {{-- ISTILAH --}}
                        <div>
                            <label for="term" class="block text-sm font-medium text-gray-700 mb-2">Istilah *</label>
                            <input type="text" 
                                   id="term" 
                                   name="term" 
                                   value="{{ old('term', $kamus->term ?? 'Spektrum Frekuensi') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="Masukkan istilah">
                            @error('term')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- KATEGORI --}}
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                            <select id="category" 
                                    name="category" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Pilih kategori</option>
                                <option value="teknis" {{ (old('category', $kamus->category ?? '') == 'teknis') ? 'selected' : '' }}>Teknis</option>
                                <option value="regulasi" {{ (old('category', $kamus->category ?? '') == 'regulasi') ? 'selected' : '' }}>Regulasi</option>
                                <option value="perangkat" {{ (old('category', $kamus->category ?? '') == 'perangkat') ? 'selected' : '' }}>Perangkat</option>
                                <option value="sistem" {{ (old('category', $kamus->category ?? '') == 'sistem') ? 'selected' : '' }}>Sistem</option>
                            </select>
                            @error('category')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- STATUS --}}
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                            <select id="status" 
                                    name="status" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Pilih status</option>
                                <option value="active" {{ (old('status', $kamus->status ?? '') == 'active') ? 'selected' : '' }}>Aktif</option>
                                <option value="draft" {{ (old('status', $kamus->status ?? '') == 'draft') ? 'selected' : '' }}>Draft</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- SINONIM --}}
                        <div>
                            <label for="synonyms" class="block text-sm font-medium text-gray-700 mb-2">Sinonim</label>
                            <input type="text" 
                                   id="synonyms" 
                                   name="synonyms" 
                                   value="{{ old('synonyms', $kamus->synonyms ?? 'Radio Spectrum, Frequency Band') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="Masukkan sinonim (pisahkan dengan koma)">
                            <p class="mt-1 text-xs text-gray-500">Contoh: Radio Spectrum, Frequency Band</p>
                            @error('synonyms')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- RIGHT COLUMN --}}
                    <div class="space-y-6">
                        {{-- ICON --}}
                        <div>
                            <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                            <select id="icon" 
                                    name="icon" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Pilih icon</option>
                                <option value="📡" {{ (old('icon', $kamus->icon ?? '') == '📡') ? 'selected' : '' }}>📡 Antena</option>
                                <option value="📏" {{ (old('icon', $kamus->icon ?? '') == '📏') ? 'selected' : '' }}>📏 Bandwidth</option>
                                <option value="⚖️" {{ (old('icon', $kamus->icon ?? '') == '⚖️') ? 'selected' : '' }}>⚖️ Regulasi</option>
                                <option value="🔧" {{ (old('icon', $kamus->icon ?? '') == '🔧') ? 'selected' : '' }}>🔧 Perangkat</option>
                                <option value="🌐" {{ (old('icon', $kamus->icon ?? '') == '🌐') ? 'selected' : '' }}>🌐 Sistem</option>
                                <option value="📻" {{ (old('icon', $kamus->icon ?? '') == '📻') ? 'selected' : '' }}>📻 Radio</option>
                                <option value="📱" {{ (old('icon', $kamus->icon ?? '') == '📱') ? 'selected' : '' }}>📱 Mobile</option>
                                <option value="🛰️" {{ (old('icon', $kamus->icon ?? '') == '🛰️') ? 'selected' : '' }}>🛰️ Satelit</option>
                            </select>
                            @error('icon')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- SATUAN --}}
                        <div>
                            <label for="unit" class="block text-sm font-medium text-gray-700 mb-2">Satuan</label>
                            <input type="text" 
                                   id="unit" 
                                   name="unit" 
                                   value="{{ old('unit', $kamus->unit ?? 'Hz') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="Masukkan satuan (opsional)">
                            <p class="mt-1 text-xs text-gray-500">Contoh: Hz, kHz, MHz, GHz</p>
                            @error('unit')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- REFERENSI --}}
                        <div>
                            <label for="reference" class="block text-sm font-medium text-gray-700 mb-2">Referensi</label>
                            <input type="text" 
                                   id="reference" 
                                   name="reference" 
                                   value="{{ old('reference', $kamus->reference ?? 'ITU RR Art. 5') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="Masukkan referensi (opsional)">
                            <p class="mt-1 text-xs text-gray-500">Contoh: ITU RR Art. 5, UU No. 36/1999</p>
                            @error('reference')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- TAGS --}}
                        <div>
                            <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                            <input type="text" 
                                   id="tags" 
                                   name="tags" 
                                   value="{{ old('tags', $kamus->tags ?? 'frekuensi, radio, spektrum') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="Masukkan tags (pisahkan dengan koma)">
                            <p class="mt-1 text-xs text-gray-500">Contoh: frekuensi, radio, spektrum, komunikasi</p>
                            @error('tags')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- DEFINISI --}}
                <div class="mt-6">
                    <label for="definition" class="block text-sm font-medium text-gray-700 mb-2">Definisi *</label>
                    <textarea id="definition" 
                              name="definition" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              placeholder="Masukkan definisi lengkap istilah">{{ old('definition', $kamus->definition ?? 'Rentang frekuensi elektromagnetik yang digunakan untuk komunikasi radio dan aplikasi nirkabel lainnya.') }}</textarea>
                    @error('definition')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PENJELASAN LENGKAP --}}
                <div class="mt-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Penjelasan Lengkap</label>
                    <textarea id="description" 
                              name="description" 
                              rows="6"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              placeholder="Masukkan penjelasan lengkap tentang istilah ini">{{ old('description', $kamus->description ?? 'Spektrum frekuensi radio adalah bagian dari spektrum elektromagnetik yang mencakup frekuensi dari 3 kHz hingga 300 GHz. Spektrum ini digunakan untuk berbagai aplikasi komunikasi nirkabel termasuk radio, televisi, telepon seluler, dan internet nirkabel.') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Penjelasan detail tentang istilah, contoh penggunaan, dan informasi tambahan</p>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- CONTOH PENGGUNAAN --}}
                <div class="mt-6">
                    <label for="examples" class="block text-sm font-medium text-gray-700 mb-2">Contoh Penggunaan</label>
                    <textarea id="examples" 
                              name="examples" 
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              placeholder="Masukkan contoh penggunaan istilah">{{ old('examples', $kamus->examples ?? 'Pemerintah mengalokasikan spektrum frekuensi radio untuk layanan 4G dan 5G.') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Contoh kalimat atau penggunaan istilah dalam konteks</p>
                    @error('examples')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- BUTTONS --}}
                <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <button type="button" 
                            onclick="window.location.href='{{ route('admin.kamus.index') }}'"
                            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                        Batal
                    </button>
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                        Update Istilah
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
