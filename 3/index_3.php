<?php
    $userId = $_SESSION['userId'];

    $stmt = $conn->query("SELECT * FROM `term_year` where id = 1");
    $stmt->execute();
    $term_year = $stmt->fetch();

    $term =  $term_year['term'];
    $year =  $term_year['year'];

    $stmt = $conn->prepare("SELECT * FROM personal_3 WHERE userId = :userId AND term = :term AND year = :year");
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':term', $term);
    $stmt->bindParam(':year', $year);
    $stmt->execute();
    $personal = $stmt->fetchAll();

    if (empty($personal)) {
        $userId = $_SESSION['userId'];
        $term = $term_year['term'];
        $year = $term_year['year'];
        
        $insertStmt = $conn->prepare("INSERT INTO personal_3 (userId, term, year) VALUES (:userId, :term, :year)");
        $insertStmt->bindParam(':userId', $userId);
        $insertStmt->bindParam(':term', $term);
        $insertStmt->bindParam(':year', $year);
        
        $insertStmt->execute();

        if ($insertStmt) {
            echo "<script>window.location.href = 'index.php?page=3/index_3';</script>";
        }
    }
    foreach($personal as $per)
?>
<div class="container">
    <div class="pagetitle mt-5" style="text-align: center;">
        <h1>แบบประเมินผลการปฏิบัติงาน <br>สายวิชาการ</h1>
    </div>
    <div class="card mt-5">
        <div class="card-body mt-4 mb-4">
            <form action="3/edit_3.php" method="POST" >
                <input type="hidden" class="form-control" name="userId" value="<?= $userId ?>">
                <input type="hidden" class="form-control" name="term" value="<?= $term; ?>">
                <input type="hidden" class="form-control" name="year" value="<?= $year; ?>">
                <div class="one d-flex">
                    <div class="col-md-6 mb-3 d-flex">
                        <label for="name" class="col-form-label me-3" style="white-space: nowrap;">ชื่อ-สกุลผู้รับการประเมิน</label>
                        <input type="text" class="form-control me-3" name="name" value="<?= $per['name']; ?>">
                    </div>
                    <div class="col-md-6 mb-3 d-flex">
                        <label for="branch" class="col-form-label me-3">สาขา</label>
                        <input type="text" class="form-control" name="branch" value="<?= $per['branch']; ?>">
                    </div>
                </div>
                <div class="two d-flex">
                    <div class="col-md-6 mb-3 d-flex">
                        <label for="name" class="col-form-label me-3" style="white-space: nowrap;">1. ด้านปริมาณงาน ภาระงานหลักตลอดภาคเรียน จำนวน</label>
                        <input type="text" class="form-control me-3 text-center" name="amount_work" value="<?= $per['amount_work']; ?>">
                        <label for="name" class="col-form-label me-3" style="white-space: nowrap;">ภาระงาน</label>
                    </div>
                </div>
                <div class="three d-flex">
                    <div class="col-md-6 mb-3 d-flex">
                        <label for="name" class="col-form-label me-3" style="white-space: nowrap;">2. ด้านคุณภาพและคุณลักษณะอันพึงประสงค์</label>
                    </div>
                </div>
                <table class="table table-bordered mt-3">
                    <thead class="align-middle table-secondary text-center">
                        <tr>
                            <th scope="col" rowspan="2">ที่</th>
                            <th scope="col" rowspan="2">รายการ</th>
                            <th scope="col" rowspan="2">น้ำหนักคะแนน</th>
                            <th scope="col" colspan="5">ผลการประเมิน</th>
                        </tr>
                        <tr>
                            <th scope="col">คุณภาพ</th>
                            <th scope="col">ประสิทธิภาพ</th>
                            <th scope="col">ประสิทธิผล</th>
                            <th scope="col">เต็ม</th>
                            <th scope="col">คะแนนที่ได้</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col">1</th>
                            <th scope="col">ภาระงานหลัก</th>
                            <th scope="col" class="text-center">50%</th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="quality_work" value="<?= $per['quality_work']; ?>"></th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="efficiency_work" value="<?= $per['efficiency_work']; ?>"></th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="effectiveness_work" value="<?= $per['effectiveness_work']; ?>"></th>
                            <th scope="col" class="text-center">50</th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="score_work" value="<?= $per['score_work']; ?>"></th>
                        </tr>
                        <tr>
                            <th scope="col">2</th>
                            <th scope="col" style="white-space: nowrap;">จรรยาบรรณวิชาชีพ</th>
                            <th scope="col" class="text-center">10%</th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="quality_ethics" value="<?= $per['score_work']; ?>"></th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="efficiency_ethics" value="<?= $per['efficiency_ethics']; ?>"></th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="effectiveness_ethics" value="<?= $per['effectiveness_ethics']; ?>"></th>
                            <th scope="col" class="text-center">10</th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="score_ethics" value="<?= $per['score_ethics']; ?>"></th>
                        </tr>
                        <tr>
                            <th scope="col">3</th>
                            <th scope="col">สมรรถนะ</th>
                            <th scope="col" class="text-center">30%</th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="quality_capacity" value="<?= $per['quality_capacity']; ?>"></th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="efficiency_capacity" value="<?= $per['efficiency_capacity']; ?>"></th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="effectiveness_capacity" value="<?= $per['effectiveness_capacity']; ?>"></th>
                            <th scope="col" class="text-center">50</th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="score_capacity" value="<?= $per['score_capacity']; ?>"></th>
                        </tr>
                        <tr>
                            <td scope="col" rowspan="5"></td>
                            <td scope="col">3.1 การมุ่งผลสัมฤทธิ์</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                        </tr>
                        <tr>
                            <td scope="col">3.2 การบริการที่ดี</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                        </tr>
                        <tr>
                            <td scope="col">3.3 การสั่งสมความเชี่ยวชาญในอาชีพ</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                        </tr>
                        <tr>
                            <td scope="col" style="white-space: nowrap;">3.4 การยึดมั่นในความถูกต้องชอบธรรมและจริยธรรม</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                        </tr>
                        <tr>
                            <td scope="col">3.5 การทำงานเป็นทีม</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                        </tr>
                        <tr>
                            <th scope="col">4</th>
                            <th scope="col">งานอื่นที่ได้รับมอบหมายเป็นพิเศษ/เพิ่มเติม</th>
                            <th scope="col" class="text-center">10%</th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="quality_more" value="<?= $per['quality_more']; ?>"></th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="efficiency_more" value="<?= $per['efficiency_more']; ?>"></th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="effectiveness_more" value="<?= $per['effectiveness_more']; ?>"></th>
                            <th scope="col" class="text-center">10</th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="score_more" value="<?= $per['score_more']; ?>"></th>
                        </tr>
                        <tr>
                            <td scope="col"></td>
                            <th scope="col" class="text-center">รวม</th>
                            <th scope="col" class="text-center">100%</th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="quality_total" value="<?= $per['quality_total']; ?>"></th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="efficiency_total" value="<?= $per['efficiency_total']; ?>"></th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="effectiveness_total" value="<?= $per['effectiveness_total']; ?>"></th>
                            <th scope="col" class="text-center">100</th>
                            <th scope="col"><input type="text" class="form-control me-3 text-center" name="score_total" value="<?= $per['score_total']; ?>"></th>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <button type="submit" name="update" class="btn btn-primary">บันทึกร่าง</button>
                </div>
            </form>
        </div>
    </div>
</div>