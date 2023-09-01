<div class="container">
    <div class="pagetitle mt-3">
        <h1>ข. การเผยแพร่ รับรางวัล หรือจดสิทธิบัตร</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">6. ภาระงานวิจัย (งานวิจัยพื้นฐาน/งานวิจัยประยุกต์)</li>
                <li class="breadcrumb-item active">ข. การเผยแพร่ รับรางวัล หรือจดสิทธิบัตร</li>
            </ol>
        </nav>
    </div>
    <hr> <!-- เส้น -->
    <table class="table table-bordered text-center">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col">ชื่องานวิจัย</th>
                <th scope="col">แหล่งเงินทุน</th>
                <th scope="col">ระยะเวลาเริ่มต้น</th>
                <th scope="col">ระยะเวลาสิ้นสุด</th>
                <th scope="col">ระบบการเผยแพร่ (ประชุม,วารสาร,ผลงาน)</th>
                <th scope="col">จำนวนภาระงาน</th>
                <th scope="col">ไฟล์</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->query("SELECT*FROM personal_1_6_b WHERE userId = '" . $_SESSION['user'] . "' AND term = '" . $_SESSION['term'] . "' AND year = '" . $_SESSION['year'] . "'"); // ดึงข้อมูลจากตาราง personal_1_6_b
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
                            <td><?= $per['project']; ?></td>
                            <td><?= $per['funding']; ?></td>
                            <td><?= $per['start']; ?></td>
                            <td><?= $per['end']; ?></td>
                            <td style="white-space: nowrap;"><?= $per['publish']; ?></td>
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
                            <?php } ?>
                        </tr>
            <?php } } ?>
                        <tr>
                            <th scope="row" colspan="5">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                            <td><?= number_format($totalAmountWork, 2); ?></td>
                            <td colspan="2"></td>
                        </tr>
        </tbody>
    </table>
</div>
<?php 
    $conn = null;
?>  