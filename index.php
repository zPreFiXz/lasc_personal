<?php
  session_start();
  require_once 'config/db.php';

  if (!isset($_SESSION['userId'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
  }

  $userId = $_SESSION['userId'];

  $stmt = $conn->query("SELECT * FROM `term_year` where id = 1");
  $stmt->execute();
  $term_year = $stmt->fetch();
  $term =  $term_year['term'];
  $year =  $term_year['year'];

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

  $totalAmountWork = $totalAmountWork_1_2 + $totalAmountWork_1_3 + $totalAmountWork_1_4 + $totalAmountWork_1_5 + $totalAmountWork_1_6 + $totalAmountWork_1_7 + $totalAmountWork_1_8 + $totalAmountWork_1_9 + $totalAmountWork_1_10 + $totalAmountWork_1_11;

  $stmt = $conn->prepare("SELECT * FROM Vadmin WHERE userId = :userId AND term = :term AND year = :year");
  $stmt->bindParam(':userId', $userId);
  $stmt->bindParam(':term', $term);
  $stmt->bindParam(':year', $year);
  $stmt->execute();
  $users = $stmt->fetch();

  $stmt = $conn->prepare("SELECT * FROM users WHERE firstname = :userId");
  $stmt->bindParam(':userId', $userId);
  $stmt->execute();
  $user = $stmt->fetch();

  $firstname = $user['firstname'];
  $lastname = $user['lastname'];

  if (empty($users)) {
    $insertStmt = $conn->prepare("INSERT INTO Vadmin (userId, term, `year`, firstname, lastname, amount_work) VALUES (:userId, :term, :year, :firstname, :lastname, :amount_work)");
    $insertStmt->bindParam(':userId', $userId);
    $insertStmt->bindParam(':term', $term);
    $insertStmt->bindParam(':year', $year);
    $insertStmt->bindParam(':firstname', $firstname);
    $insertStmt->bindParam(':lastname', $lastname);
    $insertStmt->bindParam(':amount_work', $totalAmountWork);
    $insertStmt->execute();
  } else {
    $updateStmt = $conn->prepare("UPDATE Vadmin SET amount_work = :amount_work WHERE userId = :userId AND term = :term AND `year` = :year ");
    $updateStmt->bindParam(':userId', $userId);
    $updateStmt->bindParam(':term', $term);
    $updateStmt->bindParam(':year', $year);
    $updateStmt->bindParam(':amount_work', $totalAmountWork);
    $updateStmt->execute();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
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
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
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
</body>
</html>