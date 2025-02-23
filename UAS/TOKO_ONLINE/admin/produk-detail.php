<?php
require "session.php";
require "../koneksi.php";

$id = $_GET['p'];

$query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
$data = mysqli_fetch_array($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");

function generateRandomString($length = 10) {
    $characters = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
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
                    <a href="produk.php" class="no-decoration text-muted">Produk</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Detail Produk
                </li>
            </ol>
        </nav>

        <div class="card mb-4">
            <div class="card-header">
                <h3>Detail Produk</h3>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['nama_kategori']; ?></option>
                            <?php while ($dataKategori = mysqli_fetch_array($queryKategori)) { ?>
                                <option value="<?php echo $dataKategori['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" value="<?php echo $data['harga']; ?>" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="currentFoto" class="form-label">Foto Produk Sekarang</label>
                        <img src="../image/<?php echo $data['foto']; ?>" alt="Foto Produk" class="img-thumbnail" width="200">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Baru</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">Detail</label>
                        <textarea name="detail" id="detail" cols="30" rows="5" class="form-control"><?php echo $data['detail']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="ketersediaan_stok" class="form-label">Ketersediaan Stok</label>
                        <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                            <option value="<?php echo $data['ketersediaan_stok']; ?>"><?php echo ucfirst($data['ketersediaan_stok']); ?></option>
                            <?php if ($data['ketersediaan_stok'] == 'tersedia') { ?>
                                <option value="habis">Habis</option>
                            <?php } else { ?>
                                <option value="tersedia">Tersedia</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mt-5 d-flex justify-content-between">
                        <button type="submit" class="btn btn-custom" name="simpan">Simpan</button>
                        <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                    </div>
                </form>

                <?php
                if (isset($_POST['simpan'])) {
                    $nama = htmlspecialchars($_POST['nama']);
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $harga = htmlspecialchars($_POST['harga']);
                    $detail = htmlspecialchars($_POST['detail']);
                    $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                    $target_dir = "../image/";
                    $nama_file = basename($_FILES['foto']['name']);
                    $target_file = $target_dir . $nama_file;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $image_size = $_FILES['foto']['size'];
                    $random_name = generateRandomString(20);
                    $new_name = $random_name . '.' . $imageFileType;

                    if ($nama == '' || $kategori == '' || $harga == '') {
                        echo '<div class="alert alert-warning mt-3 alert-custom">Nama, Kategori, dan Harga wajib diisi!</div>';
                    } else {
                        $queryUpdate = mysqli_query($con, "UPDATE produk SET kategori_id='$kategori', nama='$nama', harga='$harga', detail='$detail', ketersediaan_stok='$ketersediaan_stok' WHERE id=$id");

                        if ($nama_file != '') {
                            if ($image_size > 1000000) {
                                echo '<div class="alert alert-warning mt-3 alert-custom">File tidak boleh lebih dari 1 MB!</div>';
                            } elseif (!in_array($imageFileType, ['jpg', 'png', 'gif'])) {
                                echo '<div class="alert alert-warning mt-3 alert-custom">File harus bertipe JPG, PNG, atau GIF!</div>';
                            } else {
                                move_uploaded_file($_FILES['foto']['tmp_name'], $target_dir . $new_name);
                                mysqli_query($con, "UPDATE produk SET foto='$new_name' WHERE id='$id'");
                            }
                        }

                        if ($queryUpdate) {
                            echo '<div class="alert alert-primary mt-3 alert-custom">Produk berhasil diperbarui!</div>';
                            echo '<meta http-equiv="refresh" content="2; url=produk.php">';
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                }

                if (isset($_POST['hapus'])) {
                    $queryHapus = mysqli_query($con, "DELETE FROM produk WHERE id='$id'");

                    if ($queryHapus) {
                        echo '<div class="alert alert-primary mt-3 alert-custom">Produk berhasil dihapus!</div>';
                        echo '<meta http-equiv="refresh" content="2; url=produk.php">';
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
