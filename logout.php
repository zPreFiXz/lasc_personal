<?php 

    session_start();
    unset($_SESSION['userId']);
    header('location: signin.php');
?>