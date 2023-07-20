<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['submit'])) {
        $code_course = $_POST['code_course'];
        $name_course = $_POST['name_course'];
        $amonut_credit = $_POST['amonut_credit'];
        $describe_column = $_POST['describe'];
        $practice = $_POST['practice'];
        $practice_subject = $_POST['practice_subject'];
        $level = $_POST['level'];
        $group_study = $_POST['group_study'];
        $amount_student = $_POST['amount_student'];
        $proportion = $_POST['proportion'];
        $amount_time = $_POST['amount_time'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_1 (code_course, name_course, amonut_credit, `describe`, practice, practice_subject, level, group_study, amount_student, proportion, amount_time, amount_work) 
        VALUES (:code_course, :name_course, :amonut_credit, :describe_column, :practice, :practice_subject, :level, :group_study, :amount_student, :proportion, :amount_time, :amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':code_course', $code_course);
        $stmt->bindParam(':name_course', $name_course);
        $stmt->bindParam(':amonut_credit', $amonut_credit);
        $stmt->bindParam(':describe_column', $describe_column);
        $stmt->bindParam(':practice', $practice);
        $stmt->bindParam(':practice_subject', $practice_subject);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':group_study', $group_study);
        $stmt->bindParam(':amount_student', $amount_student);
        $stmt->bindParam(':proportion', $proportion);
        $stmt->bindParam(':amount_time', $amount_time);
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