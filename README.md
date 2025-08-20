 # RISFRI - Sistem Informasi Frekuensi Radio

Sistem informasi untuk pengelolaan frekuensi radio, kamus istilah, materi, regulasi, dan tabel spektrum.

## Fitur
- Manajemen informasi frekuensi
- Kamus istilah teknis
- Materi edukatif
- Regulasi dan peraturan
- Tabel spektrum frekuensi
- Sistem autentikasi user

## Teknologi
- Laravel 11
- PHP 8.2+
- MySQL/SQLite
- Tailwind CSS
- Vite

## Instalasi

### Clone Repository
```bash
git clone [URL_REPOSITORY]
cd risfri
```

### Install Dependencies
```bash
composer install
npm install
```

### Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### Database Setup
```bash
# Untuk SQLite
touch database/database.sqlite

# Untuk MySQL, edit .env terlebih dahulu
php artisan migrate
php artisan db:seed
```

### Build Assets
```bash
npm run build
```

### Jalankan Server
```bash
php artisan serve
```

## Database
Project ini menggunakan Laravel Migration untuk struktur database. Semua tabel sudah termasuk dalam file migrasi.

## Kontribusi
Silakan buat pull request untuk kontribusi.

## Lisensi
MIT License
