<?php
session_start();
include 'koneksi.php';
if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $search = mysqli_num_rows($sql);
    if ($search > 0) {
        $data = mysqli_fetch_assoc($sql);
        if (password_verify($password, $data['password'])) {
            // echo 'success';
            if ($data['role'] == 1) {
                //admin
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 1;
                $_SESSION['user'] = $data['nama'];
                header("location:admin/home_admin.php");
            } else if ($data['role'] == 2) {
                //dosen
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 2;
                $_SESSION['user'] = $data['nama'];
                header("location:dashboard.html");
            } else if ($data['role'] == 3) {
                //mahasiswa
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 3;
                $_SESSION['user'] = $data['nama'];

                header("location:mahasiswa/home_mhs.php");
            } else {
                header("location:index.php?pesan=gagal");
            }
        } else {
            echo "Email or Password is invalid";
        }
    } else {
        header("location:index.php?pesan=gagal");
    }
}
session_write_close();
