<?php
session_start();
include 'koneksi.php';
if(isset($_POST["login"])){
    $user = $_POST['username'];    
    $password = $_POST['password'];
        $sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' && password = '$password'");
        $search = mysqli_num_rows($sql);
        // $data = mysqli_fetch_assoc($sql);
        // echo $data['role'];
            if($search > 0){
                $data = mysqli_fetch_assoc($sql);
                if($data['role']==1){
                    //admin
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = 1;
                    header("location:dashboar.html");
                }else if($data['role']==2){
                    //dosen
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = 2;
            
                    header("location:dashboard.html");
                }else if($data['role']==3){
                    //mahasiswa
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = 3;
            
                    header("location:dashboard.html");
                }else{
                    header("location:index.php?pesan=gagal");
                }	
            }else{
                header("location:index.php?pesan=gagal");
            }
        }
?> 