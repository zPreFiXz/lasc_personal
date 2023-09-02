<?php
    require_once "config/db.php";

    $stmt = $conn->prepare("SELECT * FROM personal_1_1_file WHERE userId = :userId AND term = :term AND year = :year");
    $stmt->bindParam(':userId', $_SESSION['userId_view']);
    $stmt->bindParam(':term', $_SESSION['term_view']);
    $stmt->bindParam(':year', $_SESSION['year_view']);
    $stmt->execute();
    $personal = $stmt->fetchAll();

?>
<div class="container">
    <div class="pagetitle mt-3">
        <h1>1. ภาระงานสอน (ภาคปกติ)</h1>
    </div>
    <hr>
    <div class="d-flex justify-content-end mb-3">
        <?php if (isset($personal[0]['file'])) { ?> 
            <td style="white-space: nowrap;">
                <a href="uploads/<?= $personal[0]['file']; ?>" class="btn btn-secondary" target="_blank">
                    <div class="icon d-flex">
                        <i class="bi bi-eye"></i>&nbsp;
                        <div class="label">ดูไฟล์</div>
                    </div>
                </a>
            </td>
        <?php } else { ?>
            <td>
                <div class="btn btn-warning">ไม่มีไฟล์แนบ</div>
            </td>
        <?php } ?>
    </div>
    </tr>
    <table class="table table-bordered text-center align-middle">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col" rowspan="2" style="white-space: nowrap;">รหัสวิชา</th>
                <th scope="col" rowspan="2" style="white-space: nowrap;">ชื่อวิชา</th>
                <th scope="col" rowspan="2" style="white-space: nowrap;">หน่วยกิต<br>(ทฤษฎี-ปฏิบัติ-ค้นคว้า)</th>
                <th scope="col" colspan="3">ทฤษฎี (ชั่วโมง/สัปดาห์)</th>
                <th scope="col" colspan="4">ปฏิบัติ (ชั่วโมง/สัปดาห์)</th>
                <th scope="col" rowspan="2" style="white-space: nowrap;">ระดับชั้น(หมู่เรียน)</th>
                <th scope="col" rowspan="2" style="white-space: nowrap;">หมู่เรียนที่</th>
                <th scope="col" rowspan="2">จำนวนนักศึกษา </th>
                <th scope="col" rowspan="2">สัดส่วนการสอน (ป้อนตัวเลขไม่มี%)</th>
                <th scope="col" rowspan="2">รวมจำนวนภาระงาน/สัปดาห์ </th>
            </tr>
            <tr>
                <th scope="col">เตรียมสอนทฤษฎี</th>
                <th scope="col">ชั่วโมงบรรยายตามจริง</th>
                <th scope="col">ตรวจงาน</th>
                <th scope="col">เตรียมสอนปฏิบัติ</th>
                <th scope="col">ชั่วโมงปฏิบัติตามจริง</th>
                <th scope="col">ตรวจงาน</th>
                <th scope="col">แบบปฏิบัติ</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->prepare("SELECT * FROM personal_1_1 WHERE userId = :userId AND term = :term AND year = :year");
                $stmt->bindParam(':userId', $_SESSION['userId_view'],);
                $stmt->bindParam(':term', $_SESSION['term_view']);
                $stmt->bindParam(':year', $_SESSION['year_view']);
                $stmt->execute();
                $personal = $stmt->fetchAll();

                $totalAmountWork = 0.00;

                if (!$personal) {
                    echo "<tr><td colspan='18' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    foreach ($personal as $per) {
            ?>
                        <tr>
                            <td style="white-space: nowrap;"><?= $per['code_course']; ?></td>
                            <td class="mb-3" style="white-space: nowrap;"><?= $per['name_course']; ?></td>
                            <td><?= $per['unit']; ?></td>
                            <td><?= $per['prepare_theory']; ?></td>
                            <td><?= $per['hour_lecture']; ?></td>
                            <td><?= $per['check_work1']; ?></td>
                            <td><?= $per['prepare_practice']; ?></td>
                            <td><?= $per['hour_practice']; ?></td>
                            <td><?= $per['check_work2']; ?></td>
                            <td style="white-space: nowrap;"><?= $per['practice_subject']; ?></td>
                            <td><?= $per['level']; ?></td>
                            <td><?= $per['group_study']; ?></td>
                            <td><?= $per['amount_student']; ?></td>
                            <td><?= $per['proportion']; ?></td>
                            <td><?= $per['amount_work']; ?></td>
                            <?php $totalAmountWork += floatval($per['amount_work']); ?>
            <?php } } ?>
                        <tr>
                            <th scope="row" colspan="14">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                            <td scope="row"><?= number_format($totalAmountWork, 2); ?></td>
                        </tr>
        </tbody>
    </table>
</div>
<?php
    $conn = null;
?>