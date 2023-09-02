<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $type = $_POST['type'];
        $title = $_POST['title'];
        $date_start = $_POST['date_start'];
        $date_end = $_POST['date_end'];
        $type_work_s_j = $_POST['type_work_s_j'];
        $type_work = $_POST['type_work'];
        $participation = $_POST['participation'];
        $term = $_POST['term'];
        $year = $_POST['year'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_7 (userId,type, title, start, end, type_work_s_j, type_work, participation,term, year, amount_work)
        VALUES (:userId,:type, :title, :date_start, :date_end, :type_work_s_j, :type_work, :participation,:term, :year, :amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':date_start', $date_start);
        $stmt->bindParam(':date_end', $date_end);
        $stmt->bindParam(':type_work_s_j', $type_work_s_j);
        $stmt->bindParam(':type_work', $type_work);
        $stmt->bindParam(':participation', $participation);
        $stmt->bindParam(':term', $term);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
    }

    $conn = null;
    
    if ($stmt) {
        $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
        header("location: ../index.php?page=1_7/index_1_7");
    }else {
        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header("location: ../index.php?page=1_7/index_1_7");
    }
?>
