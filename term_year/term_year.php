<?php 
    require_once "../config/db.php";

    if(isset($_POST['submit'])) {
        $year = $_POST['year'];
        $term = $_POST['term'];

        $sql = "UPDATE `term_year` SET year = :year , term = :term  WHERE id = 1 ";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':term', $term);
        $stmt->execute();
        
    }
    $conn = null;
    header("location: ../index_admin.php?page=admin/dashboard");
?>