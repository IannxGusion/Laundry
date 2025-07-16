<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7ie1r6roL+E+5U5qC+5qls5Yo5sE5B5ie6G" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlC1kV1l/3eRI7iNU6S5cD5G1h7+ozrGu5+6A5gG+F6LB6R9G5p5M7l9c5e" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f0f0f0;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar-nav .nav-link:hover {
            background: #495057;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: #fff;
            border-bottom: none;
        }

        .card-body {
            padding: 20px;
        }

        .alert-info {
            background-color: #e3f2fd;
            border: none;
            color: #0d6efd;
        }

        .navbar-text h5 {
            margin: 0;
        }
    </style>
</head>

<body>
    <!-- cek apakah sudah login -->
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">LAUNDRY SMKN7BE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house-door"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pelanggan.php"><i class="bi bi-people"></i> Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transaksi.php"><i class="bi bi-cash-stack"></i> Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="laporan.php"><i class="bi bi-file-earmark-text"></i> Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="harga.php"><i class="bi bi-tag"></i> Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ganti_password.php"><i class="bi bi-key"></i> Ganti password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <h5>Halo, <?php echo $_SESSION['username'] ?></h5>
                </span>
            </div>
        </div>
    </nav>
    <!-- Akhir menu navigasi -->