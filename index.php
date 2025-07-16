<?php
session_start();
include 'koneksi.php';

$pesan = "";

// Jika form login dikirim
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = md5(mysqli_real_escape_string($koneksi, $_POST['password'])); // md5 sesuai tabel

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

// Pesan dari query string
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
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <script src="asset/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h5>Sistem Informasi Laundry <br> SMKN 7 Baleendah</h5>
                    </div>
                    <div class="card-body">
                        <?= $pesan ?>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
