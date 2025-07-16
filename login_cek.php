<?php
//mengatifkan session php 
session_start();

//menghubungkan dengan koneksi
include 'koneksi.php';

//menangkap data yang dikirim dari form
$username = $_GET['username'];
$password = md5($_GET['password']);
//fungsi md5 di atas untuk enkripsi kedalam bentuk md5

//menyelesaikan data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "select * from admin where username='$username' and password='$password'");

//menghitung jumlah data yang di temukan 
//fungsi mysqli_num_rows() digunakan untuk mengetahui berapa banyak jumlah baris hasil pemanggilan fungsi 
//mysqli query(). fungsi ini membutuhkan 1 buah argumen, yakni variasi resources hasil dari fungsi mysqli_query().
//fungsi mysqli_fetch_array().fungsi ini digunakan untuk mengubah baris data yang dipilih menjadi pecahan array
$cek = mysqli_num_rows($data);

//cek jika username dan password yang di input di temukan,buat session dan alihkan halaman ke halaman admin(folder admin)
//jika tidak,alihkan kembali ke halaman depan sambil mengirim pesan gagal
if($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:admin/index.php");
}else{

    header("location:index.php?pesan=gagal");
}

