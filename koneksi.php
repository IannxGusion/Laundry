<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "laundry"; // ganti sesuai nama database kamu

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
