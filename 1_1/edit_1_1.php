<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['update'])) {
        $id = $_SESSION['edit'];
        $term = $_POST['term'];
        $year = $_POST['year'];
        $code_course = $_POST['code_course'];
        $name_course = $_POST['name_course'];
        $unit = $_POST['unit'];
        $prepare_theory = $_POST['prepare_theory'];
        $hour_lecture = $_POST['hour_lecture'];
        $check_work1 = $_POST['check_work1'];
        $prepare_practice = $_POST['prepare_practice'];
        $hour_practice = $_POST['hour_practice'];
        $check_work2 = $_POST['check_work2'];
        $practice_subject = $_POST['practice_subject'];
        $level = $_POST['level'];
        $group_study = $_POST['group_study'];
        $amount_student = $_POST['amount_student'];
        $proportion = $_POST['proportion'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_1 SET code_course = :code_course, name_course = :name_course, unit = :unit, prepare_theory = :prepare_theory,
            hour_lecture = :hour_lecture, check_work1 = :check_work1, prepare_practice = :prepare_practice, hour_practice = :hour_practice, check_work2 = :check_work2,
            practice_subject = :practice_subject, level = :level, group_study = :group_study, amount_student = :amount_student, proportion = :proportion, amount_work = :amount_work WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':code_course', $code_course);
        $stmt->bindParam(':name_course', $name_course);
        $stmt->bindParam(':unit', $unit);
        $stmt->bindParam(':prepare_theory', $prepare_theory);
        $stmt->bindParam(':hour_lecture', $hour_lecture);
        $stmt->bindParam(':check_work1', $check_work1);
        $stmt->bindParam(':prepare_practice', $prepare_practice);
        $stmt->bindParam(':hour_practice', $hour_practice);
        $stmt->bindParam(':check_work2', $check_work2);
        $stmt->bindParam(':practice_subject', $practice_subject);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':group_study', $group_study);
        $stmt->bindParam(':amount_student', $amount_student);
        $stmt->bindParam(':proportion', $proportion);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        unset( $_SESSION['edit']);

        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=1_1/index_1_1");
        }else{
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=1_1/index_1_1");
        }
}
?>