<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $club = $_POST['club'];
        $level = $_POST['level'];
        $amount_student = $_POST['amount_student'];
        $group_study = $_POST['group_study'];
        $amount_time = $_POST['amount_time'];
        $term = $_POST['term'];
        $year = $_POST['year'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_2_b (userId,club, level, amount_student, group_study, amount_time,term, year, amount_work)
        VALUES (:userId,:club, :level, :amount_student, :group_study, :amount_time, :term , :year ,:amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':club', $club);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':amount_student', $amount_student);
        $stmt->bindParam(':group_study', $group_study);
        $stmt->bindParam(':amount_time', $amount_time);
        $stmt->bindParam(':term', $term);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
    }
        
            if ($stmt) {
                $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
                header("location: ../index.php?page=1_2_b/index_1_2_b");
            }else {
                $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
                header("location: ../index.php?page=1_2_b/index_1_2_b");
            }
?>
