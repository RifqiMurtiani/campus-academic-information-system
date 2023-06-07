<?php
$servername = "localhost"; // Ganti dengan host database 
$username = "root"; // Ganti dengan username database 
$password = ""; // Ganti dengan password database 
$dbname = "web"; // Ganti dengan nama database 

// Membuat koneksi ke database MariaDB
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// echo "Koneksi berhasil";

?>
