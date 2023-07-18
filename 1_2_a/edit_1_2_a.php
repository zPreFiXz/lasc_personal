<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['update'])) {
        $major = $_POST['major'];
        $code = $_POST['code'];
        $level = $_POST['level'];
        $group_study = $_POST['group_study'];
        $amount_student = $_POST['amount_student'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_2_a SET major = :major,code = :code,level = :level,group_study = :group_study,amount_student = :amount_student,amount_work = :amount_work WHERE code = :code";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':major', $major);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':group_study', $group_study);
        $stmt->bindParam(':amount_student', $amount_student);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();

        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=1_2_a/index_1_2_a");
        }else{
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=1_2_aindex_1_2_a");
        }
}
?>