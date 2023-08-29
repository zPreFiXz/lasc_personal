<?php
    require_once "config/db.php";

    // ดึงตาราง term&year
    $stmt = $conn->query("SELECT * FROM `term_year` where id = 1");
    $stmt->execute();
    $term_year = $stmt->fetch();

    if (isset($_GET['delete_file'])) {
        $delete_file_id = $_GET['delete_file'];
        $stmt = $conn->prepare("SELECT file FROM personal_1_6_a WHERE id = :delete_file_id");
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

        $delete_file = $conn->prepare("UPDATE personal_1_6_a SET file = '' WHERE id = :delete_file_id");
        $delete_file->bindParam(':delete_file_id', $delete_file_id);
        $delete_file->execute();
    }

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];

        $stmt = $conn->prepare("SELECT file FROM personal_1_6_a WHERE id = :delete_id");
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

        $deletestmt = $conn->prepare("DELETE FROM personal_1_6_a WHERE id = :delete_id");
        $deletestmt->bindParam(':delete_id', $delete_id);
        $deletestmt->execute();

        if ($deletestmt) {
            $_SESSION['success'] = "ข้อมูลถูกลบสำเร็จ";
            echo "<script>window.location.href = 'index.php?page=1_6_a/index_1_6_a';</script>";
            exit;
        }
    }

    if (isset($_GET['edit'])) {
        $_SESSION['edit'] = $_GET['edit'];
        $edit_id = $_GET['edit'];
        $stmt = $conn->prepare("SELECT * FROM personal_1_6_a WHERE id = ?");
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
        <h1>ก.การสร้างงานวิจัย</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">6. ภาระงานวิจัย (งานวิจัยพื้นฐาน/งานวิจัยประยุกต์)</li>
            <li class="breadcrumb-item active">ก.การสร้างงานวิจัย</li>
        </ol>
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
                <th scope="col" style="white-space: nowrap;">ลำดับที่</th>
                <th scope="col" style="white-space: nowrap;">ชื่องานวิจัย</th>
                <th scope="col" style="white-space: nowrap;">แหล่งเงินทุน</th>
                <th scope="col" style="white-space: nowrap;">กรอบเงินทุน</th>
                <th scope="col">ระยะเวลาเริ่มต้น-สิ้นสุด</th>
                <th scope="col">ลักษณะงานเดี่ยว/กลุ่ม</th>
                <th scope="col">หัวหน้าโครงการ/ผู้ร่วมโครงการ</th>
                <th scope="col">ร้อยละการมีส่วนร่วม</th>
                <th scope="col" style="white-space: nowrap;">จำนวนภาระงาน</th>
                <th scope="col" style="white-space: nowrap;">อัปโหลดไฟล์</th>
                <th scope="col" style="white-space: nowrap;">จัดการข้อมูล</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $userId = $_SESSION['userId'];
                $term =  $term_year['term'];
                $year =  $term_year['year'];
                $stmt = $conn->query("SELECT * FROM personal_1_6_a WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
                $stmt->execute();
                $personal = $stmt->fetchAll();

                $totalAmountWork = 0.00;

                if (!$personal) {
                    echo "<tr><td colspan='11' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    foreach ($personal as $per) {
            ?>
                    <tr>
                        <td style="white-space: nowrap;"><?= $per['number']; ?></td>
                        <td><?= $per['research_name']; ?></td>
                        <td><?= $per['funding_source']; ?></td>
                        <td><?= $per['funding_framework']; ?></td>
                        <td><?= $per['start_end']; ?></td>
                        <td><?= $per['nature_work']; ?></td>
                        <td><?= $per['leader']; ?></td>
                        <td><?= $per['contribute']; ?></td>
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
                                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_6_a/index_1_6_a&delete_file=<?= $per['id']; ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบไฟล์</div>
                                    </div>
                                </a>
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="?page=1_6_a/index_1_6_a&edit=<?= $per['id']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp;
                                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_6_a/index_1_6_a&delete=<?= $per['id']; ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบ</div>
                                    </div>
                                </a>
                            </td>
                        <?php } else { ?>
                            <td>
                                <a style="white-space: nowrap;" href="?page=1_6_a/index_1_6_a&upload=<?= $per['id']; ?>" class="btn btn-warning">
                                    <div class="icon d-flex">
                                        <i class="bi bi-upload"></i>&nbsp;
                                        <div class="label">อัปโหลด</div>
                                    </div>
                                </a>
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="?page=1_6_a/index_1_6_a&edit=<?= $per['id']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp;
                                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_6_a/index_1_6_a&delete=<?= $per['id']; ?>" class="btn btn-danger">
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
                <th scope="row" colspan="8">รวมจำนวนภาระงานตลอดภาคเรียน</th>
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
                        <form action="1_6_a/insert_1_6_a.php" method="post">
                            <input type="hidden" class="form-control" name="userId" value="<?= $userId ?>">
                            <input type="hidden" class="form-control" name="term" value="<?=$term_year['term'];?>">
                            <input type="hidden" class="form-control" name="year" value="<?=$term_year['year'];?>">
                            <div class="mb-3">
                                <label for="number" class="col-sm-2 col-form-label ">ลำดับที่</label>
                                <input type="text" class="form-control" name="number" required>
                            </div>
                            <div class="mb-3">
                                <label for="research_name" class="col-sm-2 col-form-label">ชื่องานวิจัย</label>
                                <input type="text" class="form-control" name="research_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="funding_source" class="col-sm-2 col-form-label">แหล่งเงินทุน</label>
                                <input type="text" class="form-control" name="funding_source" required>
                            </div>
                            <div class="mb-3">
                                <label for="funding_framework" class="col-sm-2 col-form-label">กรอบเงินทุน</label>
                                <select type="text" class="form-select" name="funding_framework" id="funding_framework1" onchange="calc1()">
                                    <option value="" selected>กรุณาเลือก</option>
                                    <option value="<50,000">50,000</option>
                                    <option value="50,000-100,000">50,000-100,000</option>
                                    <option value="100,000-500,000">100,000-500,000</option>
                                    <option value="500,000-1,000,000">500,000-1,000,000</option>
                                    <option value=">1,000,000">>1,000,000</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="start_end" class="col-sm-2 col-form-label">ระยะเวลาเริ่มต้น-สิ้นสุด</label>
                                <input type="text" class="form-control" name="start_end" required>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="nature_work" class="col-sm-2 col-form-label">ลักษณะงานเดี่ยว/กลุ่ม</label>
                                <input type="text" class="form-control" name="nature_work" required>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="leader" class="col-sm-2 col-form-label">หัวหน้าโครงการ/ผู้ร่วมโครงการ</label>
                                <select type="text" class="form-control" name="leader" id="leader1" oninput="calc1()" required>
                                    <option value="" selected>กรุณาเลือก</option>
                                    <option value="หัวหน้าโครงการ">หัวหน้าโครงการ</option>
                                    <option value="ผู้ร่วมโครงการ">ผู้ร่วมโครงการ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="contribute" class="col-sm-2 col-form-label">ร้อยละการมีส่วนร่วม</label>
                                <input type="text" class="form-control" name="contribute" required>
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
                        <form action="1_6_a/edit_1_6_a.php" method="post">
                            <div class="mb-3">
                                <label for="number" class="col-sm-2 col-form-label">ลำดับที่</label>
                                <input type="text" class="form-control" name="number" value="<?php echo $data['number']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="research_name" class="col-sm-2 col-form-label">ชื่องานวิจัย</label>
                                <input type="text" class="form-control" name="research_name" value="<?php echo $data['research_name']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="funding_source" class="col-sm-2 col-form-label">แหล่งเงินทุน</label>
                                <input type="text" class="form-control" name="funding_source" value="<?php echo $data['funding_source']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="funding_framework" class="col-sm-2 col-form-label">กรอบเงินทุน</label>
                                <select type="text" class="form-select" name="funding_framework" id="funding_framework2" onchange="calc2()" required>
                                    <option value="<50,000" <?php if ($data['funding_framework'] === '<50,000') echo 'selected' ?>>50,000<< /option>
                                    <option value="50,000-100,000" <?php if ($data['funding_framework'] === '50,000-100,000') echo 'selected' ?>>50,000-100,000</option>
                                    <option value="100,000-500,000" <?php if ($data['funding_framework'] === '100,000-500,000') echo 'selected' ?>>100,000-500,000</option>
                                    <option value="500,000-1,000,000" <?php if ($data['funding_framework'] === '500,000-1,000,000') echo 'selected' ?>>500,000-1,000,000</option>
                                    <option value=">1,000,000" <?php if ($data['funding_framework'] === '>1,000,000') echo 'selected' ?>>>1,000,000</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="start_end" class="col-sm-2 col-form-label">ระยะเวลาเริ่มต้น-สิ้นสุด</label>
                                <input type="text" class="form-control" name="start_end" value="<?php echo $data['start_end']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="nature_work" class="col-sm-2 col-form-label">ลักษณะงานเดี่ยว/กลุ่ม</label>
                                <input type="text" class="form-control" name="nature_work" value="<?php echo $data['nature_work']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="leader" class="col-sm-2 col-form-label">หัวหน้าโครงการ/ผู้ร่วมโครงการ</label>
                                <select type="text" class="form-select" name="leader" id="leader2" onchange="calc2()" required>
                                    <option value="หัวหน้าโครงการ" <?php if ($data['leader'] === 'หัวหน้าโครงการ') echo 'selected' ?>>หัวหน้าโครงการ</option>
                                    <option value="ผู้ร่วมโครงการ" <?php if ($data['leader'] === 'ผู้ร่วมโครงการ') echo 'selected' ?>>ผู้ร่วมโครงการ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label style="white-space: nowrap;" for="contribute" class="col-sm-2 col-form-label">ร้อยละการมีส่วนร่วม</label>
                                <input type="text" class="form-control" name="contribute" value="<?php echo $data['contribute']; ?>" required>
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
                        <form action="1_6_a/upload_1_6_a.php" method="post" enctype="multipart/form-data">
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
            window.location.href = 'index.php?page=1_6_a/index_1_6_a';
        });
    });
    $(document).ready(function() {
        $('#uploadModal').on('hidden.bs.modal', function() {
            window.location.href = 'index.php?page=1_6_a/index_1_6_a';
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
        var funding = document.getElementById('funding_framework1').value;
        var leader = document.getElementById('leader1').value;

        if (funding == '<50,000') {
            if (leader == 'หัวหน้าโครงการ') {
                var calculatedAmountWork = 4;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            } else if (leader == 'ผู้ร่วมโครงการ') {
                var calculatedAmountWork = 2;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            } else {
                var calculatedAmountWork = 0.00;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }
        } else if (funding == '50,000-100,000') {
            if (leader == 'หัวหน้าโครงการ') {
                var calculatedAmountWork = 6;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            } else if (leader == 'ผู้ร่วมโครงการ') {
                var calculatedAmountWork = 3;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            } else {
                var calculatedAmountWork = 0.00;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }
        } else if (funding == '100,000-500,000') {
            if (leader == 'หัวหน้าโครงการ') {
                var calculatedAmountWork = 8;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            } else if (leader == 'ผู้ร่วมโครงการ') {
                var calculatedAmountWork = 4;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            } else {
                var calculatedAmountWork = 0.00;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }
        } else if (funding == '500,000-1,000,000') {
            if (leader == 'หัวหน้าโครงการ') {
                var calculatedAmountWork = 10;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            } else if (leader == 'ผู้ร่วมโครงการ') {
                var calculatedAmountWork = 5;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            } else {
                var calculatedAmountWork = 0.00;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }
        } else if (funding == '>1,000,000') {
            if (leader == 'หัวหน้าโครงการ') {
                var calculatedAmountWork = 12;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            } else if (leader == 'ผู้ร่วมโครงการ') {
                var calculatedAmountWork = 6;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            } else {
                var calculatedAmountWork = 0.00;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }
        } else {
            var calculatedAmountWork = 0;
            document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        }
    }

    function calc2() {
        var funding = document.getElementById('funding_framework2').value;
        var leader = document.getElementById('leader2').value;

        if (funding == '<50,000') {
            if (leader == 'หัวหน้าโครงการ') {
                var calculatedAmountWork = 4;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            } else if (leader == 'ผู้ร่วมโครงการ') {
                var calculatedAmountWork = 2;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }
        } else if (funding == '50,000-100,000') {
            if (leader == 'หัวหน้าโครงการ') {
                var calculatedAmountWork = 6;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            } else if (leader == 'ผู้ร่วมโครงการ') {
                var calculatedAmountWork = 3;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }
        } else if (funding == '100,000-500,000') {
            if (leader == 'หัวหน้าโครงการ') {
                var calculatedAmountWork = 8;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            } else if (leader == 'ผู้ร่วมโครงการ') {
                var calculatedAmountWork = 4;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }
        } else if (funding == '500,000-1,000,000') {
            if (leader == 'หัวหน้าโครงการ') {
                var calculatedAmountWork = 10;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            } else if (leader == 'ผู้ร่วมโครงการ') {
                var calculatedAmountWork = 5;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }
        } else if (funding == '>1,000,000') {
            if (leader == 'หัวหน้าโครงการ') {
                var calculatedAmountWork = 12;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            } else if (leader == 'ผู้ร่วมโครงการ') {
                var calculatedAmountWork = 6;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }
        }
    }
</script>