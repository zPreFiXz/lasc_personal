<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $date = $_POST['date'];
        $project = $_POST['project'];
        $location = $_POST['location'];
        $amount_time = $_POST['amount_time'];
        $term = $_POST['term'];
        $year = $_POST['year'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_9 (userId,date, project, location, amount_time, term, year,amount_work)
        VALUES (:userId,:date, :project, :location, :amount_time, :term, :year,:amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':project', $project);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':amount_time', $amount_time);
        $stmt->bindParam(':term', $term);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
    }
    $conn = null;
    if ($stmt) {
        $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
        header("location: ../index.php?page=1_9/index_1_9");
    }else {
        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header("location: ../index.php?page=1_9/index_1_9");
    }
?>
