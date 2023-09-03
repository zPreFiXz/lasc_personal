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
$branch = $_SESSION['branch'];

$name = $nametitle . $firstname . " " . $lastname;

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
$_SESSION['$totalAmountWork'] = $totalAmountWork;

$stmt = $conn->prepare("SELECT * FROM Vadmin WHERE userId = :userId AND term = :term AND year = :year");
$stmt->bindParam(':userId', $userId);
$stmt->bindParam(':term', $term);
$stmt->bindParam(':year', $year);
$stmt->execute();
$users = $stmt->fetch();

if (empty($users)) {
  $insertStmt = $conn->prepare("INSERT INTO Vadmin (userId, term, year, nametitle, firstname, lastname, amount_work) VALUES (:userId, :term, :year, :nametitle, :firstname, :lastname, :amount_work)");
  $insertStmt->bindParam(':userId', $userId);
  $insertStmt->bindParam(':term', $term);
  $insertStmt->bindParam(':year', $year);
  $insertStmt->bindParam(':nametitle', $nametitle);
  $insertStmt->bindParam(':firstname', $firstname);
  $insertStmt->bindParam(':lastname', $lastname);
  $insertStmt->bindParam(':amount_work', $totalAmountWork);
  $insertStmt->execute();
} else {
  $updateStmt = $conn->prepare("UPDATE Vadmin SET amount_work = :amount_work WHERE userId = :userId AND term = :term AND year = :year");
  $updateStmt->bindParam(':userId', $userId);
  $updateStmt->bindParam(':term', $term);
  $updateStmt->bindParam(':year', $year);
  $updateStmt->bindParam(':amount_work', $totalAmountWork);
  $updateStmt->execute();
}

$stmt = $conn->prepare("SELECT*FROM personal_1_11 WHERE userId = :userId AND term = :term AND year = :year");
$stmt->bindParam(':userId', $userId);
$stmt->bindParam(':term', $term);
$stmt->bindParam(':year', $year);
$stmt->execute();
$personal = $stmt->fetchAll();

if (empty($personal)) {
  $userId = $_SESSION['userId'];
  $term = $term_year['term'];
  $year = $term_year['year'];

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
  $insertStmt = $conn->prepare("INSERT INTO personal_3 (userId, term, year,name,branch,amount_work) VALUES (:userId, :term, :year, :name, :branch, :amount_work)");
  $insertStmt->bindParam(':userId', $userId);
  $insertStmt->bindParam(':term', $term);
  $insertStmt->bindParam(':year', $year);
  $insertStmt->bindParam(':name', $name);
  $insertStmt->bindParam(':branch', $branch);
  $insertStmt->bindParam(':amount_work', $totalAmountWork);
  $insertStmt->execute();
} else {
  $updateStmt = $conn->prepare("UPDATE personal_3 SET amount_work = :amount_work WHERE userId = :userId AND term = :term AND year = :year");
  $updateStmt->bindParam(':userId', $userId);
  $updateStmt->bindParam(':term', $term);
  $updateStmt->bindParam(':year', $year);
  $updateStmt->bindParam(':amount_work', $totalAmountWork);
  $updateStmt->execute();
  
  $userId = $_SESSION['userId'];
  $nametitle = $_SESSION['nametitle'];
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];

  if (isset($_SESSION['userId'])) {
    $stmt = $conn->query("SELECT * FROM users WHERE userId = '$userId'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  }
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
        <img src="assets/img/logo_lasc.png" alt="โลโก้คณะ">
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
              <a class="dropdown-item d-flex align-items-center" href="index.php?page=users/account">
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
        <a class="nav-link " href="index.php?page=users/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-heading">ตอนที่ 1</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=1_1/index_1_1">
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
            <a href="index.php?page=1_2_a/index_1_2_a">
              <i class="bi bi-circle"></i><span>ก. ภาระงานอาจารย์ที่ปรึกษาหมู่เรียน</span>
            </a>
          </li>
          <li>
            <a href="index.php?page=1_2_b/index_1_2_b">
              <i class="bi bi-circle"></i><span>ข. ภาระงานอาจารย์ที่ปรึกษาชมรม ชุมนุม หรือที่ปรึกษาอื่น</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=1_3/index_1_3">
          <i class="bi bi-menu-button-wide"></i><span>3. ภาระงานอาจารย์นิเทศ</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=1_4/index_1_4">
          <i class="bi bi-menu-button-wide"></i><span>4. ภาระงานกิจกรรมพัฒนานักศึกษา</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>5. ภาระงานอาจารย์ที่ปรึกษางานวิจัย โครงการ</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index.php?page=1_5_a/index_1_5_a">
              <i class="bi bi-circle"></i><span>ก. ภาระงานอาจารย์ที่ปรึกษางานวิจัย</span>
            </a>
          </li>
          <li>
            <a href="index.php?page=1_5_b/index_1_5_b">
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
            <a href="index.php?page=1_6_a/index_1_6_a">
              <i class="bi bi-circle"></i><span>ก. การสร้างงานวิจัย</span>
            </a>
          </li>
          <li>
            <a href="index.php?page=1_6_b/index_1_6_b">
              <i class="bi bi-circle"></i><span>ข. การเผยแพร่ รับรางวัล หรือจดสิทธิบัตร</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=1_7/index_1_7">
          <i class="bi bi-menu-button-wide"></i><span>7. ภาระงานผลิตผลงานทางวิชาการ</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=1_8/index_1_8">
          <i class="bi bi-menu-button-wide"></i><span>8. ภาระงานด้านบริการวิชาการ</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=1_9/index_1_9">
          <i class="bi bi-menu-button-wide"></i><span>9. ภาระงานทำนุบำรุงศิลปวัฒนธรรม</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=1_10/index_1_10">
          <i class="bi bi-menu-button-wide"></i><span>10. ภาระงานเฉพาะกิจที่เกี่ยวข้อง นอกจากข้อ 1-9</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=1_11/index_1_11">
          <i class="bi bi-menu-button-wide"></i><span>11. ภาระงานด้านการบริหาร</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-heading">ประเมินผลการปฏิบัติงาน</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=3/index_3">
          <i class="bi bi-menu-button-wide"></i><span>แบบประเมินผลการปฏิบัติงาน(สายวิชาการ)</span>
        </a>
      </li><!-- End Components Nav -->
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
  <script>
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');

    document.querySelector('.toggle-sidebar-btn').addEventListener('click', function() {
      sidebar.classList.toggle('active');
      main.classList.toggle('active');
    });
  </script>
</body>
<?php
$conn = null;
?>

</html>