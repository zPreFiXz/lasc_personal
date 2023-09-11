<?php
    require "../config/db.php";
    session_start();

    if (isset($_POST['edit'])) {
        $userId = $_POST['userId'];
        $academic_rank = $_POST['academic_rank'];
        $nametitle = $_POST['nametitle'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $branch = $_POST['branch'];
        $email = $_POST['email'];
    
        $sql = "UPDATE users SET academic_rank = :academic_rank, nametitle = :nametitle, firstname = :firstname , lastname = :lastname , branch = :branch ,email = :email WHERE userId = :userId";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':academic_rank', $academic_rank);
        $stmt->bindParam(':nametitle', $nametitle);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':branch', $branch);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }

    $conn = null;
    
    if($stmt){
        $_SESSION['success'] = "แก้ไขโปรไฟล์สำเร็จ";
        header("location: /lasc_personal/index.php?page=users/account");
    } else {
        $_SESSION['error'] = "แก้ไขโปรไฟล์ไม่สำเร็จ";
        header("location: /lasc_personal/index.php?page=users/account");
    }
?>