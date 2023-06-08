<?php
include "../koneksi.php";

session_start();
if(isset($_SESSION['msg'])){
    $showmsg = $_SESSION['msg'];
    $_SESSION['msg'] = null;
}
session_write_close();
if(isset($showmsg)){
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
    <style>
        body{
            background:#eee;  
        }
    </style>
</head>
<body>
    <?php include('includes\navbar.php');?>
<main>
    <div class="container mt-3">
        <?php echo $_SERVER['REQUEST_URI'];?>
        <div class="d-flex justify-content-md-end">
            <a href="create_mhs.php" class="btn btn-primary mb-3 ">Tambah Siswa</a>
        </div>
        <div class="card shadow ">
                <div class="card-body">
                  <h4 class="card-title">Data Mahasiswa</h4>
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Nama Orang Tua</th>
                    <th>Aksi</th>
                  </tr>
            </thead>
            <tbody>
            <?php
                $no = 1;
                $mhs = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id_mahasiswa ASC");
                while ($data = mysqli_fetch_array($mhs)) :
                ?>
                <tr>
                    <td data-title="No"><?= $no++ ?></td>
                    <td data-title="NIM"><?= $data['nim'] ?></td>
                    <td data-title="Nama"><?= $data['nama_mahasiswa'] ?></td>
                    <td data-title="Tanggal Lahir"><?= $data['tanggal_lahir'] ?></td>
                    <td data-title="Alamat"><?= $data['alamat'] ?></td>
                    <td data-title="Nama Orang Tua"><?= $data['nama_orang_tua'] ?></td>
                    
                    <td data-title="aksi">
                        <a href="edit_mhs.php?id=<?= $data['id_mahasiswa']; ?>" class="btn btn-success text-white mb-2">Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['id_mahasiswa'] ?>">
                        Hapus
                        </button>
                    </td>
                </tr>
                

                <!-- Modal -->
                <div class="modal fade" id="hapus<?= $data['id_mahasiswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">PERINGATAN !</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Yakin ingin menghapus data <?= $data['nama_mahasiswa'] ?>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <a href="controller\aksi_mhs.php?hapus=<?= $data['id_mahasiswa']; ?>" class="btn btn-danger mb-2">Hapus</a>
                    </div>
                    </div>
                </div>
                </div>
                
                <?php endwhile; ?>
            </tbody>
        </table>
                </div>
        </div>
    </div>
</main>
</body>
</html>