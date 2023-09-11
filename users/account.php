<style>
    .round {
        width: 150px;
        height: 150px;
    }

    .image-overlay {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        /* Ensure the div takes up the full height */
    }
</style>
<?php
    require_once "config/db.php";

    $userId = $_SESSION['userId'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE userId = $userId");
    $stmt->execute();
    $data = $stmt->fetch();

    if (isset($_GET['delete'])) {
        $delete = base64_decode($_GET['delete']);
        $stmt = $conn->prepare("SELECT img FROM users WHERE userId = :delete");
        $stmt->bindParam(':delete', $delete);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $currentFile = $row['img'];

        if ($currentFile) {
            $filePath = 'profile/' . $currentFile;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $delete_file = $conn->prepare("UPDATE users SET img = '' WHERE userId = :delete");
        $delete_file->bindParam(':delete', $delete);
        $delete_file->execute();

        if ($delete_file) {
            $_SESSION['success'] = "ลบรูปโปรไฟล์สำเร็จ";
            echo "<script>window.location.href = 'index.php?page=users/account';</script>";
            exit;
        }
    }
?>
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
    <div class="d-flex flex-column align-items-center justify-content-center ">
        <div class="card col-md-6 mt-5">
            <div class="card-body" style="padding-bottom:0px;">
                <h3 class="card-title pb0 fs-4 mt-3" style="padding:0px;">แก้ไขโปรไฟล์</h3>
                <hr>
                <div class="d-flex justify-content-center">
                    <?php if (empty($data['img'])) { ?>
                        <a class="d-flex justify-content-center">
                            <img src="profile/dummy.png" width="30%" class="rounded-circle">
                        </a>
                    <?php } else { ?>
                        <div>
                            <a class="d-flex justify-content-center">
                                <img src="profile/<?= $data['img'] ?>" class="rounded-circle round">
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <br>
                <div class="image-overlay">
                    <?php if (empty($data['img'])) { ?>
                        <a class="btn btn-warning" href="index.php?page=users/account&upload=<?= base64_encode($data['userId']) ?>">เปลี่ยนรูปโปรไฟล์</a> &nbsp;&nbsp;
                    <?php } else { ?>
                        <a class="btn btn-warning" href="index.php?page=users/account&upload=<?= base64_encode($data['userId']) ?>">เปลี่ยนรูปโปรไฟล์</a> &nbsp;&nbsp;
                        <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" class="btn btn-danger"  href="index.php?page=users/account&delete=<?= base64_encode($data['userId']) ?>">ลบรูปโปรไฟล์</a>
                    <?php } ?>
                </div>
                <br>
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
                <form action="users/edit_account.php" method="post">
                    <div class="mb-3">
                        <?php if (isset($_GET['lastPage'])) { ?>
                            <input type="hidden" name="lastPage" value="<?= $_GET["lastPage"] ?>">
                        <?php } ?>
                        <input type="hidden" name="userId" value="<?= $data["userId"] ?>">
                        <label for="academic_rank" class="form-label">ตำแหน่งทางวิชาการ</label>
                        <select class="form-select" name="academic_rank" id="academic_rank" aria-describedby="academic_rank" required>
                            <option value="ไม่มี" <?php if ($data['academic_rank'] === 'ไม่มี') echo 'selected' ?>>ไม่มี</option>
                            <option value="ผู้ช่วยศาสตราจารย์" <?php if ($data['academic_rank'] === 'ผู้ช่วยศาสตราจารย์') echo 'selected' ?>>ผู้ช่วยศาสตราจารย์</option>
                            <option value="รองศาสตราจารย์" <?php if ($data['academic_rank'] === 'รองศาสตราจารย์') echo 'selected' ?>>รองศาสตราจารย์</option>
                            <option value="ศาสตราจารย์" <?php if ($data['academic_rank'] === 'ศาสตราจารย์') echo 'selected' ?>>ศาสตราจารย์</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nametitle" class="form-label">คำนำหน้าชื่อ</label>
                        <select class="form-select" name="nametitle" aria-describedby="nametitle" id="nametitle" required>
                            <option value="นาย" <?php if ($data['nametitle'] === 'นาย') echo 'selected' ?>>นาย</option>
                            <option value="นาง" <?php if ($data['nametitle'] === 'นาง') echo 'selected' ?>>นาง</option>
                            <option value="นางสาว" <?php if ($data['nametitle'] === 'นางสาว') echo 'selected' ?>>นางสาว</option>
                            <option value="ดร." <?php if ($data['nametitle'] === 'ดร.') echo 'selected' ?>>ดร.</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $data['firstname']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $data['lastname']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="branch" class="col-sm-2 col-form-label ">สาขาวิชา</label>
                        <select class="form-select" name="branch" aria-describedby="branch" id="branch" required>
                            <option value="วิทยาการคอมพิวเตอร์" <?php if ($data['branch'] === 'วิทยาการคอมพิวเตอร์') echo 'selected' ?>>วิทยาการคอมพิวเตอร์</option>
                            <option value="เทคโนโลยีคอมพิวเตอร์และดิจิทัล" <?php if ($data['branch'] === 'เทคโนโลยีคอมพิวเตอร์และดิจิทัล') echo 'selected' ?>>เทคโนโลยีคอมพิวเตอร์และดิจิทัล</option>
                            <option value="สาธารณสุขชุมชน" <?php if ($data['branch'] === 'สาธารณสุขชุมชน') echo 'selected' ?>>สาธารณสุขชุมชน</option>
                            <option value="วิทยาศาสตร์การกีฬา" <?php if ($data['branch'] === 'วิทยาศาสตร์การกีฬา') echo 'selected' ?>>วิทยาศาสตร์การกีฬา</option>
                            <option value="เทคโนโลยีการเกษตร" <?php if ($data['branch'] === 'เทคโนโลยีการเกษตร') echo 'selected' ?>>เทคโนโลยีการเกษตร</option>
                            <option value="เทคโนโลยีและนวัตกรรมอาหาร" <?php if ($data['branch'] === 'เทคโนโลยีและนวัตกรรมอาหาร') echo 'selected' ?>>เทคโนโลยีและนวัตกรรมอาหาร</option>
                            <option value="อาชีวอนามัยและความปลอดภัย" <?php if ($data['branch'] === 'อาชีวอนามัยและความปลอดภัย') echo 'selected' ?>>อาชีวอนามัยและความปลอดภัย</option>
                            <option value="วิศวกรรมซอฟต์แวร์" <?php if ($data['branch'] === 'วิศวกรรมซอฟต์แวร์') echo 'selected' ?>>วิศวกรรมซอฟต์แวร์</option>
                            <option value="วิศวกรรมโลจิสติกส์" <?php if ($data['branch'] === 'วิศวกรรมโลจิสติกส์') echo 'selected' ?>>วิศวกรรมโลจิสติกส์</option>
                            <option value="วิศวกรรมการจัดการอุตสาหกรรมและสิ่งแวดล้อม" <?php if ($data['branch'] === 'วิศวกรรมการจัดการอุตสาหกรรมและสิ่งแวดล้อม') echo 'selected' ?>>วิศวกรรมการจัดการอุตสาหกรรมและสิ่งแวดล้อม</option>
                            <option value="การออกแบบผลิตภัณฑ์และนวัตกรรมวัสดุ" <?php if ($data['branch'] === 'การออกแบบผลิตภัณฑ์และนวัตกรรมวัสดุ') echo 'selected' ?>>การออกแบบผลิตภัณฑ์และนวัตกรรมวัสดุ</option>
                            <option value="เทคโนโลยีโยธาและสถาปัตยกรรม" <?php if ($data['branch'] === 'เทคโนโลยีโยธาและสถาปัตยกรรม') echo 'selected' ?>>เทคโนโลยีโยธาและสถาปัตยกรรม</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">อีเมล</label>
                        <input type="email" class="form-control bg-light" name="email" value="<?php echo $data['email']; ?>" readonly>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button type="submit" name="edit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
                <div class="modal fade" id="uploadModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">อัปโหลดไฟล์</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="users/update_profile.php" method="post" enctype="multipart/form-data">
                                    <?php
                                    ?>
                                    <div class="row mb-1 mt-3">
                                        <label for="file" class="col-sm-2 col-form-label">อัปโหลดไฟล์</label>
                                        <input type="hidden" name="userId" value="<?= base64_decode($_GET['upload']) ?>">
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="file" id="fileInput" required>
                                            <br>
                                            <p>***นามสกุลไฟล์ที่รองรับ .jpg, .jpeg, .png ***</p>
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
                <div class="modal fade" id="change_password" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">เปลี่ยนรหัสผ่าน</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="users/password.php" method="post">
                                    <div class="mb-3">
                                        <input type="hidden" name="userId" value="<?= $data["userId"] ?>">
                                        <label for="password" class="form-label">รหัสผ่านปัจจุบัน</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm password" class="form-label">รหัสผ่านใหม่</label>
                                        <input type="password" class="form-control" name="password_new">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm password" class="form-label">ยืนยันรหัสผ่านใหม่</label>
                                        <input type="password" class="form-control" name="c_password_new">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                        <button type="submit" name="change_password" class="btn btn-primary">บันทึก</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
    $conn = null;
?>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#uploadModal').on('hidden.bs.modal', function() {
            window.location.href = 'index.php?page=users/account&lastPage=index.php?page=users/dashboard';
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