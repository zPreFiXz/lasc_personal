<?php
    session_start();
    require_once "../config/db.php";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if(isset($_POST['edit'])) {
        $userId = $_POST['userId'];
        $academic_rank = $_POST['academic_rank'];
        $nametitle = $_POST['nametitle'];
        $firstname = $_POST['firstname'];
        $lastname    = $_POST['lastname'];
        $branch = $_POST['branch'];
        $email = $_POST['email'];
        $isAdmin = $_POST['isAdmin'];

        $sql = "UPDATE users SET academic_rank = :academic_rank, nametitle = :nametitle, firstname = :firstname , lastname = :lastname , branch = :branch ,email = :email, isAdmin = :isAdmin WHERE userId = :userId" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':academic_rank', $academic_rank);
        $stmt->bindParam(':nametitle', $nametitle);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':branch', $branch);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':isAdmin', $isAdmin);
        $stmt->execute();

        $conn = null;
        if($_POST['urole'] == "teacher") {
            if ($stmt) {
                $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
                header("location: /lasc_personal/index_admin.php?page=admin/teacher");
            }else {
                $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
                header("location: /lasc_personal/index_admin.php?page=admin/teacher");
            }
        }else if ($_POST['urole'] == "officer"){
            if ($stmt) {
                $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
                header("location: /lasc_personal/index_admin.php?page=admin/officer");
            }else {
                $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
                header("location: /lasc_personal/index_admin.php?page=admin/officer");
            }
        }
    }
?>