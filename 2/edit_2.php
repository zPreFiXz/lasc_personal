<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['update'])) {
        $id = $_SESSION['edit'];
        $date = $_POST['date'];
        $project = $_POST['project'];
        $location = $_POST['location'];
        $amount_time = $_POST['amount_time'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_9 SET date = :date, project = :project, location = :location , amount_time = :amount_time , amount_work = :amount_work  WHERE id = :id" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':project', $project);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':amount_time', $amount_time);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        unset( $_SESSION['edit']);

        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=1_9/index_1_9");
        }else {
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=1_9/index_1_9");
        }
    }

?>