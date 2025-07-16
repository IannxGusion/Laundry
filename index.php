<?php
session_start();
include 'koneksi.php';

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = md5(mysqli_real_escape_string($koneksi, $_POST['password']));

    $data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("Location: admin/index.php");
        exit;
    } else {
        $pesan = "<div class='alert alert-danger'>Login gagal! Username atau password salah.</div>";
    }
}

if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] === "logout") {
        $pesan = "<div class='alert alert-success'>Anda telah berhasil logout.</div>";
    } elseif ($_GET['pesan'] === "belum login") {
        $pesan = "<div class='alert alert-warning'>Silakan login untuk melanjutkan.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin Laundry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 & Google Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
            height: 100vh;
        }
        .login-container {
            height: 100vh;
        }
        .login-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
        }
        .card-header {
            background: #0d6efd;
            color: white;
            border-radius: 16px 16px 0 0;
        }
    </style>
</head>
<body>
    <div class="container login-container d-flex align-items-center justify-content-center">
        <div class="col-md-5">
            <div class="card login-card">
                <div class="card-header text-center py-4">
                    <h5 class="mb-0">Sistem Informasi Laundry</h5>
                    <small>SMKN 7 Baleendah</small>
                </div>
                <div class="card-body p-4">
                    <?= $pesan ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="username" class="form-label">👤 Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">🔒 Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-2">🔓 Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
