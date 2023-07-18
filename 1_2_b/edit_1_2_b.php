<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['update'])) {
        $id = $_SESSION['edit'];
        $club = $_POST['club'];
        $level = $_POST['level'];
        $amount_student = $_POST['amount_student'];
        $group_study = $_POST['group_study'];
        $amount_time = $_POST['amount_time'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_2_b SET club = :club, level = :level, amount_student = :amount_student , group_study = :group_study , amount_time = :amount_time , amount_work = :amount_work WHERE id = :id" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':club', $club);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':amount_student', $amount_student);
        $stmt->bindParam(':group_study', $group_study);
        $stmt->bindParam(':amount_time', $amount_time);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        unset( $_SESSION['edit']);

        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=1_2_b/index_1_2_b");
        }else {
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=1_2_b/index_1_2_b");
        }
    }

?>