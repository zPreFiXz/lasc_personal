<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $major = $_POST['major'];
        $code = $_POST['code'];
        $level = $_POST['level'];
        $group_study = $_POST['group_study'];
        $amount_student = $_POST['amount_student'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_2_a (userId,major,code,level,group_study,amount_student,amount_work) 
        VALUES (:userId,:major, :code, :level, :group_study, :amount_student, :amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':major', $major);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':group_study', $group_study);
        $stmt->bindParam(':amount_student', $amount_student);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        }

    if ($stmt) {
        $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
        header("location: ../index.php?page=1_2_a/index_1_2_a");
    }else{
        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header("location: ../index.php?page=1_2_a/index_1_2_a");
    }
?>