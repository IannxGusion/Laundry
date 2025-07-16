<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Laundry </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7ie1r6roL+E+5U5qC+5qls5Yo5sE5B5ie6G" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlC1kV1l/3eRI7iNU6S5cD5G1h7+ozrGu5+6A5gG+F6LB6R9G5p5M7l9c5e" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></script>

</head>
<body>
    <!-- cek apakah sudah login -->
    <?php
    session_start();
    if($_SESSION['status']!="login"){
        header("location:../index.php?pesan=belum_login");
    }
?>

<?php
//koneksi database
include '../koneksi.php';
?>
<div class="container">

<center><h2>LAUNDRY SMKN 7 BALEENDAH</h2></center>
<br>
<br>
<?php
if(isset($_GET['dari']) && isset($_GET['sampai'])){

    $dari = $_GET['dari'];
    $sampai = $_GET['sampai'];
    ?>
    <h4>Data laporan laundry dari <b><?php echo $dari; ?>/<b> sampai<b><?php echo $sampai; ?></b></h4>
    <table class="table table-bordered table-striped">
        <tr>
            <th width="1%">No</th>
            <th>Invoice</th>
            <th>tanggal</th>
            <th>Pelanggan</th>
            <th>Berat (kg)</th>
            <th>Tgl. Selesai</th>
            <th>harga</th>
            <th>Status</th>
        </tr>
        
        <?php
        //mengambil data pelanggan dari fatabase
        $data = mysqli_query($koneksi,"select * from pelanggan,transaksi where transaksi_pelanggan=pelanggan_id and date(transaksi_tgl) >
        '$dari' and date(transaksi_tgl) < '$sampai' order by transaksi_id desc");
        $no = 1;
        //mengubah data ke array dan menampilkan dengan perulangan while
        while($d=mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
                <td><?php echo $d['transaksi_tgl']; ?></td>
                <td><?php echo $d['pelanggan_nama']; ?></td>
                <td><?php echo $d['transaksi_berat']; ?></td>
                <td><?php echo $d['transaksi_tgl_selesai']; ?></td>
                <td><?php echo "Rp. " .number_format($d['transaksi_harga']) ." ,-"; ?></td>
                <td>
                    <?php
                    if($d['transaksi_status']=="0"){
                        echo "<div class='label label=warning'>PROSES</div>";
                    }else if($d['transaksi_status']=="1"){
                        echo "<div class='label label-info'>DICUCI</div>";
                    }else if($d['transaksi_status']=="2"){
                        echo "<div class='label label-success'>SELESAI</div>";
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php } ?>

</div>

<script type="text/javascript">
    window.print();
</script>