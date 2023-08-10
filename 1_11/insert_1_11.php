<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $checkbox = $_POST['gridCheck1'];
        $scope = $_POST['scope1'];
        $term = $_POST['term'];
        $year = $_POST['year'];
        // $date = $_POST['date'];
        // $type = $_POST['type'];
        // $subject = $_POST['subject'];
        // $location = $_POST['location'];
        // $nature_work = $_POST['nature_work'];
        // $hours = $_POST['hours'];
        // $amount_work = $_POST['amount_work'];

        $sql = "INSERT INTO personal_1_11 (userId,chancellor_check,chancellor,term,year) 
        VALUES (:userId,:chancellor_check,:chancellor,:term,    :year)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':chancellor_check', $checkbox);
        $stmt->bindParam(':chancellor', $scope);
        $stmt->bindParam(':term', $term);
        $stmt->bindParam(':year', $year);
        
        // $stmt->bindParam(':date', $date);
        // $stmt->bindParam(':type', $type);
        // $stmt->bindParam(':subject', $subject);
        // $stmt->bindParam(':location', $location);
        // $stmt->bindParam(':nature_work', $nature_work);
        // $stmt->bindParam(':hours', $hours);
        // $stmt->bindParam(':amount_work', $amount_work);
        $stmt->execute();
        }

    if ($stmt) {
        $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
        header("location: ../index.php?page=1_11/index_1_11");
    }else{
        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header("location: ../index.php?page=1_11/index_1_11");
    }
?>