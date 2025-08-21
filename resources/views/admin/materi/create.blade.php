@extends('layouts.admin')

@section('page-title', 'Tambah Materi Pembelajaran')
@section('page-description', 'Tambah materi pembelajaran spektrum frekuensi radio baru')

@section('content')
    <div class="max-w-4xl mx-auto">
        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Tambah Materi Pembelajaran Baru</h2>
                <p class="text-sm text-gray-600">Isi form di bawah untuk menambah materi pembelajaran baru</p>
            </div>
            <a href="{{ route('admin.materi.index') }}" 
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition duration-200">
                ← Kembali
            </a>
        </div>

        {{-- FORM --}}
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.materi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {{-- LEFT COLUMN --}}
                    <div class="space-y-6">
                        {{-- JUDUL --}}
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Materi *</label>
                            <input type="text" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                   placeholder="Masukkan judul materi">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- LEVEL --}}
                        <div>
                            <label for="level" class="block text-sm font-medium text-gray-700 mb-2">Level *</label>
                            <select id="level" 
                                    name="level" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option value="">Pilih level</option>
                                <option value="pemula" {{ old('level') == 'pemula' ? 'selected' : '' }}>Pemula</option>
                                <option value="menengah" {{ old('level') == 'menengah' ? 'selected' : '' }}>Menengah</option>
                                <option value="lanjutan" {{ old('level') == 'lanjutan' ? 'selected' : '' }}>Lanjutan</option>
                            </select>
                            @error('level')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- DURASI --}}
                        <div>
                            <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">Durasi (menit) *</label>
                            <input type="number" 
                                   id="duration" 
                                   name="duration" 
                                   value="{{ old('duration') }}"
                                   min="1" 
                                   max="480"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                   placeholder="Contoh: 45">
                            @error('duration')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- STATUS --}}
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                            <select id="status" 
                                    name="status" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option value="">Pilih status</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Dipublikasikan</option>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Diarsipkan</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- RIGHT COLUMN --}}
                    <div class="space-y-6">
                        {{-- KATEGORI --}}
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <select id="category" 
                                    name="category" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option value="">Pilih kategori</option>
                                <option value="dasar" {{ old('category') == 'dasar' ? 'selected' : '' }}>Dasar</option>
                                <option value="regulasi" {{ old('category') == 'regulasi' ? 'selected' : '' }}>Regulasi</option>
                                <option value="monitoring" {{ old('category') == 'monitoring' ? 'selected' : '' }}>Monitoring</option>
                                <option value="teknologi" {{ old('category') == 'teknologi' ? 'selected' : '' }}>Teknologi</option>
                                <option value="inspeksi" {{ old('category') == 'inspeksi' ? 'selected' : '' }}>Inspeksi</option>
                            </select>
                            @error('category')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- THUMBNAIL --}}
                        <div>
                            <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">Thumbnail</label>
                            <input type="file" 
                                   id="thumbnail" 
                                   name="thumbnail" 
                                   accept="image/*"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                            @error('thumbnail')
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
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                   placeholder="Masukkan tags (pisahkan dengan koma)">
                            <p class="mt-1 text-xs text-gray-500">Contoh: spektrum, frekuensi, radio, pembelajaran</p>
                            @error('tags')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- PENULIS --}}
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700 mb-2">Penulis</label>
                            <input type="text" 
                                   id="author" 
                                   name="author" 
                                   value="{{ old('author') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                   placeholder="Masukkan nama penulis">
                            @error('author')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- DESKRIPSI SINGKAT --}}
                <div class="mt-6">
                    <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Singkat *</label>
                    <textarea id="short_description" 
                              name="short_description" 
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                              placeholder="Masukkan deskripsi singkat materi">{{ old('short_description') }}</textarea>
                    @error('short_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- KONTEN LENGKAP --}}
                <div class="mt-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Konten Lengkap *</label>
                    <textarea id="content" 
                              name="content" 
                              rows="12"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                              placeholder="Masukkan konten lengkap materi pembelajaran">{{ old('content') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Anda dapat menggunakan HTML untuk formatting</p>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- TUJUAN PEMBELAJARAN --}}
                <div class="mt-6">
                    <label for="learning_objectives" class="block text-sm font-medium text-gray-700 mb-2">Tujuan Pembelajaran</label>
                    <textarea id="learning_objectives" 
                              name="learning_objectives" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                              placeholder="Masukkan tujuan pembelajaran">{{ old('learning_objectives') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Apa yang akan dipelajari dari materi ini</p>
                    @error('learning_objectives')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PRASYARAT --}}
                <div class="mt-6">
                    <label for="prerequisites" class="block text-sm font-medium text-gray-700 mb-2">Prasyarat</label>
                    <textarea id="prerequisites" 
                              name="prerequisites" 
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                              placeholder="Masukkan prasyarat untuk mempelajari materi ini">{{ old('prerequisites') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Pengetahuan atau materi yang harus dikuasai terlebih dahulu</p>
                    @error('prerequisites')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- REFERENSI --}}
                <div class="mt-6">
                    <label for="references" class="block text-sm font-medium text-gray-700 mb-2">Referensi</label>
                    <textarea id="references" 
                              name="references" 
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                              placeholder="Masukkan referensi atau sumber bacaan">{{ old('references') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Buku, artikel, atau sumber lain yang digunakan</p>
                    @error('references')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- BUTTONS --}}
                <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <button type="button" 
                            onclick="window.location.href='{{ route('admin.materi.index') }}'"
                            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                        Batal
                    </button>
                    <button type="submit" 
                            class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                        Simpan Materi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
