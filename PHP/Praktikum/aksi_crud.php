<?php

//panggil koneksi databse 
include "koneksi.php";

//Uji Jika tombol simpan di klik
if (isset($_POST['bsimpan'])) {

    // Persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi)
                                        VALUES ('$_POST[tnim]',
                                                '$_POST[tnama]',
                                                '$_POST[talamat]',
                                                '$_POST[tprodi]')");
    //Jika Simpan sukses
    if($simpan){
        echo"<script>
                alert('Simpan Data Sukses!');
                document.location='index.php';

            </script>";
    }else {
        echo "<script>
                alert('Simpan Data Gagal!');
                document.location='index.php';

            </script>";
    }
}




//Uji Jika tombol ubah di klik
if (isset($_POST['bubah'])) {

    // Persiapan Ubah data 
    $ubah = mysqli_query($koneksi, "UPDATE tmhs SET
                                                    nim = '$_POST[tnim]',
                                                    nama = '$_POST[tnama]',
                                                    alamat = '$_POST[talamat]',
                                                    prodi = '$_POST[tprodi]'
                                                WHERE id_mhs = '$_POST[id_mhs]'
                                                    ");




    //Jika Ubah sukses
    if($ubah){
        echo"<script>
                alert('Ubah Data Sukses!');
                document.location='index.php';

            </script>";
    }else {
        echo "<script>
                alert('Ubah Data Gagal!');
                document.location='index.php';

            </script>";
    }
}




//Uji Jika tombol hapus di klik
if (isset($_POST['bhapus'])) {

    // Persiapan Hapus data 
    $hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs ='$_POST[id_mhs]'");




    //Jika Hapus sukses
    if($hapus){
        echo"<script>
                alert('Hapus Data Sukses!');
                document.location='index.php';

            </script>";
    }else {
        echo "<script>
                alert('Hapus Data Gagal!');
                document.location='index.php';

            </script>";
    }
}
?>