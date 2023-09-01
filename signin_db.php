<?php 
    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: signin.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            exit("Invalid email format");
            header("location: signin.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: signin.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: signin.php");
        } else {
            try {
                $check_data = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $check_data->bindParam(":email", $email);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);
                if ($check_data->rowCount() > 0) {
                    if ($email == $row['email']) {
                        if (password_verify($password, $row['password'])) {
                            if ($row['urole'] == 'teacher' OR $row['urole'] == 'officer'){
                                $_SESSION['userId'] = $row['userId'];
                                $_SESSION['nametitle'] = $row['nametitle'];
                                $_SESSION['firstname'] = $row['firstname'];
                                $_SESSION['lastname'] = $row['lastname'];
                                $_SESSION['branch'] = $row['branch'];
                                $_SESSION['isAdmin'] = $row['isAdmin'];
                                header("location: index.php?page=users/dashboard");
                            }
                        } else {
                            $conn = null;
                            $_SESSION['error'] = 'รหัสผ่านผิด';
                            header("location: signin.php");
                        }
                    } else {
                        $conn = null;
                        $_SESSION['error'] = 'อีเมลผิด';
                        header("location: signin.php");
                    }
                } else {
                    $conn = null;
                    $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
                    header("location: signin.php");
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    $conn = null;
?>