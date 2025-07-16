<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

<style>
    .card {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border: none;
        border-radius: 10px;
    }
    .card-header {
        background-color: #007bff;
        color: white;
        border-radius: 10px 10px 0 0;
    }
    .table-striped>tbody>tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }
</style>

<div class="container my-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-plus-circle-fill me-2"></i> Transaksi Laundry Baru</h4>
            <a href="transaksi.php" class="btn btn-sm btn-light text-dark"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <form method="post" action="transaksi_aksi.php">
                <div class="mb-3">
                    <label class="form-label">Pelanggan</label>
                    <select class="form-select" name="pelanggan" required>
                        <option value="">- Pilih Pelanggan -</option>
                        <?php
                        $data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                        while ($d = mysqli_fetch_array($data)) {
                            echo "<option value='{$d['pelanggan_id']}'>{$d['pelanggan_nama']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Berat (kg)</label>
                        <input type="number" name="berat" class="form-control" placeholder="Masukkan berat cucian ..." required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="date" name="tgl_selesai" class="form-control" required>
                    </div>
                </div>

                <h5 class="mt-4"><i class="bi bi-basket-fill me-2"></i> Detail Jenis Pakaian</h5>
                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-light">
                        <tr>
                            <th>Jenis Pakaian</th>
                            <th width="25%">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < 10; $i++) { ?>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" placeholder="Contoh: Kaos, Celana..."></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" min="0"></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle-fill me-1"></i> Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
