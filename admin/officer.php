<?php
    require_once "config/db.php";

    $stmt = $conn->query("SELECT * FROM `term_year` where id = 1");
    $stmt->execute();
    $term_year = $stmt->fetch();

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];

        $deletestmt = $conn->prepare("DELETE FROM users WHERE userId = :delete_id");    
        $deletestmt->bindParam(':delete_id', $delete_id);
        $deletestmt->execute();

        if ($deletestmt) {
            $_SESSION['success'] = "ข้อมูลถูกลบสำเร็จ";
            echo "<script>window.location.href = 'index_admin.php?page=admin/officer';</script>";
            exit;
        }
    }

    if (isset($_GET['edit'])) {
        $_SESSION['edit'] = $_GET['edit'];
        $edit_id = $_GET['edit'];
        $stmt = $conn->prepare("SELECT * FROM users WHERE userId = $edit_id");
        $stmt->execute();
        $data = $stmt->fetch();
?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var modal = new bootstrap.Modal(document.getElementById("modal"));
                modal.show();
            });
        </script>
    <?php } ?>
<div class="container">
    <div class="pagetitle mt-3">
        <h1>รายชื่อเจ้าหน้าที่</h1>
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
                <th scope="col">ตำแหน่ง</th>
                <th scope="col">คำนำหน้า</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">นามสกุล</th>
                <th scope="col">สาขาวิชา</th>
                <th scope="col">อีเมล</th>
                <th scope="col">ผู้ดูแลระบบ</th>
                <th scope="col">จัดการข้อมูล</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->query("SELECT * FROM users WHERE urole = 'officer'");
                $stmt->execute();
                $personal = $stmt->fetchAll();

                if (!$personal) {
                    echo "<tr><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    foreach ($personal as $per) {
            ?>
                        <tr>
                            <td style="white-space: nowrap;"><?= $per['academic_rank']; ?></td>
                            <td><?= $per['nametitle']; ?></td>
                            <td><?= $per['firstname']; ?></td>
                            <td><?= $per['lastname']; ?></td>
                            <td><?= $per['branch']; ?></td>
                            <td><?= $per['email']; ?></td>
                            <td><?= $per['isAdmin']; ?></td>
                            <td class="d-flex justify-content-center">
                                <a href="?page=admin/officer&edit=<?= $per['userId']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp;
                                <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=admin/officer&delete=<?= $per['userId']; ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบ</div>
                                    </div>
                                </a>
                            </td>
                        </tr>
            <?php } } ?>           
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
                        <form action="admin/officer_insert.php" method="post">
                            <div class="mb-3">
                                <label for="academic_rank" class="form-label">ตำแหน่งทางวิชาการ</label>
                                <select class="form-select" name="academic_rank" id="academic_rank" aria-describedby="academic_rank">
                                    <option value="กรุณาเลือก" selected >กรุณาเลือก</option>
                                    <option value="ไม่มี">ไม่มี</option>
                                    <option value="ผู้ช่วยศาสตราจารย์">ผู้ช่วยศาสตราจารย์</option>
                                    <option value="รองศาสตราจารย์">รองศาสตราจารย์</option>
                                    <option value="ศาสตราจารย์">ศาสตราจารย์</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nametitle" class="form-label">คำนำหน้าชื่อ</label>
                                <select class="form-select" name="nametitle" aria-describedby="nametitle" id="nametitle">
                                    <option value="กรุณาเลือก" selected >กรุณาเลือก</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="ดร.">ดร.</option>
                                </select>
                            </div>            
                            <div class="mb-3">
                                <label for="firstname" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" name="firstname" aria-describedby="firstname">
                            </div>
                            <div class="mb-3">
                                <label for="lastname" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" name="lastname" aria-describedby="lastname">
                            </div>
                            <div class="mb-3">
                                <label for="branch" class="form-label">สาขาวิชา</label>
                                <select class="form-select" name="branch" aria-describedby="branch" id="branch">
                                    <option value="กรุณาเลือก" selected >กรุณาเลือก</option>
                                    <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                                    <option value="เทคโนโลยีคอมพิวเตอร์และดิจิทัล">เทคโนโลยีคอมพิวเตอร์และดิจิทัล</option>
                                    <option value="สาธารณสุขชุมชน">สาธารณสุขชุมชน</option>
                                    <option value="วิทยาศาสตร์การกีฬา">วิทยาศาสตร์การกีฬา</option>
                                    <option value="เทคโนโลยีการเกษตร">เทคโนโลยีการเกษตร</option>
                                    <option value="เทคโนโลยีและนวัตกรรมอาหาร">เทคโนโลยีและนวัตกรรมอาหาร</option>
                                    <option value="อาชีวอนามัยและความปลอดภัย">อาชีวอนามัยและความปลอดภัย</option>
                                    <option value="วิศวกรรมซอฟต์แวร์">วิศวกรรมซอฟต์แวร์</option>
                                    <option value="วิศวกรรมโลจิสติกส์">วิศวกรรมโลจิสติกส์</option>
                                    <option value="วิศวกรรมการจัดการอุตสาหกรรมและสิ่งแวดล้อม">วิศวกรรมการจัดการอุตสาหกรรมและสิ่งแวดล้อม</option>
                                    <option value="การออกแบบผลิตภัณฑ์และนวัตกรรมวัสดุ">การออกแบบผลิตภัณฑ์และนวัตกรรมวัสดุ</option>
                                    <option value="เทคโนโลยีโยธาและสถาปัตยกรรม">เทคโนโลยีโยธาและสถาปัตยกรรม</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">อีเมล</label>
                                <input type="email" class="form-control" name="email" aria-describedby="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">รหัสผ่าน</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="confirm password" class="form-label">ยืนยันรหัสผ่าน</label>
                                <input type="password" class="form-control" name="c_password">
                            </div>
                            <div class="mb-3">
                                <label for="isAdmin" class="form-label">ผู้ดูแลระบบ (เป็นผู้ดูแลระบบหรือไม่)</label>
                                <select class="form-select" name="isAdmin">
                                    <option value="กรุณาเลือก" selected>กรุณาเลือก</option>
                                    <option value="1">เป็น</option>
                                    <option value="0">ไม่เป็น</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="signup" class="btn btn-primary">ลงทะเบียน</button>
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
                        <form action="admin/edit.php" method="post">
                            <div class="mb-3">
                                <input type="hidden" name = "userId" value="<?= $data["userId"]?>">
                                <input type="hidden" name = "urole" value="<?= $data["urole"]?>">
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
                                    <option value="นาย" <?php if($data['nametitle'] === 'นาย') echo 'selected' ?>>นาย</option>
                                    <option value="นาง" <?php if($data['nametitle'] === 'นาง') echo 'selected' ?>>นาง</option>
                                    <option value="นางสาว" <?php if($data['nametitle'] === 'นางสาว') echo 'selected' ?>>นางสาว</option>
                                    <option value="ดร." <?php if($data['nametitle'] === 'ดร.') echo 'selected' ?>>ดร.</option>
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
                                <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>"required>
                            </div>
                            <div class="mb-3">
                                <label for="check admin" class="form-label">ผู้ดูแลระบบ (เป็นผู้ดูแลระบบหรือไม่)</label>
                                <select class="form-select" name="isAdmin" required>
                                    <option value="1" <?php if($data['isAdmin'] === '1') echo 'selected' ?>>เป็น</option>
                                    <option value="0" <?php if($data['isAdmin'] === '0') echo 'selected' ?>>ไม่เป็น</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="edit" class="btn btn-primary">แก้ไข</button>
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
            window.location.href = 'index_admin.php?page=admin/officer';
        });
    });
</script>
<?php
    $conn = null;
?>