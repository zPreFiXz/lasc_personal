<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['update'])) {
        $id = $_SESSION['edit'];
        $type = $_POST['type'];
        $title = $_POST['title'];
        $date_start = $_POST['date_start'];
        $date_end = $_POST['date_end'];
        $type_work_s_j = $_POST['type_work_s_j'];
        $type_work = $_POST['type_work'];
        $participation = $_POST['participation'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_7 SET type = :type, title = :title, start = :date_start, end = :date_end , type_work_s_j = :type_work_s_j , type_work = :type_work ,participation = :participation, amount_work = :amount_work WHERE id = :id" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':date_start', $date_start);
        $stmt->bindParam(':date_end', $date_end);
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