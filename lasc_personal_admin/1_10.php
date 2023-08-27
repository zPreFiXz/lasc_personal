<div class="container">
    <div class="pagetitle mt-3">
        <h1>10. ภาระงานเฉพาะกิจที่เกี่ยวข้อง นอกจากข้อ 1-9 (งานที่มหาวิทยาลัยมอบหมายเป็นการเฉพาะกิจภายในคณะสำนัก สถาบัน วิทยาลัย ศูนย์ หรือภายนอกมหาวิทยาลัย)</h1>
    </div>
    <hr> <!-- เส้น -->
    <table class="table table-bordered text-center">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col">วัน/เดือน/ปี</th>
                <th scope="col">งาน/โครงการ/กิจกรรม/โครงการยุทธศาสตร์/วารสาร</th>
                <th scope="col">ตำแหน่งที่ได้รับมอบหมายในงาน/โครงการ</th>
                <th scope="col">ลักษณะงาน</th>
                <th scope="col">จำนวนชั่วโมงทำงาน</th>
                <th scope="col">จำนวนภาระงาน</th>
                <th scope="col">ไฟล์</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $stmt = $conn->query("SELECT*FROM personal_1_10 WHERE userId = '" . $_SESSION['user'] . "' AND term = '" . $_SESSION['term'] . "' AND year = '" . $_SESSION['year'] . "'"); // ดึงข้อมูลจากตาราง personal_1_10
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

                        <td style="white-space: nowrap;"><?= $per['date']; ?></td>
                        <td><?= $per['project']; ?></td>
                        <td style="white-space: nowrap;"><?= $per['position']; ?></td>
                        <td><?= $per['type_work']; ?></td>
                        <td><?= $per['amount_time']; ?></td>
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
                                >
                            </td>
                        <?php } else { ?>
                            <td>ไม่มีไฟล์แนบ</td>
                        <?php } ?>
                    </tr>
            <?php
                }
            }
            ?>
            <tr>
                <th scope="row" colspan="5">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                <td><?= number_format($totalAmountWork, 2); ?></td>
                <td colspan="3"></td>
            </tr>
        </tbody>
    </table>
</div>