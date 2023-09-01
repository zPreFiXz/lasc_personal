<div class="container">
    <div class="pagetitle mt-3">
        <h1>4. ภาระงานกิจกรรมพัฒนานักศึกษา (งานปฐมนิเทศ /ปัจฉิมนิเทศ /งานองค์การ-สโมสรนักศึกษา งานกีฬา งานกำกับดูแลวินัยนักศึกษา การศึกษาดูงานของนักศึกษา งานออกค่ายนักศึกษา หรืองานอื่นที่เกี่ยวข้อง)</h1>
    </div>
    <hr>
    <table class="table table-bordered text-center align-middle">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col">วัน/เดือน/ปี</th>
                <th scope="col">ชื่อโครงการ/กิจกรรม/งาน</th>
                <th scope="col">สถานที่/งานที่ควบคุม</th>
                <th scope="col">ระยะเวลาปฏิบัติ (ชั่วโมง)</th>
                <th scope="col">จำนวนภาระงาน</th>
                <th scope="col">อัปโหลดไฟล์</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->query("SELECT * FROM personal_1_4 WHERE userId = '" . $_SESSION['user'] . "' AND term = '" . $_SESSION['term'] . "' AND year = '" . $_SESSION['year'] . "'");
                $stmt->execute();
                $personal = $stmt->fetchAll();

                $totalAmountWork = 0.00;

                if (!$personal) {
                    echo "<tr><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    foreach ($personal as $per) {
            ?>
                        <tr>
                            <td style="white-space: nowrap;"><?= $per['date']; ?></td>
                            <td><?= $per['project_name']; ?></td>
                            <td><?= $per['location']; ?></td>
                            <td><?= $per['period']; ?></td>
                            <td><?= $per['amount_work']; ?></td>
                            <?php $totalAmountWork += floatval($per['amount_work']); ?>
                            <?php if ($per['file']) { ?>
                                <td style="white-space: nowrap;">
                                    <a href="uploads/<?= $per['file']; ?>" target="_blank" class="btn btn-secondary">
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
                            <th scope="row" colspan="4">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                            <td scope="row"><?= number_format($totalAmountWork, 2); ?></td>
                            <td colspan="2"></td>
                        </tr>
        </tbody>
    </table>
</div>
<?php 
    $conn = null;
?>  