<?php
include "../../koneksi.php";
if (isset($_POST['proses'])) {

    $dir = "../../berkas/";
    // echo $file_name = $_FILES['nama_file']['name'];
    $file_name = $_FILES['nama_file']['name'];
    move_uploaded_file($_FILES['nama_file']['tmp_name'], $dir.$file_name);
    $save = mysqli_query($conn, "INSERT INTO dokumen SET file='$file_name'");
    if ($save) {
        session_start();
        $_SESSION['msg'] = "File berhasil diupload";
        header("Location:../pengumuman.php");
        exit();
        session_write_close();
    } else {
        session_start();
        $_SESSION['msg'] = "File gagal diupload";
        header("Location:../pengumuman.php");
        exit();
        session_write_close();
    }
}
if (isset($_GET['hapus'])) {
    $dir = "../../berkas/";
    // echo $file_name = $_FILES['nama_file']['name'];
    // $file_name = $_FILES['id_dokumen']['name'];
    // move_uploaded_file($_FILES['nama_file']['tmp_name'], $dir.$file_name);
    $query = mysqli_query($conn, "SELECT * FROM dokumen WHERE id_dokumen = '$_GET[hapus]'");
    $result = mysqli_fetch_object($query);

    unlink($dir.$result->file);
    $save = mysqli_query($conn, "DELETE FROM dokumen WHERE id_dokumen = '$_GET[hapus]'");
    $reset = mysqli_query($conn, "ALTER TABLE mahasiswa AUTO_INCREMENT = 1;");
    if ($save && $reset) {
        session_start();
        $_SESSION['msg'] = "File berhasil dihapus";
        header("Location:../pengumuman.php");
        exit();
        session_write_close();
    } else {
        session_start();
        $_SESSION['msg'] = "File gagal dihapus";
        header("Location:../pengumuman.php");
        exit();
        session_write_close();
    }
}