<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['update'])) {
        $id = $_SESSION['edit'];
        $project = $_POST['project'];
        $funding = $_POST['funding'];
        $date_start = $_POST['date_start'];
        $date_end = $_POST['date_end'];
        $publish = $_POST['publish'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_6_b SET project = :project, funding = :funding , start = :date_start,end = :date_end , publish = :publish , amount_work = :amount_work WHERE id = :id" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':project', $project);
        $stmt->bindParam(':funding', $funding);
        $stmt->bindParam(':date_start', $date_start);
        $stmt->bindParam(':date_end', $date_end);
        $stmt->bindParam(':publish', $publish);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        unset( $_SESSION['edit']);
        
        $conn = null;
        
        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=1_6_b/index_1_6_b");
        }else {
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=1_6_b/index_1_6_b");
        }
    }
?>