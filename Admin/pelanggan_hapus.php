<?php
//menghubungkan koneksi
include '../koneksi.php';

//menangkap data id yang di kirim dari url
$id = $_GET['id'];

//menghapus pelanggan
mysqli_query($koneksi,"delete from pelanggan where pelanggan_id='$id'");

//alihkan halaman ke halaman pelanggan
header("location:pelanggan.php");
?>