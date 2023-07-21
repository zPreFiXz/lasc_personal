<?php
require_once "config/db.php";

if (isset($_GET['delete_file'])) {
    $delete_file_id = $_GET['delete_file'];
    $stmt = $conn->prepare("SELECT file FROM personal_1_1 WHERE id = :delete_file_id");
    $stmt->bindParam(':delete_file_id', $delete_file_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $currentFile = $row['file'];

    if ($currentFile) {
        $filePath = 'uploads/' . $currentFile;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    $delete_file = $conn->prepare("UPDATE personal_1_1 SET file = '' WHERE id = :delete_file_id");
    $delete_file->bindParam(':delete_file_id', $delete_file_id);
    $delete_file->execute();
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $stmt = $conn->prepare("SELECT file FROM personal_1_1 WHERE id = :delete_id");
    $stmt->bindParam(':delete_id', $delete_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $currentFile = $row['file'];

    if ($currentFile) {
        $filePath = 'uploads/' . $currentFile;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

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
    $_SESSION['edit'] = $_GET['edit'];
    $edit_id = $_GET['edit'];
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
<?php
}

if (isset($_GET['upload'])) {
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
        <h1>1.1 ภาระงานสอน (ภาคปกติ)</h1>
    </div>
    <hr>
    <div class="d-flex justify-content-end">
        <button class="btn btn-success mb-3" type="button" data-bs-toggle="modal" data-bs-target="#largeModal">
            <div class="icon d-flex">
                <i class="bi bi-plus-square"></i> &nbsp;
                <div class="label">เพิ่มข้อมูล</div>
            </div>
        </button>
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
    <table class="table table-bordered text-center align-middle">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col" rowspan="2">รหัสวิชา</th>
                <th scope="col" rowspan="2">ชื่อวิชา</th>
                <th scope="col" colspan="5">จำนวนหน่วยกิต</th>
                <th scope="col" rowspan="2">ระดับชั้น(หมู่เรียน)</th>
                <th scope="col" rowspan="2">หมู่เรียนที่</th>
                <th scope="col" rowspan="2">จำนวนนักศึกษา </th>
                <th scope="col" rowspan="2">สัดส่วนการสอน (ป้อนตัวเลขไม่มี%)</th>
                <th scope="col" rowspan="2">จำนวนชั่วโมงสอน/สัปดาห์ </th>
                <th scope="col" rowspan="2">จำนวนภาระงาน/สัปดาห์ </th>
                <th scope="col" rowspan="2">อัปโหลดไฟล์</th>
                <th scope="col" rowspan="2">จัดการข้อมูล</th>
            </tr>
            <tr>
                <th scope="col">จำนวน</th>
                <th scope="col">บรรยาย</th>
                <th scope="col">ปฏิบัติ</th>
                <th scope="col">แบบปฏิบัติ</th>
                <th scope="col">ค้นคว้า</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $conn->query("SELECT * FROM personal_1_1");
            $stmt->execute();
            $personal = $stmt->fetchAll();

            if (!$personal) {
                echo "<tr><td colspan='15' class='text-center'>ไม่มีข้อมูล</td></tr>";
            } else {
                foreach ($personal as $per) {
            ?>
                    <tr>
                        <td style="white-space: nowrap;"><?= $per['code_course']; ?></td>
                        <td class="mb-3" style="white-space: nowrap;"><?= $per['name_course']; ?></td>
                        <td><?= $per['amount_credit']; ?></td>
                        <td><?= $per['describe']; ?></td>
                        <td><?= $per['practice']; ?></td>
                        <td><?= $per['practice_subject']; ?></td>
                        <td><?= $per['research']; ?></td>
                        <td><?= $per['level']; ?></td>
                        <td><?= $per['group_study']; ?></td>
                        <td><?= $per['amount_student']; ?></td>
                        <td><?= $per['proportion']; ?></td>
                        <td><?= $per['amount_time']; ?></td>
                        <td><?= $per['amount_work']; ?></td>
                        <?php if ($per['file']) { ?>
                            <td style="white-space: nowrap;">
                                <a href="uploads/<?= $per['file']; ?>" class="btn btn-secondary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-eye"></i>&nbsp;
                                        <div class="label">ดูไฟล์</div>
                                    </div>
                                </a>
                                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_1/index_1_1&delete_file=<?= $per['id']; ?>" class="btn btn-warning">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบ</div>
                                    </div>
                                </a>
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="?page=1_1/index_1_1&edit=<?= $per['id']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp;
                                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_1/index_1_1&delete=<?= $per['id']; ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบ</div>
                                    </div>
                                </a>
                            </td>
                        <?php } else { ?>
                            <td>
                                <a style="white-space: nowrap;" href="?page=1_1/index_1_1&upload=<?= $per['id']; ?>" class="btn btn-warning">
                                    <div class="icon d-flex">
                                        <i class="bi bi-upload"></i>&nbsp;
                                        <div class="label">อัปโหลด</div>
                                    </div>
                                </a>
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="?page=1_1/index_1_1&edit=<?= $per['id']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp;
                                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_1/index_1_1&delete=<?= $per['id']; ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบ</div>
                                    </div>
                                </a>
                            </td>
                        <?php } ?>

                    </tr>
            <?php
                }
            }
            ?>
            <tr>
                <th scope="row" colspan="12">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                <td scope="row">0.00</td>
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
                            <div class="mb-3">
                                <label for="code_course" class="col-sm-2 col-form-label ">รหัสวิชา</label>
                                <input type="text" class="form-control" name="code_course" required>
                            </div>
                            <div class="mb-3">
                                <label for="name_course" class="col-sm-2 col-form-label ">ชื่อวิชา</label>
                                <input type="text" class="form-control" name="name_course" required>
                            </div>
                            <h5 class="col-sm-2 col-form-label">จำนวนหน่วยกิต</h5>
                            <div class="m-3">
                                <div class="row mb-3">
                                    <label for="amount_credit" class="col-sm-2 col-form-label">จำนวน</label>
                                    <div class="col-sm-10">
                                        <select id="amount_credit" name="amount_credit" class="form-select" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="describe" class="col-sm-2 col-form-label">บรรยาย</label>
                                    <div class="col-sm-10">
                                            <select id="describe" name="describe" class="form-select"  required>
                                                <option value="" selected>กรุณาเลือก</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="practice" class="col-sm-2 col-form-label">ปฏิบัติ</label>
                                    <div class="col-sm-10">
                                        <select id="practice" name="practice" class="form-select" required>
                                            <option value="" selected>กรุณาเลือก</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="practice_subject" class="col-sm-2 col-form-label">แบบปฏิบัติ</label>
                                    <div class="col-sm-10">
                                        <select id="practice_subject" name="practice_subject" class="form-select" required>
                                            <option value="ทั่วไป">ทั่วไป</option>
                                            <option value="ฟิสิกส์">ฟิสิกส์</option>
                                            <option value="เคมี">เคมี</option>
                                            <option value="ชีววิทยาและจุลชีววิทยา">ชีววิทยาและจุลชีววิทยา</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="research" class="col-sm-2 col-form-label">ค้นคว้า</label>
                                    <div class="col-sm-10">
                                        <select id="research" name="research" class="form-select" required>
                                            <option value="" selected>กรุณาเลือก</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
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
                                    <select id="group_study" name="group_study" class="form-select" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label for="amount_student" class="col-sm-2 col-form-label">จำนวนนักศึกษา</label>
                                <input type="text" class="form-control" name="amount_student" required>
                            </div>
                            <div class="mb-3">
                                <label for="proportion" class="col-sm-2 col-form-label">สัดส่วนการสอน</label>
                                <input type="text" class="form-control" name="proportion" required>
                            </div>
                            <div class="mb-3" style="white-space: nowrap;">
                                <label for="amount_time" class="col-sm-2 col-form-label">จำนวนชั่วโมงสอน/สัปดาห์</label>
                                <input type="text" class="form-control" name="amount_time" required>
                            </div>
                            <div class="mb-3" style="white-space: nowrap;">
                                <label for="amount_work" class="col-sm-2 col-form-label ">จำนวนภาระงาน/สัปดาห์</label>
                                <input type="text" class="form-control" name="amount_work" required>
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
                                <input type="text" class="form-control" name="code_course" value="<?php echo $data['code_course']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="name_course" class="col-sm-2 col-form-label ">ชื่อวิชา</label>
                                <input type="text" class="form-control" name="name_course" value="<?php echo $data['name_course']; ?>">
                            </div>
                            <h5 class="col-sm-2 col-form-label">จำนวนหน่วยกิต:</h5>
                            <div class="m-3">
                                <div class="row mb-3">
                                    <label for="amount_credit" class="col-sm-2 col-form-label">จำนวน</label>
                                    <div class="col-sm-10">
                                        <select id="amount_credit" name="amount_credit" class="form-select">
                                            <option value="1" <?php if ($data['amount_credit'] === '1') echo 'selected'; ?>>1</option>
                                            <option value="2" <?php if ($data['amount_credit'] === '2') echo 'selected'; ?>>2</option>
                                            <option value="3" <?php if ($data['amount_credit'] === '3') echo 'selected'; ?>>3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="describe" class="col-sm-2 col-form-label">บรรยาย</label>
                                    <div class="col-sm-10">
                                        <select id="describe" name="describe" class="form-select">
                                            <option value="0" <?php if ($data['describe'] === '0') echo 'selected'; ?>>0</option>
                                            <option value="1" <?php if ($data['describe'] === '1') echo 'selected'; ?>>1</option>
                                            <option value="2" <?php if ($data['describe'] === '2') echo 'selected'; ?>>2</option>
                                            <option value="3" <?php if ($data['describe'] === '3') echo 'selected'; ?>>3</option>
                                            <option value="4" <?php if ($data['describe'] === '4') echo 'selected'; ?>>4</option>
                                            <option value="5" <?php if ($data['describe'] === '5') echo 'selected'; ?>>5</option>
                                            <option value="6" <?php if ($data['describe'] === '6') echo 'selected'; ?>>6</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="practice" class="col-sm-2 col-form-label">ปฏิบัติ</label>
                                    <div class="col-sm-10">    
                                        <select id="practice" name="practice" class="form-select">
                                            <option value="0" <?php if ($data['practice'] === '0') echo 'selected'; ?>>0</option>
                                            <option value="1" <?php if ($data['practice'] === '1') echo 'selected'; ?>>1</option>
                                            <option value="2" <?php if ($data['practice'] === '2') echo 'selected'; ?>>2</option>
                                            <option value="3" <?php if ($data['practice'] === '3') echo 'selected'; ?>>3</option>
                                            <option value="4" <?php if ($data['practice'] === '4') echo 'selected'; ?>>4</option>
                                            <option value="5" <?php if ($data['practice'] === '5') echo 'selected'; ?>>5</option>
                                            <option value="6" <?php if ($data['practice'] === '6') echo 'selected'; ?>>6</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="practice_subject" class="col-sm-2 col-form-label">แบบปฏิบัติ</label>
                                    <div class="col-sm-10">
                                        <select id="practice_subject" name="practice_subject" class="form-select">
                                            <option value="ทั่วไป" <?php if ($data['practice_subject'] === 'ทั่วไป') echo 'selected'; ?>>ทั่วไป</option>
                                            <option value="ฟิสิกส์" <?php if ($data['practice_subject'] === 'ฟิสิกส์') echo 'selected'; ?>>ฟิสิกส์</option>
                                            <option value="เคมี" <?php if ($data['practice_subject'] === 'เคมี') echo 'selected'; ?>>เคมี</option>
                                            <option value="ชีววิทยาและจุลชีววิทยา" <?php if ($data['practice_subject'] === 'ชีววิทยาและจุลชีววิทยา') echo 'selected'; ?>>ชีววิทยาและจุลชีววิทยา</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="research" class="col-sm-2 col-form-label">ค้นคว้า</label>
                                    <div class="col-sm-10">    
                                        <select id="type_work" name="type_work" class="form-select">
                                            <option value="0" <?php if ($data['practice'] === '0') echo 'selected'; ?>>0</option>
                                            <option value="1" <?php if ($data['practice'] === '1') echo 'selected'; ?>>1</option>
                                            <option value="2" <?php if ($data['practice'] === '2') echo 'selected'; ?>>2</option>
                                            <option value="3" <?php if ($data['practice'] === '3') echo 'selected'; ?>>3</option>
                                            <option value="4" <?php if ($data['practice'] === '4') echo 'selected'; ?>>4</option>
                                            <option value="5" <?php if ($data['practice'] === '5') echo 'selected'; ?>>5</option>
                                            <option value="6" <?php if ($data['practice'] === '6') echo 'selected'; ?>>6</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="level" class="col-sm-2 col-form-label">ระดับชั้น(หมู่เรียน)</label>
                                <input type="text" class="form-control" name="level" value="<?php echo $data['level']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="group_study" class="col-sm-2 col-form-label">หมู่เรียนที่</label>
                                    <select id="type_work" name="type_work" class="form-select">
                                        <option value="1" <?php if ($data['practice'] === '1') echo 'selected'; ?>>1</option>
                                        <option value="2" <?php if ($data['practice'] === '2') echo 'selected'; ?>>2</option>
                                        <option value="3" <?php if ($data['practice'] === '3') echo 'selected'; ?>>3</option>
                                        <option value="4" <?php if ($data['practice'] === '4') echo 'selected'; ?>>4</option>
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label for="amount_student" class="col-sm-2 col-form-label">จำนวนนักศึกษา</label>
                                <input type="text" class="form-control" name="amount_student" value="<?php echo $data['amount_student']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="proportion" class="col-sm-2 col-form-label">สัดส่วนการสอน</label>
                                <input type="text" class="form-control" name="proportion" value="<?php echo $data['proportion']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="amount_time" class="col-sm-2 col-form-label">จำนวนชั่วโมงสอน/สัปดาห์</label>
                                <input type="text" class="form-control" name="amount_time" value="<?php echo $data['amount_time']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="amount_work" class="col-sm-2 col-form-label">จำนวนภาระงาน/สัปดาห์</label>
                                <input type="text" class="form-control" name="amount_work" value="<?php echo $data['amount_work']; ?>">
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
        <div class="modal fade" id="uploadModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">อัปโหลดไฟล์</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="1_1/upload_1_1.php" method="post" enctype="multipart/form-data">
                            <?php
                            ?>
                            <div class="row mb-3">
                                <label for="file" class="col-sm-2 col-form-label">อัปโหลดไฟล์</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="file" id="fileInput" required>
                                    <br>
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
</script>