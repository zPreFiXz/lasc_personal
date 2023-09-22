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
                                $_SESSION['academic_rank'] = $row['academic_rank'];
                                $_SESSION['nametitle'] = $row['nametitle'];
                                $_SESSION['firstname'] = $row['firstname'];
                                $_SESSION['lastname'] = $row['lastname'];
                                $_SESSION['branch'] = $row['branch'];
                                $_SESSION['isAdmin'] = $row['isAdmin'];

                                $stmt = $conn->query("SELECT * FROM term_year where id = 1");
                                $stmt->execute();
                                $term_year = $stmt->fetch();
                                $term =  $term_year['term'];
                                $year =  $term_year['year'];

                                $totalAmountWork = $_SESSION['totalAmountWork'];
                                $userId = $_SESSION['userId'];
                                $academic_rank = $_SESSION['academic_rank'];
                                $nametitle = $_SESSION['nametitle'];
                                $firstname = $_SESSION['firstname'];
                                $lastname = $_SESSION['lastname'];
                                $branch = $_SESSION['branch'];

                                $stmt = $conn->prepare("SELECT * FROM vadmin WHERE userId = :userId AND term = :term AND year = :year");
                                $stmt->bindParam(':userId', $userId);
                                $stmt->bindParam(':term', $term);
                                $stmt->bindParam(':year', $year);
                                $stmt->execute();
                                $users = $stmt->fetch();

                                if (empty($users)) {
                                    $insertStmt = $conn->prepare("INSERT INTO vadmin (userId, term, year, academic_rank,nametitle, firstname, lastname, amount_work) VALUES (:userId, :term, :year, :academic_rank, :nametitle, :firstname, :lastname, :amount_work)");
                                    $insertStmt->bindParam(':userId', $userId);
                                    $insertStmt->bindParam(':term', $term);
                                    $insertStmt->bindParam(':year', $year);
                                    $insertStmt->bindParam(':academic_rank', $academic_rank);
                                    $insertStmt->bindParam(':nametitle', $nametitle);
                                    $insertStmt->bindParam(':firstname', $firstname);
                                    $insertStmt->bindParam(':lastname', $lastname);
                                    $insertStmt->bindParam(':amount_work', $totalAmountWork);
                                    $insertStmt->execute();
                                }
                              
                                $stmt = $conn->prepare("SELECT*FROM personal_1_11 WHERE userId = :userId AND term = :term AND year = :year");
                                $stmt->bindParam(':userId', $userId);
                                $stmt->bindParam(':term', $term);
                                $stmt->bindParam(':year', $year);
                                $stmt->execute();
                                $personal = $stmt->fetchAll();
                              
                                if (empty($personal)) {                              
                                  $insertStmt = $conn->prepare("INSERT INTO personal_1_11 (userId, term, `year`) VALUES (:userId, :term, :year)");
                                  $insertStmt->bindParam(':userId', $userId);
                                  $insertStmt->bindParam(':term', $term);
                                  $insertStmt->bindParam(':year', $year);
                                  $insertStmt->execute();
                                }

                                $stmt = $conn->prepare("SELECT * FROM personal_3 WHERE userId = :userId AND term = :term AND year = :year");
                                $stmt->bindParam(':userId', $userId);
                                $stmt->bindParam(':term', $term);
                                $stmt->bindParam(':year', $year);
                                $stmt->execute();
                                $personal = $stmt->fetchAll();

                                if (empty($personal)) {
                                    if($row['academic_rank'] == 'ไม่มี'){
                                    $name = $row['nametitle'] . $row['firstname'] . ' ' . $row['lastname'];
                                    }elseif(($row['academic_rank'] == 'ศาสตราจารย์' or $row['academic_rank'] == 'รองศาสตราจารย์' or $row['academic_rank'] == 'ผู้ช่วยศาสตราจารย์')and $row['nametitle'] == 'ดร.'){
                                    $name = $row['academic_rank'] . ' ' . $row['nametitle'] . $row['firstname'] . ' ' . $row['lastname'];
                                    }elseif(($row['academic_rank'] == 'ศาสตราจารย์' or $row['academic_rank'] == 'รองศาสตราจารย์' or $row['academic_rank'] == 'ผู้ช่วยศาสตราจารย์')and ($row['nametitle'] == 'นาย' or $row['nametitle'] == 'นาง' or $row['nametitle'] == 'นางสาว')){
                                    $name = $row['academic_rank'] . $row['firstname'] . ' ' . $row['lastname'];
                                    }
                                
                                    $insertStmt = $conn->prepare("INSERT INTO personal_3 (userId, term, year,name,branch,amount_work) VALUES (:userId, :term, :year, :name, :branch, :amount_work)");
                                    $insertStmt->bindParam(':userId', $userId);
                                    $insertStmt->bindParam(':term', $term);
                                    $insertStmt->bindParam(':year', $year);
                                    $insertStmt->bindParam(':name', $name);
                                    $insertStmt->bindParam(':branch', $branch);
                                    $insertStmt->bindParam(':amount_work', $totalAmountWork);
                                    $insertStmt->execute();
                                }

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