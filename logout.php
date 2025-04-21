<?php
require_once 'config.php';  // Tambahkan baris ini
require_once 'auth.php';

session_destroy();
redirect('login.php');
?>