<?php
session_start();
include 'koneksi.php';

// Ambil input dari form POST, dan amankan
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = md5(mysqli_real_escape_string($koneksi, $_POST['password']));

// Cek ke database tabel admin
$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($data);

// Jika cocok, buat session dan arahkan
if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:admin/index.php");
    exit;
} else {
    header("location:index.php?pesan=gagal");
    exit;
}
?>
