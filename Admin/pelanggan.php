<?php include 'header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">

<style>
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background: #007bff;
        color: white;
        border-bottom: none;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .table {
        margin-bottom: 0;
    }
</style>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Data Pelanggan</h4>
        </div>
        <div class="card-body">
            <a href="pelanggan_tambah.php" class="btn btn-sm btn-info mb-3 float-end"><i class="bi bi-plus-lg"></i> Tambah</a>

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama</th>
                        <th>Hp</th>
                        <th>Alamat</th>
                        <th width="15%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //koneksi database
                    include '../koneksi.php';

                    //mengambil data pelanggan dari database
                    $data = mysqli_query($koneksi, "select * from pelanggan");
                    $no = 1;
                    //mengubah data array dan menampilkannya dengan perulangan while
                    while ($d = mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['pelanggan_nama']; ?></td>
                            <td><?php echo $d['pelanggan_hp']; ?></td>
                            <td><?php echo $d['pelanggan_alamat']; ?></td>
                            <td>
                                <a href="pelanggan_edit.php?id=<?php echo $d['pelanggan_id']; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                                <a href="pelanggan_hapus.php?id=<?php echo $d['pelanggan_id']; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
