<?php
    session_start();
    require_once '../config/db.php';

    if (isset($_POST['upload'])){
        $id = $_SESSION['upload'];
        $file = $_FILES['file'];
    
        $allow = array('jpg', 'jpeg', 'png' , 'pdf','ppt','docx');
        $extension = explode('.', $file['name']);
        $fileActExt = strtolower(end($extension));
        date_default_timezone_set('Asia/Bangkok');
        $fileNew = date('Y-m-d_H-i-s'). "." . $fileActExt;        $filePath = '../uploads/' . $fileNew;
    
        if (in_array($fileActExt, $allow)) {
            if ($file['size'] > 0 && $file['error'] == 0) {
                move_uploaded_file($file['tmp_name'], $filePath);
    
                $sql = "UPDATE personal_1_6_a SET file = :file WHERE id = :id";
    
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':file', $fileNew);
                $stmt->execute();
                unset($_SESSION['upload']);
            }
        }
    }
        
    if ($stmt) {
        $_SESSION['success'] = "อัปโหลดไฟล์สำเร็จ";
        header("location: ../index.php?page=1_6_a/index_1_6_a");
    }else{
        $_SESSION['error'] = "อัปโหลดไฟล์ไม่สำเร็จ";
        header("location: ../index.php?page=1_6_a/index_1_6_a");
    }
?>