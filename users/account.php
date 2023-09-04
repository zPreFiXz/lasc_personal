<?php
    require_once "config/db.php";

    $userId = $_SESSION['userId'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE userId = $userId");
    $stmt->execute();
    $data = $stmt->fetch();
?>
<div class="container">
    <div class="d-flex flex-column align-items-center justify-content-center ">
        <div class="card col-md-6 mt-5">
            <div class="card-body" style="padding-bottom:0px;">
                <h3 class="card-title pb0 fs-4 mt-3" style="padding:0px;">แก้ไขโปรไฟล์</h3>
                <hr>
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
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#change_password">เปลี่ยนรหัสผ่าน</button>
                </div>
                <form action="users/edit_account.php" method="post">
                    <div class="mb-3">
                        <?php if(isset($_GET['lastPage'])){?>
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