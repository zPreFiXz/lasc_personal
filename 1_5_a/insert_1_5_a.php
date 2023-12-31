<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $major = $_POST['major'];
        $level = $_POST['level'];
        $name_project = $_POST['name_project'];
        $amount_teacher = $_POST['amount_teacher'];
        $teacher = $_POST['teacher'];
        $amount_student = $_POST['amount_student'];
        $term = $_POST['term'];
        $year = $_POST['year'];
        $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_5_a (userId,major, level, name_project, amount_teacher, teacher, amount_student, term, year,amount_work)
        VALUES (:userId,:major, :level, :name_project, :amount_teacher, :teacher, :amount_student, :term, :year, :amount_work)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':major', $major);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':name_project', $name_project);
        $stmt->bindParam(':amount_teacher', $amount_teacher);
        $stmt->bindParam(':teacher', $teacher);
        $stmt->bindParam(':amount_student', $amount_student);
        $stmt->bindParam(':term', $term);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
    }

    $conn = null;
    
    if ($stmt) {
        $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
        header("location: ../index.php?page=1_5_a/index_1_5_a");
    }else {
        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header("location: ../index.php?page=1_5_a/index_1_5_a");
    }
?>
