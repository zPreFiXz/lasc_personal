<?php 
    require "../config/db.php";
    session_start();
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $check_data = $conn->prepare("SELECT password FROM users WHERE userId = :userId");
    $check_data->bindParam(":userId", $_POST['userId']);
    $check_data->execute();
    $row = $check_data->fetch(PDO::FETCH_ASSOC);

    if (password_verify($_POST['password'], $row['password'])) {
       if ($_POST['password_new'] != $_POST['c_password_new']) {
        $_SESSION['error'] = 'รหัสผ่านใหม่ไม่ตรงกัน';
        header("location: /lasc_personal/index_admin.php?page=users/account");
 
        }
    } else {
        $conn = null;
        $_SESSION['error'] = 'รหัสผ่านผิด';
        header("location: /lasc_personal/index_admin.php?page=users/account");
    }

    
    if(isset($_POST['change_password'])){
        $userId = $_POST['userId'];
        $password_new = $_POST['password_new']; 
        $hashedPassword = password_hash($password_new, PASSWORD_DEFAULT);  

        $sql = "UPDATE users SET password = :password_new WHERE userId = :userId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':password_new', $hashedPassword);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }
    if($stmt){
        $_SESSION['success'] = "เปลียนรหัสผ่านเรียบร้อยแล้ว!";
        header("location: /lasc_personal/index_admin.php?page=users/account");
    } else {
        $_SESSION['error'] = "มีบางอย่างผิดพลาด";
        header("location: /lasc_personal/index_admin.php?page=users/account");
    }
?>