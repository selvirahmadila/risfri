@extends('layouts.admin')

@section('page-title', 'Tambah Regulasi')
@section('page-description', 'Tambah regulasi spektrum frekuensi radio baru')

@section('content')
    <div class="max-w-4xl mx-auto">
        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Tambah Regulasi Baru</h2>
                <p class="text-sm text-gray-600">Isi form di bawah untuk menambah regulasi baru</p>
            </div>
            <a href="{{ route('admin.regulasi.index') }}" 
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition duration-200">
                ← Kembali
            </a>
        </div>

        {{-- FORM --}}
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.regulasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {{-- LEFT COLUMN --}}
                    <div class="space-y-6">
                        {{-- NOMOR REGULASI --}}
                        <div>
                            <label for="regulation_number" class="block text-sm font-medium text-gray-700 mb-2">Nomor Regulasi *</label>
                            <input type="text" 
                                   id="regulation_number" 
                                   name="regulation_number" 
                                   value="{{ old('regulation_number') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                   placeholder="Contoh: UU No. 36 Tahun 1999">
                            @error('regulation_number')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- KATEGORI --}}
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                            <select id="category" 
                                    name="category" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <option value="">Pilih kategori</option>
                                <option value="uu" {{ old('category') == 'uu' ? 'selected' : '' }}>Undang-Undang</option>
                                <option value="pp" {{ old('category') == 'pp' ? 'selected' : '' }}>Peraturan Pemerintah</option>
                                <option value="permen" {{ old('category') == 'permen' ? 'selected' : '' }}>Peraturan Menteri</option>
                                <option value="kepmen" {{ old('category') == 'kepmen' ? 'selected' : '' }}>Keputusan Menteri</option>
                                <option value="perda" {{ old('category') == 'perda' ? 'selected' : '' }}>Peraturan Daerah</option>
                            </select>
                            @error('category')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- TANGGAL DITERBITKAN --}}
                        <div>
                            <label for="published_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Diterbitkan *</label>
                            <input type="date" 
                                   id="published_date" 
                                   name="published_date" 
                                   value="{{ old('published_date') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            @error('published_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- STATUS --}}
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                            <select id="status" 
                                    name="status" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <option value="">Pilih status</option>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Berlaku</option>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="amended" {{ old('status') == 'amended' ? 'selected' : '' }}>Diubah</option>
                                <option value="revoked" {{ old('status') == 'revoked' ? 'selected' : '' }}>Dicabut</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- RIGHT COLUMN --}}
                    <div class="space-y-6">
                        {{-- TAHUN --}}
                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700 mb-2">Tahun *</label>
                            <input type="number" 
                                   id="year" 
                                   name="year" 
                                   value="{{ old('year') }}"
                                   min="1900" 
                                   max="2030"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                   placeholder="Contoh: 1999">
                            @error('year')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- INSTANSI --}}
                        <div>
                            <label for="institution" class="block text-sm font-medium text-gray-700 mb-2">Instansi</label>
                            <input type="text" 
                                   id="institution" 
                                   name="institution" 
                                   value="{{ old('institution') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                   placeholder="Contoh: Kementerian Komunikasi dan Informatika">
                            @error('institution')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- FILE REGULASI --}}
                        <div>
                            <label for="regulation_file" class="block text-sm font-medium text-gray-700 mb-2">File Regulasi</label>
                            <input type="file" 
                                   id="regulation_file" 
                                   name="regulation_file" 
                                   accept=".pdf,.doc,.docx"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <p class="mt-1 text-xs text-gray-500">Format: PDF, DOC, DOCX. Maksimal 10MB</p>
                            @error('regulation_file')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- TAGS --}}
                        <div>
                            <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                            <input type="text" 
                                   id="tags" 
                                   name="tags" 
                                   value="{{ old('tags') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                   placeholder="Masukkan tags (pisahkan dengan koma)">
                            <p class="mt-1 text-xs text-gray-500">Contoh: telekomunikasi, frekuensi, spektrum, radio</p>
                            @error('tags')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- JUDUL --}}
                <div class="mt-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Regulasi *</label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                           placeholder="Masukkan judul lengkap regulasi">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- DESKRIPSI --}}
                <div class="mt-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi *</label>
                    <textarea id="description" 
                              name="description" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                              placeholder="Masukkan deskripsi singkat tentang regulasi ini">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- ISI REGULASI --}}
                <div class="mt-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Isi Regulasi</label>
                    <textarea id="content" 
                              name="content" 
                              rows="12"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                              placeholder="Masukkan isi atau ringkasan regulasi">{{ old('content') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Anda dapat menggunakan HTML untuk formatting</p>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- RUANG LINGKUP --}}
                <div class="mt-6">
                    <label for="scope" class="block text-sm font-medium text-gray-700 mb-2">Ruang Lingkup</label>
                    <textarea id="scope" 
                              name="scope" 
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                              placeholder="Masukkan ruang lingkup regulasi">{{ old('scope') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Siapa saja yang terkena dampak regulasi ini</p>
                    @error('scope')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- KETENTUAN PENTING --}}
                <div class="mt-6">
                    <label for="key_provisions" class="block text-sm font-medium text-gray-700 mb-2">Ketentuan Penting</label>
                    <textarea id="key_provisions" 
                              name="key_provisions" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                              placeholder="Masukkan ketentuan-ketentuan penting dalam regulasi">{{ old('key_provisions') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Pasal-pasal atau ketentuan yang penting untuk diketahui</p>
                    @error('key_provisions')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- SANKSI --}}
                <div class="mt-6">
                    <label for="penalties" class="block text-sm font-medium text-gray-700 mb-2">Sanksi</label>
                    <textarea id="penalties" 
                              name="penalties" 
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                              placeholder="Masukkan sanksi yang berlaku">{{ old('penalties') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Sanksi atau hukuman bagi pelanggar regulasi</p>
                    @error('penalties')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- CATATAN --}}
                <div class="mt-6">
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                    <textarea id="notes" 
                              name="notes" 
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                              placeholder="Masukkan catatan tambahan (opsional)">{{ old('notes') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Catatan atau informasi tambahan tentang regulasi</p>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- BUTTONS --}}
                <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <button type="button" 
                            onclick="window.location.href='{{ route('admin.regulasi.index') }}'"
                            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                        Batal
                    </button>
                    <button type="submit" 
                            class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                        Simpan Regulasi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
