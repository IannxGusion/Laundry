<?php include '../koneksi.php';

$h = $_POST['harga'];

mysqli_query($koneksi,"update harga set harga_per_kilo='$h'");


header("location:harga.php");
?>