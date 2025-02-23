<?php
    require "koneksi.php";
    $queryProduk= mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-white text-center">
            <h1><b>Gundol's Store</b></h1>
            <h3>Mau cari apa?</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                <div class="input-group input-group-lg my-4">
                    <input type="text" class="form-control" placeholder="Nama Barang" 
                    aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                    <button type="submit" class="btn warna2 text-white">Telusuri</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- highlighted kategori -->
    <div class="container-fluid py-5">
    <div class="container text-center">
        <h3><b>Kategori Terlaris</b></h3>
        <div class="row mt-5">
            <div class="col-md-4 mb-3">
                <div class="highlighted-kategori highlight-kategori1 d-flex justify-content-center align-items-center">
                    <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Sembako">Sembako</a></h4>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="highlighted-kategori highlight-kategori2 d-flex justify-content-center align-items-center">
                    <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Spare Part dan Aksesoris Kendaraan">Spare part dan <br> Aksesoris Kendaraan</a></h4>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="highlighted-kategori highlight-kategori3 d-flex justify-content-center align-items-center">
                    <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Produk Kebersihan">Produk kebersihan</a></h4>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- tentang kami -->
     <div class="container-fluid warna3 py-5">
        <div class="container text-center">
                <h3><b>Tentang Kami</b></h3>
                <p class="fs-5 mt-3">
                    Selamat datang di <strong>Gundol's Store</strong>, tempat di mana Anda dapat menemukan produk berkualitas terbaik yang memenuhi kebutuhan Anda. 
                    Kami berkomitmen untuk memberikan pengalaman belanja yang mudah, aman, dan memuaskan bagi pelanggan kami. Berdiri sejak 2016, kami telah melayani
                    ribuan pelanggan dengan menyediakan produk yang terjangkau  tanpa mengorbankan kualitas. Dengan tim yang berdedikasi, kami selalu berusaha untuk 
                    menjadi toko pilihan Anda. Terima kasih telah mempercayai kami. 
                </p>
        </div>
     </div>


     <!-- produk -->
      <div class="container-fluid py-5">
        <div class="container text-center">
            <h3><b>Produk</b></h3>

            <div class="row mt-5">
                <?php while ($data = mysqli_fetch_array($queryProduk)){ ?>
                <div class="col-sm-6 col-md-4 mb-3">
                <div class="card h-100">
                    <div class="img-box">
                    <img src="image/<?php echo $data['foto'];?>" class="card-img-top" alt="...">
                    </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                            <p class="card-text text-truncate"><?php echo $data['detail'];?></p>
                            <p class="card-text text-harga">Rp <?php echo $data['harga'];?></p>
                            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn warna2
                             text-white">Lihat Detail</a>
                        </div>
                    </div>
                </div>
               <?php } ?>     
            </div>
            <a class="btn btn-outline-warning mt-3 p-3" href="produk.php">See More</a>
        </div>
      </div>

      <!-- footer -->
       <?php require "footer.php"; ?>

       
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>