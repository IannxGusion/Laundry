<?php include 'header.php'; ?>
<div class="container"> <br/> <br/> <br/>
<div class="col-md-5 col-md-offset-3">

    <?php
    if (isset($_GET['pesan'])){
        if($_GET['pesan'] == "oke") {
            echo "<div class='alert alert-success'>password telah diganti!</div>";
                }
            }
            ?>

            <div class="panel">
                <div class="panel-heading">
                    <h4>ganti password<h4>

                </div>
                <div class="panel-body">
                    <form method="post" action="ganti_password_aksi.php">
                        <div class="form-group">
                            <label>masukan password baru</label>
                            <input type="text" class="form-control" name="password_baru" placeholder="masukkan password baru anda .">
                    </div>
                    <br/>
                    <input type="submit" class="btn btn-primary" value="ganti password">
                </form>
            </div>
        </div>
    </div>
</div>
<? include 'footer.php'; ?>
