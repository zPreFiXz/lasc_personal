<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['update'])) {
        $id = $_SESSION['edit'];
        $number = $_POST['number'];
        $project = $_POST['project'];
        $funding = $_POST['funding'];
        $start_end = $_POST['start_end'];
        $publish = $_POST['publish'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_6_b SET number = :number, project = :project, funding = :funding , start_end = :start_end , publish = :publish , amount_work = :amount_work WHERE id = :id" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':project', $project);
        $stmt->bindParam(':funding', $funding);
        $stmt->bindParam(':start_end', $start_end);
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