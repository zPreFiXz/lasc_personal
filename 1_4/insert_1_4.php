<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['submit'])) {
        $date = $_POST['date'];
        $project_name = $_POST['project_name'];
        $location = $_POST['location'];
        $period = $_POST['period'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_4 (date,project_name,location,period,amount_work) 
        VALUES (:date, :project_name, :location, :period,:amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':project_name', $project_name);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':period', $period);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        }

    if ($stmt) {
        $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
        header("location: ../index.php?page=1_4/index_1_4");
    }else{
        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header("location: ../index.php?page=1_4/index_1_4");
    }
?>