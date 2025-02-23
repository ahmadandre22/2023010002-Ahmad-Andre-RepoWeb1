<?php 
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .no-decoration{
        text-decoration: none;
    }

    .breadcrumb {
        background-color: transparent;
    }

    .breadcrumb-item.active {
        color: #34495e;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #2d3e50;
        color: white;
        font-weight: bold;
    }

    .card-body {
        background-color: #f9f9f9;
    }

    .btn-custom {
        background-color: #16a085;
        color: white;
        border-radius: 5px;
    }

    .btn-custom:hover {
        background-color: #1abc9c;
        color: white;
    }

    .alert-custom {
        border-radius: 10px;
    }
</style>

<body>
    <?php require "navbar.php" ?>

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../admin" class="no-decoration text-muted">
                        <i class="fas fa-home"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Kategori
                </li>
            </ol>
        </nav>

        <div class="card mb-4">
            <div class="card-header">
                <h3>Tambah Kategori</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" id="kategori" name="kategori" placeholder="Input nama kategori" class="form-control" autocomplete="off">
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-custom" type="submit" name="simpan_kategori">Simpan</button>
                    </div>
                </form>

                <?php
                    if(isset($_POST['simpan_kategori'])){
                        $kategori = htmlspecialchars($_POST['kategori']);

                        $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama ='$kategori'");
                        $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

                        if($jumlahDataKategoriBaru > 0){
                            echo '<div class="alert alert-warning mt-3 alert-custom" role="alert">Kategori sudah ada!</div>';
                        } else {
                            $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                            if($querySimpan){
                                echo '<div class="alert alert-primary mt-3 alert-custom" role="alert">Kategori berhasil tersimpan!</div>';
                                echo '<meta http-equiv="refresh" content="2; url=kategori.php"/>';
                            } else {
                                echo '<div class="alert alert-danger mt-3 alert-custom" role="alert">'.mysqli_error($con).'</div>';
                            }
                        }
                    }
                ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>List Kategori</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($jumlahKategori == 0){
                                    echo '<tr><td colspan="3" class="text-center">Data kategori tidak tersedia</td></tr>';
                                } else {
                                    $jumlah = 1;
                                    while($data = mysqli_fetch_array($queryKategori)){
                                        echo '<tr>
                                                <td>'.$jumlah.'</td>
                                                <td>'.$data['nama'].'</td>
                                                <td>
                                                    <a href="kategori-detail.php?p='.$data['id'].'" class="btn btn-info">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                </td>
                                              </tr>';
                                        $jumlah++;
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script> 
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
