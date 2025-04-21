<?php
// Konfigurasi Database
$host = 'localhost';
$dbname = 'crud_app';
$username = 'root';
$password = '';

// Koneksi Database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// Fungsi dasar
function redirect($url) {
    header("Location: $url");
    exit();
}
?>