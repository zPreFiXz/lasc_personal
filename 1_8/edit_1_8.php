<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['update'])) {
        $id = $_SESSION['edit'];
        $date = $_POST['date'];
        $type = $_POST['type'];
        $subject = $_POST['subject'];
        $location = $_POST['location'];
        $nature_work = $_POST['nature_work'];
        $hours = $_POST['hours'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_8 SET date = :date,type = :type,subject = :subject,location = :location,nature_work = :nature_work,hours = :hours,amount_work = :amount_work WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':nature_work', $nature_work);
        $stmt->bindParam(':hours', $hours);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        unset( $_SESSION['edit']);
        $conn = null;
        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=1_8/index_1_8");
        }else{
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=1_8/index_1_8");
        }
    }
?>