<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['update'])) {
        $id = $_SESSION['edit'];
        $research_name = $_POST['research_name'];
        $funding_source = $_POST['funding_source'];
        $funding_framework = $_POST['funding_framework'];
        $date_start = $_POST['date_start'];
        $date_end = $_POST['date_end'];
        $nature_work = $_POST['nature_work'];
        $leader = $_POST['leader'];
        $contribute = $_POST['contribute'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_6_a SET research_name = :research_name,funding_source = :funding_source,funding_framework = :funding_framework, start = :date_start, end = :date_end,nature_work = :nature_work,leader = :leader,contribute = :contribute,amount_work = :amount_work WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':research_name', $research_name);
        $stmt->bindParam(':funding_source', $funding_source);
        $stmt->bindParam(':funding_framework', $funding_framework);
        $stmt->bindParam(':date_start', $date_start);
        $stmt->bindParam(':date_end', $date_end);
        $stmt->bindParam(':nature_work', $nature_work);
        $stmt->bindParam(':leader', $leader);
        $stmt->bindParam(':contribute', $contribute);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        unset( $_SESSION['edit']);
        
        $conn = null;

        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=1_6_a/index_1_6_a");
        }else{
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=1_6_a/index_1_6_a");
        }
    }
?>