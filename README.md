UTS Aplikasi Manajemen Inventaris (Laravel)


Nama Mahasiswa	    :Ahmad Badrul Furqon,
NIM					:2495114004,
Kelas				:TI A,
Tanggal Ujian		:19 Oktober 2026,
Waktu Mulai			: 18.23,
Waktu Selesai		: 18.54,
waktu Mengerjakan   : 30.17


Aplikasi inventaris toko perlengkapan komputer dengan login serta CRUD kategori dan barang.

## Kebutuhan
PHP 8.3+, Composer, MySQL/MariaDB (bisa memakai Laragon)

## Instalasi
```bash
git clone <URL_REPO>
cd inventaris-laravel
composer install
cp .env.example .env
php artisan key:generate
```
Buat database `inventaris`, atur koneksi database di `.env`, lalu:

```bash
php artisan migrate
php artisan db:seed
```
Membangun ulang database dari awal (hanya untuk development/testing):
```bash
php artisan migrate:fresh --seed
```

## Menjalankan
```bash
php artisan serve
```
Buka http://127.0.0.1:8000

## Akun Uji
- Email: admin@example.com
- Password: password123

## Fitur
Authentication, CRUD kategori dan barang (relasi one-to-many), validasi, migration, seeder.