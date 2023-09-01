<?php
session_start();
require_once "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>LASC SSKRU</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo_lasc.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center ">
            <div class="d-flex justify-content-center py-4 mt-1">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <img style="max-height: 100px;" src="assets/img/logo_lasc1.png" alt="">
                    <span class="d-none d-lg-block" style="color: #ffc107;">LASC SSKRU</span>
                </a>
            </div>
            <div class="card col-md-6">
                <div class="card-body" style="padding-bottom:0px;">
                    <h3 class="card-title pb0 fs-4 mt-3" style="padding:0px;">สมัครสมาชิก</h3>
                    <hr>
                    <form action="signup_db.php" method="post">
                        <?php if (isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?>
                            </div>
                            <script>
                                setTimeout(function() {
                                    document.getElementById('alert-success').style.display = 'none';
                                }, 3000);
                            </script>
                        <?php } ?>
                        <?php if (isset($_SESSION['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                                ?>
                            </div>
                            <script>
                                setTimeout(function() {
                                    document.getElementById('alert-success').style.display = 'none';
                                }, 3000);
                            </script>
                        <?php } ?>
                        <?php if (isset($_SESSION['warning'])) { ?>
                            <div class="alert alert-warning" role="alert">
                                <?php
                                echo $_SESSION['warning'];
                                unset($_SESSION['warning']);
                                ?>
                            </div>
                            <script>
                                setTimeout(function() {
                                    document.getElementById('alert-success').style.display = 'none';
                                }, 3000);
                            </script>
                        <?php } ?>
                        <div class="mb-3">
                            <label for="academic_rank" class="form-label">ตำแหน่งทางวิชาการ</label>
                            <select class="form-select" name="academic_rank" id="academic_rank" aria-describedby="academic_rank">
                                <option value="กรุณาเลือก" selected >กรุณาเลือก</option>
                                <option value="ไม่มี">ไม่มี</option>
                                <option value="ผู้ช่วยศาสตราจารย์">ผู้ช่วยศาสตราจารย์</option>
                                <option value="รองศาสตราจารย์">รองศาสตราจารย์</option>
                                <option value="ศาสตราจารย์">ศาสตราจารย์</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nametitle" class="form-label">คำนำหน้าชื่อ</label>
                            <select class="form-select" name="nametitle" aria-describedby="nametitle" id="nametitle">
                                <option value="กรุณาเลือก" selected >กรุณาเลือก</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="ดร.">ดร.</option>
                            </select>
                        </div>            
                        <div class="mb-3">
                            <label for="firstname" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" name="firstname" aria-describedby="firstname">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" name="lastname" aria-describedby="lastname">
                        </div>
                        <div class="mb-3">
                            <label for="branch" class="form-label">สาขาวิชา</label>
                            <select class="form-select" name="branch" aria-describedby="branch" id="branch">
                                <option value="กรุณาเลือก" selected >กรุณาเลือก</option>
                                <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                                <option value="เทคโนโลยีคอมพิวเตอร์และดิจิทัล">เทคโนโลยีคอมพิวเตอร์และดิจิทัล</option>
                                <option value="สาธารณสุขชุมชน">สาธารณสุขชุมชน</option>
                                <option value="วิทยาศาสตร์การกีฬา">วิทยาศาสตร์การกีฬา</option>
                                <option value="เทคโนโลยีการเกษตร">เทคโนโลยีการเกษตร</option>
                                <option value="เทคโนโลยีและนวัตกรรมอาหาร">เทคโนโลยีและนวัตกรรมอาหาร</option>
                                <option value="อาชีวอนามัยและความปลอดภัย">อาชีวอนามัยและความปลอดภัย</option>
                                <option value="วิศวกรรมซอฟต์แวร์">วิศวกรรมซอฟต์แวร์</option>
                                <option value="วิศวกรรมโลจิสติกส์">วิศวกรรมโลจิสติกส์</option>
                                <option value="วิศวกรรมการจัดการอุตสาหกรรมและสิ่งแวดล้อม">วิศวกรรมการจัดการอุตสาหกรรมและสิ่งแวดล้อม</option>
                                <option value="การออกแบบผลิตภัณฑ์และนวัตกรรมวัสดุ">การออกแบบผลิตภัณฑ์และนวัตกรรมวัสดุ</option>
                                <option value="เทคโนโลยีโยธาและสถาปัตยกรรม">เทคโนโลยีโยธาและสถาปัตยกรรม</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">อีเมล</label>
                            <input type="email" class="form-control" name="email" aria-describedby="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="confirm password" class="form-label">ยืนยันรหัสผ่าน</label>
                            <input type="password" class="form-control" name="c_password">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="signup" class="btn btn-primary">ลงทะเบียน</button>
                        </div>
                    </form>
                    <hr>
                    <p>เป็นสมาชิกแล้วใช่ไหม คลิกที่นี่เพื่อ <a href="signin.php">เข้าสู่ระบบ</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
$conn = null;
?>

</html>