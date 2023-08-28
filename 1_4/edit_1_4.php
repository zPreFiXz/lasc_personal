<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['update'])) {
        $id = $_SESSION['edit'];
        $date = $_POST['date'];
        $project_name = $_POST['project_name'];
        $location = $_POST['location'];
        $period = $_POST['period'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_4 SET date = :date,project_name = :project_name,location = :location,period = :period,amount_work = :amount_work WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':project_name', $project_name);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':period', $period);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        unset( $_SESSION['edit']);
        
        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=1_4/index_1_4");
        }else{
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=1_4/index_1_4");
        }
    }
?>