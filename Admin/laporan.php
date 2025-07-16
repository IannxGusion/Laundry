<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<div class="container py-4">
    <!-- Filter Panel -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📅 Filter Laporan Laundry</h5>
        </div>
        <div class="card-body">
            <form action="" method="get">
                <div class="row g-3 align-items-end">
                    <div class="col-md-5">
                        <label class="form-label">Dari Tanggal</label>
                        <input type="date" name="tgl_dari" class="form-control" required>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Sampai Tanggal</label>
                        <input type="date" name="tgl_sampai" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Hasil Laporan -->
    <?php if (isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])): ?>
        <?php
            $dari = $_GET['tgl_dari'];
            $sampai = $_GET['tgl_sampai'];
            $data = mysqli_query($koneksi, "SELECT * FROM pelanggan, transaksi WHERE transaksi_pelanggan = pelanggan_id AND DATE(transaksi_tgl) >= '$dari' AND DATE(transaksi_tgl) <= '$sampai' ORDER BY transaksi_id DESC");
        ?>
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">📊 Laporan Laundry: <small><?= $dari ?> s/d <?= $sampai ?></small></h5>
                <a target="_blank" href="cetak_print.php?dari=<?= $dari; ?>&sampai=<?= $sampai; ?>" class="btn btn-light btn-sm">
                    🖨️ Cetak
                </a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-light">
                        <tr>
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
                        $no = 1;
                        while ($d = mysqli_fetch_array($data)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>INVOICE-<?= $d['transaksi_id']; ?></td>
                            <td><?= $d['transaksi_tgl']; ?></td>
                            <td><?= $d['pelanggan_nama']; ?></td>
                            <td><?= $d['transaksi_berat']; ?></td>
                            <td><?= $d['transaksi_tgl_selesai']; ?></td>
                            <td><?= "Rp. " . number_format($d['transaksi_harga'], 0, ',', '.') . " ,-"; ?></td>
                            <td>
                                <?php
                                if ($d['transaksi_status'] == "0") {
                                    echo "<span class='badge bg-warning'>PROSES</span>";
                                } elseif ($d['transaksi_status'] == "1") {
                                    echo "<span class='badge bg-info text-dark'>DICUCI</span>";
                                } elseif ($d['transaksi_status'] == "2") {
                                    echo "<span class='badge bg-success'>SELESAI</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
