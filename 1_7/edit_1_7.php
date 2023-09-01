<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['update'])) {
        $id = $_SESSION['edit'];
        $type = $_POST['type'];
        $title = $_POST['title'];
        $amount_time = $_POST['amount_time'];
        $type_work_s_j = $_POST['type_work_s_j'];
        $type_work = $_POST['type_work'];
        $participation = $_POST['participation'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_7 SET type = :type, title = :title, amount_time = :amount_time , type_work_s_j = :type_work_s_j , type_work = :type_work ,participation = :participation, amount_work = :amount_work WHERE id = :id" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':amount_time', $amount_time);
        $stmt->bindParam(':type_work_s_j', $type_work_s_j);
        $stmt->bindParam(':type_work', $type_work);
        $stmt->bindParam(':participation', $participation);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        unset( $_SESSION['edit']);

        $conn = null;
        
        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=1_7/index_1_7");
        }else {
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=1_7/index_1_7");
        }
    }
?>