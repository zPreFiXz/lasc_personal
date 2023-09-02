<?php
  session_start();
  require_once 'config/db.php';

  if (!isset($_SESSION['userId'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
  }
  if (isset($_POST['userId'])) {
    $_SESSION['userId_view'] = $_POST['userId'];
  }

  if (isset($_POST['term'])) {
    $_SESSION['term_view'] = $_POST['term'];
  }

  if (isset($_POST['year'])) {
    $_SESSION['year_view'] = $_POST['year'];
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
  </header><!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="index_admin.php?page=admin/dashboard">
          <i class=" ri-arrow-left-s-fill"></i>
          <span>กลับ</span>
        </a>
      </li><!-- End back Nav -->
      <li class="nav-heading">ตอนที่ 1</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index_details_personal.php?page=lasc_personal_admin/1_1">
          <i class="bi bi-menu-button-wide"></i>
          <span>1. ภาระงานสอน(ภาคปกติ)</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>2. ภาระงานอาจารย์ที่ปรึกษาของนักศึกษา</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index_details_personal.php?page=lasc_personal_admin/1_2_a">
              <i class="bi bi-circle"></i><span>ก. ภาระงานอาจารย์ที่ปรึกษาหมู่เรียน</span>
            </a>
          </li>
          <li>
            <a href="index_details_personal.php?page=lasc_personal_admin/1_2_b">
              <i class="bi bi-circle"></i><span>ข. ภาระงานอาจารย์ที่ปรึกษาชมรม ชุมนุม หรือที่ปรึกษาอื่น</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index_details_personal.php?page=lasc_personal_admin/1_3">
          <i class="bi bi-menu-button-wide"></i><span>3. ภาระงานอาจารย์นิเทศ</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index_details_personal.php?page=lasc_personal_admin/1_4">
          <i class="bi bi-menu-button-wide"></i><span>4. ภาระงานกิจกรรมพัฒนานักศึกษา</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>5. ภาระงานอาจารย์ที่ปรึกษางานวิจัย โครงการ</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index_details_personal.php?page=lasc_personal_admin/1_5_a">
              <i class="bi bi-circle"></i><span>ก. ภาระงานอาจารย์ที่ปรึกษางานวิจัย</span>
            </a>
          </li>
          <li>
            <a href="index_details_personal.php?page=lasc_personal_admin/1_5_b">
              <i class="bi bi-circle"></i><span>ข. ภาระงานอาจารย์ที่ปรึกษาโครงการ</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>6. ภาระงานวิจัย</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index_details_personal.php?page=lasc_personal_admin/1_6_a">
              <i class="bi bi-circle"></i><span>ก. การสร้างงานวิจัย</span>
            </a>
          </li>
          <li>
            <a href="index_details_personal.php?page=lasc_personal_admin/1_6_b">
              <i class="bi bi-circle"></i><span>ข. การเผยแพร่ รับรางวัล หรือจดสิทธิบัตร</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index_details_personal.php?page=lasc_personal_admin/1_7">
          <i class="bi bi-menu-button-wide"></i><span>7. ภาระงานผลิตผลงานทางวิชาการ</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index_details_personal.php?page=lasc_personal_admin/1_8">
          <i class="bi bi-menu-button-wide"></i><span>8. ภาระงานด้านบริการวิชาการ</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index_details_personal.php?page=lasc_personal_admin/1_9">
          <i class="bi bi-menu-button-wide"></i><span>9. ภาระงานทำนุบำรุงศิลปวัฒนธรรม</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index_details_personal.php?page=lasc_personal_admin/1_10">
          <i class="bi bi-menu-button-wide"></i><span>10. ภาระงานเฉพาะกิจที่เกี่ยวข้อง นอกจากข้อ 1-9</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index_details_personal.php?page=lasc_personal_admin/1_11">
          <i class="bi bi-menu-button-wide"></i><span>11. ภาระงานด้านการบริหาร</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-heading">ประเมินผลการปฏิบัติงาน</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="index_details_personal.php?page=lasc_personal_admin/3">
          <i class="bi bi-menu-button-wide"></i><span>แบบประเมินผลการปฏิบัติงาน(สายวิชาการ)</span>
        </a>
      </li><!-- End Components Nav -->
  </aside><!-- End Sidebar-->
  <main>
    <br>
    <br>
    <br>
    <?php
      if(isset($_GET['page'])){
        $page = $_GET['page'];
        include $page . ('.php');
      }else{
        include "lasc_personal_admin/1_1" . ('.php');
      }
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