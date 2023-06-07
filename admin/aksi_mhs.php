<?php
include "..\koneksi.php";
if(isset($_POST['simpan'])){
    $save = mysqli_query($conn, "INSERT INTO mahasiswa (nim,nama_mahasiswa,tanggal_lahir,alamat, nama_orang_tua)
                                VALUES ('$_POST[nim]',
                                        '$_POST[nama_mahasiswa]',
                                        '$_POST[tanggal_lahir]',
                                        '$_POST[alamat]',
                                        '$_POST[nama_orang_tua]')");
    if($save){
        echo "<script>
                alert('Simpan Data Berhasil!!');
                
                </script>";
        header("Location:..\mahasiswa.php");

    }else{
        "<script>
                alert('Simpan Data GAGAL CUYY!!');
                </script>";
        header("Location:..\mahasiswa.php");

    }
}

if(isset($_POST['ubah'])){
    $save = mysqli_query($conn, "UPDATE  mahasiswa SET 
                                        nim = '$_POST[nim]',
                                        nama_mahasiswa = '$_POST[nama_mahasiswa]',
                                        tanggal_lahir = '$_POST[tanggal_lahir]',
                                        alamat='$_POST[alamat]',
                                        nama_orang_tua = '$_POST[nama_orang_tua]'
                                        WHERE id_mahasiswa = '$_POST[id_mahasiswa]'
                                        ");
    if($save){
        echo "<script>
                alert('Ubah Data Berhasil!!');
                
                </script>";
        header("Location:..\mahasiswa.php");
    }else{
        "<script>
        alert('Ubah Data GAGAL CUYY!!');
        </script>";
        header("Location:..\mahasiswa.php");
    }
}

if(isset($_POST['hapus'])){
    $save = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mahasiswa = '$_POST[id_mahasiswa]'");
    $reset = mysqli_query($conn, "ALTER TABLE mahasiswa AUTO_INCREMENT = 1;");
    if($save && $reset){
        echo "<script>
                alert('Hapus Data Berhasil!!');
                
                </script>";
        header("Location:..\mahasiswa.php");
    }else{
        "<script>
        alert('Hapus Data GAGAL CUYY!!');
        </script>";
        header("Location:..\mahasiswa.php");
    }
}