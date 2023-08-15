<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $code_course = $_POST['code_course'];
        $name_course = $_POST['name_course'];
        $unit = $_POST['unit'];
        $practice_subject = $_POST['practice_subject'];
        $level = $_POST['level'];
        $group_study = $_POST['group_study'];
        $amount_student = $_POST['amount_student'];
        $proportion = $_POST['proportion'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_1 (userId,code_course, name_course, unit, practice_subject, level, group_study, amount_student, proportion, amount_work) 
        VALUES (:userId,:code_course, :name_course, :unit, :practice_subject, :level, :group_study, :amount_student, :proportion, :amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':code_course', $code_course);
        $stmt->bindParam(':name_course', $name_course);
        $stmt->bindParam(':unit', $unit);
        $stmt->bindParam(':practice_subject', $practice_subject);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':group_study', $group_study);
        $stmt->bindParam(':amount_student', $amount_student);
        $stmt->bindParam(':proportion', $proportion);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
    }

    if ($stmt) {
        $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
        header("location: ../index.php?page=1_1/index_1_1");
    }else{
        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header("location: ../index.php?page=1_1/index_1_1");
    }
?>