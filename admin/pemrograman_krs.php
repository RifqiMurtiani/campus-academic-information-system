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

session_start();
$nama = $_SESSION['user'];
// $query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nama_mahasiswa = '$nama'");
// $user = mysqli_fetch_array($query);
// echo isset($user['nama_mahasiswa']) ? $user['nama_mahasiswa'] : "takdeee";
session_write_close();
// $qalert = mysqli_query($conn, "SELECT * FROM pemrograman_krs 
//                                             JOIN mahasiswa ON pemrograman_krs.id_mahasiswa = mahasiswa.id_mahasiswa
//                                             JOIN dosen ON pemrograman_krs.id_dosen = dosen.id_dosen
//                                             JOIN matakuliah ON pemrograman_krs.id_matakuliah = matakuliah.id_matakuliah
//                                             WHERE mahasiswa.id_mahasiswa = '$user[id_mahasiswa]' ");
// // $search = mysqli_fetch_row($qalert);
// $alert = mysqli_fetch_array($qalert);
// $acc = isset($alert['acc']) ? $alert['acc'] : 5;

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


    <div class="container mt-3">
        <div class="card shadow ">
            <div class="card-body">
                <h4 class="card-title">KRS Mahasiswa</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Ruang</th>
                            <th scope="col">Dosen</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $no = 1;
                        $dok = mysqli_query($conn, "SELECT * FROM pemrograman_krs 
                                            JOIN mahasiswa ON pemrograman_krs.id_mahasiswa = mahasiswa.id_mahasiswa
                                            JOIN dosen ON pemrograman_krs.id_dosen = dosen.id_dosen
                                            JOIN matakuliah ON pemrograman_krs.id_matakuliah = matakuliah.id_matakuliah
                                            JOIN jurusan ON pemrograman_krs.id_jurusan = jurusan.id_jurusan
                                            WHERE pemrograman_krs.acc = 0");
                        while ($data = mysqli_fetch_array($dok)) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_mahasiswa'] ?></td>
                                <td><?= $data['nama_jurusan'] ?></td>
                                <td><?= $data['nama_matakuliah'] ?></td>
                                <td><?= $data['sks'] ?></td>
                                <td><?= $data['kelas'] ?></td>
                                <td><?= $data['waktu_mulai'] ?> - <?= $data['waktu_akhir'] ?></td>
                                <td><?= $data['hari'] ?></td>
                                <td><?= $data['ruang'] ?></td>
                                <td><?= $data['nama_dosen'] ?></td>
                                <td data-title="aksi">
                                    <!-- Button trigger modal -->
                                    <a href="controller/aksi_krs.php?acc=<?= $data['id_pemrograman_krs'] ?>" type="button" class="btn btn-success mb-2">Approve</a>

                                </td>
                            </tr>

                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="card shadow ">
            <div class="card-body">
                <h4 class="card-title">APPROVED KRS Mahasiswa</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Ruang</th>
                            <th scope="col">Dosen</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $no = 1;
                        $dok = mysqli_query($conn, "SELECT * FROM pemrograman_krs 
                                            JOIN mahasiswa ON pemrograman_krs.id_mahasiswa = mahasiswa.id_mahasiswa
                                            JOIN dosen ON pemrograman_krs.id_dosen = dosen.id_dosen
                                            JOIN matakuliah ON pemrograman_krs.id_matakuliah = matakuliah.id_matakuliah
                                            JOIN jurusan ON pemrograman_krs.id_jurusan = jurusan.id_jurusan
                                            WHERE pemrograman_krs.acc = 1");
                        while ($data = mysqli_fetch_array($dok)) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_mahasiswa'] ?></td>
                                <td><?= $data['nama_jurusan'] ?></td>
                                <td><?= $data['nama_matakuliah'] ?></td>
                                <td><?= $data['sks'] ?></td>
                                <td><?= $data['kelas'] ?></td>
                                <td><?= $data['waktu_mulai'] ?> - <?= $data['waktu_akhir'] ?></td>
                                <td><?= $data['hari'] ?></td>
                                <td><?= $data['ruang'] ?></td>
                                <td><?= $data['nama_dosen'] ?></td>
                                <td data-title="aksi">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['id_pemrograman_krs'] ?>">
                                        Batalkan
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="hapus<?= $data['id_pemrograman_krs'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Kartu Rencana Studi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapus matakuliah <?= $data['nama_matakuliah'] ?>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                            <a href="controller/aksi_krs.php?batal= <?= $data['id_pemrograman_krs']; ?>" class="btn btn-danger mb-2">Hapus</a>
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
</body>

</html>