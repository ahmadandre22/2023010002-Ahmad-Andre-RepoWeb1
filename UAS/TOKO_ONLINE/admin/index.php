<?php 
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori" );
    $jumlahKategori = mysqli_num_rows($queryKategori);

    $queryProduk = mysqli_query($con, "SELECT * FROM produk" );
    $jumlahProduk = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .summary-box {
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .summary-kategori {
            background-color: #2d3e50;
            color: white;
        }

        .summary-produk {
            background-color: #34495e;
            color: white;
        }

        .summary-box i {
            opacity: 0.8;
        }

        .summary-box h3 {
            font-size: 1.75rem;
            font-weight: bold;
        }

        .summary-box p {
            font-size: 1.1rem;
        }

        .no-decoration {
            text-decoration: none;
            color: #1abc9c;
        }

        .no-decoration:hover {
            text-decoration: underline;
        }

        .breadcrumb {
            background-color: transparent;
        }

        .breadcrumb-item.active {
            color: #34495e;
        }

        h2 {
            font-size: 2rem;
            color: #2c3e50;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <?php require "navbar.php" ?>

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home"></i> Home
                </li>
            </ol>
        </nav>

        <h2>Halo <?php echo $_SESSION['username']; ?>, selamat datang di Dashboard!</h2>

        <div class="row mt-5">
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="summary-box summary-kategori p-4">
                    <div class="row">
                        <div class="col-6">
                            <i class="fas fa-align-justify fa-4x text-white"></i> <!-- Menggunakan fa-4x -->
                        </div>
                        <div class="col-6">
                            <h3>Kategori</h3>
                            <p><?php echo $jumlahKategori; ?> Kategori</p>
                            <p><a href="kategori.php" class="no-decoration">Lihat Detail</a></p>
                        </div>
                    </div>  
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="summary-box summary-produk p-4">
                    <div class="row">
                        <div class="col-6">
                            <i class="fas fa-box fa-4x text-white"></i> <!-- Menggunakan fa-4x -->
                        </div>
                        <div class="col-6">
                            <h3>Produk</h3>
                            <p><?php echo $jumlahProduk; ?> Produk</p>
                            <p><a href="produk.php" class="no-decoration">Lihat Detail</a></p>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script> 
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
