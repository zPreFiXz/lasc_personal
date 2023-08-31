<div class="container">
    <div class="pagetitle mt-3">
        <h1>7. ภาระงานผลิตผลงานทางวิชาการ (หนังสือ ตำรา เอกสารประกอบการสอน เอกสารคำสอน บทความ งานแปล งานปรับปรุงพัฒนาเทคโนโลยีและสื่อการสอน งานสร้างนวัตกรรมหรือผลงานวิชาการอื่นที่เกี่ยวข้อง) </h1>
    </div>
    <hr> <!-- เส้น -->
    <table class="table table-bordered text-center">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col">ประเภท</th>
                <th scope="col">ชื่อเรื่อง</th>
                <th scope="col">ระยะเวลา เริ่มต้น-สิ้นสุด</th>
                <th scope="col">ลักษณะ เดี่ยว/ร่วม</th>
                <th scope="col">ลักษณะงาน</th>
                <th scope="col">ร้อยละการมีส่วนร่วม</th>
                <th scope="col">จำนวนภาระงาน</th>
                <th scope="col">ไฟล์</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->query("SELECT*FROM personal_1_7 WHERE userId = '" . $_SESSION['user'] . "' AND term = '" . $_SESSION['term'] . "' AND year = '" . $_SESSION['year'] . "'"); // ดึงข้อมูลจากตาราง personal_1_7
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
                            <td style="white-space: nowrap;"><?= $per['type']; ?></td>
                            <td><?= $per['title']; ?></td>
                            <td style="white-space: nowrap;"><?= $per['amount_time']; ?></td>
                            <td><?= $per['type_work_s_j']; ?></td>
                            <td><?= $per['type_work']; ?></td>
                            <td><?= $per['participation']; ?></td>
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
<?php 
    $conn = null;
?>  