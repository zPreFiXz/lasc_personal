<div class="container">
    <div class="pagetitle mt-3">
        <h1>3. ภาระงานอาจารย์นิเทศและ /หรืออาจารย์ผู้ควบคุมการฝึกประสบการณ์วิชาชีพ /สหกิจศึกษา /บ่มเพาะวิสาหกิจ </h1>
    </div>
    <hr> <!-- เส้น -->
    <table class="table table-bordered text-center">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col">สาขาวิชา</th>
                <th scope="col">ระดับชั้น</th>
                <th scope="col">จำนวนนักศึกษา</th>
                <th scope="col">ระยะเวลาที่ปฏิบัติ (ชั่วโมง) ไม่เกิน 12 ชม./วัน</th>
                <th scope="col">สถานที่ทำงาน/งานที่ควบคุม</th>
                <th scope="col">จำนวนภาระงาน</th>
                <th scope="col">ไฟล์</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->prepare("SELECT * FROM personal_1_3 WHERE userId = :userId AND term = :term AND year = :year");
                $stmt->bindParam(':userId', $_SESSION['userId_view'],);
                $stmt->bindParam(':term', $_SESSION['term_view']);
                $stmt->bindParam(':year', $_SESSION['year_view']);
                $stmt->execute();
                $personal = $stmt->fetchAll();

                $totalAmountWork = 0.00;

                // ตรวจสอบว่ามีข้อมูลหรือไม่
                if (!$personal) { // ไม่มีข้อมูล
                    echo " <tr><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    // วนลูปแสดงข้อมูลที่ดึงมา
                    foreach ($personal as $per) {
            ?>
                        <tr> <!-- แสดงแถวของตาราง (row) โดยใช้ข้อมูลจากตัวแปร $per ในแต่ละคอลัมน์ของตาราง -->
                            <td><?php echo $per['major']; ?></td>
                            <td><?php echo $per['level']; ?></td>
                            <td><?php echo $per['amount_student']; ?></td>
                            <td><?php echo $per['amount_time']; ?></td>
                            <td><?php echo $per['workplace']; ?></td>
                            <td><?php echo $per['amount_work']; ?></td>
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