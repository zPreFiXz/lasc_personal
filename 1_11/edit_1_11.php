<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['userId'])) {
        $userId = $_POST['userId'];
        $term = $_POST['term'];
        $year = $_POST['year'];
        $checkbox1 = isset($_POST['checkbox1']) ? 1 : 0;
        $checkbox2 = isset($_POST['checkbox2']) ? 1 : 0;
        $checkbox3 = isset($_POST['checkbox3']) ? 1 : 0;
        $checkbox4 = isset($_POST['checkbox4']) ? 1 : 0;
        $checkbox5 = isset($_POST['checkbox5']) ? 1 : 0;
        $checkbox6 = isset($_POST['checkbox6']) ? 1 : 0;
        $checkbox7 = isset($_POST['checkbox7']) ? 1 : 0;
        $checkbox8 = isset($_POST['checkbox8']) ? 1 : 0;
        $checkbox9 = isset($_POST['checkbox9']) ? 1 : 0;
        $checkbox10 = isset($_POST['checkbox10']) ? 1 : 0;
        $checkbox11 = isset($_POST['checkbox11']) ? 1 : 0;
        $checkbox12 = isset($_POST['checkbox12']) ? 1 : 0;
        $checkbox13 = isset($_POST['checkbox13']) ? 1 : 0;
        $checkbox14 = isset($_POST['checkbox14']) ? 1 : 0;
        $scope1 = $_POST['scope1'];
        $scope2 = $_POST['scope2'];
        $scope3 = $_POST['scope3'];
        $scope4 = $_POST['scope4'];
        $scope5 = $_POST['scope5'];
        $scope6 = $_POST['scope6'];
        $scope7 = $_POST['scope7'];
        $scope8 = $_POST['scope8'];
        $scope9 = $_POST['scope9'];
        $scope10 = $_POST['scope10'];
        $scope11 = $_POST['scope11'];
        $scope12 = $_POST['scope12'];
        $scope13 = $_POST['scope13'];
        $scope14 = $_POST['scope14'];
        $amount_work = $_POST['amount_work'];

        $sql = "UPDATE personal_1_11 SET checkbox1 = :checkbox1, checkbox2 = :checkbox2, checkbox3 = :checkbox3, checkbox4 = :checkbox4,
        checkbox5 = :checkbox5, checkbox6 = :checkbox6, checkbox7 = :checkbox7, checkbox8 = :checkbox8, checkbox9 = :checkbox9,
        checkbox10 = :checkbox10, checkbox11 = :checkbox11, checkbox12 = :checkbox12, checkbox13 = :checkbox13, checkbox14 = :checkbox14,
        scope1 = :scope1, scope2 = :scope2, scope3 = :scope3, scope4 = :scope4, scope5 = :scope5, scope6 = :scope6, scope7 = :scope7, 
        scope8 = :scope8, scope9 = :scope9, scope10 = :scope10, scope11 = :scope11, scope12 = :scope12, scope13 = :scope13, scope14 = :scope14,
        amount_work = :amount_work WHERE userId = :userId AND term = :term AND `year` = :year";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':term', $term);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':checkbox1', $checkbox1);
        $stmt->bindParam(':checkbox2', $checkbox2);
        $stmt->bindParam(':checkbox3', $checkbox3);
        $stmt->bindParam(':checkbox4', $checkbox4);
        $stmt->bindParam(':checkbox5', $checkbox5);
        $stmt->bindParam(':checkbox6', $checkbox6);
        $stmt->bindParam(':checkbox7', $checkbox7);
        $stmt->bindParam(':checkbox8', $checkbox8);
        $stmt->bindParam(':checkbox9', $checkbox9);
        $stmt->bindParam(':checkbox10', $checkbox10);
        $stmt->bindParam(':checkbox11', $checkbox11);
        $stmt->bindParam(':checkbox12', $checkbox12);
        $stmt->bindParam(':checkbox13', $checkbox13);
        $stmt->bindParam(':checkbox14', $checkbox14);
        $stmt->bindParam(':scope1', $scope1);
        $stmt->bindParam(':scope2', $scope2);
        $stmt->bindParam(':scope3', $scope3);
        $stmt->bindParam(':scope4', $scope4);
        $stmt->bindParam(':scope5', $scope5);
        $stmt->bindParam(':scope6', $scope6);
        $stmt->bindParam(':scope7', $scope7);
        $stmt->bindParam(':scope8', $scope8);
        $stmt->bindParam(':scope9', $scope9);
        $stmt->bindParam(':scope10', $scope10);
        $stmt->bindParam(':scope11', $scope11);
        $stmt->bindParam(':scope12', $scope12);
        $stmt->bindParam(':scope13', $scope13);
        $stmt->bindParam(':scope14', $scope14);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();

        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=1_11/index_1_11");
        } else {
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=1_11/index_1_11");
        }
    }
?>
