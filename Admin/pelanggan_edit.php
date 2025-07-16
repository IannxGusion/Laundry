<?php include 'header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

<style>
    body {
        background-color: #f4f6f9;
        font-family: 'Poppins', sans-serif;
    }
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }
    .card-header {
        background: linear-gradient(to right, #007bff, #0056b3);
        color: white;
        border-radius: 12px 12px 0 0;
        padding: 20px;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <i class="bi bi-person-lines-fill me-2 fs-4"></i>
                    <h5 class="mb-0">Edit Data Pelanggan</h5>
                </div>
                <div class="card-body">
                    <?php
                    include '../koneksi.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE pelanggan_id='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <form method="POST" action="pelanggan_update.php">
                        <input type="hidden" name="id" value="<?php echo $d['pelanggan_id']; ?>">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $d['pelanggan_nama']; ?>" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="mb-3">
                            <label for="hp" class="form-label">No. HP</label>
                            <input type="tel" class="form-control" id="hp" name="hp" value="<?php echo $d['pelanggan_hp']; ?>" placeholder="08xxxxxxxxxx" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $d['pelanggan_alamat']; ?></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="pelanggan.php" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save2-fill"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
