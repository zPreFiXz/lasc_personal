<div class="container">
    <div class="pagetitle mt-3">
        <h1>ก. ภาระงานอาจารย์ที่ปรึกษาหมู่เรียน</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">2. ภาระงานอาจารย์ที่ปรึกษาของนักศึกษา (ประจำหมู่เรียน /ชมรม /ชุมนุม /ที่ปรึกษาอื่นๆ)</li>
            <li class="breadcrumb-item active">ก. ภาระงานอาจารย์ที่ปรึกษาหมู่เรียน</li>
        </ol>
    </div>
    <hr> 
    <table class="table table-bordered text-center align-middle">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col">สาขาวิชา</th>
                <th scope="col">รหัส</th>
                <th scope="col">ระดับชั้น</th>
                <th scope="col">หมู่เรียน</th>
                <th scope="col">จำนวนนักศึกษา</th>
                <th scope="col">จำนวนภาระงาน</th>
                <th scope="col">ไฟล์</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->prepare("SELECT * FROM personal_1_2_a WHERE userId = :userId AND term = :term AND year = :year");
                $stmt->bindParam(':userId', $_SESSION['userId_view'],);
                $stmt->bindParam(':term', $_SESSION['term_view']);
                $stmt->bindParam(':year', $_SESSION['year_view']);
                $stmt->execute();
                $personal = $stmt->fetchAll();

                $totalAmountWork = 0.00;

                if (!$personal) {
                    echo "<tr><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    foreach ($personal as $per) {
            ?>
                        <tr>
                            <td style="white-space: nowrap;"><?= $per['major']; ?></td>
                            <td><?= $per['code']; ?></td>
                            <td><?= $per['level']; ?></td>
                            <td><?= $per['group_study']; ?></td>
                            <td><?= $per['amount_student']; ?></td>
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
                            <?php }else{  ?>
                                <td>ไม่มีไฟล์แนบ</td>
                        </tr>
            <?php } } } ?>
                        <tr>
                            <th scope="row" colspan="5">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                            <td scope="row"><?= number_format($totalAmountWork, 2); ?></td>
                            <td colspan="2"></td>
                        </tr>
        </tbody>
    </table>
</div>
<?php 
    $conn = null;
?>  