<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $number = $_POST['number'];
        $research_name = $_POST['research_name'];
        $funding_source = $_POST['funding_source'];
        $funding_framework = $_POST['funding_framework'];
        $start_end = $_POST['start_end'];
        $nature_work = $_POST['nature_work'];
        $leader = $_POST['leader'];
        $contribute = $_POST['contribute'];
        $term = $_POST['term'];
        $year = $_POST['year'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_6_a (userId,number,research_name,funding_source,funding_framework,start_end,nature_work,leader,contribute,term, year,amount_work) 
        VALUES (:userId,:number, :research_name, :funding_source, :funding_framework, :start_end, :nature_work,:leader,:contribute,:term,:year,:amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':research_name', $research_name);
        $stmt->bindParam(':funding_source', $funding_source);
        $stmt->bindParam(':funding_framework', $funding_framework);
        $stmt->bindParam(':start_end', $start_end);
        $stmt->bindParam(':nature_work', $nature_work);
        $stmt->bindParam(':leader', $leader);
        $stmt->bindParam(':contribute', $contribute);
        $stmt->bindParam(':term', $term);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
    }

    if ($stmt) {
        $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
        header("location: ../index.php?page=1_6_a/index_1_6_a");
    }else{
        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header("location: ../index.php?page=1_6_a/index_1_6_a");
    }
?>