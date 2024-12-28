<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - PHP & MySQL + Modal Bootstrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>

    <div class="container">


        <div class="mt-3">
            <h3 class ="text-center">CRUD - PHP & MySQL + Modal Bootstrap 5</h3>
            <h3 class ="text-center">Data Mahasiswa RPL A 2023 Polibang</h3>
        </div>

        <div class="card mt-3">
            <div class="card-header bg-primary text-white ">
                    Data Mahasiswa
            </div>
            <div class="card-body">

                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>

                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Nim</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Prodi</th>
                        <th>Aksi</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>2023010001</td>
                        <td>Adam Dermawan</td>
                        <td>Demak</td>
                        <td>Rekayasa Perangkat Lunak-(RPL)</td>
                        <td>
                            <a href="#" class="btn btn-warning">Ubah</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                </table>


                <!-- Awal Modal -->
                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="aksi_crud.php">
                    <div class="modal-body">
                         
                             <div class="mb-3">
                                 <label class="form-label">NIM</label>
                                 <input type="text" class="form-control"  name ="tnim" placeholder="Masukkan NIM Anda!">
                             </div>
                             <div class="mb-3">
                                 <label class="form-label">Nama Lengkap</label>
                                 <input type="text" class="form-control"  name ="tnnama" placeholder="Masukkan Nama Lengkap Anda!">
                             </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control"  name ="talamat" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Prodi</label>
                                <select class="form-select" name="tprodi" >
                                    <option></option>
                                    <option value="Rekayasa Perangkat Lunak-(RPL)">Rekayasa Perangkat Lunak-(RPL)</option>
                                    <option value="Administrasi Bisnis Internasional-(ABI)">Administrasi Bisnis Internasional-(ABI)</option>
                                    <option value="Akutansi Keuangan Publik-(AKP)">Akutansi Keuangan Publik-(AKP)</option>
                                </select>
                            </div>
 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Ubah</button>
                    </div>
                    </form>

                    </div>
                </div>
                </div>
                <!-- Akhir Modal -->
                

            </div>
        </div>


    </div>
    
    






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>