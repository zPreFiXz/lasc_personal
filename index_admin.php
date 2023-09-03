<?php
  session_start();
  require_once 'config/db.php';

  if (!isset($_SESSION['userId'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
  }

  $userId = $_SESSION['userId'];
  $nametitle = $_SESSION['nametitle'];
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];

  if (isset($_SESSION['userId'])) {
    $stmt = $conn->query("SELECT * FROM users WHERE userId = '$userId'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  }
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a class="logo d-flex align-items-center">
        <img src="assets/img/logo_lasc1.png" alt="โลโก้คณะ">
        <span class="d-none d-lg-block" style="color: #ffc107;">LASC SSKRU</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-person-circle"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2">
            <?php
                if($row['academic_rank'] == 'ไม่มี'){
                    echo  ' ' . $row['nametitle'] . ' ' .  $row['firstname'] . ' ' . $row['lastname'];
                }elseif($row['academic_rank'] == 'ศาสตราจารย์'){
                    echo $row['academic_rank'] . ' ' .  $row['firstname'] . ' ' . $row['lastname'];
                }elseif(($row['academic_rank'] == 'รองศาสตราจารย์' or $row['academic_rank'] == 'ผู้ช่วยศาสตราจารย์') and $row['nametitle'] == "ดร." ){
                    echo $row['academic_rank'] . ' ' . $row['nametitle'] . ' ' .  $row['firstname'] . ' ' . $row['lastname'];
                }else {
                    echo $row['academic_rank'] . ' ' .  $row['firstname'] . ' ' . $row['lastname'];
                }
            ?>
            
            </span>
          </a><!-- End Profile Iamge Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            <?php
                if($row['academic_rank'] == 'ไม่มี'){
                    echo  ' ' . $row['nametitle'] . ' ' .  $row['firstname'] . ' ' . $row['lastname'];
                }elseif($row['academic_rank'] == 'ศาสตราจารย์'){
                    echo $row['academic_rank'] . ' ' .  $row['firstname'] . ' ' . $row['lastname'];
                }elseif(($row['academic_rank'] == 'รองศาสตราจารย์' or $row['academic_rank'] == 'ผู้ช่วยศาสตราจารย์') and $row['nametitle'] == "ดร." ){
                    echo $row['academic_rank'] . ' ' . $row['nametitle'] . ' ' .  $row['firstname'] . ' ' . $row['lastname'];
                }else {
                    echo $row['academic_rank'] . ' ' .  $row['firstname'] . ' ' . $row['lastname'];
                }
            ?>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="index_admin.php?page=users/account">
                <i class="bi bi-file-person-fill"></i>
                <span>จัดการบัญชี</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>ออกจากระบบ</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="index_admin.php?page=admin/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index_admin.php?page=admin/change_term_year">
          <i class="bi bi-menu-button-wide"></i>
          <span>เปลี่ยนปีการศึกษาและภาคเรียน</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>รายชื่อผู้ใช้งาน</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index_admin.php?page=admin/teacher">
              <i class="bi bi-circle"></i><span>รายชื่ออาจารย์</span>
            </a>
          </li>
          <li>
            <a href="index_admin.php?page=admin/officer">
              <i class="bi bi-circle"></i><span>รายชื่อเจ้าหน้าที่</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
    </ul>
  </aside><!-- End Sidebar-->
  <main>
    <br>
    <br>
    <br>
    <?php
    $page = $_GET['page'];
    include $page . ('.php');
    ?>
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
<?php 
  $conn = null;
?>
</html>
