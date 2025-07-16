<?php include 'header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

<style>
    .form-section {
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .form-section h4 {
        color: #007bff;
        font-weight: 600;
    }
    .table thead {
        background: #f1f1f1;
    }
</style>

<div class="container mt-5 mb-5">
    <div class="form-section">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4><i class="bi bi-pencil-square me-2"></i> Edit Transaksi Laundry</h4>
            <a href="transaksi.php" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>

        <?php
        include '../koneksi.php';
        $id = $_GET['id'];
        $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE transaksi_id='$id'");
        while($t = mysqli_fetch_array($transaksi)) {
        ?>
        <form method="post" action="transaksi_update.php">
            <input type="hidden" name="id" value="<?= $t['transaksi_id']; ?>">

            <div class="mb-3">
                <label class="form-label">Pelanggan</label>
                <select class="form-control" name="pelanggan" required>
                    <option value="">- Pilih Pelanggan -</option>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                    while($d = mysqli_fetch_array($data)) {
                        $selected = ($d['pelanggan_id'] == $t['transaksi_pelanggan']) ? "selected" : "";
                        echo "<option value='{$d['pelanggan_id']}' $selected>{$d['pelanggan_nama']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Berat (kg)</label>
                <input type="number" class="form-control" name="berat" value="<?= $t['transaksi_berat']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" name="tgl_selesai" value="<?= $t['transaksi_tgl_selesai']; ?>" required>
            </div>

            <h5 class="mt-4 mb-3"><i class="bi bi-basket"></i> Daftar Pakaian</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Jenis Pakaian</th>
                        <th width="20%">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id_transaksi = $t['transaksi_id'];
                    $pakaian = mysqli_query($koneksi, "SELECT * FROM pakaian WHERE pakaian_transaksi='$id_transaksi'");
                    while($p = mysqli_fetch_array($pakaian)) {
                    ?>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]" value="<?= $p['pakaian_jenis']; ?>"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]" value="<?= $p['pakaian_jumlah']; ?>"></td>
                    </tr>
                    <?php } ?>

                    <!-- Tambahan baris kosong -->
                    <?php for($i = 0; $i < 3; $i++) { ?>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="mb-4 mt-4">
                <label class="form-label">Status</label>
                <select class="form-control" name="status" required>
                    <option value="0" <?= $t['transaksi_status'] == "0" ? "selected" : "" ?>>PROSES</option>
                    <option value="1" <?= $t['transaksi_status'] == "1" ? "selected" : "" ?>>DICUCI</option>
                    <option value="2" <?= $t['transaksi_status'] == "2" ? "selected" : "" ?>>SELESAI</option>
                </select>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save2-fill"></i> Simpan Perubahan</button>
            </div>
        </form>
        <?php } ?>
    </div>
</div>

<?php include 'footer.php'; ?>
