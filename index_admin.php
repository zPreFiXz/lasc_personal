<?php
  session_start();
  require_once 'config/db.php';

  if (!isset($_SESSION['userId'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
  }

  $userId = $_SESSION['userId'];
  $nametitle = $_SESSION['nametitle'];

  $stmt = $conn->query("SELECT * FROM term_year where id = 1");
  $stmt->execute();
  $term_year = $stmt->fetch();
  $term =  $term_year['term'];
  $year =  $term_year['year'];

  $stmt = $conn->query("SELECT amount_work FROM personal_1_1 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_1 = $stmt->fetchAll();

  $totalAmountWork_1_1 = 0;
  foreach ($personal_1_1 as $per_1_1) {
    $totalAmountWork_1_1 += floatval($per_1_1['amount_work']);
  }

  $stmt = $conn->query("SELECT amount_work FROM personal_1_2_a WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_2_a = $stmt->fetchAll();

  $totalAmountWork_1_2_a = 0;
  foreach ($personal_1_2_a as $per_1_2_a) {
    $totalAmountWork_1_2_a += floatval($per_1_2_a['amount_work']);
  }

  $stmt = $conn->query("SELECT amount_work FROM personal_1_2_b WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_2_b = $stmt->fetchAll();

  $totalAmountWork_1_2_b = 0;
  foreach ($personal_1_2_b as $per_1_2_b) {
    $totalAmountWork_1_2_b += floatval($per_1_2_b['amount_work']);
  }
  $totalAmountWork_1_2 = $totalAmountWork_1_2_a + $totalAmountWork_1_2_b;

  $stmt = $conn->query("SELECT amount_work FROM personal_1_3 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_3 = $stmt->fetchAll();

  $totalAmountWork_1_3 = 0;
  foreach ($personal_1_3 as $per_1_3) {
    $totalAmountWork_1_3 += floatval($per_1_3['amount_work']);
  }

  $stmt = $conn->query("SELECT amount_work FROM personal_1_4 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_4 = $stmt->fetchAll();

  $totalAmountWork_1_4 = 0;
  foreach ($personal_1_4 as $per_1_4) {
    $totalAmountWork_1_4 += floatval($per_1_4['amount_work']);
  }

  $stmt = $conn->query("SELECT amount_work FROM personal_1_5_a WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_5_a = $stmt->fetchAll();

  $totalAmountWork_1_5_a = 0;
  foreach ($personal_1_5_a as $per_1_5_a) {
    $totalAmountWork_1_5_a += floatval($per_1_5_a['amount_work']);
  }

  $stmt = $conn->query("SELECT amount_work FROM personal_1_5_b WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_5_b = $stmt->fetchAll();

  $totalAmountWork_1_5_b = 0;
  foreach ($personal_1_5_b as $per_1_5_b) {
    $totalAmountWork_1_5_b += floatval($per_1_5_b['amount_work']);
  }
  $totalAmountWork_1_5 = $totalAmountWork_1_5_a + $totalAmountWork_1_5_b;

  $stmt = $conn->query("SELECT amount_work FROM personal_1_6_a WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_6_a = $stmt->fetchAll();

  $totalAmountWork_1_6_a = 0;
  foreach ($personal_1_6_a as $per_1_6_a) {
    $totalAmountWork_1_6_a += floatval($per_1_6_a['amount_work']);
  }

  $stmt = $conn->query("SELECT amount_work FROM personal_1_6_b WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_6_b = $stmt->fetchAll();

  $totalAmountWork_1_6_b = 0;
  foreach ($personal_1_6_b as $per_1_6_b) {
    $totalAmountWork_1_6_b += floatval($per_1_6_b['amount_work']);
  }
  $totalAmountWork_1_6 = $totalAmountWork_1_6_a + $totalAmountWork_1_6_b;

  $stmt = $conn->query("SELECT amount_work FROM personal_1_7 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_7 = $stmt->fetchAll();

  $totalAmountWork_1_7 = 0;
  foreach ($personal_1_7 as $per_1_7) {
    $totalAmountWork_1_7 += floatval($per_1_7['amount_work']);
  }

  $stmt = $conn->query("SELECT amount_work FROM personal_1_8 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_8 = $stmt->fetchAll();

  $totalAmountWork_1_8 = 0;
  foreach ($personal_1_8 as $per_1_8) {
    $totalAmountWork_1_8 += floatval($per_1_8['amount_work']);
  }

  $stmt = $conn->query("SELECT amount_work FROM personal_1_9 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_9 = $stmt->fetchAll();

  $totalAmountWork_1_9 = 0;
  foreach ($personal_1_9 as $per_1_9) {
    $totalAmountWork_1_9 += floatval($per_1_9['amount_work']);
  }

  $stmt = $conn->query("SELECT amount_work FROM personal_1_10 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_10 = $stmt->fetchAll();

  $totalAmountWork_1_10 = 0;
  foreach ($personal_1_10 as $per_1_10) {
    $totalAmountWork_1_10 += floatval($per_1_10['amount_work']);
  }

  $stmt = $conn->query("SELECT amount_work FROM personal_1_11 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
  $stmt->execute();
  $personal_1_11 = $stmt->fetchAll();

  $totalAmountWork_1_11 = 0;
  foreach ($personal_1_11 as $per_1_11) {
    $totalAmountWork_1_11 += floatval($per_1_11['amount_work']);
  }

  $totalAmountWork = $totalAmountWork_1_1 + $totalAmountWork_1_2 + $totalAmountWork_1_3 + $totalAmountWork_1_4 + $totalAmountWork_1_5 + $totalAmountWork_1_6 + $totalAmountWork_1_7 + $totalAmountWork_1_8 + $totalAmountWork_1_9 + $totalAmountWork_1_10 + $totalAmountWork_1_11;

  if (isset($_SESSION['userId'])) {
    $stmt = $conn->query("SELECT * FROM users WHERE userId = '$userId'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  }

  $stmt = $conn->prepare("SELECT * FROM Vadmin WHERE userId = :userId AND term = :term AND year = :year");
  $stmt->bindParam(':userId', $userId);
  $stmt->bindParam(':term', $term);
  $stmt->bindParam(':year', $year);
  $stmt->execute();
  $users = $stmt->fetch();

  if ($users){
    $academic_rank_update = $row['academic_rank'];
    $nametitle_update = $row['nametitle'];
    $firstname_update = $row['firstname'];
    $lastname_update = $row['lastname'];

    $updateStmt = $conn->prepare("UPDATE Vadmin SET academic_rank = :academic_rank, nametitle = :nametitle, firstname = :firstname, lastname = :lastname, amount_work = :amount_work WHERE userId = :userId AND term = :term AND year = :year");
    $updateStmt->bindParam(':userId', $userId);
    $updateStmt->bindParam(':term', $term);
    $updateStmt->bindParam(':year', $year); 
    $updateStmt->bindParam(':academic_rank', $academic_rank_update); 
    $updateStmt->bindParam(':nametitle', $nametitle_update); 
    $updateStmt->bindParam(':firstname', $firstname_update); 
    $updateStmt->bindParam(':lastname', $lastname_update); 
    $updateStmt->bindParam(':amount_work', $totalAmountWork);
    $updateStmt->execute();
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
                echo  $row['nametitle'] . $row['firstname'] . ' ' . $row['lastname'];
              }elseif(($row['academic_rank'] == 'ศาสตราจารย์' or $row['academic_rank'] == 'รองศาสตราจารย์' or $row['academic_rank'] == 'ผู้ช่วยศาสตราจารย์')and $row['nametitle'] == 'ดร.'){
                echo $row['academic_rank'] . ' ' . $row['nametitle'] . $row['firstname'] . ' ' . $row['lastname'];
              }elseif(($row['academic_rank'] == 'ศาสตราจารย์' or $row['academic_rank'] == 'รองศาสตราจารย์' or $row['academic_rank'] == 'ผู้ช่วยศาสตราจารย์')and ($row['nametitle'] == 'นาย' or $row['nametitle'] == 'นาง' or $row['nametitle'] == 'นางสาว')){
                echo $row['academic_rank'] . $row['firstname'] . ' ' . $row['lastname'];
              }
            ?>
            </span>
          </a><!-- End Profile Iamge Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            <?php
              if($row['academic_rank'] == 'ไม่มี'){
                echo  $row['nametitle'] . $row['firstname'] . ' ' . $row['lastname'];
              }elseif(($row['academic_rank'] == 'ศาสตราจารย์' or $row['academic_rank'] == 'รองศาสตราจารย์' or $row['academic_rank'] == 'ผู้ช่วยศาสตราจารย์')and $row['nametitle'] == 'ดร.'){
                echo $row['academic_rank'] . ' ' . $row['nametitle'] . $row['firstname'] . ' ' . $row['lastname'];
              }elseif(($row['academic_rank'] == 'ศาสตราจารย์' or $row['academic_rank'] == 'รองศาสตราจารย์' or $row['academic_rank'] == 'ผู้ช่วยศาสตราจารย์')and ($row['nametitle'] == 'นาย' or $row['nametitle'] == 'นาง' or $row['nametitle'] == 'นางสาว')){
                echo $row['academic_rank'] . $row['firstname'] . ' ' . $row['lastname'];
              }
            ?>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="index_admin.php?page=users/account&lastPage=index_admin.php?page=admin/dashboard">
                <i class="bi bi-file-person-fill"></i>
                <span>แก้ไขโปรไฟล์</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="index_admin.php?page=users/password&lastPage=index_admin.php?page=admin/dashboard">
                <i class="bi bi-key-fill"></i>
                <span>เปลี่ยนรหัสผ่าน</span>
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
