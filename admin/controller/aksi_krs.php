<?php
include "../../koneksi.php";
if (isset($_GET['acc'])) {
    echo $_GET['acc'];
    $save = mysqli_query($conn, "UPDATE  pemrograman_krs SET acc = 1 WHERE id_pemrograman_krs = '$_GET[acc]'");
    if ($save) {
        session_start();
        $_SESSION['msg'] = "Data berhasil diapprove";
        header("Location:../pemrograman_krs.php");
        exit();
        session_write_close();
    } else {
        session_start();
        $_SESSION['msg'] = "Data GAGAL diapprove";
        header("Location:../pemrograman_krs.php");
        exit();
        session_write_close();

    }
}
if (isset($_GET['batal'])) {
    echo $_GET['batal'];
    $save = mysqli_query($conn, "UPDATE  pemrograman_krs SET acc = 0 WHERE id_pemrograman_krs = '$_GET[batal]'");
    if ($save) {
        session_start();
        $_SESSION['msg'] = "Data berhasil diapprove";
        header("Location:../pemrograman_krs.php");
        exit();
        session_write_close();
    } else {
        session_start();
        $_SESSION['msg'] = "Data GAGAL diapprove";
        header("Location:../pemrograman_krs.php");
        exit();
        session_write_close();

    }
}
