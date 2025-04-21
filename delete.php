<?php
require_once 'config.php';
require_once 'auth.php';
requireLogin();

$id = $_GET['id'];

// Hapus produk
$stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
$stmt->execute([$id]);

redirect('index.php?success=Produk berhasil dihapus');
?>