<?php   
    session_start();
    require "../config/db.php";

    if (isset($_POST['upload'])){
        $userId = $_POST['userId'];
        $file = $_FILES['file'];
        $lastPage = $_POST['lastPage'];

        $stmt = $conn->prepare("SELECT img FROM users WHERE userId = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $currentFile = $row['img'];

        if ($currentFile) {
            $filePath = '../profile/' . $currentFile;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
     
        
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $file['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew =  $userId . "." . $fileActExt;  
        $filePath = '../profile/'. $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($file['size'] > 0 && $file['error'] == 0) {
                move_uploaded_file($file['tmp_name'], $filePath);
    
                $sql = "UPDATE users SET img = :img WHERE userId = :userId";
    
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':userId', $userId);
                $stmt->bindParam(':img', $fileNew);
                $stmt->execute();
                unset($_SESSION['upload']);
            }
        }
    }

    $conn = null;
    
    if ($stmt) {
        $_SESSION['success'] = "เปลี่ยนรูปโปรไฟล์สำเร็จ";
        header("location: /lasc_personal/index.php?page=users/account");
    }else{
        $_SESSION['error'] = "นามสกุลของไฟล์ไม่ถูกต้อง กรุณาอัปโหลดไฟล์ที่มีนามสกุลที่ถูกต้อง";
        header("location: /lasc_personal/index.php?page=users/account");
    }
?>