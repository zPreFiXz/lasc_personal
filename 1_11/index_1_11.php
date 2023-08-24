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
foreach ($personal as $per)
?>

<div class="container">
    <div class="pagetitle mt-3">
        <h1>11. ภาระงานด้านการบริหาร (เฉพาะผู้ได้รับการแต่งตั้งให้ดำรงตำแหน่งบริหาร)</h1>
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
            <form action="1_11/insert_1_11.php" method="POST">
                <tr>
                    <input type="hidden" name="userId" value="<?= $userId ?>">
                    <input type="hidden" class="form-control" name="term" value="<?= $term_year['term']; ?>">
                    <input type="hidden" class="form-control" name="year" value="<?= $term_year['year']; ?>">

                    <td><input class="form-check-input" type="checkbox" name="checkbox" value="checked" required></td>
                    <td>อธิการบดี</td>
                    <td><input type="text" class="form-control" name="scope" value="<?= $per['scope'] ?>" required></td>
                    <td class="score">40</td>
                </tr>
            </form>
            <form action="1_11/insert_1_11.php" method="POST">
                <tr>
                    <input type="hidden" name="userId" value="<?= $userId ?>">
                    <input type="hidden" class="form-control" name="term" value="<?= $term_year['term']; ?>">
                    <input type="hidden" class="form-control" name="year" value="<?= $term_year['year']; ?>">

                    <td><input class="form-check-input" type="checkbox" name="checkbox" value="checked" required></td>
                    <td>รองอธิการบดี</td>
                    <td><input type="text" class="form-control" name="scope" value="<?= $per['scope'] ?>" required></td>
                    <td class="score">40</td>
                </tr>
            </form>
                
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>คณบดี</td>
                    <td><input type="text" class="form-control" name="scope3"></td>
                    <td class="score">30</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>ผู้ช่วยอธิการบดี</td>
                    <td><input type="text" class="form-control" name="scope4"></td>
                    <td class="score">25</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>รองคณบดี</td>
                    <td><input type="text" class="form-control" name="scope5"></td>
                    <td class="score">25</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>ผู้อำนวยการสำนัก</td>
                    <td><input type="text" class="form-control" name="scope6"></td>
                    <td class="score">30</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>ผู้อำนวยการกอง</td>
                    <td><input type="text" class="form-control" name="scope7"></td>
                    <td class="score">20</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>รองผู้อำนวยการสำนัก</td>
                    <td><input type="text" class="form-control" name="scope8"></td>
                    <td class="score">20</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>หัวหน้าสำนัก</td>
                    <td><input type="text" class="form-control" name="scope9"></td>
                    <td class="score">20</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>หัวหน้ากลุ่มงาน</td>
                    <td><input type="text" class="form-control" name="scope10"></td>
                    <td class="score">20</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>หัวหน้างาน</td>
                    <td><input type="text" class="form-control" name="scope11"></td>
                    <td class="score">20</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>ประธานสาขาวิชา</td>
                    <td><input type="text" class="form-control" name="scope12"></td>
                    <td class="score">10</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>หัวหน้าฝ่าย</td>
                    <td><input type="text" class="form-control" name="scope13"></td>
                    <td class="score">10</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>ประธานพันธกิจ</td>
                    <td><input type="text" class="form-control" name="scope14" ></td>
                    <td class="score">5</td>
                </tr>

                <tr>
                    <th scope="row" colspan="3">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                    <td scope="row" class="total-score">0</td>
                </tr>
            </tbody>
    </table>
</div>