<?php
include "../../koneksi.php";
if(isset($_POST['simpan'])){
    $save = mysqli_query($conn, "INSERT INTO mahasiswa (nim,nama_mahasiswa,tanggal_lahir,alamat, nama_orang_tua,id_jurusan,id_angkatan)
                                VALUES ('$_POST[nim]',
                                        '$_POST[nama_mahasiswa]',
                                        '$_POST[tanggal_lahir]',
                                        '$_POST[alamat]',
                                        '$_POST[nama_orang_tua]',
                                        '$_POST[id_jurusan]',
                                        '$_POST[id_angkatan]')
                                        ");
    if($save){
        session_start();
        $_SESSION['msg'] = "Data berhasil ditambah";
        header("Location:../mahasiswa.php");
        exit();
        session_write_close();

    }else{
        session_start();
        $_SESSION['msg'] = "Data GAGAL ditambah";
        header("Location:../mahasiswa.php");
        exit();
        session_write_close();
    }
}

if(isset($_POST['ubah'])){
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
    if($save){
        session_start();
        $_SESSION['msg'] = "Data berhasil diubah";
        header("Location:../mahasiswa.php");
        exit();
        session_write_close();
    }else{
        session_start();
        $_SESSION['msg'] = "Data GAGAL diubah";
        header("Location:../mahasiswa.php");
        exit();
        session_write_close();
        // $alert = "<div class='alert alert-danger mt-3'> GAGAL</div>";/
    }
}

if(isset($_GET['hapus'])){
    $save = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mahasiswa = '$_GET[hapus]'");
    $reset = mysqli_query($conn, "ALTER TABLE mahasiswa AUTO_INCREMENT = 1;");
    if($save && $reset){
        // session_start();
        // $_SESSION['msg'] = "Data berhasil dihapus";
        header("Location:../mahasiswa.php");
        exit();
        // session_write_close();
    }else{
        session_start();
        $_SESSION['msg'] = "Data GAGAL dihapus";
        header("Location:../mahasiswa.php");
        exit();
        session_write_close();
    }
}