<?php include 'header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Pelanggan</h4>
                </div>
                <div class="card-body">

                    <?php
                    // Menghubungkan koneksi
                    include '../koneksi.php';

                    // Menangkap id yang dikirim melalui url
                    $id = $_GET['id'];

                    // Mengambil data pelanggan yang ber id di atas dari tabel pelanggan
                    $data = mysqli_query($koneksi, "select * from pelanggan where pelanggan_id='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>

                    <form method="post" action="pelanggan_update.php">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <!-- form id pelanggan yang di edit, untuk di kirim ke file aksi -->
                            <input type="hidden" name="id" value="<?php echo $d['pelanggan_id']; ?>">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" value="<?php echo $d['pelanggan_nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="hp" class="form-label">HP</label>
                            <input type="number" class="form-control" id="hp" name="hp" placeholder="Masukan no.hp" value="<?php echo $d['pelanggan_hp']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat" value="<?php echo $d['pelanggan_alamat']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
