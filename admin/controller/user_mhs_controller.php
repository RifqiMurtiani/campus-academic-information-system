<?php
include "../../koneksi.php";
if (isset($_POST['simpan'])) {
    echo "$_POST[nama_mahasiswa]";
    echo "$_POST[username]";
    echo "$_POST[password]";
    
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $save = mysqli_query($conn, "INSERT INTO user(nama,username, password,role)VALUES('$_POST[nama_mahasiswa]', '$_POST[username]','$pass',3)");
    if ($save) {
        session_start();
        $_SESSION['msg'] = "Akun berhasil dibuat";
        header("Location:../user_mhs.php");
        exit();
        session_write_close();
    } else {
        session_start();
        $_SESSION['msg'] = "Akun GAGAL dibuat";
        header("Location:../user_mhs.php");
        exit();
        session_write_close();
    }
}

if (isset($_POST['ubah'])) {
    $save = mysqli_query($conn, "UPDATE  mahasiswa SET 
                                        nim = '$_POST[nim]',
                                        nama_mahasiswa = '$_POST[nama_mahasiswa]',
                                        tanggal_lahir = '$_POST[tanggal_lahir]',
                                        alamat='$_POST[alamat]',
                                        nama_orang_tua = '$_POST[nama_orang_tua]',
                                        id_jurusan = '$_POST[id_jurusan]',
                                        id_angkatan = '$_POST[id_angkatan]'
                                        WHERE id_mahasiswa = '$_POST[id_mahasiswa]'
                                        ");
    if ($save) {
        session_start();
        $_SESSION['msg'] = "Data berhasil diubah";
        header("Location:../mahasiswa.php");
        exit();
        session_write_close();
    } else {
        session_start();
        $_SESSION['msg'] = "Data GAGAL diubah";
        header("Location:../mahasiswa.php");
        exit();
        session_write_close();
        // $alert = "<div class='alert alert-danger mt-3'> GAGAL</div>";/
    }
}

if (isset($_GET['hapus'])) {
    $save = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mahasiswa = '$_GET[hapus]'");
    $reset = mysqli_query($conn, "ALTER TABLE mahasiswa AUTO_INCREMENT = 1;");
    if ($save && $reset) {
        // session_start();
        // $_SESSION['msg'] = "Data berhasil dihapus";
        header("Location:../mahasiswa.php");
        exit();
        // session_write_close();
    } else {
        session_start();
        $_SESSION['msg'] = "Data GAGAL dihapus";
        header("Location:../mahasiswa.php");
        exit();
        session_write_close();
    }
}
