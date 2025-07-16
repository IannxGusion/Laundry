<?php
//mengatifkan session
session_start();

//menghapus semua session yang ada
session_destroy();

// mrngalihkan halaman kembali ke halaman login sambil mengirimkanpesan pesan logout url
header("location:../index.php?pesan=logout");
?>