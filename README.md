# Inventaris Barang Elektronik
Inventaris Barang Elektronik adalah aplikasi berbasis web yang digunakan untuk mencatat dan menampilkan data inventaris barang-barang elektronik yang tersedia di laboratorium. Aplikasi ini dibangun menggunakan Laravel 12 dan tampilan antarmuka modern berbasis FluxUI.

## Fitur Utama
Menampilkan daftar barang elektronik secara lengkap.

* Fitur pencarian barang berdasarkan nama.
* Informasi detail meliputi:
    * Nama Barang
    * Kode
    * Kategori
    * Merk
    * Kondisi (misalnya: Baik, Rusak)
    * Jumlah Barang
    * Lokasi Penyimpanan
    * Navigasi menu: Dashboard, Data Barang, Kategori, dan Merk.
    * Sistem login dan logout untuk keamanan akses.

## Instalasi
1. Clone repository ini:
   ```bash
   git clone https://github.com/arkan894/Perbaikan_PemWeb.git
   cd Perbaikan_PemWeb
   
2. Jalankan perintah berikut untuk menginstall dependency PHP:
   ```bash
   composer install

3. Jalankan perintah berikut untuk menginstall dependency frontend dan menjalankan development server:
   ```bash
   npm install
   npm run dev

4. Atur konfigurasi database pada file .env sesuai dengan pengaturan database Anda.
5. Jalankan migrasi database:
   ```bash
   php artisan migrate
   
6. Jalankan project Laravel:
   ```bash
   php artisan serve


