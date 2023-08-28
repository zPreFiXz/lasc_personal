<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $checkbox = $_POST['checkbox']; //"1,3,5"
        $scope = $_POST['scope'];
        $term = $_POST['term'];
        $year = $_POST['year'];

        // foreach($checkbox as $id)
        // {
            // $scope = $_POST['scope'.$id];

        // }

        $sql = "INSERT INTO personal_1_11 (userId,checkbox,scope,term,year) 
        VALUES (:userId,:checkbox,:scope,:term,:year)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':checkbox', $checkbox);
        $stmt->bindParam(':scope', $scope);
        $stmt->bindParam(':term', $term);
        $stmt->bindParam(':year', $year);
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