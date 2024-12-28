<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .modal-header {
            border-bottom: none;
        }
        .modal-footer {
            border-top: none;
        }
        .delete-icon {
            font-size: 4rem;
            color: red;
        }
        .delete-text {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .btn-danger {
            background-color: red;
            border: none;
        }
        .btn-primary, .btn-secondary {
            border-radius: 0.5rem;
        }
        table img {
            height: 40px;
            width: 40px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">CRUD Dashboard</h1>
        
        <!-- Button to Open the Create Modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah Data
        </button>

        <!-- Create Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="icon" class="form-label">Icon/Logo</label>
                                <input type="file" class="form-control" id="icon">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Survei</label>
                                <input type="text" class="form-control" id="title" placeholder="Judul">
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">Link</label>
                                <input type="url" class="form-control" id="link" placeholder="Link">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="button" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Read Data Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Judul Survei</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="https://via.placeholder.com/40" alt="icon"></td>
                        <td>Survei Kepuasan Layanan</td>
                        <td><a href="#">https://forms.gle/example</a></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal">Edit</button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="edit-icon" class="form-label">Icon</label>
                                <input type="file" class="form-control" id="edit-icon">
                            </div>
                            <div class="mb-3">
                                <label for="edit-title" class="form-label">Judul Survei</label>
                                <input type="text" class="form-control" id="edit-title" value="Survei Kepuasan Layanan">
                            </div>
                            <div class="mb-3">
                                <label for="edit-link" class="form-label">Link</label>
                                <input type="url" class="form-control" id="edit-link" value="https://forms.gle/example">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="delete-icon">
                            <i class="bi bi-trash-fill"></i>
                        </div>
                        <p class="delete-text mt-3">Yakin data akan dihapus?</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
