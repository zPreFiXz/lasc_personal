<?php
    require_once "config/db.php";

    $userId = $_SESSION['userId'];

    $stmt = $conn->query("SELECT * FROM `term_year` where id = 1");
    $stmt->execute();
    $term_year = $stmt->fetch();
    $term =  $term_year['term'];
    $year =  $term_year['year'];

    if (isset($_GET['delete_file'])) {
        $delete_file_id = base64_decode($_GET['delete_file']);
        $currentFile =  $delete_file_id;

        if ($currentFile) {
            $filePath = 'uploads/' . $currentFile;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $delete_file = $conn->prepare("DELETE FROM personal_1_1_file WHERE `file` = :delete_file_id");
        $delete_file->bindParam(':delete_file_id', $delete_file_id);
        $delete_file->execute();

        if ($delete_file) {
            $_SESSION['success'] = "ไฟล์ถูกลบสำเร็จ";
            echo "<script>window.location.href = 'index.php?page=1_1/index_1_1';</script>";
            exit;
        }
    }

    if (isset($_GET['delete'])) {
        $delete_id = base64_decode($_GET['delete']);

        $deletestmt = $conn->prepare("DELETE FROM personal_1_1 WHERE id = :delete_id");
        $deletestmt->bindParam(':delete_id', $delete_id);
        $deletestmt->execute();

        if ($deletestmt) {
            $_SESSION['success'] = "ข้อมูลถูกลบสำเร็จ";
            echo "<script>window.location.href = 'index.php?page=1_1/index_1_1';</script>";
            exit;
        }
    }

    if (isset($_GET['edit'])) {
        $_SESSION['edit'] = base64_decode($_GET['edit']);
        $edit_id = base64_decode($_GET['edit']);
        $stmt = $conn->prepare("SELECT * FROM personal_1_1 WHERE id = ?");
        $stmt->execute([$edit_id]);
        $data = $stmt->fetch();
?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var modal = new bootstrap.Modal(document.getElementById("modal"));
                modal.show();
            });
        </script>
    <?php } ?>
<?php if (isset($_GET['upload'])) {
        $_SESSION['upload'] = $_GET['upload'];
        $upload_id = $_SESSION['upload'];
?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var modal = new bootstrap.Modal(document.getElementById("uploadModal"));
                modal.show();
            });
        </script>
<?php } ?>
<div class="container">
    <div class="pagetitle mt-3">
        <h1>1. ภาระงานสอน (ภาคปกติ)</h1>
    </div>
    <hr>
    <div class="d-flex justify-content-end">
        <button class="btn btn-success mb-3" type="button" data-bs-toggle="modal" data-bs-target="#largeModal">
            <div class="icon d-flex">
                <i class="bi bi-plus-square"></i>&nbsp;
                <div class="label">เพิ่มข้อมูล</div>
            </div>
        </button>
        <?php
            $stmt = $conn->query("SELECT * FROM personal_1_1_file WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
            $stmt->execute();
            $personal = $stmt->fetchAll();
        ?>
    </div>
    <div class="d-flex justify-content-end mb-3">
        <?php if (isset($personal[0]['file'])) { ?> 
            <td style="white-space: nowrap;">
                <a href="uploads/<?= $personal[0]['file']; ?>" class="btn btn-secondary" target="_blank">
                    <div class="icon d-flex">
                        <i class="bi bi-eye"></i>&nbsp;
                        <div class="label">ดูไฟล์</div>
                    </div>
                </a>
                &nbsp;&nbsp;
                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_1/index_1_1&delete_file=<?= base64_encode($personal[0]['file']); ?>" class="btn btn-danger">
                    <div class="icon d-flex">
                        <i class="bi bi-trash"></i>&nbsp;
                        <div class="label">ลบไฟล์</div>
                    </div>
                </a>
            </td>
        <?php } else { ?>
            <td>
                <a style="white-space: nowrap;" href="?page=1_1/index_1_1&term=<?= base64_encode($term) ?>&year=<?= base64_encode($year) ?>&upload" class="btn btn-warning">
                    <div class="icon d-flex">
                        <i class="bi bi-upload"></i>&nbsp;
                        <div class="label">อัปโหลดไฟล์</div>
                    </div>
                </a>
            </td>
        <?php } ?>
    </div>
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" id="alert-success">
            <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            ?>
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('alert-success').style.display = 'none';
            }, 3000);
        </script>
    <?php } ?>
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" id="alert-error">
            <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('alert-error').style.display = 'none';
            }, 3000);
        </script>
    <?php } ?>
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
                <th scope="col" rowspan="2">จัดการข้อมูล</th>
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
                $stmt = $conn->query("SELECT * FROM personal_1_1 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
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
                                <td class="d-flex justify-content-center">
                                    <a href="?page=1_1/index_1_1&edit=<?= base64_encode($per['id']); ?>" class="btn btn-primary">
                                        <div class="icon d-flex">
                                            <i class="bi bi-pencil-square"></i>&nbsp;
                                            <div class="label">แก้ไข</div>
                                        </div>
                                    </a>&nbsp;
                                    <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_1/index_1_1&delete=<?= base64_encode($per['id']); ?>" class="btn btn-danger">
                                        <div class="icon d-flex">
                                            <i class="bi bi-trash"></i>&nbsp;
                                            <div class="label">ลบ</div>
                                        </div>
                                    </a>
                                </td>
                        </tr>
                <?php } } ?>
                        <tr>
                            <th scope="row" colspan="14">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                            <td scope="row"><?= number_format($totalAmountWork, 2); ?></td>
                            <td colspan="2"></td>
                        </tr>
        </tbody>
        <!-- เพิ่มข้อมูล -->
        <div class="modal fade" id="largeModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">เพิ่มข้อมูล</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="1_1/insert_1_1.php" method="post">
                            <input type="hidden" class="form-control" name="userId" value="<?= $userId ?>">
                            <input type="hidden" class="form-control" name="term" value="<?= $term_year['term']; ?>">
                            <input type="hidden" class="form-control" name="year" value="<?= $term_year['year']; ?>">
                            <div class="mb-3">
                                <label for="code_course" class="col-sm-2 col-form-label ">รหัสวิชา</label>
                                <input type="text" class="form-control" name="code_course" required>
                            </div>
                            <div class="mb-3">
                                <label for="name_course" class="col-sm-2 col-form-label ">ชื่อวิชา</label>
                                <input type="text" class="form-control" name="name_course" required>
                            </div>
                            <div class="mb-3">
                                <label for="unit" class="col-sm-2 col-form-label" style="white-space: nowrap;">หน่วยกิต (ทฤษฎี-ปฏิบัติ-ค้นคว้า)</label>
                                <select id="unit1" name="unit" class="form-select" onchange="calc1()" required>
                                    <option value="" selected>กรุณาเลือก</option>
                                    <option value="3(3-0-6)">3(3-0-6)</option>
                                    <option value="3(2-2-5)">3(2-2-5)</option>
                                    <option value="3(1-1-4)">3(1-1-4)</option>
                                    <option value="2(2-0-4)">2(2-0-4)</option>
                                    <option value="2(1-3-4)">2(1-3-4)</option>
                                    <option value="2(1-2-3)">2(1-2-3)</option>
                                    <option value="1(0-2-1)">1(0-2-1)</option>
                                    <option value="1(0-3-1)">1(0-3-1)</option>
                                </select>
                            </div>
                            <h5 class="col-sm-2 col-form-label" style="white-space: nowrap;">ทฤษฎี (ชั่วโมง/สัปดาห์) :</h5>
                            <div class="ms-5">
                                <div class="row mb-3">
                                    <label for="prepare_theory" class="col-sm-2 col-form-label" style="white-space: nowrap;">เตรียมสอนทฤษฎี</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ms-4" name="prepare_theory" id="prepare_theory1" readonly>
                                    </div>
                                </div>
                                <div class=" row mb-3">
                                    <label for="hour_lecture" class="col-sm-2 col-form-label" style="white-space: nowrap;">ชั่วโมงบรรยายตามจริง</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ms-4" name="hour_lecture" id="hour_lecture1" readonly>
                                    </div>
                                </div>
                                <div class=" row mb-3">
                                    <label for="check_work1" class="col-sm-2 col-form-label" style="white-space: nowrap;">ตรวจงาน</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ms-4" name="check_work1" id="check_work1" readonly>
                                    </div>
                                </div>
                            </div>
                            <h5 class="col-sm-2 col-form-label" style="white-space: nowrap;">ปฏิบัติ (ชั่วโมง/สัปดาห์) :</h5>
                            <div class="ms-5">
                                <div class="row mb-3">
                                    <label for="prepare_practice" class="col-sm-2 col-form-label" style="white-space: nowrap;">เตรียมสอนปฏิบัติ</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ms-4" name="prepare_practice" id="prepare_practice1" readonly>
                                    </div>
                                </div>
                                <div class=" row mb-3">
                                    <label for="hour_practice" class="col-sm-2 col-form-label" style="white-space: nowrap;">ชั่วโมงปฏิบัติตามจริง</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ms-4" name="hour_practice" id="hour_practice1" readonly>
                                    </div>
                                </div>
                                <div class=" row mb-3">
                                    <label for="check_work2" class="col-sm-2 col-form-label" style="white-space: nowrap;">ตรวจงาน</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ms-4" name="check_work2" id="check_work2" readonly>
                                    </div>
                                </div>
                                <div class=" row mb-3">
                                    <label for="practice_subject" class="col-sm-2 col-form-label">แบบปฏิบัติ</label>
                                    <div class="col-sm-8">
                                        <select id="practice_subject1" name="practice_subject" class="form-select ms-4" onchange="calc1()" required>
                                            <option value="ทั่วไป">ทั่วไป</option>
                                            <option value="ฟิสิกส์">ฟิสิกส์</option>
                                            <option value="เคมี">เคมี</option>
                                            <option value="ชีววิทยาและจุลชีววิทยา">ชีววิทยาและจุลชีววิทยา</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="level" class="col-sm-2 col-form-label">ระดับชั้น(หมู่เรียน)</label>
                                <input type="text" class="form-control" name="level" required>
                            </div>
                            <div class="mb-3">
                                <label for="group_study" class="col-sm-2 col-form-label">หมู่เรียนที่</label>
                                <select id="group_study1" name="group_study" class="form-select" onchange="calc1()" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="amount_student" class="col-sm-2 col-form-label">จำนวนนักศึกษา</label>
                                <input type="text" class="form-control" name="amount_student" id="amount_student1" oninput="calc1()" required>
                            </div>
                            <div class="mb-3">
                                <label for="proportion" class="col-sm-2 col-form-label">สัดส่วนการสอน</label>
                                <input type="text" class="form-control" name="proportion" id="proportion1" oninput="calc1()" required>
                            </div>
                            <div class="mb-3" style="white-space: nowrap;">
                                <label for="amount_work" class="col-sm-2 col-form-label ">รวมจำนวนภาระงาน/สัปดาห์</label>
                                <input type="text" class="form-control bg-light" name="amount_work" id="amount_work1" readonly>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <button type="submit" name="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- แก้ไขข้อมูล -->
        <div class="modal fade" id="modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">แก้ไขข้อมูล</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="1_1/edit_1_1.php" method="post">
                            <div class="mb-3">
                                <label for="code_course" class="col-sm-2 col-form-label ">รหัสวิชา</label>
                                <input type="text" class="form-control" name="code_course" value="<?php echo $data['code_course']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="name_course" class="col-sm-2 col-form-label ">ชื่อวิชา</label>
                                <input type="text" class="form-control" name="name_course" value="<?php echo $data['name_course']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="unit" class="col-sm-2 col-form-label" style="white-space: nowrap;">หน่วยกิต (ทฤษฎี-ปฏิบัติ-ค้นคว้า)</label>
                                <select id="unit2" name="unit" class="form-select" onchange="calc2()" required>
                                    <option value="3(3-0-6)" <?php if ($data['unit'] === '3(3-0-6)') echo 'selected'; ?>>3(3-0-6)</option>
                                    <option value="3(2-2-5)" <?php if ($data['unit'] === '3(2-2-5)') echo 'selected'; ?>>3(2-2-5)</option>
                                    <option value="3(1-1-4)" <?php if ($data['unit'] === '3(1-1-4)') echo 'selected'; ?>>3(1-1-4)</option>
                                    <option value="2(2-0-4)" <?php if ($data['unit'] === '2(2-0-4)') echo 'selected'; ?>>2(2-0-4)</option>
                                    <option value="2(1-3-4)" <?php if ($data['unit'] === '2(1-3-4)') echo 'selected'; ?>>2(1-3-4)</option>
                                    <option value="2(1-2-3)" <?php if ($data['unit'] === '2(1-2-3)') echo 'selected'; ?>>2(1-2-3)</option>
                                    <option value="1(0-2-1)" <?php if ($data['unit'] === '1(0-2-1)') echo 'selected'; ?>>1(0-2-1)</option>
                                    <option value="1(0-3-1)" <?php if ($data['unit'] === '1(0-3-1)') echo 'selected'; ?>>1(0-3-1)</option>
                                </select>
                            </div>
                            <h5 class="col-sm-2 col-form-label" style="white-space: nowrap;">ทฤษฎี (ชั่วโมง/สัปดาห์) :</h5>
                            <div class="ms-5">
                                <div class="row mb-3">
                                    <label for="prepare_theory" class="col-sm-2 col-form-label" style="white-space: nowrap;">เตรียมสอนทฤษฎี</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ms-4" name="prepare_theory" id="prepare_theory2" value="<?php echo $data['prepare_theory']; ?>" readonly>
                                    </div>
                                </div>
                                <div class=" row mb-3">
                                    <label for="hour_lecture" class="col-sm-2 col-form-label" style="white-space: nowrap;">ชั่วโมงบรรยายตามจริง</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ms-4" name="hour_lecture" id="hour_lecture2" value="<?php echo $data['hour_lecture']; ?>" readonly>
                                    </div>
                                </div>
                                <div class=" row mb-3">
                                    <label for="check_work" class="col-sm-2 col-form-label" style="white-space: nowrap;">ตรวจงาน</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ms-4" name="check_work1" id="check_work3" value="<?php echo $data['check_work1']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <h5 class="col-sm-2 col-form-label" style="white-space: nowrap;">ปฏิบัติ (ชั่วโมง/สัปดาห์) :</h5>
                            <div class="ms-5">
                                <div class="row mb-3">
                                    <label for="prepare_practice" class="col-sm-2 col-form-label" style="white-space: nowrap;">เตรียมสอนปฏิบัติ</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ms-4" name="prepare_practice" id="prepare_practice2" value="<?php echo $data['prepare_practice']; ?>" readonly>
                                    </div>
                                </div>
                                <div class=" row mb-3">
                                    <label for="hour_practice" class="col-sm-2 col-form-label" style="white-space: nowrap;">ชั่วโมงปฏิบัติตามจริง</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ms-4" name="hour_practice" id="hour_practice2" value="<?php echo $data['hour_practice']; ?>" readonly>
                                    </div>
                                </div>
                                <div class=" row mb-3">
                                    <label for="check_work" class="col-sm-2 col-form-label" style="white-space: nowrap;">ตรวจงาน</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ms-4" name="check_work2" id="check_work4" value="<?php echo $data['check_work2']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="practice_subject" class="col-sm-2 col-form-label">แบบปฏิบัติ</label>
                                    <div class="col-sm-8">
                                        <select name="practice_subject" class="form-select sm-4" id="practice_subject2" onchange="calc2()" required>
                                            <option value="ทั่วไป" <?php if ($data['practice_subject'] === 'ทั่วไป') echo 'selected'; ?>>ทั่วไป</option>
                                            <option value="ฟิสิกส์" <?php if ($data['practice_subject'] === 'ฟิสิกส์') echo 'selected'; ?>>ฟิสิกส์</option>
                                            <option value="เคมี" <?php if ($data['practice_subject'] === 'เคมี') echo 'selected'; ?>>เคมี</option>
                                            <option value="ชีววิทยาและจุลชีววิทยา" <?php if ($data['practice_subject'] === 'ชีววิทยาและจุลชีววิทยา') echo 'selected'; ?>>ชีววิทยาและจุลชีววิทยา</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="level" class="col-sm-2 col-form-label">ระดับชั้น(หมู่เรียน)</label>
                                <input type="text" class="form-control" name="level" value="<?php echo $data['level']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="group_study" class="col-sm-2 col-form-label">หมู่เรียนที่</label>
                                <select id="group_study2" name="group_study" class="form-select" onchange="calc2()" required>
                                    <option value="1" <?php if ($data['group_study'] === '1') echo 'selected'; ?>>1</option>
                                    <option value="2" <?php if ($data['group_study'] === '2') echo 'selected'; ?>>2</option>
                                    <option value="3" <?php if ($data['group_study'] === '3') echo 'selected'; ?>>3</option>
                                    <option value="4" <?php if ($data['group_study'] === '4') echo 'selected'; ?>>4</option>
                                    <option value="5" <?php if ($data['group_study'] === '5') echo 'selected'; ?>>5</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="amount_student" class="col-sm-2 col-form-label">จำนวนนักศึกษา</label>
                                <input type="text" class="form-control" name="amount_student" value="<?php echo $data['amount_student']; ?>" id="amount_student2" oninput="calc2()" required>
                            </div>
                            <div class="mb-3">
                                <label for="proportion" class="col-sm-2 col-form-label">สัดส่วนการสอน</label>
                                <input type="text" class="form-control" name="proportion" id="proportion2" value="<?php echo $data['proportion']; ?>" oninput="calc2()" required>
                            </div>
                            <div class="mb-3">
                                <label for="amount_work" class="col-sm-2 col-form-label" style="white-space: nowrap;">รวมจำนวนภาระงาน/สัปดาห์</label>
                                <input type="text" class="form-control bg-light" name="amount_work" value="<?php echo $data['amount_work']; ?>" id="amount_work2" readonly>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <button type="update" name="update" class="btn btn-primary">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- อัพโหลดไฟล์ -->
        <div class="modal fade" id="uploadModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">อัปโหลดไฟล์</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="1_1/upload_1_1.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="term" value="<?=$_GET['term']?>">
                            <input type="hidden" name="year" value="<?=$_GET['year']?>">
                            <div class="row mb-1 mt-3">
                                <label for="file" class="col-sm-2 col-form-label">อัปโหลดไฟล์</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="file" id="fileInput" required>
                                    <br>
                                    <p>***นามสกุลไฟล์ที่รองรับ .jpg, .jpeg, .png, .pdf, .ppt, .docx***</p>
                                    <img width="100%" id="previewFile" alt="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <button type="upload" name="upload" class="btn btn-primary">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#modal').on('hidden.bs.modal', function() {
            window.location.href = 'index.php?page=1_1/index_1_1';
        });
    });
    $(document).ready(function() {
        $('#uploadModal').on('hidden.bs.modal', function() {
            window.location.href = 'index.php?page=1_1/index_1_1';
        });
    });

    let fileInput = document.getElementById('fileInput');
    let previewFile = document.getElementById('previewFile');

    fileInput.onchange = evt => {
        const [file] = fileInput.files;
        if (file) {
            previewFile.src = URL.createObjectURL(file);
        }
    }

    function calc1() {
        var unit = document.getElementById('unit1').value;
        var practice_subject = document.getElementById('practice_subject1').value;

        if (unit == '3(3-0-6)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory1').value = 3);
            hour_lecture = parseFloat(document.getElementById('hour_lecture1').value = 3);
            check_work1 = parseFloat(document.getElementById('check_work1').value = 3);
            prepare_practice = parseFloat(document.getElementById('prepare_practice1').value = '-');
            hour_practice = parseFloat(document.getElementById('hour_practice1').value = '-');
            check_work2 = parseFloat(document.getElementById('check_work2').value = '-');
            amount_student1 = parseFloat(document.getElementById('amount_student1').value);
            group_study1 = parseFloat(document.getElementById('group_study1').value);
            proportion1 = parseFloat(document.getElementById('proportion1').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = ((prepare_theory + hour_lecture + check_work1) + amount_student1 * (3 / 40)) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = ((hour_lecture + check_work1) + amount_student1 * (3 / 40)) * (proportion1/100);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = (prepare_theory + hour_lecture + check_work1) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = (hour_lecture + check_work1) * (proportion1/100);
                }
            }

        } else if (unit == '3(2-2-5)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory1').value = 2);
            hour_lecture = parseFloat(document.getElementById('hour_lecture1').value = 2);
            check_work1 = parseFloat(document.getElementById('check_work1').value = 2);
            prepare_practice = parseFloat(document.getElementById('prepare_practice1').value = 1);
            hour_practice = parseFloat(document.getElementById('hour_practice1').value = 2);
            check_work2 = parseFloat(document.getElementById('check_work2').value = 1);
            amount_student1 = parseFloat(document.getElementById('amount_student1').value);
            group_study1 = parseFloat(document.getElementById('group_study1').value);
            proportion1 = parseFloat(document.getElementById('proportion1').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = ((prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (3 / 40)) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = ((hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (3 / 40)) * (proportion1/100);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = (prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = (hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion1/100);
                }
            }

        } else if (unit == '3(1-1-4)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory1').value = 1);
            hour_lecture = parseFloat(document.getElementById('hour_lecture1').value = 1);
            check_work1 = parseFloat(document.getElementById('check_work1').value = 1);
            prepare_practice = parseFloat(document.getElementById('prepare_practice1').value = 1);
            hour_practice = parseFloat(document.getElementById('hour_practice1').value = 1);
            check_work2 = parseFloat(document.getElementById('check_work2').value = 1);
            amount_student1 = parseFloat(document.getElementById('amount_student1').value);
            group_study1 = parseFloat(document.getElementById('group_study1').value);
            proportion1 = parseFloat(document.getElementById('proportion1').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = ((prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (2 / 40)) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = (hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (2 / 40);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = (prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = (hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2)  * (proportion1/100);
                }
            }

        } else if (unit == '2(2-0-4)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory1').value = 2);
            hour_lecture = parseFloat(document.getElementById('hour_lecture1').value = 2);
            check_work1 = parseFloat(document.getElementById('check_work1').value = 2);
            prepare_practice = parseFloat(document.getElementById('prepare_practice1').value = '-');
            hour_practice = parseFloat(document.getElementById('hour_practice1').value = '-');
            check_work2 = parseFloat(document.getElementById('check_work2').value = '-');
            amount_student1 = parseFloat(document.getElementById('amount_student1').value);
            group_study1 = parseFloat(document.getElementById('group_study1').value);
            proportion1 = parseFloat(document.getElementById('proportion1').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = ((prepare_theory + hour_lecture + check_work1) + amount_student1 * (2 / 40)) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = ((hour_lecture + check_work1) + amount_student1 * (2 / 40)) * (proportion1/100);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = (prepare_theory + hour_lecture + check_work1) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = (hour_lecture + check_work1) * (proportion1/100);
                }
            }

        } else if (unit == '2(1-3-4)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory1').value = 1);
            hour_lecture = parseFloat(document.getElementById('hour_lecture1').value = 1);
            check_work1 = parseFloat(document.getElementById('check_work1').value = 1);
            prepare_practice = parseFloat(document.getElementById('prepare_practice1').value = 1);
            hour_practice = parseFloat(document.getElementById('hour_practice1').value = 3);
            check_work2 = parseFloat(document.getElementById('check_work2').value = 1);
            amount_student1 = parseFloat(document.getElementById('amount_student1').value);
            group_study1 = parseFloat(document.getElementById('group_study1').value);
            proportion1 = parseFloat(document.getElementById('proportion1').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = ((prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (2 / 40)) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = ((hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (2 / 40)) * (proportion1/100);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = (prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = (hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion1/100);
                }
            }

        } else if (unit == '2(1-2-3)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory1').value = 1);
            hour_lecture = parseFloat(document.getElementById('hour_lecture1').value = 1);
            check_work1 = parseFloat(document.getElementById('check_work1').value = 1);
            prepare_practice = parseFloat(document.getElementById('prepare_practice1').value = 1);
            hour_practice = parseFloat(document.getElementById('hour_practice1').value = 2);
            check_work2 = parseFloat(document.getElementById('check_work2').value = 1);
            amount_student1 = parseFloat(document.getElementById('amount_student1').value);
            group_study1 = parseFloat(document.getElementById('group_study1').value);
            proportion1 = parseFloat(document.getElementById('proportion1').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = ((prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (2 / 40)) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = ((hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (2 / 40)) * (proportion1/100);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = (prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = (hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion1/100);
                }
            }

        } else if (unit == '1(0-2-1)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory1').value = '-');
            hour_lecture = parseFloat(document.getElementById('hour_lecture1').value = '-');
            check_work1 = parseFloat(document.getElementById('check_work1').value = '-');
            prepare_practice = parseFloat(document.getElementById('prepare_practice1').value = 1);
            hour_practice = parseFloat(document.getElementById('hour_practice1').value = 2);
            check_work2 = parseFloat(document.getElementById('check_work2').value = 1);
            amount_student1 = parseFloat(document.getElementById('amount_student1').value);
            group_study1 = parseFloat(document.getElementById('group_study1').value);
            proportion1 = parseFloat(document.getElementById('proportion1').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = ((prepare_practice + hour_practice + check_work2) + amount_student1 * (1 / 40)) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = ((hour_practice + check_work2) + amount_student1 * (1 / 40)) * (proportion1/100);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work1').value = (prepare_practice + hour_practice + check_work2) * (proportion1/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work1').value = (hour_practice + check_work2) * (proportion1/100);
                }
            }

        } else if (unit == '1(0-3-1)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory1').value = '-');
            hour_lecture = parseFloat(document.getElementById('hour_lecture1').value = '-');
            check_work1 = parseFloat(document.getElementById('check_work1').value = '-');
            prepare_practice = parseFloat(document.getElementById('prepare_practice1').value = 1);
            hour_practice = parseFloat(document.getElementById('hour_practice1').value = 3);
            check_work2 = parseFloat(document.getElementById('check_work2').value = 1);
            amount_student1 = parseFloat(document.getElementById('amount_student1').value);
            group_study1 = parseFloat(document.getElementById('group_study1').value);
            proportion1 = parseFloat(document.getElementById('proportion1').value);

            if (practice_subject == 'ฟิสิกส์') {
                if (amount_student1 > 40) {
                    amount_student1 -= 40
                    if (group_study1 == 1) {
                        document.getElementById('amount_work1').value = ((prepare_practice + hour_practice + check_work2 + 4) + amount_student1 * (1 / 40)) * (proportion1/100);
                    } else if (group_study1 > 1) {
                        document.getElementById('amount_work1').value = ((hour_practice + check_work2 + 4) + amount_student1 * (1 / 40)) * (proportion1/100);
                    }
                } else {
                    if (group_study1 == 1) {
                        document.getElementById('amount_work1').value = (prepare_practice + hour_practice + check_work2 + 4) * (proportion1/100);
                    } else if (group_study1 > 1) {
                        document.getElementById('amount_work1').value = (hour_practice + check_work2 + 4) * (proportion1/100);
                    }
                }
            } else if (practice_subject == 'เคมี') {
                if (amount_student1 > 40) {
                    amount_student1 -= 40
                    if (group_study1 == 1) {
                        document.getElementById('amount_work1').value = ((prepare_practice + hour_practice + check_work2 + 6) + amount_student1 * (1 / 40)) * (proportion1/100);
                    } else if (group_study1 > 1) {
                        document.getElementById('amount_work1').value = ((hour_practice + check_work2 + 6) + amount_student1 * (1 / 40)) * (proportion1/100);
                    }
                } else {
                    if (group_study1 == 1) {
                        document.getElementById('amount_work1').value = (prepare_practice + hour_practice + check_work2 + 6) * (proportion1/100);
                    } else if (group_study1 > 1) {
                        document.getElementById('amount_work1').value = (hour_practice + check_work2 + 6) * (proportion1/100);
                    }
                }
            } else if (practice_subject == 'ชีววิทยาและจุลชีววิทยา') {
                if (amount_student1 > 40) {
                    amount_student1 -= 40
                    if (group_study1 == 1) {
                        document.getElementById('amount_work1').value = ((prepare_practice + hour_practice + check_work2 + 8) + amount_student1 * (1 / 40)) * (proportion1/100);
                    } else if (group_study1 > 1) {
                        document.getElementById('amount_work1').value = ((hour_practice + check_work2 + 8) + amount_student1 * (1 / 40)) * (proportion1/100);
                    }
                } else {
                    if (group_study1 == 1) {
                        document.getElementById('amount_work1').value = (prepare_practice + hour_practice + check_work2 + 8) * (proportion1/100);
                    } else if (group_study1 > 1) {
                        document.getElementById('amount_work1').value = (hour_practice + check_work2 + 8) * (proportion1/100);
                    }
                }
            } else {
                document.getElementById('amount_work1').value = " ";
            }
        }
    }

    function calc2() {
        var unit = document.getElementById('unit2').value;
        var practice_subject = document.getElementById('practice_subject2').value;

        if (unit == '3(3-0-6)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory2').value = 3);
            hour_lecture = parseFloat(document.getElementById('hour_lecture2').value = 3);
            check_work1 = parseFloat(document.getElementById('check_work3').value = 3);
            prepare_practice = parseFloat(document.getElementById('prepare_practice2').value = '-');
            hour_practice = parseFloat(document.getElementById('hour_practice2').value = '-');
            check_work2 = parseFloat(document.getElementById('check_work4').value = '-');
            amount_student1 = parseFloat(document.getElementById('amount_student2').value);
            group_study1 = parseFloat(document.getElementById('group_study2').value);
            proportion2 = parseFloat(document.getElementById('proportion2').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = ((prepare_theory + hour_lecture + check_work1) + amount_student1 * (3 / 40)) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = ((hour_lecture + check_work1) + amount_student1 * (3 / 40)) * (proportion2/100);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = (prepare_theory + hour_lecture + check_work1) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = (hour_lecture + check_work1) * (proportion2/100);
                }
            }

        } else if (unit == '3(2-2-5)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory2').value = 2);
            hour_lecture = parseFloat(document.getElementById('hour_lecture2').value = 2);
            check_work1 = parseFloat(document.getElementById('check_work3').value = 2);
            prepare_practice = parseFloat(document.getElementById('prepare_practice2').value = 1);
            hour_practice = parseFloat(document.getElementById('hour_practice2').value = 2);
            check_work2 = parseFloat(document.getElementById('check_work4').value = 1);
            amount_student1 = parseFloat(document.getElementById('amount_student2').value);
            group_study1 = parseFloat(document.getElementById('group_study2').value);
            proportion2 = parseFloat(document.getElementById('proportion2').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = ((prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (3 / 40)) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = ((hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (3 / 40)) * (proportion2/100);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = (prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = (hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion2/100);
                }
            }

        } else if (unit == '3(1-1-4)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory2').value = 1);
            hour_lecture = parseFloat(document.getElementById('hour_lecture2').value = 1);
            check_work1 = parseFloat(document.getElementById('check_work3').value = 1);
            prepare_practice = parseFloat(document.getElementById('prepare_practice2').value = 1);
            hour_practice = parseFloat(document.getElementById('hour_practice2').value = 1);
            check_work2 = parseFloat(document.getElementById('check_work4').value = 1);
            amount_student1 = parseFloat(document.getElementById('amount_student2').value);
            group_study1 = parseFloat(document.getElementById('group_study2').value);
            proportion2 = parseFloat(document.getElementById('proportion2').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = ((prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (2 / 40)) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = ((hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (2 / 40)) * (proportion2/100);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = (prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = (hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion2/100);
                }
            }

        } else if (unit == '2(2-0-4)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory2').value = 2);
            hour_lecture = parseFloat(document.getElementById('hour_lecture2').value = 2);
            check_work1 = parseFloat(document.getElementById('check_work3').value = 2);
            prepare_practice = parseFloat(document.getElementById('prepare_practice2').value = '-');
            hour_practice = parseFloat(document.getElementById('hour_practice2').value = '-');
            check_work2 = parseFloat(document.getElementById('check_work4').value = '-');
            amount_student1 = parseFloat(document.getElementById('amount_student2').value);
            group_study1 = parseFloat(document.getElementById('group_study2').value);
            proportion2 = parseFloat(document.getElementById('proportion2').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = ((prepare_theory + hour_lecture + check_work1) + amount_student1 * (2 / 40)) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = ((hour_lecture + check_work1) + amount_student1 * (2 / 40)) * (proportion2/100);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = (prepare_theory + hour_lecture + check_work1) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = (hour_lecture + check_work1) * (proportion2/100);
                }
            }

        } else if (unit == '2(1-3-4)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory2').value = 1);
            hour_lecture = parseFloat(document.getElementById('hour_lecture2').value = 1);
            check_work1 = parseFloat(document.getElementById('check_work3').value = 1);
            prepare_practice = parseFloat(document.getElementById('prepare_practice2').value = 1);
            hour_practice = parseFloat(document.getElementById('hour_practice2').value = 3);
            check_work2 = parseFloat(document.getElementById('check_work4').value = 1);
            amount_student1 = parseFloat(document.getElementById('amount_student2').value);
            group_study1 = parseFloat(document.getElementById('group_study2').value);
            proportion2 = parseFloat(document.getElementById('proportion2').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = ((prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (2 / 40)) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = ((hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (2 / 40)) * (proportion2/100);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = (prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = (hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion2/100);
                }
            }

        } else if (unit == '2(1-2-3)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory2').value = 1);
            hour_lecture = parseFloat(document.getElementById('hour_lecture2').value = 1);
            check_work1 = parseFloat(document.getElementById('check_work3').value = 1);
            prepare_practice = parseFloat(document.getElementById('prepare_practice2').value = 1);
            hour_practice = parseFloat(document.getElementById('hour_practice2').value = 2);
            check_work2 = parseFloat(document.getElementById('check_work4').value = 1);
            amount_student1 = parseFloat(document.getElementById('amount_student2').value);
            group_study1 = parseFloat(document.getElementById('group_study2').value);
            proportion2 = parseFloat(document.getElementById('proportion2').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = ((prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (2 / 40)) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = ((hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) + amount_student1 * (2 / 40)) * (proportion2/100);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = (prepare_theory + hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = (hour_lecture + check_work1 + prepare_practice + hour_practice + check_work2) * (proportion2/100);
                }
            }

        } else if (unit == '1(0-2-1)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory2').value = '-');
            hour_lecture = parseFloat(document.getElementById('hour_lecture2').value = '-');
            check_work1 = parseFloat(document.getElementById('check_work3').value = '-');
            prepare_practice = parseFloat(document.getElementById('prepare_practice2').value = 1);
            hour_practice = parseFloat(document.getElementById('hour_practice2').value = 2);
            check_work2 = parseFloat(document.getElementById('check_work4').value = 1);
            amount_student1 = parseFloat(document.getElementById('amount_student2').value);
            group_study1 = parseFloat(document.getElementById('group_study2').value);
            proportion2 = parseFloat(document.getElementById('proportion2').value);

            if (amount_student1 > 40) {
                amount_student1 -= 40
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = ((prepare_practice + hour_practice + check_work2) + amount_student1 * (1 / 40)) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = ((hour_practice + check_work2) + amount_student1 * (1 / 40)) * (proportion2/100);
                }
            } else {
                if (group_study1 == 1) {
                    document.getElementById('amount_work2').value = (prepare_practice + hour_practice + check_work2) * (proportion2/100);
                } else if (group_study1 > 1) {
                    document.getElementById('amount_work2').value = (hour_practice + check_work2) * (proportion2/100);
                }
            }

        } else if (unit == '1(0-3-1)') {
            prepare_theory = parseFloat(document.getElementById('prepare_theory2').value = '-');
            hour_lecture = parseFloat(document.getElementById('hour_lecture2').value = '-');
            check_work1 = parseFloat(document.getElementById('check_work3').value = '-');
            prepare_practice = parseFloat(document.getElementById('prepare_practice2').value = 1);
            hour_practice = parseFloat(document.getElementById('hour_practice2').value = 3);
            check_work2 = parseFloat(document.getElementById('check_work4').value = 1);
            amount_student1 = parseFloat(document.getElementById('amount_student2').value);
            group_study1 = parseFloat(document.getElementById('group_study2').value);
            proportion2 = parseFloat(document.getElementById('proportion2').value);

            if (practice_subject == 'ฟิสิกส์') {
                if (amount_student1 > 40) {
                    amount_student1 -= 40
                    if (group_study1 == 1) {
                        document.getElementById('amount_work2').value = ((prepare_practice + hour_practice + check_work2 + 4) + amount_student1 * (1 / 40)) * (proportion2/100);
                    } else if (group_study1 > 1) {
                        document.getElementById('amount_work2').value = ((hour_practice + check_work2 + 4) + amount_student1 * (1 / 40)) * (proportion2/100);
                    }
                } else {
                    if (group_study1 == 1) {
                        document.getElementById('amount_work2').value = (prepare_practice + hour_practice + check_work2 + 4) * (proportion2/100);
                    } else if (group_study1 > 1) {
                        document.getElementById('amount_work2').value = (hour_practice + check_work2 + 4) * (proportion2/100);
                    }
                }
            } else if (practice_subject == 'เคมี') {
                if (amount_student1 > 40) {
                    amount_student1 -= 40
                    if (group_study1 == 1) {
                        document.getElementById('amount_work2').value = ((prepare_practice + hour_practice + check_work2 + 6) + amount_student1 * (1 / 40)) * (proportion2/100);
                    } else if (group_study1 > 1) {
                        document.getElementById('amount_work2').value = ((hour_practice + check_work2 + 6) + amount_student1 * (1 / 40)) * (proportion2/100);
                    }
                } else {
                    if (group_study1 == 1) {
                        document.getElementById('amount_work2').value = (prepare_practice + hour_practice + check_work2 + 6) * (proportion2/100);
                    } else if (group_study1 > 1) {
                        document.getElementById('amount_work2').value = (hour_practice + check_work2 + 6) * (proportion2/100);
                    }
                }
            } else if (practice_subject == 'ชีววิทยาและจุลชีววิทยา') {
                if (amount_student1 > 40) {
                    amount_student1 -= 40
                    if (group_study1 == 1) {
                        document.getElementById('amount_work2').value = ((prepare_practice + hour_practice + check_work2 + 8) + amount_student1 * (1 / 40)) * (proportion2/100);
                    } else if (group_study1 > 1) {
                        document.getElementById('amount_work2').value = ((hour_practice + check_work2 + 8) + amount_student1 * (1 / 40)) * (proportion2/100);
                    }
                } else {
                    if (group_study1 == 1) {
                        document.getElementById('amount_work2').value = (prepare_practice + hour_practice + check_work2 + 8) * (proportion2/100);
                    } else if (group_study1 > 1) {
                        document.getElementById('amount_work2').value = (hour_practice + check_work2 + 8) * (proportion2/100);
                    }
                }
            } else {
                document.getElementById('amount_work2').value = " ";
            }
        }
    }
</script>
<?php 
    $conn = null;
?>