<?php
    require_once "config/db.php";

    // ดึงตาราง term&year
    $stmt = $conn->query("SELECT * FROM `term_year` where id = 1");
    $stmt->execute();
    $term_year = $stmt->fetch();
    //delete file
    if (isset($_GET['delete_file'])) {
        $delete_file_id = base64_decode($_GET['delete_file']); // รับค่า ID ที่ต้องการลบ
        $stmt = $conn->prepare("SELECT file FROM personal_1_5_b WHERE id = :delete_file_id");
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

        $delete_file = $conn->prepare("UPDATE personal_1_5_b SET file = '' WHERE id = :delete_file_id");
        $delete_file->bindParam(':delete_file_id', $delete_file_id);
        $delete_file->execute();

        if ($delete_file) {
            $_SESSION['success'] = "ไฟล์ถูกลบสำเร็จ";
            echo "<script>window.location.href = 'index.php?page=1_5_b/index_1_5_b';</script>";
            exit;
        }
    }
    //delete 
    if (isset($_GET['delete'])) {
        $delete_id = base64_decode($_GET['delete']);

        $stmt = $conn->prepare("SELECT file FROM personal_1_5_b WHERE id = :delete_id");
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

        $deletestmt = $conn->prepare("DELETE FROM personal_1_5_b WHERE id = :delete_id");
        $deletestmt->bindParam(':delete_id', $delete_id);
        $deletestmt->execute();

        if ($deletestmt) {
            $_SESSION['success'] = "ข้อมูลถูกลบสำเร็จ";
            echo "<script>window.location.href = 'index.php?page=1_5_b/index_1_5_b';</script>";
            exit;
        }
    }
    //edit
    if (isset($_GET['edit'])) {
        // เก็บค่า ID ที่ต้องการแก้ไขในตัวแปร session ชื่อ 'edit'
        $_SESSION['edit'] = base64_decode($_GET['edit']);
        $edit_id = $_SESSION['edit'];
        // เตรียมคำสั่ง SQL สำหรับเลือกข้อมูลที่ต้องการแก้ไขจากตาราง personal_1_5_b โดยใช้ ID
        $stmt = $conn->prepare("SELECT * FROM personal_1_5_b WHERE id = ?");
        $stmt->execute([$edit_id]);
        // เก็บข้อมูลที่ได้จากการคิวรีในตัวแปร $data
        $data = $stmt->fetch();
?>
        <script>
            // ถูกเรียกใช้เมื่อหน้าเว็บโหลดเสร็จสมบูรณ์ 
            document.addEventListener("DOMContentLoaded", function() {
                // สร้างอ็อบเจกต์ Modal
                var modal = new bootstrap.Modal(document.getElementById("modal"));
                // แสดงหน้าต่าง Modal
                modal.show();
            });
        </script>
    <?php } ?>
<!-- upload file -->
<?php if (isset($_GET['upload'])) {
    // เก็บค่า ID ที่ต้องการแก้ไขในตัวแปร session ชื่อ 'upload'
    $_SESSION['upload'] = base64_decode($_GET['upload']);
    $upload_id = $_SESSION['upload'];
?>
    <script>
        // ถูกเรียกใช้เมื่อหน้าเว็บโหลดเสร็จสมบูรณ์ 
        document.addEventListener("DOMContentLoaded", function() {
            // สร้างอ็อบเจกต์ Modal
            var modal = new bootstrap.Modal(document.getElementById("uploadModal"));
            // แสดงหน้าต่าง Modal
            modal.show();
        });
    </script>
<?php } ?>
<div class="container">
    <div class="pagetitle mt-3">
        <h1>ข. ภาระงานอาจารย์ที่ปรึกษาโครงการ ปัญหาพิเศษ หรืองานอื่นที่เกี่ยวข้อง</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">5. ภาระงานอาจารย์ที่ปรึกษางานวิจัย โครงการ ปัญหาพิเศษหรืองานอื่นที่เกี่ยวข้อง</li>
                <li class="breadcrumb-item active">ข. ภาระงานอาจารย์ที่ปรึกษาโครงการ ปัญหาพิเศษ หรืองานอื่นที่เกี่ยวข้อง</li>
            </ol>
        </nav>
    </div>
    <hr> <!-- เส้น -->
    <!-- ปุ่มเพิ่มข้อมูล -->
    <div class="d-flex justify-content-end ">
        <button class="btn btn-success mb-3" type="button" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">
            <div class="icon d-flex">
                <i class="bi bi-plus-square"></i> &nbsp;
                <div class="label">เพิ่มข้อมูล</div>
            </div>
        </button>
    </div>
    <!-- ตรวจสอบว่ามีตัวแปร session ชื่อ 'success' อยู่หรือไม่ -->
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" id="alert-success">
            <?php
            echo $_SESSION['success']; // แสดงข้อความที่เก็บในตัวแปร session 'success'
            unset($_SESSION['success']); // ลบค่าในตัวแปร session 'success'
            ?>
        </div>
        <script>
            setTimeout(function() { // ซ่อนข้อความแจ้งเตือนหลังจาก 3 วินาที
                document.getElementById('alert-success').style.display = 'none';
            }, 3000);
        </script>
    <?php } ?>
    <!-- ตรวจสอบว่ามีตัวแปร session ชื่อ 'error' อยู่หรือไม่ -->
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
    <!-- ตรวจสอบว่ามีพารามิเตอร์ 'id' ใน URL หรือไม่ -->
    <?php if (isset($_GET['id'])) {
        $id = base64_decode($_GET['id']); // รับค่าพารามิเตอร์ 'id' จาก URL
        $stmt = $conn->query("SELECT * FROM personal_1_5_b where id =$id"); // ดึงข้อมูลจากตาราง personal โดยใช้ ID
        $stmt->execute();
        $data = $stmt->fetch();  // เก็บข้อมูลที่ได้จากการคิวรีในตัวแปร $data
    } ?>
    <table class="table table-bordered text-center">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col">สาขาวิชา</th>
                <th scope="col">ระดับชั้น</th>
                <th scope="col">ชื่อโครงการ ปัญหาพิเศษ หรืองานอื่นที่เกี่ยวข้อง</th>
                <th scope="col">จำนวนที่ปรึกษา (คน)</th>
                <th scope="col">ที่ปรึกษาหลัก/ร่วม</th>
                <th scope="col">จำนวนชั่วโมงที่ปฏิบัติ</th>
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
                $stmt = $conn->query("SELECT*FROM personal_1_5_b WHERE userId = '$userId' AND term = '$term' AND year = '$year'"); // ดึงข้อมูลจากตาราง personal_1_5_b
                $stmt->execute(); // ประมวลผลคำสั่ง SQL เพื่อดึงข้อมูลจากฐานข้อมูล
                $personal = $stmt->fetchAll(); // เก็บผลลัพธ์ที่ได้จากการดึงข้อมูลทั้งหมดในตัวแปร $personal

                $totalAmountWork = 0.00;

                // ตรวจสอบว่ามีข้อมูลหรือไม่
                if (!$personal) { // ไม่มีข้อมูล
                    echo " <tr><td colspan='9' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    // วนลูปแสดงข้อมูลที่ดึงมา
                    foreach ($personal as $per) {
            ?>
                        <tr> <!-- แสดงแถวของตาราง (row) โดยใช้ข้อมูลจากตัวแปร $per ในแต่ละคอลัมน์ของตาราง -->
                            <td style="white-space: nowrap;"><?= $per['major']; ?></td>
                            <td><?= $per['level']; ?></td>
                            <td style="white-space: nowrap;"><?= $per['name_project']; ?></td>
                            <td><?= $per['amount_teacher']; ?></td>
                            <td><?= $per['teacher']; ?></td>
                            <td><?= $per['amount_time']; ?></td>
                            <td><?= $per['amount_work']; ?></td>
                            <?php $totalAmountWork += floatval($per['amount_work']); ?>
                            <?php if ($per['file']) { ?>
                                <td style="white-space: nowrap;">
                                    <a href="<?= "uploads/" . $per['file']; ?>" target="_blank" class="btn btn-secondary">
                                        <div class="icon d-flex">
                                            <i class="bi bi-eye"></i>&nbsp;
                                            <div class="label">ดูไฟล์</div>
                                        </div>
                                    </a>
                                    <a onclick="return confirm('ต้องการลบไฟล์หรือไม่')" href="?page=1_5_b/index_1_5_b&delete_file=<?= base64_encode($per['id']); ?>" class="btn btn-danger">
                                        <div class="icon d-flex">
                                            <i class="bi bi-trash"></i>&nbsp;
                                            <div class="label">ลบไฟล์</div>
                                        </div>
                                    </a>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <!-- ปุ่มแก้ไข ส่งแบบ get มี url-->
                                    <a href="?page=1_5_b/index_1_5_b&edit=<?= base64_encode($per['id']); ?>" class="btn btn-primary">
                                        <div class="icon d-flex">
                                            <i class="bi bi-pencil-square"></i>&nbsp;
                                            <div class="label">แก้ไข</div>
                                        </div>
                                    </a>&nbsp; <!--ปุ่มลบ -->
                                    <a onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?'); " href="?page=1_5_b/index_1_5_b&delete=<?= base64_encode($per['id']) ?>" class="btn btn-danger d-flex">
                                        <div class="icon"></div>
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบ</div>
                                    </a>
                                </td>
                            <?php } else { ?>
                                <td>
                                    <a style="white-space: nowrap;" href="?page=1_5_b/index_1_5_b&upload=<?= base64_encode($per['id']); ?>" class="btn btn-warning">
                                        <div class="icon d-flex">
                                            <i class="bi bi-upload"></i>&nbsp;
                                            <div class="label">อัปโหลด</div>
                                        </div>
                                    </a>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <!-- ปุ่มแก้ไข ส่งแบบ get มี url-->
                                    <a href="?page=1_5_b/index_1_5_b&edit=<?= base64_encode($per['id']); ?>" class="btn btn-primary">
                                        <div class="icon d-flex">
                                            <i class="bi bi-pencil-square"></i>&nbsp;
                                            <div class="label">แก้ไข</div>
                                        </div>
                                    </a>&nbsp; <!--ปุ่มลบ -->
                                    <a onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?'); " href="?page=1_5_b/index_1_5_b&delete=<?= base64_encode($per['id']) ?>" class="btn btn-danger">
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
                            <td><?= number_format($totalAmountWork, 2); ?></td>
                            <td colspan="2"></td>
                        </tr>
        </tbody>
    </table>
</div>
<div class="modal fade" id="ExtralargeModal" tabindex="-1">
    <!-- หน้าเพิ่มข้อมูล -->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เพิ่มข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="1_5_b/insert_1_5_b.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="userId" value="<?= $userId ?>">
                    <input type="hidden" class="form-control" name="term" value="<?= $term_year['term']; ?>">
                    <input type="hidden" class="form-control" name="year" value="<?= $term_year['year']; ?>">
                    <div class="mb-3">
                        <label for="major" class="col-sm-2 col-form-label ">สาขาวิชา</label>
                        <select class="form-select" name="major" aria-describedby="major" id="major" onchange="calc()" required>
                            <option value="กรุณาเลือก" selected>กรุณาเลือก</option>
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
                        <label for="level" class="col-sm-2 col-form-label">ระดับชั้น</label>
                        <input type="text" class="form-control" name="level" required>
                    </div>
                    <div class="mb-3">
                        <label for="name_project" class="col-sm-2 col-form-label" style="white-space: nowrap;">ชื่อโครงการ ปัญหาพิเศษ หรืองานอื่นที่เกี่ยวข้อง</label>
                        <input type="text" class="form-control" name="name_project" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount_teacher" class="col-sm-2 col-form-label" style="white-space: nowrap;">จำนวนที่ปรึกษา (คน)</label>
                        <input type="text" class="form-control" name="amount_teacher" required>
                    </div>
                    <div class="mb-3">
                        <label for="teacher" class="col-sm-2 col-form-label">ที่ปรึกษาหลัก/ร่วม</label>
                        <select class="form-select" name="teacher" aria-describedby="teacher" id="teacher" required>
                            <option value="กรุณาเลือก" selected>กรุณาเลือก</option>
                            <option value="หลัก">หลัก</option>
                            <option value="ร่วม">ร่วม</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount_student" class="col-sm-2 col-form-label" style="white-space: nowrap;">จำนวนชั่วโมงที่ปฏิบัติ</label>
                        <input type="text" class="form-control" name="amount_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount_work" class="col-sm-2 col-form-label">จำนวนภาระงาน</label>
                        <input type="text" class="form-control bg-light" name="amount_work" id="amount_work" readonly>
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
                <form action="1_5_b/edit_1_5_b.php" method="post">
                    <div class="mb-3">
                        <label for="major" class="col-sm-2 col-form-label ">สาขาวิชา</label>
                        <select class="form-select" name="major" aria-describedby="major" id="major" required>
                            <option value="วิทยาการคอมพิวเตอร์" <?php if ($data['major'] === 'วิทยาการคอมพิวเตอร์') echo 'selected' ?>>วิทยาการคอมพิวเตอร์</option>
                            <option value="เทคโนโลยีคอมพิวเตอร์และดิจิทัล" <?php if ($data['major'] === 'เทคโนโลยีคอมพิวเตอร์และดิจิทัล') echo 'selected' ?>>เทคโนโลยีคอมพิวเตอร์และดิจิทัล</option>
                            <option value="สาธารณสุขชุมชน" <?php if ($data['major'] === 'สาธารณสุขชุมชน') echo 'selected' ?>>สาธารณสุขชุมชน</option>
                            <option value="วิทยาศาสตร์การกีฬา" <?php if ($data['major'] === 'วิทยาศาสตร์การกีฬา') echo 'selected' ?>>วิทยาศาสตร์การกีฬา</option>
                            <option value="เทคโนโลยีการเกษตร" <?php if ($data['major'] === 'เทคโนโลยีการเกษตร') echo 'selected' ?>>เทคโนโลยีการเกษตร</option>
                            <option value="เทคโนโลยีและนวัตกรรมอาหาร" <?php if ($data['major'] === 'เทคโนโลยีและนวัตกรรมอาหาร') echo 'selected' ?>>เทคโนโลยีและนวัตกรรมอาหาร</option>
                            <option value="อาชีวอนามัยและความปลอดภัย" <?php if ($data['major'] === 'อาชีวอนามัยและความปลอดภัย') echo 'selected' ?>>อาชีวอนามัยและความปลอดภัย</option>
                            <option value="วิศวกรรมซอฟต์แวร์" <?php if ($data['major'] === 'วิศวกรรมซอฟต์แวร์') echo 'selected' ?>>วิศวกรรมซอฟต์แวร์</option>
                            <option value="วิศวกรรมโลจิสติกส์" <?php if ($data['major'] === 'วิศวกรรมโลจิสติกส์') echo 'selected' ?>>วิศวกรรมโลจิสติกส์</option>
                            <option value="วิศวกรรมการจัดการอุตสาหกรรมและสิ่งแวดล้อม" <?php if ($data['major'] === 'วิศวกรรมการจัดการอุตสาหกรรมและสิ่งแวดล้อม') echo 'selected' ?>>วิศวกรรมการจัดการอุตสาหกรรมและสิ่งแวดล้อม</option>
                            <option value="การออกแบบผลิตภัณฑ์และนวัตกรรมวัสดุ" <?php if ($data['major'] === 'การออกแบบผลิตภัณฑ์และนวัตกรรมวัสดุ') echo 'selected' ?>>การออกแบบผลิตภัณฑ์และนวัตกรรมวัสดุ</option>
                            <option value="เทคโนโลยีโยธาและสถาปัตยกรรม" <?php if ($data['major'] === 'เทคโนโลยีโยธาและสถาปัตยกรรม') echo 'selected' ?>>เทคโนโลยีโยธาและสถาปัตยกรรม</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="level" class="col-sm-2 col-form-label">ระดับชั้น</label>
                        <input type="text" class="form-control" name="level" value="<?php echo $data['level']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="name_project" class="col-sm-2 col-form-label" style="white-space: nowrap;">ชื่อโครงการ ปัญหาพิเศษ หรืองานอื่นที่เกี่ยวข้อง</label>
                        <input type="text" class="form-control" name="name_project" value="<?php echo $data['name_project']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount_teacher" class="col-sm-2 col-form-label" style="white-space: nowrap;">จำนวนที่ปรึกษา (คน)</label>
                        <input type="text" class="form-control" name="amount_teacher" value="<?php echo $data['amount_teacher']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="teacher" class="col-sm-2 col-form-label">ที่ปรึกษาหลัก/ร่วม</label>
                        <select class="form-select" name="teacher" aria-describedby="teacher" id="teacher" required>
                            <option value="หลัก" <?php if ($data['teacher'] === 'หลัก') echo 'selected' ?>>หลัก</option>
                            <option value="ร่วม" <?php if ($data['teacher'] === 'ร่วม') echo 'selected'; ?>>ร่วม</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount_time" class="col-sm-2 col-form-label" style="white-space: nowrap;">จำนวนชั่วโมงที่ปฏิบัติ</label>
                        <input type="text" class="form-control" name="amount_time" value="<?php echo $data['amount_time']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount_work" class="col-sm-2 col-form-label">จำนวนภาระงาน</label>
                        <input type="text" class="form-control bg-light" name="amount_work" value="<?php echo $data['amount_work']; ?>" readonly>
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
                <h5 class="modal-title">อัพโหลดไฟล์</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="1_5_b/upload_1_5_b.php" method="post" enctype="multipart/form-data">
                    <div class="row mb-1 mt-3">
                        <label for="file" class="col-sm-2 col-form-label">อัปโหลดไฟล์</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file" id="fileInput" required>
                            <br>
                            <p>***นามสกุลไฟล์ที่รองรับ .jpg, .jpeg, .png, .pdf, .ppt, .docx***</p>
                            <img width=100% id="previewFile" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="upload" name="upload" class="btn btn-primary">บันทึก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- เรียกใช้ไลบรารี jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // เมื่อเอกสารโหลดเสร็จ
    $(document).ready(function() {
        // เมื่อโมดัลแสดงอยู่และถูกซ่อน
        $('#modal').on('hidden.bs.modal', function() { //$('#modal') จะเลือกองค์ประกอบที่มี id เป็น "modal".
            window.location.href = 'index.php?page=1_5_b/index_1_5_b'; // เปลี่ยนเส้นทาง URL เพื่อเปลี่ยนหน้าเว็บไปที่ 'index.php?page=_1_5_b'
        });
    });
    // เมื่อโมดัลแสดงอยู่และถูกซ่อน
    $(document).ready(function() {
        $('#uploadModal').on('hidden.bs.modal', function() { //$('#uploadModal') จะเลือกองค์ประกอบที่มี id เป็น "uploadModal".
            window.location.href = 'index.php?page=1_5_b/index_1_5_b'; // เปลี่ยนเส้นทาง URL เพื่อเปลี่ยนหน้าเว็บไปที่ 'index.php?page=_1_5_b'
        });
    });
    // เมื่อเอกสารโหลดเสร็จแล้ว
    let fileInput = document.getElementById('fileInput'); //ใช้ getElementById() เพื่อเข้าถึงองค์ประกอบที่มี id เป็น 'fileInput'
    let previewFile = document.getElementById('previewFile'); //ใช้ getElementById() เพื่อเข้าถึงองค์ประกอบที่มี id เป็น 'previewFile'

    fileInput.addEventListener('change', function(evt) { // เมื่อมีการเปลี่ยนแปลงในองค์ประกอบ <input type="file"> โดยจะรับอินสแตนซ์ evt เป็นอาร์กิวเมนต์ของฟังก์ชัน
        // ดึงไฟล์ที่ถูกเลือกจากองค์ประกอบ <input type="file">
        // เราใช้การกำหนดตัวแปรแบบ Array destructuring ([file]) เพื่อรับเฉพาะไฟล์แรกที่ถูกเลือก
        const [file] = fileInput.files;
        if (file) { // ตรวจสอบว่ามีไฟล์ถูกเลือกหรือไม่
            previewFile.src = URL.createObjectURL(file); // สร้าง URL object สำหรับไฟล์และกำหนดให้ภาพตัวอย่างแสดงรูปภาพ
        }
    });

    function calc() {
        document.getElementById('amount_work').value = 1;
    }
</script>
<?php
    $conn = null;
?>