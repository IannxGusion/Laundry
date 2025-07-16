<?php
// Connect to the database
include '../koneksi.php';

// Capture data sent from form
$id = $_POST['id'];
$pelanggan = $_POST['pelanggan'];
$berat = $_POST['berat'];
$tgl_selesai = $_POST['tgl_selesai'];
$status = $_POST['status'];

// Fetch the price per kilo from the database
$query = "SELECT harga_per_kilo FROM harga";
$result = mysqli_query($koneksi, $query);
$harga_per_kilo = mysqli_fetch_assoc($result)['harga_per_kilo'];

// Calculate the laundry price
$harga = $berat * $harga_per_kilo;

// Update transaction data
$update_query = "UPDATE transaksi SET 
    transaksi_pelanggan = ?, 
    transaksi_harga = ?, 
    transaksi_berat = ?, 
    transaksi_tgl_selesai = ?, 
    transaksi_status = ? 
    WHERE transaksi_id = ?";
$stmt = mysqli_prepare($koneksi, $update_query);
mysqli_stmt_bind_param($stmt, 'sdissi', $pelanggan, $harga, $berat, $tgl_selesai, $status, $id);
mysqli_stmt_execute($stmt);

// Handle form input arrays (clothing types and quantities)
$jenis_pakaian = $_POST['jenis_pakaian'];
$jumlah_pakaian = $_POST['jumlah_pakaian'];

// Delete all clothing items in this transaction
$delete_query = "DELETE FROM pakaian WHERE pakaian_transaksi = ?";
$stmt = mysqli_prepare($koneksi, $delete_query);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);

// Re-insert clothing items based on transaction id
$insert_query = "INSERT INTO pakaian (pakaian_transaksi, pakaian_jenis, pakaian_jumlah) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($koneksi, $insert_query);

for ($x = 0; $x < count($jenis_pakaian); $x++) {
    if (!empty($jenis_pakaian[$x])) {
        mysqli_stmt_bind_param($stmt, 'isi', $id, $jenis_pakaian[$x], $jumlah_pakaian[$x]);
        mysqli_stmt_execute($stmt);
    }
}

// Redirect to transaction page
header("Location: transaksi.php");

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>
