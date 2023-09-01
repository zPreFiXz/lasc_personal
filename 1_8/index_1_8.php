<?php
    require_once "config/db.php";

    // ดึงตาราง term&year
    $stmt = $conn->query("SELECT * FROM `term_year` where id = 1");
    $stmt->execute();
    $term_year = $stmt->fetch();

    if (isset($_GET['delete_file'])) {
        $delete_file_id = $_GET['delete_file'];
        $stmt = $conn->prepare("SELECT file FROM personal_1_8 WHERE id = :delete_file_id");
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

        $delete_file = $conn->prepare("UPDATE personal_1_8 SET file = '' WHERE id = :delete_file_id");
        $delete_file->bindParam(':delete_file_id', $delete_file_id);
        $delete_file->execute();

        if ($delete_file) {
            $_SESSION['success'] = "ไฟล์ถูกลบสำเร็จ";
            echo "<script>window.location.href = 'index.php?page=1_8/index_1_8';</script>";
            exit;
        }
    }

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];

        $stmt = $conn->prepare("SELECT file FROM personal_1_8 WHERE id = :delete_id");
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

        $deletestmt = $conn->prepare("DELETE FROM personal_1_8 WHERE id = :delete_id");
        $deletestmt->bindParam(':delete_id', $delete_id);
        $deletestmt->execute();

        if ($deletestmt) {
            $_SESSION['success'] = "ข้อมูลถูกลบสำเร็จ";
            echo "<script>window.location.href = 'index.php?page=1_8/index_1_8';</script>";
            exit;
        }
    }

    if (isset($_GET['edit'])) {
        $_SESSION['edit'] = $_GET['edit'];
        $edit_id = $_GET['edit'];
        $stmt = $conn->prepare("SELECT * FROM personal_1_8 WHERE id = ?");
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
        <h1>8. ภาระงานด้านบริการวิชาการ (เป็นวิทยากรใน/นอกสถาบัน เป็นกรรมการอ่านผลงานเพื่อขอตำแหน่งทางวิชาการ เป็นที่ปรึกษา หรือร่วมเป็นกรรมการทางวิชาการแก่องค์กร ชุมชนหรือท้องถิ่น งานจัดอบรมทางวิชาการ)</h1>
    </div>
    <hr>
    <div class="d-flex justify-content-end">
        <button class="btn btn-success mb-3" type="button" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">
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
                <th scope="col">วัน/เดือน/ปี</th>
                <th scope="col">ประเภทการบริการทางวิชาการ</th>
                <th scope="col">เรื่อง</th>
                <th scope="col">สถานที่</th>
                <th scope="col">ลักษณะงาน</th>
                <th scope="col">จำนวนชั่วโมงทำงาน</th>
                <th scope="col">จำนวนภาระงาน</th>
                <th scope="col">อัปโหลดไฟล์</th>
                <th scope="col">จัดการข้อมูล</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $userId = $_SESSION['userId'];
                $term =  $term_year['term'];
                $year =  $term_year['year'];
                $stmt = $conn->query("SELECT * FROM personal_1_8 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
                $stmt->execute();
                $personal = $stmt->fetchAll();

                $totalAmountWork = 0.00;

                if (!$personal) {
                    echo "<tr><td colspan='9' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    foreach ($personal as $per) {
            ?>
                    <tr>
                        <td style="white-space: nowrap;"><?= $per['date']; ?></td>
                        <td><?= $per['type']; ?></td>
                        <td><?= $per['subject']; ?></td>
                        <td><?= $per['location']; ?></td>
                        <td><?= $per['nature_work']; ?></td>
                        <td><?= $per['hours']; ?></td>
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
                                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_8/index_1_8&delete_file=<?= $per['id']; ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบไฟล์</div>
                                    </div>
                                </a>
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="?page=1_8/index_1_8&edit=<?= $per['id']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp;
                                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_8/index_1_8&delete=<?= $per['id']; ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบ</div>
                                    </div>
                                </a>
                            </td>
                        <?php } else { ?>
                            <td>
                                <a style="white-space: nowrap;" href="?page=1_8/index_1_8&upload=<?= $per['id']; ?>" class="btn btn-warning">
                                    <div class="icon d-flex">
                                        <i class="bi bi-upload"></i>&nbsp;
                                        <div class="label">อัปโหลด</div>
                                    </div>
                                </a>
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="?page=1_8/index_1_8&edit=<?= $per['id']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp;
                                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_8/index_1_8&delete=<?= $per['id']; ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบ</div>
                                    </div>
                                </a>
                            </td>
                        <?php } ?>
                    </tr>
            <?php } } ?>
                    <tr>
                        <th scope="row" colspan="6">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                        <td scope="row"><?= number_format($totalAmountWork, 2); ?></td>
                        <td colspan="2"></td>
                    </tr>
        </tbody>
        <div class="modal fade" id="ExtralargeModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">เพิ่มข้อมูล</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="1_8/insert_1_8.php" method="post">
                            <input type="hidden" class="form-control" name="userId" value="<?= $userId ?>">
                            <input type="hidden" class="form-control" name="term" value="<?=$term_year['term'];?>">
                            <input type="hidden" class="form-control" name="year" value="<?=$term_year['year'];?>">
                            <div class="mb-3">
                                <label for="date" class="col-sm-2 col-form-label ">วัน/เดือน/ปี</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="type" class="col-sm-2 col-form-label">ประเภทการบริการทางวิชาการ</label>
                                <div class="col-sm-12">
                                    <select name="type" class="form-select" id="type1" onchange="calc1()" required>
                                        <option value="" selected>กรุณาเลือก</option>
                                        <option value="วิทยากร">วิทยากร</option>
                                        <option value="ผู้ทรงคุณวุฒิ">ผู้ทรงคุณวุฒิ</option>
                                        <option value="โครงการบริการวิชาการ">โครงการบริการวิชาการ</option>
                                        <option value="อนุกรรมการอ่านผลงานวิชาการ">อนุกรรมการอ่านผลงานวิชาการ</option>
                                        <option value="กรรมการอ่านงานวิจัย">กรรมการอ่านงานวิจัย</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="col-sm-2 col-form-label">เรื่อง</label>
                                <input type="text" class="form-control" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="col-sm-2 col-form-label">สถานที่</label>
                                <input type="text" class="form-control" name="location" required>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="nature_work" class="col-sm-2 col-form-label">ลักษณะงาน</label>
                                <input type="text" class="form-control" name="nature_work" required>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="hours" class="col-sm-2 col-form-label">จำนวนชั่วโมงทำงาน</label>
                                <input type="text" class="form-control" name="hours" id="hours1" oninput="calca1()" required>
                            </div>
                            <div class="mb-3">
                                <label for="amount_work" class="col-sm-2 col-form-label">จำนวนภาระงาน</label>
                                <input type="text" class="form-control" name="amount_work" id="amount_work1" readonly>
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
        <div class="modal fade" id="modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">แก้ไขข้อมูล</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="1_8/edit_1_8.php" method="post">
                            <div class="mb-3">
                                <label for="date" class="col-sm-2 col-form-label">วัน/เดือน/ปี</label>
                                <input type="date" class="form-control" name="date" value="<?php echo $data['date']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="type" class="col-sm-2 col-form-label">ประเภทการบริการทางวิชาการ</label>
                                <div class="col-sm-12">
                                    <select id="type2" name="type" class="form-select" onchange="calc2()" required>
                                        <option value="วิทยากร" <?php if ($data['type'] === 'วิทยากร') echo 'selected'; ?>>วิทยากร</option>
                                        <option value="ผู้ทรงคุณวุฒิ" <?php if ($data['type'] === 'ผู้ทรงคุณวุฒิ') echo 'selected'; ?>>ผู้ทรงคุณวุฒิ</option>
                                        <option value="โครงการบริการวิชาการ" <?php if ($data['type'] === 'โครงการบริการวิชาการ') echo 'selected'; ?>>โครงการบริการวิชาการ</option>
                                        <option value="อนุกรรมการอ่านผลงานวิชาการ" <?php if ($data['type'] === 'อนุกรรมการอ่านผลงานวิชาการ') echo 'selected'; ?>>อนุกรรมการอ่านผลงานวิชาการ</option>
                                        <option value="กรรมการอ่านงานวิจัย" <?php if ($data['type'] === 'กรรมการอ่านงานวิจัย') echo 'selected'; ?>>กรรมการอ่านงานวิจัย</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="col-sm-2 col-form-label">เรื่อง</label>
                                <input type="text" class="form-control" name="subject" value="<?php echo $data['subject']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="col-sm-2 col-form-label">สถานที่</label>
                                <input type="text" class="form-control" name="location" value="<?php echo $data['location']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="nature_work" class="col-sm-2 col-form-label">ลักษณะงาน</label>
                                <input type="text" class="form-control" name="nature_work" value="<?php echo $data['nature_work']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="hours" class="col-sm-2 col-form-label">จำนวนชั่วโมงทำงาน</label>
                                <input type="text" class="form-control" name="hours" id="hours2" value="<?php echo $data['hours']; ?>" oninput="calc2()" required>
                            </div>
                            <div class="mb-3">
                                <label for="amount_work" class="col-sm-2 col-form-label">จำนวนภาระงาน</label>
                                <input type="text" class="form-control" name="amount_work" id="amount_work2" value="<?php echo $data['amount_work']; ?>" readonly>
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
                        <form action="1_8/upload_1_8.php" method="post" enctype="multipart/form-data">
                            <div class="row mb-1 mt-3">
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
            window.location.href = 'index.php?page=1_8/index_1_8';
        });
    });
    $(document).ready(function() {
        $('#uploadModal').on('hidden.bs.modal', function() {
            window.location.href = 'index.php?page=1_8/index_1_8';
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
        var type = document.getElementById('type1').value;
        var hours = document.getElementById('hours1').value;

        if (type == 'วิทยากร') {
            var calculatedAmountWork = hours / 15;
            document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        } else if (type == 'โครงการบริการวิชาการ') {
            var calculatedAmountWork = hours / 15;
            document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        } else if (type == 'ผู้ทรงคุณวุฒิ') {
            var calculatedAmountWork = 1;
            document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        } else if (type == 'อนุกรรมการอ่านผลงานวิชาการ') {
            var calculatedAmountWork = 1;
            document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        } else if (type == 'กรรมการอ่านงานวิจัย') {
            var calculatedAmountWork = 1;
            document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        } else {
            var calculatedAmountWork = 0;
            document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        }
    }

    function calc2() {
        var type = document.getElementById('type2').value;
        var hours = document.getElementById('hours2').value;

        if (type == 'วิทยากร') {
            var calculatedAmountWork = hours / 15;
            document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
        } else if (type == 'โครงการบริการวิชาการ') {
            var calculatedAmountWork = hours / 15;
            document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
        } else if (type == 'ผู้ทรงคุณวุฒิ') {
            var calculatedAmountWork = 1;
            document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
        } else if (type == 'อนุกรรมการอ่านผลงานวิชาการ') {
            var calculatedAmountWork = 1;
            document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
        } else if (type == 'กรรมการอ่านงานวิจัย') {
            var calculatedAmountWork = 1;
            document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
        } else {
            var calculatedAmountWork = 0;
            document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
        }
    }
</script>
<?php 
    $conn = null;
?>