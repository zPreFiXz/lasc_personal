<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $project = $_POST['project'];
        $funding = $_POST['funding'];
        $date_start = $_POST['date_start'];
        $date_end = $_POST['date_end'];
        $publish = $_POST['publish'];
        $term = $_POST['term'];
        $year = $_POST['year'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_6_b (userId,project, funding, `start`, `end`, publish, term, year, amount_work)
        VALUES (:userId,:project, :funding, :date_start, :date_end, :publish, :term, :year,:amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':project', $project);
        $stmt->bindParam(':funding', $funding);
        $stmt->bindParam(':date_start', $date_start);
        $stmt->bindParam(':date_end', $date_end);
        $stmt->bindParam(':publish', $publish);
        $stmt->bindParam(':term', $term);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
    }

    $conn = null;
    
    if ($stmt) {
        $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
        header("location: ../index.php?page=1_6_b/index_1_6_b");
    }else {
        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header("location: ../index.php?page=1_6_b/index_1_6_b");
    }
?>
