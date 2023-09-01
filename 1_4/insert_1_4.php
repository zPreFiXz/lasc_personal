<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $date = $_POST['date'];
        $project_name = $_POST['project_name'];
        $location = $_POST['location'];
        $period = $_POST['period'];
        $term = $_POST['term'];
        $year = $_POST['year'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_4 (userId,date,project_name,location,period,term,year,amount_work) 
        VALUES (:userId,:date, :project_name, :location, :period,:term,:year,:amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':project_name', $project_name);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':period', $period);
        $stmt->bindParam(':term', $term);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
    }

    $conn = null;
    
    if ($stmt) {
        $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
        header("location: ../index.php?page=1_4/index_1_4");
    }else{
        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header("location: ../index.php?page=1_4/index_1_4");
    }
?>