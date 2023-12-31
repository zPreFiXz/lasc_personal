<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['update'])) {
        $id = $_SESSION['edit'];
        $major = $_POST['major'];
        $level = $_POST['level'];
        $amount_student = $_POST['amount_student'];
        $amount_time = $_POST['amount_time'];
        $workplace = $_POST['workplace'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_3 SET major = :major, level = :level, amount_student = :amount_student , amount_time = :amount_time , workplace = :workplace , amount_work = :amount_work WHERE id = :id" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':major', $major);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':amount_student', $amount_student);
        $stmt->bindParam(':amount_time', $amount_time);
        $stmt->bindParam(':workplace', $workplace);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        unset( $_SESSION['edit']);

        $conn = null;
        
        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=1_3/index_1_3");
        }else {
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=1_3/index_1_3");
        }
    }
?>