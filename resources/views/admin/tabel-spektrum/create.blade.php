@extends('layouts.admin')

@section('page-title', 'Tambah Data Spektrum')
@section('page-description', 'Tambah data spektrum frekuensi radio baru')

@section('content')
    <div class="max-w-4xl mx-auto">
        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Tambah Data Spektrum Baru</h2>
                <p class="text-sm text-gray-600">Isi form di bawah untuk menambah data spektrum baru</p>
            </div>
            <a href="{{ route('admin.tabel-spektrum.index') }}" 
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition duration-200">
                ← Kembali
            </a>
        </div>

        {{-- FORM --}}
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.tabel-spektrum.store') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {{-- LEFT COLUMN --}}
                    <div class="space-y-6">
                        {{-- PITA FREKUENSI --}}
                        <div>
                            <label for="frequency_band" class="block text-sm font-medium text-gray-700 mb-2">Pita Frekuensi *</label>
                            <input type="text" 
                                   id="frequency_band" 
                                   name="frequency_band" 
                                   value="{{ old('frequency_band') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Contoh: 30-88 MHz">
                            @error('frequency_band')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- KATEGORI PITA --}}
                        <div>
                            <label for="band_category" class="block text-sm font-medium text-gray-700 mb-2">Kategori Pita *</label>
                            <select id="band_category" 
                                    name="band_category" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Pilih kategori</option>
                                <option value="vhf" {{ old('band_category') == 'vhf' ? 'selected' : '' }}>VHF (30-300 MHz)</option>
                                <option value="uhf" {{ old('band_category') == 'uhf' ? 'selected' : '' }}>UHF (300-3000 MHz)</option>
                                <option value="shf" {{ old('band_category') == 'shf' ? 'selected' : '' }}>SHF (3-30 GHz)</option>
                                <option value="ehf" {{ old('band_category') == 'ehf' ? 'selected' : '' }}>EHF (30-300 GHz)</option>
                            </select>
                            @error('band_category')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- LAYANAN --}}
                        <div>
                            <label for="service" class="block text-sm font-medium text-gray-700 mb-2">Layanan *</label>
                            <select id="service" 
                                    name="service" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Pilih layanan</option>
                                <option value="broadcasting" {{ old('service') == 'broadcasting' ? 'selected' : '' }}>Broadcasting</option>
                                <option value="mobile" {{ old('service') == 'mobile' ? 'selected' : '' }}>Mobile</option>
                                <option value="satellite" {{ old('service') == 'satellite' ? 'selected' : '' }}>Satellite</option>
                                <option value="amateur" {{ old('service') == 'amateur' ? 'selected' : '' }}>Amateur</option>
                                <option value="aeronautical" {{ old('service') == 'aeronautical' ? 'selected' : '' }}>Aeronautical</option>
                                <option value="maritime" {{ old('service') == 'maritime' ? 'selected' : '' }}>Maritime</option>
                            </select>
                            @error('service')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- STATUS --}}
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                            <select id="status" 
                                    name="status" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Pilih status</option>
                                <option value="primary" {{ old('status') == 'primary' ? 'selected' : '' }}>Primary</option>
                                <option value="secondary" {{ old('status') == 'secondary' ? 'selected' : '' }}>Secondary</option>
                                <option value="shared" {{ old('status') == 'shared' ? 'selected' : '' }}>Shared</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- RIGHT COLUMN --}}
                    <div class="space-y-6">
                        {{-- BANDWIDTH --}}
                        <div>
                            <label for="bandwidth" class="block text-sm font-medium text-gray-700 mb-2">Bandwidth</label>
                            <input type="text" 
                                   id="bandwidth" 
                                   name="bandwidth" 
                                   value="{{ old('bandwidth') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Contoh: 58 MHz">
                            @error('bandwidth')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- REGULASI --}}
                        <div>
                            <label for="regulation" class="block text-sm font-medium text-gray-700 mb-2">Regulasi</label>
                            <input type="text" 
                                   id="regulation" 
                                   name="regulation" 
                                   value="{{ old('regulation') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Contoh: ITU RR Art. 5">
                            @error('regulation')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- TAHUN ALOKASI --}}
                        <div>
                            <label for="allocation_year" class="block text-sm font-medium text-gray-700 mb-2">Tahun Alokasi</label>
                            <input type="number" 
                                   id="allocation_year" 
                                   name="allocation_year" 
                                   value="{{ old('allocation_year') }}"
                                   min="1900" 
                                   max="2030"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Contoh: 2020">
                            @error('allocation_year')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- KONDISI --}}
                        <div>
                            <label for="condition" class="block text-sm font-medium text-gray-700 mb-2">Kondisi</label>
                            <select id="condition" 
                                    name="condition" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Pilih kondisi</option>
                                <option value="active" {{ old('condition') == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="planned" {{ old('condition') == 'planned' ? 'selected' : '' }}>Direncanakan</option>
                                <option value="deprecated" {{ old('condition') == 'deprecated' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                            @error('condition')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- PENGGUNA --}}
                <div class="mt-6">
                    <label for="users" class="block text-sm font-medium text-gray-700 mb-2">Pengguna</label>
                    <textarea id="users" 
                              name="users" 
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                              placeholder="Masukkan daftar pengguna (pisahkan dengan koma)">{{ old('users') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Contoh: Emergency Services, Public Safety, Transportation</p>
                    @error('users')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- DESKRIPSI --}}
                <div class="mt-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="description" 
                              name="description" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                              placeholder="Masukkan deskripsi detail tentang pita frekuensi ini">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- CATATAN --}}
                <div class="mt-6">
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                    <textarea id="notes" 
                              name="notes" 
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                              placeholder="Masukkan catatan tambahan (opsional)">{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- BUTTONS --}}
                <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <button type="button" 
                            onclick="window.location.href='{{ route('admin.tabel-spektrum.index') }}'"
                            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                        Batal
                    </button>
                    <button type="submit" 
                            class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
