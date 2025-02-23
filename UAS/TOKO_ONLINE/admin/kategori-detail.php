<?php
    require "session.php";
    require "../koneksi.php";

    $id = $_GET['p'];

    $query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
    $data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
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

    .card {
        border: none;
        border-radius: 15px;
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
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../admin" class="no-decoration text-muted">
                        <i class="fas fa-home"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="kategori.php" class="no-decoration text-muted">Kategori</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Detail Kategori
                </li>
            </ol>
        </nav>

        <div class="card mb-4">
            <div class="card-header">
                <h3>Detail Kategori</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" name="kategori" id="kategori" class="form-control" value="<?php echo $data['nama']; ?>" required>
                    </div>

                    <div class="mt-5 d-flex justify-content-between">
                        <button type="submit" class="btn btn-custom" name="editBtn">Edit</button>
                        <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
                    </div>
                </form>

                <?php
                    if(isset($_POST['editBtn'])){
                        $kategori = htmlspecialchars($_POST['kategori']);

                        if($data['nama'] == $kategori){
                            ?>
                            <meta http-equiv="refresh" content="0; url=kategori.php"/>
                            <?php
                        } else {
                            $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$kategori'");
                            $jumlahData = mysqli_num_rows($query);

                            if($jumlahData > 0){
                                ?>
                                <div class="alert alert-warning mt-3 alert-custom" role="alert">
                                    Kategori sudah ada!
                                </div>
                                <?php
                            } else {
                                $querySimpan = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id'");
                                if($querySimpan){
                                    ?>
                                    <div class="alert alert-primary mt-3 alert-custom" role="alert">
                                        Kategori Berhasil Terupdate!
                                    </div>

                                    <meta http-equiv="refresh" content="2; url=kategori.php"/>
                                    <?php
                                } else {
                                    echo mysqli_error($con);
                                }
                            }
                        }
                    }

                    if(isset($_POST['deleteBtn'])){
                        $queryCheck = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$id'");
                        $dataCount = mysqli_num_rows($queryCheck);

                        if($dataCount > 0){
                            ?>
                            <div class="alert alert-warning mt-3 alert-custom" role="alert">
                                Kategori tidak bisa di hapus karena sudah digunakan di produk
                            </div>
                            <?php
                            die();
                        }

                        $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");

                        if($queryDelete){
                            ?>
                            <div class="alert alert-primary mt-3 alert-custom" role="alert">
                                Kategori Berhasil Dihapus!
                            </div>

                            <meta http-equiv="refresh" content="2; url=kategori.php"/>
                            <?php
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
