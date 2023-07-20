<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['submit'])) {
        $date = $_POST['date'];
        $project = $_POST['project'];
        $location = $_POST['location'];
        $amount_time = $_POST['amount_time'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_9 (date, project, location, amount_time, amount_work)
        VALUES (:date, :project, :location, :amount_time, :amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':project', $project);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':amount_time', $amount_time);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
    }
        
            if ($stmt) {
                $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
                header("location: ../index.php?page=1_9/index_1_9");
            }else {
                $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
                header("location: ../index.php?page=1_9/index_1_9");
            }
?>
