<?php include 'header.php'; ?>
<br />
<br />
<br />
<div class="container">

<div class="col-md-5 col-md-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h4>Pengaturan Harga Laundry</h4>
        </div>
        <div class="panel-body">
            <?php
            // Menghubungkan koneksi
            include '../koneksi.php';

            // Mengambil data harga per kilo dari tabel harga
            $query = "SELECT harga_per_kilo FROM harga LIMIT 1";
            $result = mysqli_query($koneksi, $query);

            if (!$result) {
                echo "<p>Error retrieving data: " . mysqli_error($koneksi) . "</p>";
            } else {
                $data = mysqli_fetch_assoc($result);
                if ($data) {
            ?>
                    <form method="post" action="harga_update.php">
                        <div class="form-group">
                            <label>Harga per Kilo</label>
                            <input type="number" class="form-control" min="0" name="harga" value="<?php echo htmlspecialchars($data['harga_per_kilo']); ?>" required>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Ubah Harga">
                    </form>
            <?php
                } else {
                    echo "<p>Harga per kilo not found.</p>";
                }
            }
            mysqli_close($koneksi);
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
