<div class="container">
    <div class="pagetitle mt-3">
        <h1>8. ภาระงานด้านบริการวิชาการ (เป็นวิทยากรใน/นอกสถาบัน เป็นกรรมการอ่านผลงานเพื่อขอตำแหน่งทางวิชาการ เป็นที่ปรึกษา หรือร่วมเป็นกรรมการทางวิชาการแก่องค์กร ชุมชนหรือท้องถิ่น งานจัดอบรมทางวิชาการ)</h1>
    </div>
    <hr>
    <table class="table table-bordered text-center align-middle">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col">วัน/เดือน/ปี</th>
                <th scope="col">ประเภทการบริการทางวิชาการ</th>
                <th scope="col">เรื่อง</th>
                <th scope="col">สถานที่</th>
                <th scope="col">ลักษณะงาน</th>
                <th scope="col">จำนวนชั่วโมงทำงาน</th>
                <th scope="col">จำนวนภาระงาน</th>
                <th scope="col">ไฟล์</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->prepare("SELECT * FROM personal_1_8 WHERE userId = :userId AND term = :term AND year = :year");
                $stmt->bindParam(':userId', $_SESSION['userId_view'],);
                $stmt->bindParam(':term', $_SESSION['term_view']);
                $stmt->bindParam(':year', $_SESSION['year_view']);
                $stmt->execute();
                $personal = $stmt->fetchAll();

                $totalAmountWork = 0.00;

                if (!$personal) {
                    echo "<tr><td colspan='9' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    foreach ($personal as $per) {
            ?>
                        <tr>
                            <td style="white-space: nowrap;"><?= $per['date']; ?></td>
                            <td><?= $per['type']; ?></td>
                            <td><?= $per['subject']; ?></td>
                            <td><?= $per['location']; ?></td>
                            <td><?= $per['nature_work']; ?></td>
                            <td><?= $per['hours']; ?></td>
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
                            <th scope="row" colspan="6">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                            <td scope="row"><?= number_format($totalAmountWork, 2); ?></td>
                            <td colspan="2"></td>
                        </tr>
        </tbody>
    </table>
</div>
<?php 
    $conn = null;
?>  