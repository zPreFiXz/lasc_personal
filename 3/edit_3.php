<?php
    session_start();
    require_once "../config/db.php";

    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $branch = $_POST['branch'];
        $amount_work = $_POST['amount_work'];
        $quality_work = $_POST['quality_work'];
        $efficiency_work = $_POST['efficiency_work'];
        $effectiveness_work = $_POST['effectiveness_work'];
        $score_work = $_POST['score_work'];
        $quality_ethics = $_POST['quality_ethics'];
        $efficiency_ethics = $_POST['efficiency_ethics'];
        $effectiveness_ethics = $_POST['effectiveness_ethics'];
        $score_ethics = $_POST['score_ethics'];
        $quality_capacity = $_POST['quality_capacity'];
        $efficiency_capacity = $_POST['efficiency_capacity'];
        $effectiveness_capacity = $_POST['effectiveness_capacity'];
        $score_capacity = $_POST['score_capacity'];
        $quality_more = $_POST['quality_more'];
        $efficiency_more = $_POST['efficiency_more'];
        $effectiveness_more	= $_POST['effectiveness_more'];
        $score_more	= $_POST['score_more'];
        $quality_total	= $_POST['quality_total'];
        $efficiency_total = $_POST['efficiency_total'];
        $effectiveness_total = $_POST['effectiveness_total'];
        $score_total = $_POST['score_total'];

        $sql = "UPDATE personal_3 SET name = :name, branch = :branch, amount_work = :amount_work , quality_work = :quality_work,
        efficiency_work = :efficiency_work ,effectiveness_work = :effectiveness_work,score_work = :score_work,
        quality_ethics = :quality_ethics,efficiency_ethics = :efficiency_ethics,effectiveness_ethics = :effectiveness_ethics,score_ethics = :score_ethics,
        quality_capacity = :quality_capacity,efficiency_capacity = :efficiency_capacity,effectiveness_capacity = :effectiveness_capacity,
        score_capacity = :score_capacity,quality_more = :quality_more,efficiency_more = :efficiency_more,effectiveness_more	= :effectiveness_more,
        score_more = :score_more,quality_total = :quality_total,efficiency_total = :efficiency_total,effectiveness_total = :effectiveness_total,
        score_total = :score_total WHERE id = :id" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':branch', $branch);
        $stmt->bindParam(':amount_work', $amount_work);
        $stmt->bindParam(':quality_work', $quality_work);
        $stmt->bindParam(':efficiency_work', $efficiency_work);
        $stmt->bindParam(':effectiveness_work', $effectiveness_work);
        $stmt->bindParam(':score_work', $score_work);
        $stmt->bindParam(':quality_ethics', $quality_ethics);
        $stmt->bindParam(':efficiency_ethics', $efficiency_ethics);
        $stmt->bindParam(':effectiveness_ethics', $effectiveness_ethics);
        $stmt->bindParam(':score_ethics', $score_ethics);
        $stmt->bindParam(':quality_capacity', $quality_capacity);
        $stmt->bindParam(':efficiency_capacity', $efficiency_capacity);
        $stmt->bindParam(':effectiveness_capacity', $effectiveness_capacity);
        $stmt->bindParam(':score_capacity', $score_capacity);
        $stmt->bindParam(':quality_more', $quality_more);
        $stmt->bindParam(':efficiency_more', $efficiency_more);
        $stmt->bindParam(':effectiveness_more', $effectiveness_more);
        $stmt->bindParam(':score_more', $score_more);
        $stmt->bindParam(':quality_total', $quality_total);
        $stmt->bindParam(':efficiency_total', $efficiency_total);
        $stmt->bindParam(':effectiveness_total', $effectiveness_total);
        $stmt->bindParam(':score_total', $score_total);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $conn = null;

        if ($stmt) {
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            header("location: ../index.php?page=3/index_3");
        }else {
            $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header("location: ../index.php?page=3/index_3");
        }
    }
?>