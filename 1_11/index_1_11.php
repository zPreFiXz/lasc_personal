<?php
    require_once "config/db.php";

    // ดึงตาราง term&year
    $stmt = $conn->query("SELECT * FROM `term_year` where id = 1");
    $stmt->execute();
    $term_year = $stmt->fetch();

    $userId = $_SESSION['userId'];
    $term =  $term_year['term'];
    $year =  $term_year['year'];
    $stmt = $conn->query("SELECT*FROM personal_1_11 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
    $stmt->execute();
    $personal = $stmt->fetchAll();

    if (empty($personal)) {
        $userId = $_SESSION['userId'];
        $term = $term_year['term'];
        $year = $term_year['year'];

        $insertStmt = $conn->prepare("INSERT INTO personal_1_11 (userId, term, `year`) VALUES (:userId, :term, :year)");
        $insertStmt->bindParam(':userId', $userId);
        $insertStmt->bindParam(':term', $term);
        $insertStmt->bindParam(':year', $year);
        $insertStmt->execute();

        if ($insertStmt) {
            echo "<script>window.location.href = 'index.php?page=1_11/index_1_11';</script>";
        }
    }

    foreach ($personal as $per)
?>
<div class="container">
    <div class="pagetitle mt-3">
        <h1>11. ภาระงานด้านการบริหาร (เฉพาะผู้ได้รับการแต่งตั้งให้ดำรงตำแหน่งบริหาร)</h1>
    </div>
    <hr>
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" id="alert-success">
            <?php
                echo $_SESSION['success']; // แสดงข้อความที่เก็บในตัวแปร session 'success'
                unset($_SESSION['success']); // ลบค่าในตัวแปร session 'success'
            ?>
        </div>
        <script>
            setTimeout(function() { // ซ่อนข้อความแจ้งเตือนหลังจาก 3 วินาที
                document.getElementById('alert-success').style.display = 'none';
            }, 3000);
        </script>
    <?php } ?>
    <form action="1_11/edit_1_11.php" method="post">
        <div class="d-flex justify-content-end mb-3">
        <button type="submit" name="update" class="btn btn-primary"><i class="bi bi-pencil-square">&nbsp;&nbsp;</i>บันทึกร่าง</button>
        </div> 
        <table class="table table-bordered text-center align-middle mt-3">
            <thead class="align-middle table-secondary">
                <tr>
                    <th scope="col">ให้ทำเครื่องหมาย <br>✓ ในช่องที่ตรงกับ<br>ตำแหน่งได้รับแต่งตั้ง</th>
                    <th scope="col">ตำแหน่ง</th>
                    <th scope="col">ขอบข่ายภาระงานที่ปฏิบัติ</th>
                    <th scope="col">จำนวนภาระงาน</th>
                </tr>
            </thead>
            <tbody>
                <input type="hidden" name="userId" value="<?= $userId ?>">
                <input type="hidden" class="form-control" name="term" value="<?= $term_year['term']; ?>">
                <input type="hidden" class="form-control" name="year" value="<?= $term_year['year']; ?>">
                <input type="hidden" name="amount_work" id="amount_work" value="">
                <?php if ($per['checkbox1'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox1" onclick="sum()" name="checkbox1" value="40"></td>
                        <td>อธิการบดี</td>
                        <td><input type="text" class="form-control" id="scope1" name="scope1" value="<?= $per['scope1'] ?>"></td>
                        <td class="score">40</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox1" onclick="sum()" name="checkbox1" value="40" checked></td>
                        <td>อธิการบดี</td>
                        <td><input type="text" class="form-control" id="scope1" name="scope1" value="<?= $per['scope1'] ?>"></td>
                        <td class="score">40</td>
                    </tr>
                <?php } ?>
                <?php if ($per['checkbox2'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox2" onclick="sum()" name="checkbox2" value="30"></td>
                        <td>รองอธิการบดี</td>
                        <td><input type="text" class="form-control" id="scope2" name="scope2" value="<?= $per['scope2'] ?>"></td>
                        <td class="score">40</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox2" onclick="sum()" name="checkbox2" value="30" checked></td>
                        <td>รองอธิการบดี</td>
                        <td><input type="text" class="form-control" id="scope2" name="scope2" value="<?= $per['scope2'] ?>"></td>
                        <td class="score">40</td>
                    </tr>
                <?php } ?>
                <?php if ($per['checkbox3'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox3" onclick="sum()" name="checkbox3" value="30"></td>
                        <td>คณบดี</td>
                        <td><input type="text" class="form-control" id="scope3" name="scope3" value="<?= $per['scope3'] ?>"> </td>
                        <td class="score">30</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox3" onclick="sum()" name="checkbox3" value="30" checked></td>
                        <td>คณบดี</td>
                        <td><input type="text" class="form-control" id="scope3" name="scope3" value="<?= $per['scope3'] ?>"> </td>
                        <td class="score">30</td>
                    </tr>
                <?php } ?>
                <?php if ($per['checkbox4'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox4" onclick="sum()" name="checkbox4" value="25"></td>
                        <td>ผู้ช่วยอธิการบดี</td>
                        <td><input type="text" class="form-control" id="scope4" name="scope4" value="<?= $per['scope4'] ?>"> </td>
                        <td class="score">25</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox4" onclick="sum()" name="checkbox4" value="25" checked></td>
                        <td>ผู้ช่วยอธิการบดี</td>
                        <td><input type="text" class="form-control" id="scope4" name="scope4" value="<?= $per['scope4'] ?>"> </td>
                        <td class="score">25</td>
                    </tr>
                <?php } ?>
                <?php if ($per['checkbox5'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox5" onclick="sum()" name="checkbox5" value="25"></td>
                        <td>รองคณบดี</td>
                        <td><input type="text" class="form-control" id="scope5" name="scope5" value="<?= $per['scope5'] ?>"> </td>
                        <td class="score">25</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox5" onclick="sum()" name="checkbox5" value="25" checked></td>
                        <td>รองคณบดี</td>
                        <td><input type="text" class="form-control" id="scope5" name="scope5" value="<?= $per['scope5'] ?>"> </td>
                        <td class="score">25</td>
                    </tr>
                <?php } ?>
                <?php if ($per['checkbox6'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox6" onclick="sum()" name="checkbox6" value="30"></td>
                        <td>ผู้อำนวยการสำนัก</td>
                        <td><input type="text" class="form-control" id="scope6" name="scope6" value="<?= $per['scope6'] ?>"> </td>
                        <td class="score">30</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox6" onclick="sum()" name="checkbox6" value="30" checked></td>
                        <td>ผู้อำนวยการสำนัก</td>
                        <td><input type="text" class="form-control" id="scope6" name="scope6" value="<?= $per['scope6'] ?>"> </td>
                        <td class="score">30</td>
                    </tr>
                <?php } ?>
                <?php if ($per['checkbox7'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox7" onclick="sum()" name="checkbox7" value="20"></td>
                        <td>ผู้อำนวยการกอง</td>
                        <td><input type="text" class="form-control" id="scope7" name="scope7" value="<?= $per['scope7'] ?>"> </td>
                        <td class="score">20</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox7" onclick="sum()" name="checkbox7" value="20" checked></td>
                        <td>ผู้อำนวยการกอง</td>
                        <td><input type="text" class="form-control" id="scope7" name="scope7" value="<?= $per['scope7'] ?>"> </td>
                        <td class="score">20</td>
                    </tr>
                <?php } ?>
                <?php if ($per['checkbox8'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox8" onclick="sum()" name="checkbox8" value="20"></td>
                        <td>รองผู้อำนวยการสำนัก</td>
                        <td><input type="text" class="form-control" id="scope8" name="scope8" value="<?= $per['scope8'] ?>"> </td>
                        <td class="score">20</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox8" onclick="sum()" name="checkbox8" value="20" checked></td>
                        <td>รองผู้อำนวยการสำนัก</td>
                        <td><input type="text" class="form-control" id="scope8" name="scope8" value="<?= $per['scope8'] ?>"> </td>
                        <td class="score">20</td>
                    </tr>
                <?php } ?>
                <?php if ($per['checkbox9'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox9" onclick="sum()" name="checkbox9" value="20"></td>
                        <td>หัวหน้าสำนัก</td>
                        <td><input type="text" class="form-control" id="scope9" name="scope9" value="<?= $per['scope9'] ?>"> </td>
                        <td class="score">20</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox9" onclick="sum()" name="checkbox9" value="20" checked></td>
                        <td>หัวหน้าสำนัก</td>
                        <td><input type="text" class="form-control" id="scope9" name="scope9" value="<?= $per['scope9'] ?>"> </td>
                        <td class="score">20</td>
                    </tr>
                <?php } ?>
                <?php if ($per['checkbox10'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox10" onclick="sum()" name="checkbox10" value="20"></td>
                        <td>หัวหน้ากลุ่มงาน</td>
                        <td><input type="text" class="form-control" id="scope10" name="scope10" value="<?= $per['scope10'] ?>"></td>
                        <td class="score">20</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox10" onclick="sum()" name="checkbox10" value="20" checked></td>
                        <td>หัวหน้ากลุ่มงาน</td>
                        <td><input type="text" class="form-control" id="scope10" name="scope10" value="<?= $per['scope10'] ?>"></td>
                        <td class="score">20</td>
                    </tr>
                <?php } ?>
                <?php if ($per['checkbox11'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox11" onclick="sum()" name="checkbox11" value="20"></td>
                        <td>หัวหน้างาน</td>
                        <td><input type="text" class="form-control" id="scope11" name="scope11" value="<?= $per['scope11'] ?>"></td>
                        <td class="score">20</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox11" onclick="sum()" name="checkbox11" value="20" checked></td>
                        <td>หัวหน้างาน</td>
                        <td><input type="text" class="form-control" id="scope11" name="scope11" value="<?= $per['scope11'] ?>"></td>
                        <td class="score">20</td>
                    </tr>
                <?php } ?>
                <?php if ($per['checkbox12'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox12" onclick="sum()" name="checkbox12" value="10"></td>
                        <td>ประธานสาขาวิชา</td>
                        <td><input type="text" class="form-control" id="scope12" name="scope12" value="<?= $per['scope12'] ?>"></td>
                        <td class="score">10</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox12" onclick="sum()" name="checkbox12" value="10" checked></td>
                        <td>ประธานสาขาวิชา</td>
                        <td><input type="text" class="form-control" id="scope12" name="scope12" value="<?= $per['scope12'] ?>"></td>
                        <td class="score">10</td>
                    </tr>
                <?php } ?>
                <?php if ($per['checkbox13'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox13" onclick="sum()" name="checkbox13" value="10"></td>
                        <td>หัวหน้าฝ่าย</td>
                        <td><input type="text" class="form-control" id="scope13" name="scope13" value="<?= $per['scope13'] ?>"></td>
                        <td class="score">10</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox13" onclick="sum()" name="checkbox13" value="10" checked></td>
                        <td>หัวหน้าฝ่าย</td>
                        <td><input type="text" class="form-control" id="scope13" name="scope13" value="<?= $per['scope13'] ?>"></td>
                        <td class="score">10</td>
                    </tr>
                <?php } ?>
                <?php if ($per['checkbox14'] == 0) { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox14" onclick="sum()" name="checkbox14" value="5"></td>
                        <td>ประธานพันธกิจ</td>
                        <td><input type="text" class="form-control" id="scope14" name="scope14" value="<?= $per['scope14'] ?>"></td>
                        <td class="score">5</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input class="form-check-input" type="checkbox" id="checkbox14" onclick="sum()" name="checkbox14" value="5" checked></td>
                        <td>ประธานพันธกิจ</td>
                        <td><input type="text" class="form-control" id="scope14" name="scope14" value="<?= $per['scope14'] ?>"></td>
                        <td class="score">5</td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="3">
                        จำนวนภาระงานตลอดภาคเรียน
                    </td>
                    <td><span id="result"></span></td>
                </tr> 
            </tbody>
        </table>
    </form> 
</div>
<script>
    function sum() {
        var totalScore = 0;

        for (var i = 1; i <= 14; i++) {
            var checkbox = document.getElementById("checkbox" + i);
            var scopeInput = document.getElementById("scope" + i);

            if (checkbox.checked) {
                totalScore += parseInt(checkbox.value);
            }
        }

        document.getElementById("amount_work").value = totalScore;
        console.log(totalScore);

        var resultElement = document.getElementById("result");
        resultElement.textContent = totalScore;
    }

    sum();
</script>
<?php 
    $conn = null;
?>