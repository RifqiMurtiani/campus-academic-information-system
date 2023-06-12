<?php 
session_start();
session_destroy();
unset($_SESSION['username']);
unset($_SESSION['role']);
unset($_SESSION['user']);
header("Location: index.php");
 
?>