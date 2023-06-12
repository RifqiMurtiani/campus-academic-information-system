<?php
include('../koneksi.php');
session_start();
if (isset($_SESSION['msg'])) {
    $showmsg = $_SESSION['msg'];
    $_SESSION['msg'] = null;
}
session_write_close();
if (isset($showmsg)) {
    echo "<script>alert('{$showmsg}');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<style>
    body {
        background: #eee;
    }
</style>

<body>
    <?php include('includes/navbar.php'); ?>
    <!-- Upload  -->
    <form id="file-upload-form" class="uploader" action="controller/up_pengumuman.php" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-center ">
            <div class="col-3 mb-3 mt-5">
                <label for="formFileDisabled" class="form-label">Upload file pengumuman</label>
                <input name="nama_file" class="form-control" type="file" id="formFileDisabled">
            </div>
        </div>
        <div class="d-flex justify-content-center ">
            <button type="submit" name="proses" class="btn btn-primary">Upload File</button>
        </div>
    </form>
    <div class="container mt-3 col-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">File</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php
                $no = 1;
                $dok = mysqli_query($conn, "SELECT * FROM dokumen");
                while ($data = mysqli_fetch_array($dok)) :
                ?>
                
                    <tr>
                        <td data-title="No"><?= $no++ ?></td>
                        <td data-title="NIM"><?= $data['file'] ?></td>
                        <td data-title="aksi">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['id_dokumen'] ?>">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="hapus<?= $data['id_dokumen'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">PERINGATAN !</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Yakin ingin menghapus data <?= $data['file'] ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                    <a href="controller\up_pengumuman.php?hapus=<?= $data['id_dokumen']; ?>" class="btn btn-danger mb-2">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>