<div class="container">
    <div class="pagetitle mt-3">
        <h1>ข. ภาระงานอาจารย์ที่ปรึกษาชมรม ชุมนุม หรือที่ปรึกษาอื่น</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">2. ภาระงานอาจารย์ที่ปรึกษาของนักศึกษา (ประจำหมู่เรียน /ชมรม /ชุมนุม /ที่ปรึกษาอื่นๆ)</li>
                <li class="breadcrumb-item active">ข. ภาระงานอาจารย์ที่ปรึกษาชมรม ชุมนุม หรือที่ปรึกษาอื่น</li>
            </ol>
        </nav>
    </div>
    <hr> <!-- เส้น -->
    <table class="table table-bordered text-center">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col">ชื่อชมรม ชุมนุม หรือที่ปรึกษาอื่นๆ</th>
                <th scope="col">ระดับชั้น</th>
                <th scope="col">จำนวนนักศึกษา</th>
                <th scope="col">หมู่เรียน</th>
                <th scope="col">จำนวนชั่วโมงทำงานต่อสัปดาห์ต่อภาค</th>
                <th scope="col">จำนวนภาระงาน</th>
                <th scope="col">ไฟล์</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->query("SELECT*FROM personal_1_2_b WHERE userId = '".$_SESSION['user']."' AND term = '".$_SESSION['term']."' AND year = '".$_SESSION['year']."'"); // ดึงข้อมูลจากตาราง personal_1_2_b
                $stmt->execute(); // ประมวลผลคำสั่ง SQL เพื่อดึงข้อมูลจากฐานข้อมูล
                $personal = $stmt->fetchAll(); // เก็บผลลัพธ์ที่ได้จากการดึงข้อมูลทั้งหมดในตัวแปร $personal

                $totalgroupStudy = 0.00;
                $totalAmountTime = 0.00;
                $totalAmountWork = 0.00;

                // ตรวจสอบว่ามีข้อมูลหรือไม่
                if (!$personal) { // ไม่มีข้อมูล
                    echo " <tr><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    // วนลูปแสดงข้อมูลที่ดึงมา
                    foreach ($personal as $per) {
            ?>
                        <tr> <!-- แสดงแถวของตาราง (row) โดยใช้ข้อมูลจากตัวแปร $per ในแต่ละคอลัมน์ของตาราง -->
                            <td style="white-space: nowrap;"><?= $per['club']; ?></td>
                            <td><?= $per['level']; ?></td>
                            <td><?= $per['amount_student']; ?></td>
                            <td><?= $per['group_study']; ?></td>
                            <td><?= $per['amount_time']; ?></td>
                            <td><?= $per['amount_work']; ?></td>
                            <?php $totalgroupStudy += floatval($per['group_study']); ?>
                            <?php $totalAmountTime += floatval($per['amount_time']); ?>
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
                            <?php }else{ ?>
                                <td>ไม่มีไฟล์แนบ</td>
                        </tr>
            <?php } } } ?>
                        <tr>
                            <th scope="row" colspan="3">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                            <td><?= number_format($totalgroupStudy); ?></td>
                            <td><?= number_format($totalAmountTime); ?></td>
                            <td><?= number_format($totalAmountWork, 2); ?></td>
                            <td colspan="2"></td>
                        </tr>
        </tbody>
    </table>
</div>
<?php 
    $conn = null;
?>  