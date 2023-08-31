<?php
    require "config/db.php";

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
    $totalAmountWork = $totalAmountWork_1_2 + $totalAmountWork_1_3 + $totalAmountWork_1_4 + $totalAmountWork_1_5 + $totalAmountWork_1_6 + $totalAmountWork_1_7 + $totalAmountWork_1_8 + $totalAmountWork_1_9 + $totalAmountWork_1_10 + $totalAmountWork_1_11;
    
    $stmt = $conn->query("SELECT * FROM `term_year` where id = 1"); // ดึงข้อมูลจากตาราง personal โดยใช้ ID
    $stmt->execute();
    $term_year = $stmt->fetch();
    $year = date("Y") + 543;
    // จัดดับ
    $Current_Year = $term_year['year'];
    $Current_Term = $term_year['term'];
    $stmt = $conn->query("SELECT * FROM vadmin WHERE `year` = '$Current_Year' AND term = '$Current_Term' ORDER BY amount_work DESC");
    $stmt->execute();
    $ranks = $stmt->fetchAll();
    // end จัดอันดับ
?>
<div class="container">
    <div class="pagetitle mt-3">
        <h1>Dashboard admin</h1>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    <hr> <!-- เส้น -->
    <div class="d-inline justify-content-end">
        <button class="btn btn-success mb-3" type="button" data-bs-toggle="modal" data-bs-target="#rank">
            <div class="icon d-flex">
                <i class="ri-account-circle-fill"></i> &nbsp;
                <div class="label">อันดับ</div>
            </div>
        </button>
    </div>
    <div class="d-inline justify-content-end">
        <button class="btn btn-success mb-3" type="button" data-bs-toggle="modal" data-bs-target="#largeModal">
            <div class="icon d-flex">
                <i class="bi bi-arrow-repeat"></i> &nbsp;
                <div class="label">เปลี่ยนปีการศึกษาและภาคเรียน</div>
            </div>
        </button>
    </div>
    <!-- table ตารางภาระงาน -->
    <table class="table table-bordered text-center align-middle">
        <thead class="align-middle table-secondary">
            <tr>
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
                $stmt = $conn->query("SELECT * FROM Vadmin WHERE `year` = '$year' and term = 1");
                $stmt->execute();
                $current_year_term1 = $stmt->fetchAll();

                $stmt = $conn->query("SELECT * FROM Vadmin WHERE `year` = '$year' and term = 2");
                $stmt->execute();
                $Current_Year_term2 = $stmt->fetchAll();

                $year = $year - 1;
                $stmt = $conn->query("SELECT * FROM Vadmin WHERE `year` = '$year' and term = 1");
                $stmt->execute();
                $last_year_term1 = $stmt->fetchAll();

                $stmt = $conn->query("SELECT * FROM Vadmin WHERE `year` = '$year' and term = 2");
                $stmt->execute();
                $last_year_term2 = $stmt->fetchAll();

                if (!$current_year_term1) {
                    echo "<tr><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    foreach ($current_year_term1 as $CYT1) {
            ?>
                    <tr>
                        <td><?= $CYT1['nametitle'],$CYT1['firstname'], " ", $CYT1["lastname"] ?></td>

                        <td><?= $CYT1['amount_work'] ?></td>
                        <td>
                            <a href="?page=admin&userId=<?= $CYT1['userId']; ?>&term=<?= $CYT1['term'] ?>&year=<?= $CYT1['year'] ?>" class="btn btn-primary">
                                <div class="icon d-flex">
                                    <div class="label">รายละเอียด</div>
                                </div>
                            </a>
                        </td>
                        <?php
                        foreach ($Current_Year_term2 as $CYT2) {
                            $found = false;
                            if ($CYT2['nametitle'] == $CYT1['nametitle'] && $CYT2['firstname'] == $CYT1['firstname'] && $CYT2['lastname'] == $CYT1['lastname']) {
                                $found = true;
                        ?>
                                <td><?= $CYT2['amount_work'] ?></td>
                                <td>
                                    <a href="?page=admin&userId=<?= $CYT2['userId']; ?>&term=<?= $CYT2['term'] ?>&year=<?= $CYT2['year'] ?>" class="btn btn-primary">
                                        <div class="icon d-flex">
                                            <div class="label">รายละเอียด</div>
                                        </div>
                                    </a>
                                </td>
                        <?php break; } } ?>
                        <?php if (!$found) { ?>
                            <td>0</td>
                            <td>
                                <button class="btn btn-primary">รายละเอียด</button>
                            </td>
                        <?php }
                            $found = false;
                        ?>
                        <?php
                        foreach ($last_year_term1 as $LYT1) {
                            $found = false;
                            if ($LYT1['nametitle'] == $CYT1['nametitle'] && $LYT1['firstname'] == $CYT1['firstname'] && $LYT1['lastname'] == $CYT1['lastname']) {
                                $found = true;
                        ?>
                                    <td><?= $LYT1['amount_work'] ?></td>
                                    <td>
                                        <a href="?page=admin&userId=<?= $LYT1['userId']; ?>&term=<?= $LYT1['term'] ?>&year=<?= $LYT1['year'] ?>" class="btn btn-primary">
                                            <div class="icon d-flex">
                                                <div class="label">รายละเอียด</div>
                                            </div>
                                        </a>
                                    </td>
                        <?php break; } } ?>
                        <?php if (!$found) { ?>
                            <td>0</td>
                            <td>
                                <button class="btn btn-primary">รายละเอียด</button>
                            </td>
                        <?php }
                            $found = false;
                        ?>
                        <?php
                        foreach ($last_year_term2 as $LYT2) {
                            $found = false;
                            if ($LYT2['nametitle'] == $CYT1['nametitle'] && $LYT2['firstname'] == $CYT1['firstname'] && $LYT2['lastname'] == $CYT1['lastname']) {
                                $found = true;
                        ?>
                                    <td><?= $LYT2['amount_work'] ?></td>
                                    <td>
                                        <a href="?page=admin&userId=<?= $LYT2['userId']; ?>&term=<?= $LYT2['term'] ?>&year=<?= $LYT2['year'] ?>" class="btn btn-primary">
                                            <div class="icon d-flex">
                                                <div class="label">รายละเอียด</div>
                                            </div>
                                        </a>
                                    </td>
                        <?php break; } } ?>
                        <?php if (!$found) { ?>
                                <td>0</td>
                                <td>
                                    <button class="btn btn-primary">รายละเอียด</button>
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
                                <td class="text-center">0.00</td>
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
                    <input type="hidden" id ="userId" name="userId" value="<?= $_GET['userId']?>">
                    <input type="hidden" id ="term" name="term" value="<?= $_GET['term']?>">
                    <input type="hidden" id ="year" name="year" value="<?= $_GET['year']?>">
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
                    <input type="text" class="form-control" name="year" value="<?php echo $term_year['year']; ?>" required>

                    <label for="term" class="col-sm-2 col-form-label">ภาคการศึกษา</label>
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
                <h5 class="modal-title">อันดับ ภาคการศึกษาที่ <?= $Current_Term ?> ปีการศึกษาที่ <?= $Current_Year ?></h5>
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
                            <?php
                                foreach ($ranks as $rank) {
                            ?>
                                <td class="text-center">
                                    <?php echo $rating; ?>
                                </td>
                                <td class="text-center"><?= $rank['nametitle'].$rank['firstname'] . " " . $rank['lastname'] ?></td>
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
            window.location.href = 'index_admin.php?page=admin';
        });
    });
</script>