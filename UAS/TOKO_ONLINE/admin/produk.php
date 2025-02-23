<?php 
    require "session.php";
    require "../koneksi.php";

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");
    $jumlahProduk = mysqli_num_rows($query);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

    function generateRandomString($length = 10) {
        $characters = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++){
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
    <title>Produk</title>
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
    <?php require "navbar.php"; ?>
    
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../admin" class="no-decoration text-muted">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Produk</li>
            </ol>
        </nav>

        <!-- Form tambah produk -->
        <div class="my-5">
            <div class="card">
                <div class="card-header">
                    <h3>Tambah Produk</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <?php while($data=mysqli_fetch_array($queryKategori)): ?>
                                    <option value="<?php echo $data['id'] ?>"><?php echo $data['nama']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" required>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Produk</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="detail" class="form-label">Deskripsi Produk</label>
                            <textarea name="detail" id="detail" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="ketersediaan_stok" class="form-label">Ketersediaan Stok</label>
                            <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                                <option value="tersedia">Tersedia</option>
                                <option value="habis">Habis</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-custom" name="simpan">Simpan</button>
                        </div>
                    </form>

                    <?php
                    if(isset($_POST['simpan'])){
                        $nama = htmlspecialchars($_POST['nama']);
                        $kategori = htmlspecialchars($_POST['kategori']);
                        $harga = htmlspecialchars($_POST['harga']);
                        $detail = htmlspecialchars($_POST['detail']);
                        $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                        $target_dir = "../image/";
                        $nama_file = basename($_FILES["foto"]["name"]);
                        $target_file = $target_dir . $nama_file;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $image_size = $_FILES["foto"]["size"];
                        $random_name = generateRandomString(20);
                        $new_name = $random_name . "." . $imageFileType;

                        if($nama=='' || $kategori=='' || $harga==''){
                            echo '<div class="alert alert-warning mt-3 alert-custom" role="alert">Nama, Kategori, dan Harga wajib diisi!</div>';
                        } else {
                            if($nama_file!=''){
                                if($image_size > 1000000){
                                    echo '<div class="alert alert-warning mt-3 alert-custom" role="alert">File tidak boleh lebih dari 1 MB</div>';
                                } else {
                                    if($imageFileType !='jpg' && $imageFileType !='png' && $imageFileType !='gif'){
                                        echo '<div class="alert alert-warning mt-3 alert-custom" role="alert">File wajib bertipe jpg atau png atau gif!</div>';
                                    } else {
                                        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                                    }
                                }
                            }

                            $queryTambah = mysqli_query($con, "INSERT INTO produk (kategori_id, nama, harga, foto, detail, ketersediaan_stok) 
                            VALUES ('$kategori', '$nama', '$harga', '$new_name', '$detail', '$ketersediaan_stok')");

                            if($queryTambah){
                                echo '<div class="alert alert-primary mt-3 alert-custom" role="alert">Produk berhasil tersimpan!</div>';
                                echo '<meta http-equiv="refresh" content="2; url=produk.php"/>';
                            } else {
                                echo mysqli_error($con);
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <h2>List Produk</h2>

        <div class="table-responsive mt-5"> 
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Ketersediaan Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($jumlahProduk==0){
                        echo '<tr><td colspan=6 class="text-center">Data produk tidak tersedia</td></tr>';
                    } else {
                        $jumlah = 1;
                        while($data=mysqli_fetch_array($query)){
                            echo '<tr>';
                            echo '<td>'.$jumlah.'</td>';
                            echo '<td>'.$data['nama'].'</td>';
                            echo '<td>'.$data['nama_kategori'].'</td>';
                            echo '<td>'.$data['harga'].'</td>';
                            echo '<td>'.$data['ketersediaan_stok'].'</td>';
                            echo '<td><a href="produk-detail.php?p='.$data['id'].'" class="btn btn-info"><i class="fas fa-search"></i></a></td>';
                            echo '</tr>';
                            $jumlah++;
                        }
                    }
                    ?>
                </tbody> 
            </table>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script> 
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
