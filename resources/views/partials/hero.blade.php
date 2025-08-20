{{-- resources/views/partials/hero.blade.php --}}
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
