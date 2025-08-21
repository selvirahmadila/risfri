@extends('layouts.admin')

@section('page-title', 'Edit Info Frekuensi')
@section('page-description', 'Edit konten info frekuensi')

@section('content')
    <div class="max-w-4xl mx-auto">
        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Edit Info Frekuensi</h2>
                <p class="text-sm text-gray-600">Edit konten "{{ $infoFrekuensi->title ?? 'Info Frekuensi' }}"</p>
            </div>
            <a href="{{ route('admin.info-frekuensi.index') }}" 
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition duration-200">
                ← Kembali
            </a>
        </div>

        {{-- FORM --}}
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.info-frekuensi.update', $infoFrekuensi->id ?? 1) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {{-- LEFT COLUMN --}}
                    <div class="space-y-6">
                        {{-- JUDUL --}}
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul *</label>
                            <input type="text" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $infoFrekuensi->title ?? 'Apa Itu Spektrum Frekuensi Radio?') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                   placeholder="Masukkan judul konten">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- KATEGORI --}}
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                            <select id="category" 
                                    name="category" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option value="">Pilih kategori</option>
                                <option value="artikel" {{ (old('category', $infoFrekuensi->category ?? 'artikel') == 'artikel') ? 'selected' : '' }}>Artikel</option>
                                <option value="berita" {{ (old('category', $infoFrekuensi->category ?? '') == 'berita') ? 'selected' : '' }}>Berita</option>
                                <option value="pengumuman" {{ (old('category', $infoFrekuensi->category ?? '') == 'pengumuman') ? 'selected' : '' }}>Pengumuman</option>
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
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option value="">Pilih status</option>
                                <option value="published" {{ (old('status', $infoFrekuensi->status ?? 'published') == 'published') ? 'selected' : '' }}>Dipublikasikan</option>
                                <option value="draft" {{ (old('status', $infoFrekuensi->status ?? '') == 'draft') ? 'selected' : '' }}>Draft</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- TANGGAL PUBLIKASI --}}
                        <div>
                            <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Publikasi</label>
                            <input type="datetime-local" 
                                   id="published_at" 
                                   name="published_at" 
                                   value="{{ old('published_at', $infoFrekuensi->published_at ?? '2024-01-15T10:00') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            @error('published_at')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- RIGHT COLUMN --}}
                    <div class="space-y-6">
                        {{-- GAMBAR THUMBNAIL --}}
                        <div>
                            <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">Gambar Thumbnail</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                                @if($infoFrekuensi->thumbnail ?? false)
                                    <img src="{{ asset('images/' . ($infoFrekuensi->thumbnail ?? 'gambar1.png')) }}" 
                                         alt="Current thumbnail" 
                                         class="mx-auto h-32 w-32 object-cover rounded-lg mb-4">
                                @else
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                @endif
                                <div class="mt-4">
                                    <input type="file" 
                                           id="thumbnail" 
                                           name="thumbnail" 
                                           accept="image/*"
                                           class="hidden">
                                    <label for="thumbnail" 
                                           class="cursor-pointer bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition duration-200">
                                        {{ $infoFrekuensi->thumbnail ?? false ? 'Ganti Gambar' : 'Pilih Gambar' }}
                                    </label>
                                </div>
                                <p class="mt-2 text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                            </div>
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
                                   value="{{ old('tags', $infoFrekuensi->tags ?? 'frekuensi, radio, spektrum') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                   placeholder="Masukkan tags (pisahkan dengan koma)">
                            <p class="mt-1 text-xs text-gray-500">Contoh: frekuensi, radio, spektrum, komunikasi</p>
                            @error('tags')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- DESKRIPSI SINGKAT --}}
                <div class="mt-6">
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Singkat *</label>
                    <textarea id="excerpt" 
                              name="excerpt" 
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                              placeholder="Masukkan deskripsi singkat konten">{{ old('excerpt', $infoFrekuensi->excerpt ?? 'Penjelasan lengkap tentang konsep dasar spektrum frekuensi radio dan perannya dalam komunikasi modern.') }}</textarea>
                    @error('excerpt')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- KONTEN UTAMA --}}
                <div class="mt-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Konten Utama *</label>
                    <textarea id="content" 
                              name="content" 
                              rows="12"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                              placeholder="Masukkan konten utama artikel">{{ old('content', $infoFrekuensi->content ?? 'Spektrum frekuensi radio adalah rentang frekuensi elektromagnetik yang digunakan untuk komunikasi radio, mulai dari 3 kHz hingga 300 GHz. Spektrum ini merupakan sumber daya alam terbatas yang menjadi fondasi utama dalam berbagai sistem komunikasi nirkabel.

Dalam dunia komunikasi modern, spektrum frekuensi radio memegang peranan penting dalam:

1. **Broadcasting**: Radio dan televisi menggunakan spektrum untuk menyiarkan konten ke masyarakat luas.
2. **Mobile Communication**: Jaringan seluler 2G, 3G, 4G, dan 5G memanfaatkan spektrum untuk transmisi data.
3. **Satellite Communication**: Komunikasi satelit menggunakan spektrum untuk menghubungkan berbagai lokasi di dunia.
4. **Emergency Services**: Layanan darurat menggunakan spektrum khusus untuk komunikasi yang andal.

Pengelolaan spektrum frekuensi radio di Indonesia dilakukan oleh Kementerian Komunikasi dan Informatika (Kominfo) melalui Direktorat Jenderal Sumber Daya dan Perangkat Pos dan Informatika (Ditjen SDPPI). Pengelolaan ini mencakup:

- **Alokasi Frekuensi**: Penetapan pita frekuensi untuk layanan tertentu
- **Penerbitan Lisensi**: Izin penggunaan spektrum untuk operator
- **Monitoring**: Pemantauan penggunaan spektrum untuk mencegah interferensi
- **Penegakan Hukum**: Tindakan terhadap penggunaan spektrum tanpa izin

Regulasi spektrum frekuensi radio di Indonesia mengacu pada:
- Undang-Undang No. 36 Tahun 1999 tentang Telekomunikasi
- Peraturan Pemerintah No. 53 Tahun 2000 tentang Penggunaan Spektrum Frekuensi Radio
- ITU Radio Regulations (Regulasi internasional)

Pentingnya regulasi spektrum frekuensi radio:
1. **Mencegah Interferensi**: Tanpa regulasi, penggunaan frekuensi yang tumpang tindih dapat menyebabkan gangguan komunikasi
2. **Efisiensi Penggunaan**: Regulasi memastikan spektrum digunakan secara optimal
3. **Keamanan Nasional**: Spektrum digunakan untuk layanan keamanan dan pertahanan
4. **Pembangunan Ekonomi**: Spektrum mendukung pertumbuhan industri telekomunikasi

Masyarakat dapat mengakses informasi tentang spektrum frekuensi radio melalui berbagai sumber, termasuk website resmi Kominfo, publikasi teknis, dan platform informasi seperti RISFRI (Ruang Informasi Spektrum Frekuensi Radio Indonesia).') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- META DESCRIPTION --}}
                <div class="mt-6">
                    <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                    <textarea id="meta_description" 
                              name="meta_description" 
                              rows="2"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                              placeholder="Deskripsi untuk SEO (opsional)">{{ old('meta_description', $infoFrekuensi->meta_description ?? 'Penjelasan lengkap tentang konsep dasar spektrum frekuensi radio dan perannya dalam komunikasi modern di Indonesia.') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Maksimal 160 karakter untuk optimasi SEO</p>
                    @error('meta_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- BUTTONS --}}
                <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <button type="button" 
                            onclick="window.location.href='{{ route('admin.info-frekuensi.index') }}'"
                            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                        Batal
                    </button>
                    <button type="submit" 
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                        Update Konten
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Preview image when selected
        document.getElementById('thumbnail').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.createElement('img');
                    preview.src = e.target.result;
                    preview.className = 'mx-auto h-32 w-32 object-cover rounded-lg mb-4';
                    
                    const container = document.querySelector('.border-dashed');
                    const existingPreview = container.querySelector('img');
                    if (existingPreview) {
                        existingPreview.remove();
                    }
                    container.appendChild(preview);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
