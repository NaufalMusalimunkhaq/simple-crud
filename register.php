<?php
require_once 'config.php';
require_once 'auth.php';

if (isLoggedIn()) {
    redirect('index.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Validasi sederhana
    if (strlen($username) < 3) {
        $error = 'Username minimal 3 karakter';
    } elseif (strlen($password) < 3) {
        $error = 'Password minimal 3 karakter';
    } else {
        // Cek username sudah ada
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        
        if ($stmt->fetch()) {
            $error = 'Username sudah digunakan';
        } else {
            // Simpan password plaintext (TIDAK AMAN!)
            $plain_password = $password;
            
            // Simpan user baru
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            if ($stmt->execute([$username, $plain_password])) {
                redirect('login.php?registered=1');
            } else {
                $error = 'Gagal mendaftar';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Register</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php endif; ?>
                        
                        <?php if (isset($_GET['registered'])): ?>
                            <div class="alert alert-success">Pendaftaran berhasil! Silakan login.</div>
                        <?php endif; ?>
                        
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </form>
                        <p class="mt-3">Sudah punya akun? <a href="login.php">Login disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>