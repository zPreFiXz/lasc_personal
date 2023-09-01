<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['update'])) {
        $id = $_SESSION['edit'];
        $major = $_POST['major'];
        $level = $_POST['level'];
        $name_project = $_POST['name_project'];
        $amount_teacher = $_POST['amount_teacher'];
        $teacher = $_POST['teacher'];
        $amount_student = $_POST['amount_student'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_5_a SET major = :major, level = :level, name_project = :name_project , amount_teacher = :amount_teacher , teacher = :teacher ,amount_student = :amount_student, amount_work = :amount_work WHERE id = :id" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':major', $major);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':name_project', $name_project);
        $stmt->bindParam(':amount_teacher', $amount_teacher);
        $stmt->bindParam(':teacher', $teacher);
        $stmt->bindParam(':amount_student', $amount_student);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        unset( $_SESSION['edit']);

        $conn = null;
        
        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=1_5_a/index_1_5_a");
        }else {
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=1_5_a/index_1_5_a");
        }
    }
?>