<?php 
    require_once "../config/db.php";
    session_start();

    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $year = $_POST['year'];
        $term = $_POST['term'];

        $sql = "UPDATE `term_year` SET year = :year , term = :term  WHERE id = :id ";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':term', $term);
        $stmt->execute();
        
    }

    $conn = null;
    
    if($id == 1){
        if($stmt){
            $_SESSION['success'] = "เปลี่ยนเรียบร้อยแล้ว";
            header("location: /lasc_personal/index_admin.php?page=admin/change_term_year");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: /lasc_personal/index_admin.php?page=admin/change_term_year");
        }
    }
?>