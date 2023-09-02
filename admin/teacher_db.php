<?php 
    session_start();
    require_once '../config/db.php';
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if (isset($_POST['signup'])) {
        $academic_rank = $_POST['academic_rank'];
        $nametitle = $_POST['nametitle'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $branch = $_POST['branch'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $isAdmin = $_POST['isAdmin'];
        $urole = 'teacher';

        if (empty($academic_rank)) {
            $_SESSION['error'] = 'กรุณากรอกตำแหน่งทางวิชาการ';
            header("location: index_admin.php?page=admin/teacher");
        } else if (empty($nametitle)) {
            $_SESSION['error'] = 'กรุณากรอกคำนำหน้า';
            header("location: index_admin.php?page=admin/teacher");
        } else if (empty($firstname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header("location: index_admin.php?page=admin/teacher");
        } else if (empty($lastname)) {
            $_SESSION['error'] = 'กรุณากรอกนามสกุล';
            header("location: index_admin.php?page=admin/teacher");
        } else if (empty($branch)) {
            $_SESSION['error'] = 'กรุณากรอกสาขาวิชา';
            header("location: index_admin.php?page=admin/teacher");
        } else if (empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: index_admin.php?page=admin/teacher");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            header("location: index_admin.php?page=admin/teacher");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: index_admin.php?page=admin/teacher");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: index_admin.php?page=admin/teacher");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
            header("location: index_admin.php?page=admin/teacher");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
            header("location: index_admin.php?page=admin/teacher");
        } else if ($password != $c_password) {
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header("location: index_admin.php?page=admin/teacher");
        } else {
            try {
                $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: index_admin.php?page=admin/teacher");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(academic_rank,nametitle,firstname, lastname, branch, email, password, urole,isAdmin) 
                                            VALUES(:academic_rank,:nametitle, :firstname, :lastname, :branch, :email, :password, :urole,:isAdmin)");
                    $stmt->bindParam(":academic_rank", $academic_rank);
                    $stmt->bindParam(":nametitle", $nametitle);
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":branch", $branch);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->bindParam(":isAdmin", $isAdmin);
                    $stmt->execute();
                    
                    $_SESSION['success'] = "เพิ่มผู้ใช้งานเรียบร้อยแล้ว! <a href='signin.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: /lasc_personal/index_admin.php?page=admin/teacher");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: /lasc_personal/index_admin.php?page=admin/teacher");
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    $conn = null;
?>