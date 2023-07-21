<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['submit'])) {
        $number = $_POST['number'];
        $project = $_POST['project'];
        $funding = $_POST['funding'];
        $start_end = $_POST['start_end'];
        $publish = $_POST['publish'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_6_b (number, project, funding, start_end, publish, amount_work)
        VALUES (:number, :project, :funding, :start_end, :publish, :amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':project', $project);
        $stmt->bindParam(':funding', $funding);
        $stmt->bindParam(':start_end', $start_end);
        $stmt->bindParam(':publish', $publish);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
    }
        
            if ($stmt) {
                $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
                header("location: ../index.php?page=1_6_b/index_1_6_b");
            }else {
                $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
                header("location: ../index.php?page=1_6_b/index_1_6_b");
            }
?>