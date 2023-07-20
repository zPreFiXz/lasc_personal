<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['submit'])) {
        $date = $_POST['date'];
        $project = $_POST['project'];
        $position = $_POST['position'];
        $type_work = $_POST['type_work'];
        $amount_time = $_POST['amount_time'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_10 (date, project, position,type_work, amount_time, amount_work)
        VALUES (:date, :project, :position, :type_work, :amount_time, :amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':project', $project);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':type_work', $type_work);
        $stmt->bindParam(':amount_time', $amount_time);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
    }
        
            if ($stmt) {
                $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
                header("location: ../index.php?page=1_10/index_1_10");
            }else {
                $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
                header("location: ../index.php?page=1_10/index_1_10");
            }
?>
