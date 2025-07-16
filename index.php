<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <script src="asset/js/bootstrap.bundle.min.js"></script>
    <title>From login</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-5">
                 <div class="card">
                    <div class="card-header mb-0">
                        <h5 class="text-center">Sistem Informasi Laundry <br/> SMKN 7 Baleendah</h5>
                    </div>
                    <div class="card-body">

                     <?php
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "gagal"){
                            echo "<div class='alert alert-danger'>Login gagal! username dan Password salah!</div>";
                        }else if($_GET['pesan'] == "logout"){
                            echo "<div class='alert alert-info'>Anda telah berhasil logout</div>";
                        }else if($_GET['pesan'] =="belum login"){
                            echo "<div class= 'alert alert-danger'>Anda harus login untuk mengakses halaman admin</div>";
                        }
                    }
                    ?>
                    <form action="login_cek.php" method="get">
                        <div class="mb-3">
                            <label for="username" class="form label">username</label>
                            <input type="username" class="form-control" id="username" aria_describedby="emailHelp" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="exampleinputpassword1" class="form-label">password</label>
                            <input type="password" class="form-control" id ="exampleinputpasssword1" name="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">remember me</label>
                        </div>
                            <input type="submit" class="btn btn-primary" value="log in">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
