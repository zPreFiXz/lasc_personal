<?php
    require "config/db.php";

    $userId = $_SESSION['userId'];
    $nametitle = $_SESSION['nametitle'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];

    $userId = "";
    $term = "";
    $year = "";
    $rating = 1;
    $found = false;

    if (isset($_GET['userId'])) {
        $userId = $_GET['userId'];
        $term = $_GET['term'];
        $year = $_GET['year'];
?>
        <!-- เรียก modal #details -->
        <script>
            // ถูกเรียกใช้เมื่อหน้าเว็บโหลดเสร็จสมบูรณ์ 
            document.addEventListener("DOMContentLoaded", function() {
                // สร้างอ็อบเจกต์ Modal
                var modal = new bootstrap.Modal(document.getElementById("details"));
                // แสดงหน้าต่าง Modal
                modal.show();
            });
        </script>
        <!-- end เรียก modal #details     -->
    <?php } ?>
<?php
    // ดึงค่าภาระงานไปคำนวณจากตาราง
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
    // end ดึงค่าภาระงานไปคำนวณจากตาราง
    $totalAmountWork  = $totalAmountWork_1_1 + $totalAmountWork_1_2 + $totalAmountWork_1_3 + $totalAmountWork_1_4 + $totalAmountWork_1_5 + $totalAmountWork_1_6 + $totalAmountWork_1_7 + $totalAmountWork_1_8 + $totalAmountWork_1_9 + $totalAmountWork_1_10 + $totalAmountWork_1_11;

    $stmt = $conn->query("SELECT * FROM `term_year` where id = 1"); // ดึงข้อมูลจากตาราง personal โดยใช้ ID
    $stmt->execute();
    $term_year = $stmt->fetch();
    $year = $term_year['year'];
    $term = $term_year['term'];
    
    $stmt = $conn->query("SELECT * FROM vadmin WHERE `year` = '$year' AND term = '$term' ORDER BY amount_work DESC");
    $stmt->execute();
    $ranks = $stmt->fetchAll();
    // end จัดอันดับ
    $userId = $_SESSION['userId'];
    $nametitle = $_SESSION['nametitle'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $isAdmin = $_SESSION['isAdmin'];

    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $stmt = $conn->query("SELECT * FROM users WHERE userId = '$userId'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="pagetitle mt-3">
            <h1 style="font-size: 30px;">
                <?php
                    echo "ยินดีต้อนรับ ";
                    if($row['academic_rank'] == 'ไม่มี'){
                        echo  $row['nametitle'] . $row['firstname'] . ' ' . $row['lastname'];
                    }elseif(($row['academic_rank'] == 'ศาสตราจารย์' or $row['academic_rank'] == 'รองศาสตราจารย์' or $row['academic_rank'] == 'ผู้ช่วยศาสตราจารย์')and $row['nametitle'] == 'ดร.'){
                        echo $row['academic_rank'] . ' ' . $row['nametitle'] . $row['firstname'] . ' ' . $row['lastname'];
                    }elseif(($row['academic_rank'] == 'ศาสตราจารย์' or $row['academic_rank'] == 'รองศาสตราจารย์' or $row['academic_rank'] == 'ผู้ช่วยศาสตราจารย์')and ($row['nametitle'] == 'นาย' or $row['nametitle'] == 'นาง' or $row['nametitle'] == 'นางสาว')){
                        echo $row['academic_rank'] . $row['firstname'] . ' ' . $row['lastname'];
                    }
                ?>
            </h1>
        </div>
        <div class="d-flex align-items-center"> 
            <div class="pagetitle mt-3 mx-3">
                <h1 style="font-size: 30px;"><?= "ปีการศึกษา " . $term . "/" . $year; ?></h1>
            </div>
            <div class="icon d-flex align-items-center">
                <a href="index.php?page=users/dashboard" class="btn btn-primary d-flex align-items-center"><i class="ri-logout-box-line"></i> &nbsp;แบบประเมิน</a>
            </div>&nbsp;&nbsp;
            <div class="icon d-flex align-items-center">
                <a href="logout.php" class="btn btn-danger d-flex align-items-center"><i class="ri-logout-box-line"></i> &nbsp;ออกจากระบบ</a>
            </div>
        </div>    
    </div>
    <hr> <!-- เส้น -->
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" id="alert-success">
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
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" id="alert-error">
            <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('alert-error').style.display = 'none';
            }, 3000);
        </script>
    <?php } ?>
    <div class="d-flex justify-content-end">
        <div class="d-inline justify-content-end">
            <button class="btn btn-warning mb-3" type="button" data-bs-toggle="modal" data-bs-target="#rank">
                <div class="icon d-flex">
                    <i class="ri-account-circle-fill"></i> &nbsp;
                    <div class="label">อันดับภาระงาน</div>
                </div>
            </button>
        </div>
    </div>
    <!-- table ตารางภาระงาน -->
    <table class="table table-bordered align-middle">
        <thead class="text-center align-middle table-secondary">
            <tr>
                <th rowspan="3">ลำดับ</th>
                <th rowspan="3">ชื่อ</th>
                <th colspan="8">จำนวนภาระงาน</th>
            </tr>
            <tr>
                <th colspan="4">ปีการศึกษา <?= $year  ?></th>
                <th colspan="4">ปีการศึกษา <?= $year - 1 ?></th>
            </tr>
            <tr>
                <th colspan="2">เทอม 1</th>
                <th colspan="2">เทอม 2</th>
                <th colspan="2">เทอม 1</th>
                <th colspan="2">เทอม 2</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->query("SELECT * FROM Vadmin WHERE `year` = '$year' and term = 1 ORDER BY firstname ASC");
                $stmt->execute();
                $current_year_term1 = $stmt->fetchAll();

                $stmt = $conn->query("SELECT * FROM Vadmin WHERE `year` = '$year' and term = 2");
                $stmt->execute();
                $current_Year_term2 = $stmt->fetchAll();

                $year = $year - 1;
                $stmt = $conn->query("SELECT * FROM Vadmin WHERE `year` = '$year' and term = 1");
                $stmt->execute();
                $last_year_term1 = $stmt->fetchAll();

                $stmt = $conn->query("SELECT * FROM Vadmin WHERE `year` = '$year' and term = 2");
                $stmt->execute();
                $last_year_term2 = $stmt->fetchAll();
                $year = $year + 1;
                
                $order = 0;

                if (!$current_year_term1) {
                    echo "<tr><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    foreach ($current_year_term1 as $CYT1) {
                        $order+=1;
            ?>
                        <tr>
                            <td class="text-center"><?= $order?></td>
                            <td style="white-space: nowrap;">
                                <?php if($CYT1['academic_rank'] == 'ไม่มี'){
                                    echo  $CYT1['nametitle'] . $CYT1['firstname'] . ' ' . $CYT1['lastname'];
                                }elseif(($CYT1['academic_rank'] == 'ศาสตราจารย์' or $CYT1['academic_rank'] == 'รองศาสตราจารย์' or $CYT1['academic_rank'] == 'ผู้ช่วยศาสตราจารย์')and $CYT1['nametitle'] == 'ดร.'){
                                    echo $CYT1['academic_rank'] . ' ' . $CYT1['nametitle'] . $CYT1['firstname'] . ' ' . $CYT1['lastname'];
                                }elseif(($CYT1['academic_rank'] == 'ศาสตราจารย์' or $CYT1['academic_rank'] == 'รองศาสตราจารย์' or $CYT1['academic_rank'] == 'ผู้ช่วยศาสตราจารย์')and ($CYT1['nametitle'] == 'นาย' or $CYT1['nametitle'] == 'นาง' or $CYT1['nametitle'] == 'นางสาว')){
                                    echo $CYT1['academic_rank'] . $CYT1['firstname'] . ' ' . $CYT1['lastname'];}
                                ?>
                            </td>
                            <td class = 'text-center' ><?= $CYT1['amount_work'] ?></td>
                            <td class = 'text-center'>
                                <a href="?page=admin/dashboard&userId=<?= $CYT1['userId']; ?>&term=<?= $CYT1['term'] ?>&year=<?= $CYT1['year'] ?>" class="btn btn-primary">
                                    <div class="icon d-flex align-items-center">
                                        <i class="bx bx-search"></i> &nbsp;
                                        <div class="label">ดูข้อมูล</div>
                                    </div>
                                </a>
                            </td>
                            <?php foreach ($current_Year_term2 as $CYT2) {
                                $found = false;
                                if ($CYT2['nametitle'] == $CYT1['nametitle'] && $CYT2['firstname'] == $CYT1['firstname'] && $CYT2['lastname'] == $CYT1['lastname']) {
                                    $found = true;
                            ?>
                                    <td class = 'text-center'><?= $CYT2['amount_work'] ?></td>
                                    <td class = 'text-center'>
                                        <a href="?page=admin/dashboard&userId=<?= $CYT2['userId']; ?>&term=<?= $CYT2['term'] ?>&year=<?= $CYT2['year'] ?>" class="btn btn-primary">
                                            <div class="icon d-flex align-items-center">
                                                <i class="bx bx-search"></i> &nbsp;
                                                <div class="label">ดูข้อมูล</div>
                                            </div>
                                        </a>
                                    </td>
                            <?php break;} } ?>
                            <?php if (!$found) { ?>
                                <td class = 'text-center'>0</td>
                                <td class = 'text-center'>
                                    <a class="btn btn-primary">
                                        <div class="icon d-flex align-items-center">
                                            <i class="bx bx-search"></i> &nbsp;
                                            <div class="label">ดูข้อมูล</div>
                                        </div>
                                    </a>
                                </td>
                            <?php }
                                $found = false;
                            ?>
                            <?php foreach ($last_year_term1 as $LYT1) {
                                $found = false;
                                if ($LYT1['nametitle'] == $CYT1['nametitle'] && $LYT1['firstname'] == $CYT1['firstname'] && $LYT1['lastname'] == $CYT1['lastname']) {
                                    $found = true;
                            ?>
                                    <td class = 'text-center'><?= $LYT1['amount_work'] ?></td>
                                    <td class = 'text-center'>
                                        <a href="?page=admin/dashboard&userId=<?= $LYT1['userId']; ?>&term=<?= $LYT1['term'] ?>&year=<?= $LYT1['year'] ?>" class="btn btn-primary">
                                            <div class="icon d-flex align-items-center">
                                                <i class="bx bx-search"></i> &nbsp;
                                                <div class="label">ดูข้อมูล</div>
                                            </div>
                                        </a>
                                    </td>
                            <?php break; } } ?>
                            <?php if (!$found) { ?>
                                <td class = 'text-center'>0</td>
                                <td class = 'text-center'>
                                    <a class="btn btn-primary">
                                        <div class="icon d-flex align-items-center">
                                            <i class="bx bx-search"></i> &nbsp;
                                            <div class="label">ดูข้อมูล</div>
                                        </div>
                                    </a>
                                </td>
                            <?php }
                                $found = false;
                            ?>
                            <?php foreach ($last_year_term2 as $LYT2) {
                                $found = false;
                                if ($LYT2['nametitle'] == $CYT1['nametitle'] && $LYT2['firstname'] == $CYT1['firstname'] && $LYT2['lastname'] == $CYT1['lastname']) {
                                    $found = true;
                            ?>
                                    <td class = 'text-center'><?= $LYT2['amount_work'] ?></td>
                                    <td class = 'text-center'>
                                        <a href="?page=admin/dashboard&userId=<?= $LYT2['userId']; ?>&term=<?= $LYT2['term'] ?>&year=<?= $LYT2['year'] ?>" class="btn btn-primary">
                                            <div class="icon d-flex align-items-center">
                                                <i class="bx bx-search"></i> &nbsp;
                                                <div class="label">ดูข้อมูล</div>
                                            </div>
                                        </a>
                                    </td>
                            <?php break; } } ?>
                            <?php if (!$found) { ?>
                                <td class = 'text-center'>0</td>
                                <td class = 'text-center'>
                                    <a class="btn btn-primary">
                                        <div class="icon d-flex align-items-center">
                                            <i class="bx bx-search"></i> &nbsp;
                                            <div class="label">ดูข้อมูล</div>
                                        </div>
                                    </a>
                                </td>
                            <?php }
                                $found = false;
                            ?>
                        </tr>
            <?php } } ?>
        </tbody>
    </table>
    <!-- end table ตารางภาระงาน  -->
</div>
<!-- modal รายระเอียด -->
<div class="modal fade" id="details" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายละเอียด</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="pagetitle mt-3">
                        <h1>ตอนที่ 2 : แบบสรุปภาระงานรายบุคคล</h1>
                    </div>
                    <table class="table table-bordered mt-3">
                        <thead class="align-middle table-secondary text-center">
                            <tr>
                                <th scope="col">รายการ</th>
                                <th scope="col">จำนวนภาระงาน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1. ภาระงานการสอน (ภาคปกติ)</td>
                                <td class="text-center"><?= number_format($totalAmountWork_1_1, 2); ?></td>
                            </tr>
                            <tr>
                                <td>2. ภาระงานอาจารย์ที่ปรึกษาของนักศึกษา (หมู่เรียน ชมรม ชุมนุม หรือที่ปรึกษาอื่น)</td>
                                <td class="text-center"><?= number_format($totalAmountWork_1_2, 2); ?></td>
                            </tr>
                            <tr>
                                <td>3. ภาระงานอาจารย์นิเทศ /อาจารย์ผู้ควบคุมการฝึกประสบการณ์วิชาชีพ</td>
                                <td class="text-center"><?= number_format($totalAmountWork_1_3, 2); ?></td>
                            </tr>
                            <tr>
                                <td>4. ภาระงานกิจกรรมพัฒนานักศึกษา</td>
                                <td class="text-center"><?= number_format($totalAmountWork_1_4, 2); ?></td>
                            </tr>
                            <tr>
                                <td>5. ภาระงานอาจารย์ที่ปรึกษางานวิจัย โครงการ ปัญหาพิเศษ หรืองานวิจัยอื่นที่เกี่ยวข้อง</td>
                                <td class="text-center"><?= number_format($totalAmountWork_1_5, 2); ?></td>
                            </tr>
                            <tr>
                                <td>6. ภาระงานวิจัย</td>
                                <td class="text-center"><?= number_format($totalAmountWork_1_6, 2); ?></td>
                            </tr>
                            <tr>
                                <td>7. ภาระผลิตผลงานทางวิชาการ</td>
                                <td class="text-center"><?= number_format($totalAmountWork_1_7, 2); ?></td>
                            </tr>
                            <tr>
                                <td>8. ภาระงานด้านบริการวิชาการ</td>
                                <td class="text-center"><?= number_format($totalAmountWork_1_8, 2); ?></td>
                            </tr>
                            <tr>
                                <td>9. ภาระงานทำนุบำรุงศิลปวัฒนธรรม</td>
                                <td class="text-center"><?= number_format($totalAmountWork_1_9, 2); ?></td>
                            </tr>
                            <tr>
                                <td>10. ภาระงานเฉพาะกิจที่เกี่ยวข้อง นอกจากข้อ 1-9</td>
                                <td class="text-center"><?= number_format($totalAmountWork_1_10, 2); ?></td>
                            </tr>
                            <tr>
                                <td>11. ภาระงานด้านการบริหาร (เฉพาะผู้ที่ได้รับการแต่งตั้งให้ดำรงตำแหน่งบริหาร)</td>
                                <td class="text-center"><?= number_format($totalAmountWork_1_11, 2); ?></td>
                            </tr>
                            <tr>
                                <th class="text-center">รวมภาระงานตลอดภาคเรียน</th>
                                <td class="text-center"><?= number_format($totalAmountWork, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <p>(หมายเหตุ รวมภาระงานตลอดภาคเรียนต้องไม่ต่ำกว่า 40 ภาระงาน)</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <form action="index_details_personal.php" method="post">
                    <input type="hidden" id="userId" name="userId" value="<?= $_GET['userId'] ?>">
                    <input type="hidden" id="term" name="term" value="<?= $_GET['term'] ?>">
                    <input type="hidden" id="year" name="year" value="<?= $_GET['year'] ?>">
                    <button class="btn btn-primary" type="submit">รายละเอียด</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal รายระเอียด -->
</div>
<!-- modal เปลี่ยนปีการศึกษาและภาคเรียน -->
<div class="modal fade" id="largeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เปลี่ยนปีการศึกษาและภาคเรียน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="term_year/term_year.php" method="post">
                <div class="modal-body">
                    <label for="year" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                    <input type="hidden" name="id" value="<?= $term_year['id'] ?>">
                    <input type="text" class="form-control" name="year" value="<?php echo $term_year['year']; ?>" required>

                    <label for="term" class="col-sm-2 col-form-label" style="white-space: nowrap;">ภาคเรียนที่</label>
                    <select type="text" class="form-select" name="term" required>
                        <option value="1" <?php if ($term_year['term'] === '1') echo 'selected' ?>>1</option>
                        <option value="2" <?php if ($term_year['term'] === '2') echo 'selected' ?>>2</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" name="submit" class="btn btn-primary">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end modal เปลี่ยนปีการศึกษาและภาคเรียน -->
</div>
<!-- modal อันดับ -->
<div class="modal fade" id="rank" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ภาคเรียนที่ <?= $term ?> ปีการศึกษาที่ <?= $year ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered mt-3">
                    <thead class="align-middle table-secondary text-center">
                        <tr>
                            <th>อันดับที่</th>
                            <th>ชื่อ</th>
                            <th>จำนวนภาระงาน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($ranks as $rank) { ?>
                                <td class="text-center">
                                    <?php echo $rating; ?>
                                </td>
                                <td class="text-center"><?= $rank['nametitle'] . $rank['firstname'] . " " . $rank['lastname'] ?></td>
                                <td class="text-center"><?= $rank['amount_work'] ?></td>
                        </tr>
                            <?php $rating = $rating + 1; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end modal อันดับ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#details').on('hidden.bs.modal', function() {
            window.location.href = 'index_admin.php?page=admin/dashboard';
        });
    });
</script>
<?php 
    $conn = null;
?>