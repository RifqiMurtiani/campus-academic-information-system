<?php
include 'koneksi.php';
session_start();
if(isset($_POST["login"])){
        $user = $_POST['username'];    
        $password = $_POST['password'];
        $sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' && password = '$password'");
        $search = mysqli_num_rows($sql);
            if($search > 0){
                $data = mysqli_fetch_assoc($sql);
                if($data['role']==1){
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = 1;
                    header("location:dashboard_admin.html");
                }else if($data['role']==2){
            
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = 2;
            
                    header("location:dashboard_dosen.html");
                }
                }else if($data['role']==3){
            
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = 3;
            
                    header("location:dashboard_mhs.html");
                }else{
            
                    header("location:index.php?pesan=gagal");
                }	
            }else{
                header("location:index.php?pesan=gagal");
            }
?> 