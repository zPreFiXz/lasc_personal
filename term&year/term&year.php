<?php 
    require_once "../config/db.php";

    if(isset($_POST['submit'])) {
        $year = $_POST['year'];
        $term = $_POST['term'];

        $sql = "UPDATE `term&year` SET year = :year , term = :term  WHERE id = 1 ";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':term', $term);
        $stmt->execute();
        
    }
    header("location: ../index.php?page=admin");
?>
