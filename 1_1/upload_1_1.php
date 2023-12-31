<?php
    session_start();
    require_once '../config/db.php';
    
    $userId = $_SESSION['userId'];
    $firstname = $_SESSION['firstname'];

    if (isset($_POST['upload'])){
        $term = base64_decode($_POST['term']);
        $year = base64_decode($_POST['year']);
        $file = $_FILES['file'];
        
        $allow = array('jpg', 'jpeg', 'png' , 'pdf','ppt','docx');
        $extension = explode('.', $file['name']);
        $fileActExt = strtolower(end($extension));
        date_default_timezone_set('Asia/Bangkok');
        $fileNew = date('Y-m-d_H-i-s'). "_" . $firstname . "." . $fileActExt;      
        $filePath = '../uploads/' . $fileNew;
    
        if (in_array($fileActExt, $allow)) {
            if ($file['size'] > 0 && $file['error'] == 0) {
                move_uploaded_file($file['tmp_name'], $filePath);
    
                $sql = "INSERT INTO personal_1_1_file (userId,term,`year`,`file`) 
                VALUES (:userId,:term,:year,:file)";
    
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':userId', $userId);
                $stmt->bindParam(':term', $term);
                $stmt->bindParam(':year', $year);
                $stmt->bindParam(':file', $fileNew);
                $stmt->execute();

                
            }
        }
    }
    
    $conn = null;
                
    if ($stmt) {
        $_SESSION['success'] = "อัปโหลดไฟล์สำเร็จ";
        header("location: ../index.php?page=1_1/index_1_1");
    }else{
        $_SESSION['error'] = "นามสกุลของไฟล์ไม่ถูกต้อง กรุณาอัปโหลดไฟล์ที่มีนามสกุลที่ถูกต้อง";
        header("location: ../index.php?page=1_1/index_1_1");
    }
?>