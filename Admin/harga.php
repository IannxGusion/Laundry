<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<!-- Main Container -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6">
        <div class="card shadow rounded">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="mb-0">⚙️ Pengaturan Harga Laundry</h5>
            </div>
            <div class="card-body">
                <?php
                // Mengambil data harga per kilo dari tabel harga
                $query = "SELECT harga_per_kilo FROM harga LIMIT 1";
                $result = mysqli_query($koneksi, $query);

                if (!$result) {
                    echo "<div class='alert alert-danger'>Gagal mengambil data: " . mysqli_error($koneksi) . "</div>";
                } else {
                    $data = mysqli_fetch_assoc($result);
                    if ($data) {
                ?>
                        <form method="post" action="harga_update.php">
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga per Kilo (Rp)</label>
                                <input type="number" id="harga" name="harga" class="form-control" min="0" value="<?= htmlspecialchars($data['harga_per_kilo']); ?>" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    💾 Simpan Perubahan
                                </button>
                            </div>
                        </form>
                <?php
                    } else {
                        echo "<div class='alert alert-warning'>Data harga belum tersedia.</div>";
                    }
                }
                mysqli_close($koneksi);
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
