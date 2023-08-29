<div class="container">
    <div class="pagetitle mt-3">
        <h1>ก.การสร้างงานวิจัย</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">6. ภาระงานวิจัย (งานวิจัยพื้นฐาน/งานวิจัยประยุกต์)</li>
            <li class="breadcrumb-item active">ก.การสร้างงานวิจัย</li>
        </ol>
    </div>
    <hr>
    <table class="table table-bordered text-center align-middle">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col" style="white-space: nowrap;">ลำดับที่</th>
                <th scope="col" style="white-space: nowrap;">ชื่องานวิจัย</th>
                <th scope="col" style="white-space: nowrap;">แหล่งเงินทุน</th>
                <th scope="col" style="white-space: nowrap;">กรอบเงินทุน</th>
                <th scope="col">ระยะเวลาเริ่มต้น-สิ้นสุด</th>
                <th scope="col">ลักษณะงานเดี่ยว/กลุ่ม</th>
                <th scope="col">หัวหน้าโครงการ/ผู้ร่วมโครงการ</th>
                <th scope="col">ร้อยละการมีส่วนร่วม</th>
                <th scope="col" style="white-space: nowrap;">จำนวนภาระงาน</th>
                <th scope="col" style="white-space: nowrap;">ไฟล์</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $userId = $_SESSION['userId'];
                $term =  $term_year['term'];
                $year =  $term_year['year'];
                $stmt = $conn->query("SELECT * FROM personal_1_6_a WHERE userId = '" . $_SESSION['user'] . "' AND term = '" . $_SESSION['term'] . "' AND year = '" . $_SESSION['year'] . "'");
                $stmt->execute();
                $personal = $stmt->fetchAll();

                $totalAmountWork = 0.00;

                if (!$personal) {
                    echo "<tr><td colspan='11' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    foreach ($personal as $per) {
            ?>
                        <tr>
                            <td style="white-space: nowrap;"><?= $per['number']; ?></td>
                            <td><?= $per['research_name']; ?></td>
                            <td><?= $per['funding_source']; ?></td>
                            <td><?= $per['funding_framework']; ?></td>
                            <td><?= $per['start_end']; ?></td>
                            <td><?= $per['nature_work']; ?></td>
                            <td><?= $per['leader']; ?></td>
                            <td><?= $per['contribute']; ?></td>
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
                            <th scope="row" colspan="8">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                            <td scope="row"><?= number_format($totalAmountWork, 2); ?></td>
                            <td colspan="2"></td>
                        </tr>
        </tbody>
    </table>
</div>