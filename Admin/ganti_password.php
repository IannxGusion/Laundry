<?php include 'header.php'; ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6">
        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "oke") : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                ✅ Password berhasil diperbarui!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="mb-0">🔒 Ganti Password</h5>
            </div>
            <div class="card-body">
                <form method="post" action="ganti_password_aksi.php">
                    <div class="mb-3">
                        <label for="password_baru" class="form-label">Masukkan Password Baru</label>
                        <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Password baru..." required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
