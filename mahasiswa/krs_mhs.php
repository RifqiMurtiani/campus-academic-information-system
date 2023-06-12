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
// echo $nama;
$query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nama_mahasiswa = '$nama'");
$user = mysqli_fetch_array($query);
// echo $user['nama_mahasiswa'];

$qalert = mysqli_query($conn, "SELECT * FROM pemrograman_krs 
                                            JOIN mahasiswa ON pemrograman_krs.id_mahasiswa = mahasiswa.id_mahasiswa
                                            JOIN dosen ON pemrograman_krs.id_dosen = dosen.id_dosen
                                            JOIN matakuliah ON pemrograman_krs.id_matakuliah = matakuliah.id_matakuliah
                                            WHERE mahasiswa.id_mahasiswa = '$user[id_mahasiswa]' ");
// $search = mysqli_fetch_row($qalert);
$alert = mysqli_fetch_array($qalert);
$acc = isset($alert['acc']) ? $alert['acc'] : 5;
session_write_close();

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
    <?php include('includes/navbar_mhs.php'); ?>

    <div class="container mt-3">
        <div class="col-3 ">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#tambah">
                KRS
            </button>
            <!-- Modal -->
            <div class="modal fade " id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Kartu Rencana Studi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Aksi</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Matakuliah</th>
                                        <th scope="col">SKS</th>
                                        <!-- <th scope="col">Kelas</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Hari</th>
                                        <th scope="col">Ruang</th>
                                        <th scope="col">Dosen</th> -->
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php
                                    $no = 1;
                                    $mquery = mysqli_query($conn, "SELECT * FROM matakuliah
                                                                JOIN dosen ON matakuliah.id_dosen = dosen.id_dosen
                                                                JOIN jurusan ON matakuliah.id_jurusan = jurusan.id_jurusan
                                                                WHERE jurusan.id_jurusan = '$user[id_jurusan]'
                                                                -- AND '$user[id_mahasiswa]' NOT IN (SELECT id_mahasiswa FROM pemrograman_krs)
                                                                AND matakuliah.id_matakuliah NOT IN (SELECT id_matakuliah FROM pemrograman_krs WHERE id_mahasiswa = '$user[id_mahasiswa]')
                                                                ");
                                    while ($matkul = mysqli_fetch_array($mquery)) :
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><a href="controller/proses_krs.php?tambah=<?= $matkul['id_matakuliah'] ?>" type="button" class="btn btn-info"> + </a></td>
                                            <td><?= $matkul['kode_matakuliah']; ?></td>
                                            <td><?= $matkul['nama_matakuliah']; ?></td>
                                            <td><?= $matkul['sks']; ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($acc == 0) : ?>
            <div class="col-12 p-3 alert alert-warning mt-3">
                <h6>Silahkan menunggu approve KRS</h6>
            </div>
        <?php elseif ($acc == 1) : ?>
            <div class="col-12 p-3 alert alert-success mt-3">
                <h6>KRS telah di approve</h6>
            </div>
        <?php elseif ($acc == 2) : ?>
            <div class="col-12 p-3 alert alert-danger mt-3">
                <h6>KRS tidak di approve, silahkan cek kembali</h6>
            </div>
        <?php elseif ($acc == 5) : ?>
            <div class="col-12 p-3 alert alert-danger mt-3">
                <h6>Silahkan tambahkan KRS</h6>
            </div>
        <?php endif; ?>


        <div class="card shadow ">
            <div class="card-body">
                <h4 class="card-title">Data Mahasiswa</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
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
                                            WHERE mahasiswa.id_mahasiswa = '$user[id_mahasiswa]' ");
                        while ($data = mysqli_fetch_array($dok)) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['kode_matakuliah'] ?></td>
                                <td><?= $data['nama_matakuliah'] ?></td>
                                <td><?= $data['sks'] ?></td>
                                <td><?= $data['kelas'] ?></td>
                                <td><?= $data['waktu_mulai'] ?> - <?= $data['waktu_akhir'] ?></td>
                                <td><?= $data['hari'] ?></td>
                                <td><?= $data['ruang'] ?></td>
                                <td><?= $data['nama_dosen'] ?></td>
                                <td data-title="aksi">
                                    <?php if ($data['acc'] == 0) : ?>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['id_pemrograman_krs'] ?>">
                                            Hapus
                                        </button>
                                    <?php elseif ($data['acc'] == 1) : ?>
                                        <!-- Button trigger modal -->
                                        <button disabled type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['id_pemrograman_krs'] ?>">
                                            Hapus
                                        </button>
                                    <?php endif; ?>
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
                                            <a href="controller/proses_krs.php?hapus= <?= $data['id_pemrograman_krs']; ?>" class="btn btn-danger mb-2">Hapus</a>
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