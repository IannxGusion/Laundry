<?php include 'header.php'; ?>
<style>
    body {
        background-color: #f4f6f9;
        font-family: 'Poppins', sans-serif;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">🧍 Tambah Pelanggan</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="pelanggan_aksi.php">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama pelanggan..." required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="hp" class="form-label">Nomor HP</label>
                            <input type="number" class="form-control" name="hp" id="hp" placeholder="Masukkan nomor HP..." required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat pelanggan..." required autocomplete="off">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="pelanggan.php" class="btn btn-secondary">← Kembali</a>
                            <button type="submit" class="btn btn-primary">💾 Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
