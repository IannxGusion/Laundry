<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
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
    if ($_SESSION['status'] != "login") {
        header("location:../index.php?pesan=belum_login");
    }
    ?>

    <?php
    // koneksi database
    include '../koneksi.php';
    ?>
    <div class="container">

        <div class="col-md-8 col-md-offset-3">
            <?php
            // mengambil data pelanggan yang ber id di atas dari tabel pelanggan
            $id = $_GET['id'];
            $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi, pelanggan WHERE transaksi_id='$id' AND transaksi_pelanggan=pelanggan_id");
            while ($t = mysqli_fetch_array($transaksi)) {
                ?>
                <center><h2>LAUNDRY SMKN7 Baleendah</h2></center>
                <h3></h3>

                <a href="transaksi_invoice.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-print"></i> CETAK</a>

                <br>
                <br>

                <table class="table">
                    <tr>
                        <th width="20%">No. Invoice</th>
                        <th>:</th>
                        <td>INVOICE-<?php echo $t['transaksi_id']; ?></td>
                    </tr>
                    <tr>
                        <th width="20%">Tgl laundry</th>
                        <th>:</th>
                        <td><?php echo $t['transaksi_tgl']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama pelanggan</th>
                        <th>:</th>
                        <td><?php echo $t['pelanggan_nama']; ?></td>
                    </tr>
                    <tr>
                        <th>HP</th>
                        <th>:</th>
                        <td><?php echo $t['pelanggan_hp']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <td><?php echo $t['pelanggan_alamat']; ?></td>
                    </tr>
                    <tr>
                        <th>Berat cucian (kg)</th>
                        <th>:</th>
                        <td><?php echo $t['transaksi_berat']; ?></td>
                    </tr>
                    <tr>
                        <th>tgl. selesai</th>
                        <th>:</th>
                        <td><?php echo $t['transaksi_tgl_selesai']; ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <th>:</th>
                        <td>
                            <?php
                            if ($t['transaksi_status'] == "0") {
                                echo "<div class='label label-warning'>PROSES</div>";
                            } else if ($t['transaksi_status'] == "1") {
                                echo "<div class='label label-info'>DI CUCI</div>";
                            } else if ($t['transaksi_status'] == "2") {
                                echo "<div class='label label-success'>SELESAI</div>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <th>:</th>
                        <td><?php echo "Rp. " . number_format($t['transaksi_harga']) . " ,-"; ?></td>
                    </tr>
                </table>

                <br>

                <h4 class="text-center">Daftar cucian</h4>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>jenis pakaian</th>
                        <th width="20%">jumlah</th>
                    </tr>

                    <?php
                    // menyimpan data transaksi ke variabel id_transaksi
                    $id_transaksi = $t['transaksi_id'];

                    // menampilkan pakaian-pakaian dari transaksi yang ber id di atas
                    $pakaian = mysqli_query($koneksi, "SELECT * FROM pakaian WHERE pakaian_transaksi='$id_transaksi'");
                    while ($p = mysqli_fetch_array($pakaian)) {
                        ?>
                        <tr>
                            <td><?php echo $p['pakaian_jenis']; ?></td>
                            <td width="5%"><?php echo $p['pakaian_jumlah']; ?></td>
                        </tr>
                        <?php 
                    } 
                    ?>
                </table>

                <br>
                <p><center><i>"Terima kasih telah mempercayakan cucian anda pada kami".</i></center></p>

                <?php
            }
            ?>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
