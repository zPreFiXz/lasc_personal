<?php
    session_start();
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
        <div class="d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex justify-content-center py-4 mt-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <img style = "max-height: 100px;" src="assets/img/logo_lasc1.png"alt="">
                    <span class="d-none d-lg-block" style="color: #ffc107;">LASC SSKRU</span>
                </a>
            </div><!-- End Logo -->
            <div class="card mt-4">
                <div class="card-body" style="padding-bottom:5px;">
                    <h3 class="card-title pb0 fs-4 mt-3" style="padding:4px;">เข้าสู่ระบบ</h3>
                    <hr>
                    <form action="signin_db.php" method="post">
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
                        <div class="mb-3">
                            <label for="email" class="form-label">อีเมล</label>
                            <input type="email" class="form-control" name="email" aria-describedby="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="signin" class="btn btn-primary">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                    <hr>
                    <p>ยังไม่เป็นสมาชิกใช่ไหม คลิ๊กที่นี่เพื่อ <a href="signup.php">สมัครสมาชิก</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
  $conn = null;
?>