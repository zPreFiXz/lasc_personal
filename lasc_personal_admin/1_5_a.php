<div class="container">
    <div class="pagetitle mt-3">
        <h1>ก. ภาระงานอาจารย์ที่ปรึกษางานวิจัย</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">5. ภาระงานอาจารย์ที่ปรึกษางานวิจัย โครงการ ปัญหาพิเศษหรืองานอื่นที่เกี่ยวข้อง</li>
                <li class="breadcrumb-item active">ก. ภาระงานอาจารย์ที่ปรึกษางานวิจัย</li>
            </ol>
        </nav>
    </div>
    <hr> <!-- เส้น -->
    <table class="table table-bordered text-center">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col">สาขาวิชา</th>
                <th scope="col">ระดับชั้น</th>
                <th scope="col">ชื่องานวิจัย</th>
                <th scope="col">จำนวนที่ปรึกษา (คน)</th>
                <th scope="col">ที่ปรึกษาหลัก/ร่วม</th>
                <th scope="col">จำนวนนักศึกษา</th>
                <th scope="col">จำนวนภาระงาน</th>
                <th scope="col">ไฟล์</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $userId = $_SESSION['userId'];
                $term =  $term_year['term'];
                $year =  $term_year['year'];
                $stmt = $conn->query("SELECT*FROM personal_1_5_a WHERE userId = '" . $_SESSION['user'] . "' AND term = '" . $_SESSION['term'] . "' AND year = '" . $_SESSION['year'] . "'"); // ดึงข้อมูลจากตาราง personal_1_5_a
                $stmt->execute(); // ประมวลผลคำสั่ง SQL เพื่อดึงข้อมูลจากฐานข้อมูล
                $personal = $stmt->fetchAll(); // เก็บผลลัพธ์ที่ได้จากการดึงข้อมูลทั้งหมดในตัวแปร $personal

                $totalAmountWork = 0.00;

                // ตรวจสอบว่ามีข้อมูลหรือไม่
                if (!$personal) { // ไม่มีข้อมูล
                    echo " <tr><td colspan='9' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    // วนลูปแสดงข้อมูลที่ดึงมา
                    foreach ($personal as $per) {
            ?>
                        <tr> <!-- แสดงแถวของตาราง (row) โดยใช้ข้อมูลจากตัวแปร $per ในแต่ละคอลัมน์ของตาราง -->
                            <td style="white-space: nowrap;"><?= $per['major']; ?></td>
                            <td><?= $per['level']; ?></td>
                            <td style="white-space: nowrap;"><?= $per['name_project']; ?></td>
                            <td><?= $per['amount_teacher']; ?></td>
                            <td><?= $per['teacher']; ?></td>
                            <td><?= $per['amount_student']; ?></td>
                            <td><?= $per['amount_work']; ?></td>
                            <?php $totalAmountWork += floatval($per['amount_work']); ?>
                            <?php if ($per['file']) { ?>
                                <td style="white-space: nowrap;">
                                    <a href="<?= "uploads/" . $per['file']; ?>" target="_blank" class="btn btn-secondary">
                                        <div class="icon d-flex">
                                            <i class="bi bi-eye"></i>&nbsp;
                                            <div class="label">ดูไฟล์</div>
                                        </div>
                                    </a>
                                </td>
                            <?php } else { ?>
                                <td>ไม่มีไฟล์แนบ</td>
                        </tr>
            <?php } } } ?>
                        <tr>
                            <th scope="row" colspan="6">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                            <td><?= number_format($totalAmountWork, 2); ?></td>
                            <td colspan="2"></td>
                        </tr>
        </tbody>
    </table>
</div>