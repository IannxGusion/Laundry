<?php include 'header.php'; ?>
<style>
.panjang-input{
    width: 400px;
}

.rawr{
    margin-left: 650px;
}
</style>

<div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-5">
                 <div class="card">
                    <div class="card-header mb-0">
                        <h5 class="text-center">Tambah pelanggan</h5>
                    </div>
                    <div class="card-body">
                    <form method="post" action="pelanggan_aksi.php">
                    <div class="form-group">
                        <label for="nama">Nama</labek>
                        <input type="text" class="form-control" name="nama" id="nama"placeholder="masukan nama .." required="required" autocomplete="off"> 
                    </div>

                    <div class="form-group">
                        <label>HP</label>
                        <input type="number" class="form-control" name="hp" placeholder="masukan no.hp .." required="required" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="masukan alamat .." required="required" autocomplete="off">
                    </div>
                    <br/>
                    <input type="submit" class="btn btn-primary" value="simpan" id="nama">
                    <a href="pelanggan.php" class="btn btn-primary">kembali</a>
                </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php include 'footer.php';  ?>