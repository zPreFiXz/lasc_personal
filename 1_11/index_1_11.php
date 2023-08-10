<?php
require_once "config/db.php";

// ดึงตาราง term&year
$stmt = $conn->query("SELECT * FROM `term&year` where id = 1");
$stmt->execute();
$term_year = $stmt->fetch();

$userId = $_SESSION['userId'];
$term =  $term_year['term'];
$year =  $term_year['year'];
$stmt = $conn->query("SELECT*FROM personal_1_11 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
$stmt->execute();
$personal = $stmt->fetchAll();


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
        <form action="1_11/insert_1_11.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="userId" value="<?= $userId ?>">
            <input type="hidden" class="form-control" name="term" value="<?= $term_year['term']; ?>">
            <input type="hidden" class="form-control" name="year" value="<?= $term_year['year']; ?>">
            <tbody>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1[]" name="gridCheck1" value="checked"></td>
                    <td>อธิการบดี</td>
                    <td><input type="text" class="form-control" name="scope1" oninput="saveValue(this, 'input1')"></td>
                    <td class="score">40</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>รองอธิการบดี</td>
                    <td><input type="text" class="form-control" name="scope2" oninput="saveValue(this, 'input2')""></td>
                    <td class=" score">30</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>คณบดี</td>
                    <td><input type="text" class="form-control" name="scope3" oninput="saveValue(this, 'input3')"></td>
                    <td class="score">30</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>ผู้ช่วยอธิการบดี</td>
                    <td><input type="text" class="form-control" name="scope4" oninput="saveValue(this, 'input4')"></td>
                    <td class="score">25</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>รองคณบดี</td>
                    <td><input type="text" class="form-control" name="scope5" oninput="saveValue(this, 'input5')"></td>
                    <td class="score">25</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>ผู้อำนวยการสำนัก</td>
                    <td><input type="text" class="form-control" name="scope6" oninput="saveValue(this, 'input6')"></td>
                    <td class="score">30</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>ผู้อำนวยการกอง</td>
                    <td><input type="text" class="form-control" name="scope7" oninput="saveValue(this, 'input7')"></td>
                    <td class="score">20</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>รองผู้อำนวยการสำนัก</td>
                    <td><input type="text" class="form-control" name="scope8" oninput="saveValue(this, 'input8')"></td>
                    <td class="score">20</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>หัวหน้าสำนัก</td>
                    <td><input type="text" class="form-control" name="scope9" oninput="saveValue(this, 'input9')"></td>
                    <td class="score">20</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>หัวหน้ากลุ่มงาน</td>
                    <td><input type="text" class="form-control" name="scope10" oninput="saveValue(this, 'input10')"></td>
                    <td class="score">20</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>หัวหน้างาน</td>
                    <td><input type="text" class="form-control" name="scope11" oninput="saveValue(this, 'input11')"></td>
                    <td class="score">20</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>ประธานสาขาวิชา</td>
                    <td><input type="text" class="form-control" name="scope12" oninput="saveValue(this, 'input12')"></td>
                    <td class="score">10</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>หัวหน้าฝ่าย</td>
                    <td><input type="text" class="form-control" name="scope13" oninput="saveValue(this, 'input13')"></td>
                    <td class="score">10</td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="gridCheck1"></td>
                    <td>ประธานพันธกิจ</td>
                    <td><input type="text" class="form-control" name="scope14" oninput="saveValue(this, 'input14')"></td>
                    <td class="score">5</td>
                </tr>

                <tr>
                    <th scope="row" colspan="3">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                    <td scope="row" class="total-score">0</td>
                </tr>
            </tbody>
            <div class="d-flex justify-content-end ">
                <button type="submit" name="submit" class="btn btn-primary">บันทึกร่าง</button>
            </div>
        </form>
    </table>
</div>

<script>
    // JavaScript
    const checkboxes = document.querySelectorAll('.form-check-input');
    const scores = document.querySelectorAll('.score');
    const totalScoreElement = document.querySelector('.total-score');

    // Function to save and load data from LocalStorage
    function saveToLocalStorage(key, value) {
        localStorage.setItem(key, value);
    }

    function loadFromLocalStorage(key) {
        return localStorage.getItem(key);
    }

    checkboxes.forEach((checkbox, index) => {
        // Load checkbox state from LocalStorage
        const checkboxState = loadFromLocalStorage(`checkbox-${index}`);
        if (checkboxState === 'true') {
            checkbox.checked = true;
        }

        checkbox.addEventListener('change', () => {
            const score = parseInt(scores[index].textContent);
            const totalScore = parseInt(totalScoreElement.textContent);

            if (checkbox.checked) {
                totalScoreElement.textContent = totalScore + score;
                // Save checkbox state to LocalStorage
                saveToLocalStorage(`checkbox-${index}`, true);
            } else {
                totalScoreElement.textContent = totalScore - score;
                // Save checkbox state to LocalStorage
                saveToLocalStorage(`checkbox-${index}`, false);
            }
        });
    });

    // Function to calculate and load total score from LocalStorage
    function loadTotalScore() {
        let totalScore = 0;
        for (let index = 0; index < checkboxes.length; index++) {
            const checkboxState = loadFromLocalStorage(`checkbox-${index}`);
            if (checkboxState === 'true') {
                const score = parseInt(scores[index].textContent);
                totalScore += score;
            }
        }
        totalScoreElement.textContent = totalScore;
    }

    // Load total score when the page loads
    loadTotalScore();

    function saveValue(input) {
        const value = input.value;
        sessionStorage.setItem('inputValue', value); // หรือใช้ localStorage แทน sessionStorage หากต้องการให้ค่ายังคงอยู่เมื่อปิดเบราว์เซอร์และเปิดใหม่
    }

    function saveValue(input, key) {
        const value = input.value;
        sessionStorage.setItem(key, value); // หรือใช้ localStorage แทน sessionStorage หากต้องการให้ค่ายังคงอยู่เมื่อปิดเบราว์เซอร์และเปิดใหม่
    }

    document.addEventListener('DOMContentLoaded', () => {
        const input1Value = sessionStorage.getItem('input1');
        const input2Value = sessionStorage.getItem('input2');
        const input3Value = sessionStorage.getItem('input3');
        const input4Value = sessionStorage.getItem('input4');
        const input5Value = sessionStorage.getItem('input5');
        const input6Value = sessionStorage.getItem('input6');
        const input7Value = sessionStorage.getItem('input7');
        const input8Value = sessionStorage.getItem('input8');
        const input9Value = sessionStorage.getItem('input9');
        const input10Value = sessionStorage.getItem('input10');
        const input11Value = sessionStorage.getItem('input11');
        const input12Value = sessionStorage.getItem('input12');
        const input13Value = sessionStorage.getItem('input13');
        const input14Value = sessionStorage.getItem('input14');

        const inputElement1 = document.querySelector('[name="scope1"]');
        const inputElement2 = document.querySelector('[name="scope2"]');
        const inputElement3 = document.querySelector('[name="scope3"]');
        const inputElement4 = document.querySelector('[name="scope4"]');
        const inputElement5 = document.querySelector('[name="scope5"]');
        const inputElement6 = document.querySelector('[name="scope6"]');
        const inputElement7 = document.querySelector('[name="scope7"]');
        const inputElement8 = document.querySelector('[name="scope8"]');
        const inputElement9 = document.querySelector('[name="scope9"]');
        const inputElement10 = document.querySelector('[name="scope10"]');
        const inputElement11 = document.querySelector('[name="scope11"]');
        const inputElement12 = document.querySelector('[name="scope12"]');
        const inputElement13 = document.querySelector('[name="scope13"]');
        const inputElement14 = document.querySelector('[name="scope14"]');

        // Assuming you have arrays of input values and input elements
        const inputValues = [
            input1Value,
            input2Value,
            input3Value,
            input4Value,
            input5Value,
            input6Value,
            input7Value,
            input8Value,
            input9Value,
            input10Value,
            input11Value,
            input12Value,
            input13Value,
            input14Value
        ];
        const inputElements = [
            inputElement1,
            inputElement2,
            inputElement3,
            inputElement4,
            inputElement5,
            inputElement6,
            inputElement7,
            inputElement8,
            inputElement9,
            inputElement10,
            inputElement11,
            inputElement12,
            inputElement13,
            inputElement14
        ];

        for (let i = 0; i < inputValues.length; i++) {
            const inputValue = inputValues[i];
            const inputElement = inputElements[i];

            if (inputValue) {
                inputElement.value = inputValue;
            }
        }
    });
</script>