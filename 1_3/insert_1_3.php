<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['submit'])) {
        $Major = $_POST['Major'];
        $level = $_POST['level'];
        $amount_student = $_POST['amount_student'];
        $amount_time = $_POST['amount_time'];
        $workplace = $_POST['workplace'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_3 (Major, level, amount_student, amount_time, workplace, amount_work)
        VALUES (:Major, :level, :amount_student, :amount_time, :workplace, :amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Major', $Major);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':amount_student', $amount_student);
        $stmt->bindParam(':amount_time', $amount_time);
        $stmt->bindParam(':workplace', $workplace);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
    }
        
            if ($stmt) {
                $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
                header("location: ../index.php?page=1_3/index_1_3");
            }else {
                $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
                header("location: ../index.php?page=1_3/index_1_3");
            }
?>
