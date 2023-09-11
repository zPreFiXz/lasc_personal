<?php 
    require "../config/db.php";
    session_start();

    if (isset($_POST['edit'])) {
        $userId = $_POST['userId'];
        $password_new = $_POST['password_new'];

        // เพิ่มการตรวจสอบความยาวขั้นต่ำ
        if (strlen($password_new) < 5 || strlen($password_new) > 20) {
            $_SESSION['error'] = 'รหัสผ่านใหม่ต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: /lasc_personal/index.php?page=users/password");
            exit; // ออกจากการประมวลผลเพื่อป้องกันการดำเนินการต่อ
        }

        $check_data = $conn->prepare("SELECT password FROM users WHERE userId = :userId");
        $check_data->bindParam(":userId", $_POST['userId']);
        $check_data->execute();
        $row = $check_data->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST['password'], $row['password'])) {
            if ($_POST['password_new'] != $_POST['c_password_new']) {
                $_SESSION['error'] = 'รหัสผ่านใหม่ไม่ตรงกัน';
                header("location: /lasc_personal/index.php?page=users/password");
            } else {
                $hashedPassword = password_hash($password_new, PASSWORD_DEFAULT);  

                $sql = "UPDATE users SET password = :password_new WHERE userId = :userId";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':password_new', $hashedPassword);
                $stmt->bindParam(':userId', $userId);
                $stmt->execute();
            }
        } else {
            $conn = null;
            $_SESSION['error'] = 'รหัสผ่านผิด';
            header("location: /lasc_personal/index.php?page=users/password");
        }

        if($stmt){
            $_SESSION['success'] = "เปลี่ยนรหัสผ่านสำเร็จ";
            header("location: /lasc_personal/index.php?page=users/password");
        }
    }
?>
