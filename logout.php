<?php 
    session_start();
    unset($_SESSION['userId']);
    unset($_SESSION['adminId']);
    header('location: signin.php');
?>