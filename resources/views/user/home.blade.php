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

    <section style="margin-top: 60px; text-align: center;">
    <h2 style="font-weight: bold; font-size: 2rem;">Mengenal Spektrum Frekuensi Radio</h2>
    <p style="font-size: 1rem; color: #555; max-width: 700px; margin: 10px auto 40px;">
      Menelusuri peran penting spektrum frekuensi dalam mendukung teknologi komunikasi di Indonesia
    </p>

    <div style="display: flex; justify-content: center; gap: 40px; align-items: center; max-width: 900px; margin: 0 auto;">
      <div style="flex: 1; text-align: left;">
        <h4>Sejarah & Peran Strategis</h4>
        <p style="color: #666; font-size: 0.9rem; line-height: 1.5;">
          Spektrum frekuensi radio merupakan sumber daya alam terbatas yang menjadi fondasi utama dalam berbagai sistem komunikasi nirkabel, mulai dari siaran radio, televisi, hingga jaringan seluler dan satelit.
          <br><br>
          Sejak awal abad ke-20, penggunaan spektrum frekuensi telah berkembang pesat seiring dengan kemajuan teknologi komunikasi global. Di Indonesia, pengelolaan spektrum dilakukan secara strategis untuk memastikan efisiensi, keadilan, dan keberlanjutan penggunaan di seluruh sektor.
          <br><br>
          Kini, spektrum frekuensi radio memegang peranan penting dalam transformasi digital nasional, mendukung konektivitas masyarakat, pertumbuhan ekonomi berbasis digital, serta menjaga ketahanan nasional.
        </p>
      </div>
      <div style="flex: 1;">
        <img src="/images/gambar1.png" alt="Spektrum Frekuensi Radio" style="max-width: 100%; height: auto;">
      </div>
    </div>
  </section>

  <section style="background-color: #003366; color: white; padding: 40px 20px; margin-top: 60px; border-radius: 8px;">
    <div style="max-width: 1200px; margin: 0 auto;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 style="font-weight: bold; font-size: 1.8rem; margin: 0;">Materi Pembelajaran Terbaru</h2>
        <a href="#" style="color: white; font-weight: bold; text-decoration: none; font-size: 0.9rem;">Lihat Semua ></a>
      </div>
      <p style="font-size: 1rem; max-width: 600px; margin-bottom: 30px;">
        Akses materi pembelajaran seputar spektrum frekuensi radio secara mandiri dan fleksibel.
      </p>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;">
        <div style="border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); width: 220px; height: 211px; overflow: hidden;">
          <div style="background: #004080; height: 40%; display: flex; justify-content: center; align-items: center;">
            <img src="/images/gambar2.png" alt="Dasar-Dasar Spektrum Frekuensi Radio" style="width: 60px;">
          </div>
          <div style="background: white; height: 60%; padding: 10px 15px; text-align: left;">
            <h4 style="font-weight: bold; font-size: 1rem; margin: 0 0 5px 0; color: #000;">Dasar-Dasar Spektrum Frekuensi Radio</h4>
            <p style="font-size: 0.85rem; color: #333; margin: 0;">Mengenal konsep dasar, manfaat, dan peran penting spektrum dalam komunikasi modern.</p>
          </div>
        </div>
        <div style="border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); width: 220px; height: 211px; overflow: hidden;">
          <div style="background: #004080; height: 40%; display: flex; justify-content: center; align-items: center;">
            <img src="/images/gambar2.png" alt="Pengelolaan Frekuensi: Regulasi & Tata Kelola" style="width: 60px;">
          </div>
          <div style="background: white; height: 60%; padding: 10px 15px; text-align: left;">
            <h4 style="font-weight: bold; font-size: 1rem; margin: 0 0 5px 0; color: #000;">Pengelolaan Frekuensi: Regulasi & Tata Kelola</h4>
            <p style="font-size: 0.85rem; color: #333; margin: 0;">Pahami aturan, izin, dan kebijakan pengelolaan spektrum di Indonesia.</p>
          </div>
        </div>
        <div style="border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); width: 220px; height: 211px; overflow: hidden;">
          <div style="background: #004080; height: 40%; display: flex; justify-content: center; align-items: center;">
            <img src="/images/gambar2.png" alt="Monitoring Spektrum Frekuensi Radio" style="width: 60px;">
          </div>
          <div style="background: white; height: 60%; padding: 10px 15px; text-align: left;">
            <h4 style="font-weight: bold; font-size: 1rem; margin: 0 0 5px 0; color: #000;">Monitoring Spektrum Frekuensi Radio</h4>
            <p style="font-size: 0.85rem; color: #333; margin: 0;">Teknik, perangkat, dan proses pemantauan spektrum secara nasional.</p>
          </div>
        </div>
        <div style="border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); width: 220px; height: 211px; overflow: hidden;">
          <div style="background: #004080; height: 40%; display: flex; justify-content: center; align-items: center;">
            <img src="/images/gambar2.png" alt="Teknologi Komunikasi Nirkabel dan Pita Frekuensi" style="width: 60px;">
          </div>
          <div style="background: white; height: 60%; padding: 10px 15px; text-align: left;">
            <h4 style="font-weight: bold; font-size: 1rem; margin: 0 0 5px 0; color: #000;">Teknologi Komunikasi Nirkabel dan Pita Frekuensi</h4>
            <p style="font-size: 0.85rem; color: #333; margin: 0;">Kaitan antara teknologi komunikasi spektrum 4G/5G dengan pita frekuensi radio.</p>
          </div>
        </div>
        <div style="border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); width: 220px; height: 211px; overflow: hidden;">
          <div style="background: #004080; height: 40%; display: flex; justify-content: center; align-items: center;">
            <img src="/images/gambar2.png" alt="Inspeksi dan Penanganan Gangguan Frekuensi" style="width: 60px;">
          </div>
          <div style="background: white; height: 60%; padding: 10px 15px; text-align: left;">
            <h4 style="font-weight: bold; font-size: 1rem; margin: 0 0 5px 0; color: #000;">Inspeksi dan Penanganan Gangguan Frekuensi</h4>
            <p style="font-size: 0.85rem; color: #333; margin: 0;">Studi kasus dan teknik menangani interferensi atau gangguan spektrum.</p>
          </div>
        </div>
        <div style="border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); width: 220px; height: 211px; overflow: hidden;">
          <div style="background: #004080; height: 40%; display: flex; justify-content: center; align-items: center;">
            <img src="/images/gambar2.png" alt="Jenis Sistem Komunikasi Radio" style="width: 60px;">
          </div>
          <div style="background: white; height: 60%; padding: 10px 15px; text-align: left;">
            <h4 style="font-weight: bold; font-size: 1rem; margin: 0 0 5px 0; color: #000;">Jenis Sistem Komunikasi Radio</h4>
            <p style="font-size: 0.85rem; color: #333; margin: 0;">Menjelaskan berbagai jenis sistem komunikasi yang memanfaatkan spektrum radio, maritim, penerbangan, dan darat.</p>
          </div>
        </div>
        <div style="border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); width: 220px; height: 211px; overflow: hidden;">
          <div style="background: #004080; height: 40%; display: flex; justify-content: center; align-items: center;">
            <img src="/images/gambar2.png" alt="Pengukuran dan Parameter Teknis Spektrum" style="width: 60px;">
          </div>
          <div style="background: white; height: 60%; padding: 10px 15px; text-align: left;">
            <h4 style="font-weight: bold; font-size: 1rem; margin: 0 0 5px 0; color: #000;">Pengukuran dan Parameter Teknis Spektrum</h4>
            <p style="font-size: 0.85rem; color: #333; margin: 0;">Materi teknis yang mendalam, pengukuran, spektrum bandwidth, parameter lainnya.</p>
          </div>
        </div>
        <div style="border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); width: 220px; height: 211px; overflow: hidden;">
          <div style="background: #004080; height: 40%; display: flex; justify-content: center; align-items: center;">
            <img src="/images/gambar2.png" alt="Peran Spektrum dalam Ekosistem Digital Nasional" style="width: 60px;">
          </div>
          <div style="background: white; height: 60%; padding: 10px 15px; text-align: left;">
            <h4 style="font-weight: bold; font-size: 1rem; margin: 0 0 5px 0; color: #000;">Peran Spektrum dalam Ekosistem Digital Nasional</h4>
            <p style="font-size: 0.85rem; color: #333; margin: 0;">Menjelaskan kontribusi spektrum terhadap transformasi digital, ekonomi berbasis digital, dan ketahanan nasional.</p>
          </div>
        </div>
        <div style="border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); width: 220px; height: 211px; overflow: hidden;">
          <div style="background: #004080; height: 40%; display: flex; justify-content: center; align-items: center;">
            <img src="/images/gambar2.png" alt="Regulasi Spektrum Frekuensi" style="width: 60px;">
          </div>
          <div style="background: white; height: 60%; padding: 10px 15px; text-align: left;">
            <h4 style="font-weight: bold; font-size: 1rem; margin: 0 0 5px 0; color: #000;">Regulasi Spektrum Frekuensi</h4>
            <p style="font-size: 0.85rem; color: #333; margin: 0;">Informasi tentang regulasi dan kebijakan spektrum frekuensi di Indonesia.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section style="margin-top: 60px; max-width: 1100px; margin-left: auto; margin-right: auto; padding-bottom: 60px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
      <h2 style="font-weight: bold; font-size: 1.5rem; color: #333;">Istilah Populer dalam Dunia Frekuensi</h2>
      <a href="/kamus" style="color: #003366; font-weight: bold; text-decoration: none;">Selengkapnya ></a>
    </div>
    <p style="color: #555; font-size: 1rem; margin-bottom: 20px;">
      Hi Sobat Frekuensi, berikut ini beberapa istilah populer yang sering digunakan dalam dunia spektrum frekuensi radio
    </p>
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
      <div style="background: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 8px; padding: 15px;">
        <h4 style="font-weight: bold; margin-bottom: 8px;">Spektrum Frekuensi</h4>
        <p style="margin: 0; font-size: 0.9rem; color: #444;">Istilah umum untuk pita frekuensi yang digunakan dalam komunikasi nirkabel.</p>
      </div>
      <div style="background: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 8px; padding: 15px;">
        <h4 style="font-weight: bold; margin-bottom: 8px;">Bandwidth</h4>
        <p style="margin: 0; font-size: 0.9rem; color: #444;">Lebar pita frekuensi yang digunakan oleh sinyal untuk mentransmisikan data.</p>
      </div>
      <div style="background: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 8px; padding: 15px;">
        <h4 style="font-weight: bold; margin-bottom: 8px;">Modulasi</h4>
        <p style="margin: 0; font-size: 0.9rem; color: #444;">Teknik untuk mengubah sinyal pembawa agar dapat mengirimkan informasi.</p>
      </div>
      <div style="background: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 8px; padding: 15px;">
        <h4 style="font-weight: bold; margin-bottom: 8px;">Stasiun Radio</h4>
        <p style="margin: 0; font-size: 0.9rem; color: #444;">Perangkat pemancar atau penerima yang menggunakan frekuensi tertentu.</p>
      </div>
      <div style="background: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 8px; padding: 15px;">
        <h4 style="font-weight: bold; margin-bottom: 8px;">Interferensi</h4>
        <p style="margin: 0; font-size: 0.9rem; color: #444;">Gangguan sinyal akibat penggunaan frekuensi yang tumpang tindih.</p>
      </div>
      <div style="background: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 8px; padding: 15px;">
        <h4 style="font-weight: bold; margin-bottom: 8px;">Lisensi Frekuensi</h4>
        <p style="margin: 0; font-size: 0.9rem; color: #444;">Izin resmi dari pemerintah untuk menggunakan spektrum tertentu.</p>
      </div>
    </div>
  </section>

  <section style="margin-top: 60px; max-width: 1200px; margin-left: auto; margin-right: auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
      <h2 style="font-weight: bold; font-size: 1.5rem; color: #333;">Info Frekuensi</h2>
      <a href="/materi" style="color: #003366; font-weight: bold; text-decoration: none;">Selengkapnya ></a>
    </div>
    <p style="color: #555; font-size: 1rem; margin-bottom: 20px;">
      informasi singkat tentang frekuensi dalam bentuk artikel
    </p>
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
      <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); overflow: hidden;">
        <img src="/images/gambar1.png" alt="Apa Itu Spektrum Frekuensi Radio?" style="width: 100%; height: 120px; object-fit: cover;">
        <div style="padding: 10px 15px;">
          <p style="font-size: 0.75rem; color: #004080; margin: 0 0 5px 0;">Artikel</p>
          <h4 style="font-weight: bold; font-size: 1rem; margin: 0;">Apa Itu Spektrum Frekuensi Radio?</h4>
        </div>
      </div>
      <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); overflow: hidden;">
        <img src="/images/gambar2.png" alt="Kenapa Frekuensi Harus Diatur?" style="width: 100%; height: 120px; object-fit: cover;">
        <div style="padding: 10px 15px;">
          <p style="font-size: 0.75rem; color: #004080; margin: 0 0 5px 0;">Artikel</p>
          <h4 style="font-weight: bold; font-size: 1rem; margin: 0;">Kenapa Frekuensi Harus Diatur?</h4>
        </div>
      </div>
      <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); overflow: hidden;">
        <img src="/images/tabel.png" alt="Mengenal Pita Frekuensi dan Fungsinya" style="width: 100%; height: 120px; object-fit: cover;">
        <div style="padding: 10px 15px;">
          <p style="font-size: 0.75rem; color: #004080; margin: 0 0 5px 0;">Artikel</p>
          <h4 style="font-weight: bold; font-size: 1rem; margin: 0;">Mengenal Pita Frekuensi dan Fungsinya</h4>
        </div>
      </div>
      <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); overflow: hidden;">
        <img src="/images/gambar2.png" alt="Bahaya Penggunaan Frekuensi Tanpa Izin" style="width: 100%; height: 120px; object-fit: cover;">
        <div style="padding: 10px 15px;">
          <p style="font-size: 0.75rem; color: #004080; margin: 0 0 5px 0;">Artikel</p>
          <h4 style="font-weight: bold; font-size: 1rem; margin: 0;">Bahaya Penggunaan Frekuensi Tanpa Izin</h4>
        </div>
      </div>
    </section>
@endsection
