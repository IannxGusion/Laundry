<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<!-- Container -->
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">📋 Data Transaksi Laundry</h4>
        <a href="transaksi_tambah.php" class="btn btn-primary btn-sm">
            ➕ Transaksi Baru
        </a>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light sticky-top">
                <tr class="text-center">
                    <th style="width: 5%;">No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Berat (kg)</th>
                    <th>Tgl. Selesai</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th style="width: 20%;">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM pelanggan, transaksi WHERE transaksi_pelanggan = pelanggan_id ORDER BY transaksi_id DESC");
                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td>INVOICE-<?= $d['transaksi_id']; ?></td>
                        <td><?= $d['transaksi_tgl']; ?></td>
                        <td><?= $d['pelanggan_nama']; ?></td>
                        <td class="text-center"><?= $d['transaksi_berat']; ?></td>
                        <td><?= $d['transaksi_tgl_selesai']; ?></td>
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
                        <td class="text-center">
                            <a href="transaksi_invoice.php?id=<?= $d['transaksi_id']; ?>" target="_blank" class="btn btn-sm btn-warning">
                                <i class="bi bi-printer"></i> Invoice
                            </a>
                            <a href="transaksi_edit.php?id=<?= $d['transaksi_id']; ?>" class="btn btn-sm btn-info text-white">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="transaksi_hapus.php?id=<?= $d['transaksi_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin membatalkan transaksi ini?')">
                                <i class="bi bi-trash"></i> Batalkan
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
