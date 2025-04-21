# Simple CRUD Application with PHP

Aplikasi CRUD (Create, Read, Update, Delete) sederhana dengan PHP, MySQL, dan Bootstrap. Dilengkapi dengan sistem autentikasi dasar.

## Fitur

- ✅ Sistem Login/Register
- ✅ Manajemen Produk (CRUD)
- ✅ Antarmuka sederhana dengan Bootstrap
- ✅ Tanpa JavaScript (pure PHP)
- ✅ Password disimpan sebagai plaintext (hanya untuk pembelajaran)

## Persyaratan

- PHP 7.4 atau lebih baru
- MySQL 5.7 atau lebih baru
- Web server (Apache, Nginx, atau XAMPP/WAMP)

## Instalasi

1. Clone repository ini atau download source code:
git clone https://github.com/username/simple-crud-php.git

2. Buat database baru di MySQL:
```sql
CREATE DATABASE crud_app;
USE crud_app;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

3. Sesuaikan konfigurasi database di config.php:
$host = 'localhost';
$dbname = 'crud_app';
$username = 'root';  // Sesuaikan dengan username MySQL Anda
$password = '';      // Sesuaikan dengan password MySQL Anda

Letakkan folder project di web server Anda (htdocs untuk XAMPP, www untuk WAMP)

Cara Menggunakan

    Akses aplikasi melalui browser:

http://localhost/simple-crud/

Register akun baru:

    Buka register.php

    Isi username dan password

    Klik "Daftar"

Login:

    Buka login.php

    Masukkan username dan password

    Klik "Login"

Kelola Produk:

    Tambah produk baru (create)

    Lihat daftar produk (read)

    Edit produk (update)

    Hapus produk (delete)

    Struktur File

simple-crud/
├── config.php         # Konfigurasi database
├── auth.php           # Fungsi autentikasi
├── login.php          # Halaman login
├── register.php       # Halaman register
├── logout.php         # Proses logout
├── index.php          # Dashboard + list produk
├── create.php         # Tambah produk
├── edit.php           # Edit produk
├── delete.php         # Hapus produk
└── style.css          # Stylesheet sederhana

Catatan Keamanan

⚠️ PERINGATAN: Aplikasi ini menggunakan penyimpanan password plaintext dan TIDAK AMAN untuk digunakan di lingkungan produksi. Dibuat hanya untuk tujuan pembelajaran.

Untuk versi yang lebih aman:

    Gunakan password_hash() dan password_verify()

    Tambahkan validasi input

    Implementasikan CSRF protection

Kontribusi

Silakan fork dan buat pull request jika ingin berkontribusi.
Lisensi

MIT License