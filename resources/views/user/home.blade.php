{{-- resources/views/user/home.blade.php --}}
@extends('layouts.main')

@section('content')
    {{-- HERO SECTION --}}
    <section class="bg-gradient-to-r from-indigo-900 via-indigo-800 to-indigo-700 text-white py-20 px-6 rounded-lg shadow-md relative">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-10">
            <!-- Kiri: Judul + deskripsi -->
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                    Ruang Informasi Spektrum Frekuensi Radio Indonesia
                </h1>
                <p class="text-lg leading-relaxed opacity-95">
                    RISFRI adalah platform informasi publik yang menyediakan data, edukasi, dan regulasi terkait spektrum frekuensi radio di Indonesia.
                </p>
            </div>

            <!-- Kanan: Gambar -->
            <div class="md:w-1/2 flex justify-center md:justify-end">
                <img src="{{ asset('images/tower.png') }}" alt="Spektrum Frekuensi"
                     class="max-w-sm md:max-w-md rounded-lg drop-shadow-lg" />
            </div>
        </div>
    </section>

    {{-- MENU UTAMA --}}
    <div class="max-w-7xl mx-auto relative z-20 px-10" style="margin-top: -3rem;">
        <div class="flex justify-center gap-6 flex-wrap md:flex-nowrap">
            @php
                $menus = [
                    ['route' => 'info-frekuensi', 'label' => 'Info Frekuensi', 'img' => 'info_fr.png', 'desc' => 'Informasi lengkap spektrum frekuensi radio.'],
                    ['route' => 'kamus', 'label' => 'Kamus SFR', 'img' => 'kamus.png', 'desc' => 'Definisi dan istilah spektrum frekuensi.'],
                    ['route' => 'tabel-spektrum', 'label' => 'Tabel Spektrum', 'img' => 'tasfri.png', 'desc' => 'Tabel frekuensi lengkap dan rinci.'],
                    ['route' => 'materi', 'label' => 'Materi Pembelajaran', 'img' => 'materi.png', 'desc' => 'Materi edukasi spektrum radio untuk semua.'],
                ];
            @endphp

            @foreach ($menus as $menu)
                <a href="{{ route($menu['route']) }}"
                   class="bg-white hover:bg-gray-100 shadow-md rounded-lg w-[240px] p-4 flex flex-col justify-between transition duration-300 ease-in-out text-indigo-800">
                    <div class="flex items-center gap-3 mb-3">
                        <img src="{{ asset('images/' . $menu['img']) }}" alt="{{ $menu['label'] }}"
                             class="h-16 w-16 object-contain rounded-md flex-shrink-0" />
                        <h3 class="text-lg font-semibold truncate">{{ $menu['label'] }}</h3>
                    </div>
                    <p class="text-indigo-600 text-sm leading-snug">{{ $menu['desc'] }}</p>
                </a>
            @endforeach
        </div>
    </div>

    {{-- ISTILAH POPULER --}}
    <section class="max-w-7xl mx-auto px-10 py-14 mt-12 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">Istilah Populer dalam Dunia Frekuensi</h2>
        <ul class="grid grid-cols-2 md:grid-cols-3 gap-4 text-indigo-800">
            <li>📡 Stasiun Radio</li>
            <li>⚡ Interferensi</li>
            <li>📜 Lisensi Frekuensi</li>
            <li>📶 Spektrum Frekuensi</li>
            <li>📏 Bandwidth</li>
            <li>🎚 Modulasi</li>
        </ul>
        <div class="mt-6">
            <a href="{{ route('kamus') }}" class="text-indigo-700 hover:underline font-semibold">Selengkapnya ></a>
        </div>
    </section>

    {{-- ARTIKEL INFO FREKUENSI --}}
    <section class="max-w-7xl mx-auto px-10 py-14 mt-12 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">Artikel Info Frekuensi</h2>
        <ul class="space-y-3 text-indigo-800">
            <li>🔹 Apa Itu Spektrum Frekuensi Radio?</li>
            <li>🔹 Mengenal Pita Frekuensi dan Fungsinya</li>
            <li>🔹 Kenapa Frekuensi Harus Diatur?</li>
            <li>🔹 Bahaya Penggunaan Frekuensi Tanpa Izin</li>
        </ul>
        <div class="mt-6">
            <a href="{{ route('info-frekuensi') }}" class="text-indigo-700 hover:underline font-semibold">Selengkapnya ></a>
        </div>
    </section>

    {{-- MATERI TERBARU --}}
    <section class="max-w-7xl mx-auto px-10 py-14 mt-12 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">Materi Pembelajaran Terbaru</h2>
        <ul class="space-y-3 text-indigo-800">
            <li>📘 Pengukuran Frekuensi</li>
            <li>📘 Monitoring Spektrum</li>
            <li>📘 Peran Spektrum dalam Teknologi Modern</li>
            <li>📘 Teknologi Nirkabel & Perkembangannya</li>
            <li>📘 Jenis Sistem Komunikasi</li>
            <li>📘 Regulasi Frekuensi</li>
        </ul>
        <div class="mt-6">
            <a href="{{ route('materi') }}" class="text-indigo-700 hover:underline font-semibold">Lihat Semua ></a>
        </div>
    </section>

    {{-- TENTANG RISFRI --}}
    <section class="max-w-7xl mx-auto px-10 py-14 mt-12 bg-white rounded-lg shadow-md">
        <h2 class="text-3xl font-bold mb-6">Tentang RISFRI</h2>
        <p class="text-lg leading-relaxed max-w-4xl mx-auto text-gray-700">
            RISFRI adalah ruang informasi yang menyediakan data dan materi lengkap mengenai spektrum frekuensi radio di Indonesia.
            Kami berkomitmen untuk menyediakan sumber informasi yang akurat dan mudah diakses oleh publik serta para profesional
            di bidang komunikasi radio.
        </p>
    </section>
@endsection
