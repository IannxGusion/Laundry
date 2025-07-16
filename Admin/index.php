<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "login") {
    header("Location: ../index.php?pesan=belum login");
    exit;
}

include 'header.php';
include '../koneksi.php';
?>

<div class="container py-4">
    <div class="alert alert-info text-center shadow-sm">
        <h4 class="mb-0"><strong>Selamat datang</strong> di Sistem Informasi Laundry <br>SMKN 7 Baleendah.</h4>
    </div>

    <div class="row text-center g-4 mt-4">
        <!-- Kartu statistik -->
        <?php
        $pelanggan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pelanggan"));
        $proses = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE transaksi_status='0'"));
        $siap_ambil = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE transaksi_status='1'"));
        $selesai = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE transaksi_status='2'"));
        ?>

        <div class="col-md-3">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h1><i class="bi bi-people"></i></h1>
                    <h5 class="card-title">Jumlah Pelanggan</h5>
                    <h3 class="text-primary"><?= $pelanggan ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-warning shadow-sm">
                <div class="card-body">
                    <h1><i class="bi bi-arrow-repeat"></i></h1>
                    <h5 class="card-title">Cucian Diproses</h5>
                    <h3 class="text-warning"><?= $proses ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-info shadow-sm">
                <div class="card-body">
                    <h1><i class="bi bi-info-circle"></i></h1>
                    <h5 class="card-title">Siap Ambil</h5>
                    <h3 class="text-info"><?= $siap_ambil ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h1><i class="bi bi-check-circle"></i></h1>
                    <h5 class="card-title">Selesai</h5>
                    <h3 class="text-success"><?= $selesai ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Riwayat Transaksi -->
    <div class="card shadow mt-5">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Riwayat Transaksi Terakhir</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Berat (kg)</th>
                        <th>Tgl. Selesai</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM pelanggan, transaksi WHERE transaksi_pelanggan=pelanggan_id ORDER BY transaksi_id DESC LIMIT 7");
                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td>INVOICE-<?= $d['transaksi_id'] ?></td>
                            <td><?= $d['transaksi_tgl'] ?></td>
                            <td><?= $d['pelanggan_nama'] ?></td>
                            <td class="text-center"><?= $d['transaksi_berat'] ?></td>
                            <td><?= $d['transaksi_tgl_selesai'] ?></td>
                            <td>Rp <?= number_format($d['transaksi_harga'], 0, ',', '.') ?> ,-</td>
                            <td class="text-center">
                                <?php
                                $status = $d['transaksi_status'];
                                if ($status == "0") {
                                    echo "<span class='badge bg-warning text-dark'>PROSES</span>";
                                } elseif ($status == "1") {
                                    echo "<span class='badge bg-info text-dark'>DICUCI</span>";
                                } elseif ($status == "2") {
                                    echo "<span class='badge bg-success'>SELESAI</span>";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
