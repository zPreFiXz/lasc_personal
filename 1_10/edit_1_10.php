<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['update'])) {
        $id = $_SESSION['edit'];
        $date = $_POST['date'];
        $project = $_POST['project'];
        $position = $_POST['position'];
        $type_work = $_POST['type_work'];
        $amount_time = $_POST['amount_time'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_10 SET date = :date, project = :project, position = :position , type_work = :type_work , amount_time = :amount_time ,amount_work = :amount_work, amount_work = :amount_work WHERE id = :id" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':project', $project);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':type_work', $type_work);
        $stmt->bindParam(':amount_time', $amount_time);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        unset( $_SESSION['edit']);

        $conn = null;
        
        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=1_10/index_1_10");
        }else {
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=1_10/index_1_10");
        }
    }
?>