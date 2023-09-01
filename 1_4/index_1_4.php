<?php
    require_once "config/db.php";

    $stmt = $conn->query("SELECT * FROM `term_year` where id = 1");
    $stmt->execute();
    $term_year = $stmt->fetch();

    if (isset($_GET['delete_file'])) {
        $delete_file_id = $_GET['delete_file'];
        $stmt = $conn->prepare("SELECT file FROM personal_1_4 WHERE id = :delete_file_id");
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

        $delete_file = $conn->prepare("UPDATE personal_1_4 SET file = '' WHERE id = :delete_file_id");
        $delete_file->bindParam(':delete_file_id', $delete_file_id);
        $delete_file->execute();

        if ($delete_file) {
            $_SESSION['success'] = "ไฟล์ถูกลบสำเร็จ";
            echo "<script>window.location.href = 'index.php?page=1_4/index_1_4';</script>";
            exit;
        }
    }

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];

        $stmt = $conn->prepare("SELECT file FROM personal_1_4 WHERE id = :delete_id");
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

        $deletestmt = $conn->prepare("DELETE FROM personal_1_4 WHERE id = :delete_id");
        $deletestmt->bindParam(':delete_id', $delete_id);
        $deletestmt->execute();

        if ($deletestmt) {
            $_SESSION['success'] = "ข้อมูลถูกลบสำเร็จ";
            echo "<script>window.location.href = 'index.php?page=1_4/index_1_4';</script>";
            exit;
        }
    }

    if (isset($_GET['edit'])) {
        $_SESSION['edit'] = $_GET['edit'];
        $edit_id = $_GET['edit'];
        $stmt = $conn->prepare("SELECT * FROM personal_1_4 WHERE id = ?");
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
        <h1>4. ภาระงานกิจกรรมพัฒนานักศึกษา (งานปฐมนิเทศ /ปัจฉิมนิเทศ /งานองค์การ-สโมสรนักศึกษา งานกีฬา งานกำกับดูแลวินัยนักศึกษา การศึกษาดูงานของนักศึกษา งานออกค่ายนักศึกษา หรืองานอื่นที่เกี่ยวข้อง)</h1>
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
                <th scope="col">วัน/เดือน/ปี</th>
                <th scope="col">ชื่อโครงการ/กิจกรรม/งาน</th>
                <th scope="col">สถานที่/งานที่ควบคุม</th>
                <th scope="col">ระยะเวลาปฏิบัติ (ชั่วโมง)</th>
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
                $stmt = $conn->query("SELECT * FROM personal_1_4 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
                $stmt->execute();
                $personal = $stmt->fetchAll();

                $totalAmountWork = 0.00;

                if (!$personal) {
                    echo "<tr><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    foreach ($personal as $per) {
            ?>
                    <tr>
                        <td style="white-space: nowrap;"><?= $per['date']; ?></td>
                        <td><?= $per['project_name']; ?></td>
                        <td><?= $per['location']; ?></td>
                        <td><?= $per['period']; ?></td>
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
                                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_4/index_1_4&delete_file=<?= $per['id']; ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบไฟล์</div>
                                    </div>
                                </a>
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="?page=1_4/index_1_4&edit=<?= $per['id']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp;
                                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_4/index_1_4&delete=<?= $per['id']; ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบ</div>
                                    </div>
                                </a>
                            </td>
                        <?php } else { ?>
                            <td>
                                <a style="white-space: nowrap;" href="?page=1_4/index_1_4&upload=<?= $per['id']; ?>" class="btn btn-warning">
                                    <div class="icon d-flex">
                                        <i class="bi bi-upload"></i>&nbsp;
                                        <div class="label">อัปโหลด</div>
                                    </div>
                                </a>
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="?page=1_4/index_1_4&edit=<?= $per['id']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp;
                                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_4/index_1_4&delete=<?= $per['id']; ?>" class="btn btn-danger">
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
                        <th scope="row" colspan="4">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                        <td scope="row"><?= number_format($totalAmountWork, 2); ?></td>
                        <td colspan="2"></td>
                    </tr>
        </tbody>
        <div class="modal fade" id="largeModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">เพิ่มข้อมูล</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="1_4/insert_1_4.php" method="post">
                            <input type="hidden" class="form-control" name="userId" value="<?= $userId ?>">
                            <input type="hidden" class="form-control" name="term" value="<?=$term_year['term'];?>">
                            <input type="hidden" class="form-control" name="year" value="<?=$term_year['year'];?>">
                            <div class="mb-3">
                                <label for="date" class="col-sm-2 col-form-label ">วัน/เดือน/ปี</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="mb-3" style="white-space: nowrap;">
                                <label for="project_name" class="col-sm-2 col-form-label">ชื่อโครงการ/กิจกรรม/งาน</label>
                                <input type="text" class="form-control" name="project_name" required>
                            </div>
                            <div class="mb-3" style="white-space: nowrap;">
                                <label for="location" class="col-sm-2 col-form-label">สถานที่/งานที่ควบคุม</label>
                                <input type="text" class="form-control" name="location" required>
                            </div>
                            <div class="mb-3" style="white-space: nowrap;">
                                <label for="period" class="col-sm-2 col-form-label">ระยะเวลาปฏิบัติ (ชั่วโมง)</label>
                                <input type="text" class="form-control" name="period" id="period1" oninput="calc1()" required>
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
                        <form action="1_4/edit_1_4.php" method="post">
                            <div class="mb-3">
                                <label for="date" class="col-sm-2 col-form-label">วัน/เดือน/ปี</label>
                                <input type="date" class="form-control" name="date" value="<?php echo $data['date']; ?>" required>
                            </div>
                            <div class="mb-3" style="white-space: nowrap;">
                                <label for="project_name" class="col-sm-2 col-form-label">ชื่อโครงการ/กิจกรรม/งาน</label>
                                <input type="text" class="form-control" name="project_name" value="<?php echo $data['project_name']; ?>" required>
                            </div>
                            <div class="mb-3" style="white-space: nowrap;">
                                <label for="location" class="col-sm-2 col-form-label">สถานที่/งานที่ควบคุม</label>
                                <input type="text" class="form-control" name="location" value="<?php echo $data['location']; ?>" required>
                            </div>
                            <div class="mb-3" style="white-space: nowrap;">
                                <label for="period" class="col-sm-2 col-form-label">ระยะเวลาปฏิบัติ (ชั่วโมง)</label>
                                <input type="text" class="form-control" name="period" id="period2" value="<?php echo $data['period']; ?>" oninput="calc2()" required>
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
                        <form action="1_4/upload_1_4.php" method="post" enctype="multipart/form-data">
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
            window.location.href = 'index.php?page=1_4/index_1_4';
        });
    });
    $(document).ready(function() {
        $('#uploadModal').on('hidden.bs.modal', function() {
            window.location.href = 'index.php?page=1_4/index_1_4';
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
        var amountTime = parseFloat(document.getElementById('period1').value);

        if (!isNaN(amountTime)) {
            var calculatedAmountWork = amountTime / 15;
            document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        } else {
            document.getElementById('amount_work1').value = "";
        }
    }

    function calc2() {
        var amountTime = parseFloat(document.getElementById('period2').value);

        if (!isNaN(amountTime)) {
            var calculatedAmountWork = amountTime / 15;
            document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
        } else {
            document.getElementById('amount_work2').value = "";
        }
    }
</script>
<?php 
    $conn = null;
?>