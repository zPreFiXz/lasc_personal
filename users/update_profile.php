<?php   
    session_start();
    require "../config/db.php";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if (isset($_POST['upload'])){

        $userId = $_POST['userId'];
        $file = $_FILES['file'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE userId = $userId");
        $stmt->execute();
        $data = $stmt->fetch();
        $deletefilePath = '../profile/'. $data['img'];

        if (file_exists($deletefilePath)) {
            unlink($deletefilePath);
        }
        
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $file['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew =  "profile_userId_" . $userId . "." . $fileActExt;  
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
        $_SESSION['success'] = "เปลี่ยนสำเร็จ";
        header("location: ../index.php?page=users/account&lastPage=index.php?page=users/dashboard");
    }else{
        $_SESSION['error'] = "นามสกุลของไฟล์ไม่ถูกต้อง กรุณาอัปโหลดไฟล์ที่มีนามสกุลที่ถูกต้อง";
        header("location: ../index.php?page=users/account&lastPage=index.php?page=users/dashboard");
    }

?>