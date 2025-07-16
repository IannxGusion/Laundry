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
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
    }
    .card-header {
        background: linear-gradient(45deg, #007bff, #0056b3);
        color: white;
        border-radius: 12px 12px 0 0;
        padding: 20px;
    }
    .btn-sm i {
        margin-right: 4px;
    }
    table th, table td {
        vertical-align: middle;
    }
</style>

<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-people-fill"></i> Data Pelanggan</h4>
            <a href="pelanggan_tambah.php" class="btn btn-sm btn-light text-primary">
                <i class="bi bi-plus-circle-fill"></i> Tambah Pelanggan
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th style="width:5%;">No</th>
                            <th>Nama</th>
                            <th>HP</th>
                            <th>Alamat</th>
                            <th style="width:20%;">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi.php';
                        $data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                        $no = 1;
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td><?php echo $d['pelanggan_nama']; ?></td>
                                <td><?php echo $d['pelanggan_hp']; ?></td>
                                <td><?php echo $d['pelanggan_alamat']; ?></td>
                                <td class="text-center">
                                    <a href="pelanggan_edit.php?id=<?php echo $d['pelanggan_id']; ?>" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="pelanggan_hapus.php?id=<?php echo $d['pelanggan_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if (mysqli_num_rows($data) === 0): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted">Tidak ada data pelanggan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
