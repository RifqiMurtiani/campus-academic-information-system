<?php
include "../../koneksi.php";
if (isset($_POST['simpan'])) {
    $save = mysqli_query($conn, "INSERT INTO mahasiswa (nim,nama_mahasiswa,tanggal_lahir,alamat, nama_orang_tua,id_jurusan,id_angkatan)
                                VALUES ('$_POST[nim]',
                                        '$_POST[nama_mahasiswa]',
                                        '$_POST[tanggal_lahir]',
                                        '$_POST[alamat]',
                                        '$_POST[nama_orang_tua]',
                                        '$_POST[id_jurusan]',
                                        '$_POST[id_angkatan]')
                                        ");
    if ($save) {
        session_start();
        $_SESSION['msg'] = "Data berhasil ditambah";
        header("Location:../mahasiswa.php");
        exit();
        session_write_close();
    } else {
        session_start();
        $_SESSION['msg'] = "Data GAGAL ditambah";
        header("Location:../mahasiswa.php");
        exit();
        session_write_close();
    }
}

if (isset($_GET['tambah'])) {
    session_start();
    // echo $_SESSION['user'];
    $nama = $_SESSION['user'];
    // echo $nama;
    $query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nama_mahasiswa = '$nama'");
    $user = mysqli_fetch_array($query);
    // echo isset($user['nama_mahasiswa']) ? $user['nama_mahasiswa'] : "takdeee";
    session_write_close();
    $qmatkul = mysqli_query($conn, "SELECT * FROM matakuliah WHERE id_matakuliah = '$_GET[tambah]' ");
    $matkul = mysqli_fetch_array($qmatkul);
    echo $matkul['id_matakuliah'];
    $add = mysqli_query($conn, "INSERT INTO pemrograman_krs (id_mahasiswa,id_matakuliah,id_dosen,id_jurusan, acc)
                                VALUES ('$user[id_mahasiswa]',
                                        '$matkul[id_matakuliah]',
                                        '$matkul[id_dosen]',
                                        '$matkul[id_jurusan]',
                                        0)
                                        ");
    if ($add) {
        session_start();
        $_SESSION['msg'] = "Data berhasil ditambah";
        header("Location:../krs_mhs.php");
        exit();
        session_write_close();
    } else {
        session_start();
        $_SESSION['msg'] = "Data GAGAL ditambah";
        header("Location:../krs_mhs.php");
        exit();
        session_write_close();
        // $alert = "<div class='alert alert-danger mt-3'> GAGAL</div>";/
    }
}

if (isset($_GET['hapus'])) {
    $save = mysqli_query($conn, "DELETE FROM pemrograman_krs WHERE id_pemrograman_krs = '$_GET[hapus]'");
    $reset = mysqli_query($conn, "ALTER TABLE pemrograman_krs AUTO_INCREMENT = 1;");
    if ($save && $reset) {
        // session_start();
        // $_SESSION['msg'] = "Data berhasil dihapus";
        header("Location:../krs_mhs.php");
        exit();
        // session_write_close();
    } else {
        session_start();
        $_SESSION['msg'] = "Data GAGAL dihapus";
        header("Location:../krs_mhs.php");
        exit();
        session_write_close();
    }
}
