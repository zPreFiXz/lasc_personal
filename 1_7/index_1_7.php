<?php
    require_once "config/db.php";

    // ดึงตาราง term&year
    $stmt = $conn->query("SELECT * FROM `term_year` where id = 1");
    $stmt->execute();
    $term_year = $stmt->fetch();
    //delete file
    if (isset($_GET['delete_file'])) {
        $delete_file_id = $_GET['delete_file']; // รับค่า ID ที่ต้องการลบ
        $stmt = $conn->prepare("SELECT file FROM personal_1_7 WHERE id = :delete_file_id");
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

        $delete_file = $conn->prepare("UPDATE personal_1_7 SET file = '' WHERE id = :delete_file_id");
        $delete_file->bindParam(':delete_file_id', $delete_file_id);
        $delete_file->execute();
    }
    //delete 
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];

        $stmt = $conn->prepare("SELECT file FROM personal_1_7 WHERE id = :delete_id");
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

        $deletestmt = $conn->prepare("DELETE FROM personal_1_7 WHERE id = :delete_id");
        $deletestmt->bindParam(':delete_id', $delete_id);
        $deletestmt->execute();

        if ($deletestmt) {
            $_SESSION['success'] = "ข้อมูลถูกลบสำเร็จ";
            echo "<script>window.location.href = 'index.php?page=1_7/index_1_7';</script>";
            exit;
        }
    }
    //edit
    if (isset($_GET['edit'])) {
        // เก็บค่า ID ที่ต้องการแก้ไขในตัวแปร session ชื่อ 'edit'
        $_SESSION['edit'] = $_GET['edit'];
        $edit_id = $_SESSION['edit'];
        // เตรียมคำสั่ง SQL สำหรับเลือกข้อมูลที่ต้องการแก้ไขจากตาราง personal_1_7 โดยใช้ ID
        $stmt = $conn->prepare("SELECT * FROM personal_1_7 WHERE id = ?");
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
<!-- upload file   -->
<?php if (isset($_GET['upload'])) {
    // เก็บค่า ID ที่ต้องการแก้ไขในตัวแปร session ชื่อ 'upload'
    $_SESSION['upload'] = $_GET['upload'];
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
        <h1>7. ภาระงานผลิตผลงานทางวิชาการ (หนังสือ ตำรา เอกสารประกอบการสอน เอกสารคำสอน บทความ งานแปล งานปรับปรุงพัฒนาเทคโนโลยีและสื่อการสอน งานสร้างนวัตกรรมหรือผลงานวิชาการอื่นที่เกี่ยวข้อง) </h1>
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
    <!-- ตรวจสอบว่ามีพารามิเตอร์ 'id' ใน URL หรือไม่ -->
    <?php if (isset($_GET['id'])) {
        $id = $_GET['id']; // รับค่าพารามิเตอร์ 'id' จาก URL
        $stmt = $conn->query("SELECT * FROM personal_1_7 where id =$id"); // ดึงข้อมูลจากตาราง personal โดยใช้ ID
        $stmt->execute();
        $data = $stmt->fetch();  // เก็บข้อมูลที่ได้จากการคิวรีในตัวแปร $data
    } ?>
    <table class="table table-bordered text-center">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col">ประเภท</th>
                <th scope="col">ชื่อเรื่อง</th>
                <th scope="col">ระยะเวลา เริ่มต้น-สิ้นสุด</th>
                <th scope="col">ลักษณะ เดี่ยว/ร่วม</th>
                <th scope="col">ลักษณะงาน</th>
                <th scope="col">ร้อยละการมีส่วนร่วม</th>
                <th scope="col">จำนวนภาระงาน</th>
                <th scope="col">อัปโหลด</th>
                <th scope="col">จัดการข้อมูล</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $userId = $_SESSION['userId'];
                $term =  $term_year['term'];
                $year =  $term_year['year'];
                $stmt = $conn->query("SELECT*FROM personal_1_7 WHERE userId = '$userId' AND term = '$term' AND year = '$year'"); // ดึงข้อมูลจากตาราง personal_1_7
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
                        <td style="white-space: nowrap;"><?= $per['type']; ?></td>
                        <td><?= $per['title']; ?></td>
                        <td style="white-space: nowrap;"><?= $per['amount_time']; ?></td>
                        <td><?= $per['type_work_s_j']; ?></td>
                        <td><?= $per['type_work']; ?></td>
                        <td><?= $per['participation']; ?></td>
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
                                <a onclick="return confirm('ต้องการลบไฟล์หรือไม่')" href="?page=1_7/index_1_7&delete_file=<?= $per['id']; ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบไฟล์</div>
                                    </div>
                                </a>
                            </td>
                            <td class="d-flex justify-content-center">
                                <!-- ปุ่มแก้ไข ส่งแบบ get มี url-->
                                <a href="?page=1_7/index_1_7&edit=<?= $per['id']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp; <!--ปุ่มลบ -->
                                <a onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?'); " href="?page=1_7/index_1_7&delete=<?= $per['id'] ?>" class="btn btn-danger d-flex">
                                    <div class="icon"></div>
                                    <i class="bi bi-trash"></i>&nbsp;
                                    <div class="label">ลบ</div>
                                </a>
                            </td>
                        <?php } else { ?>
                            <td>
                                <a style="white-space: nowrap;" href="?page=1_7/index_1_7&upload=<?= $per['id']; ?>" class="btn btn-warning">
                                    <div class="icon d-flex">
                                        <i class="bi bi-upload"></i>&nbsp;
                                        <div class="label">อัปโหลด</div>
                                    </div>
                                </a>
                            </td>
                            <td class="d-flex justify-content-center">
                                <!-- ปุ่มแก้ไข ส่งแบบ get มี url-->
                                <a href="?page=1_7/index_1_7&edit=<?= $per['id']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp; <!--ปุ่มลบ -->
                                <a onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?'); " href="?page=1_7/index_1_7&delete=<?= $per['id'] ?>" class="btn btn-danger">
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
                <form action="1_7/insert_1_7.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="userId" value="<?= $userId ?>">
                    <input type="hidden" class="form-control" name="term" value="<?= $term_year['term']; ?>">
                    <input type="hidden" class="form-control" name="year" value="<?= $term_year['year']; ?>">
                    <div class="mb-3">
                        <label for="type" class="col-sm-2 col-form-label">ประเภท</label>
                        <input type="text" class="form-control" name="type" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="col-sm-2 col-form-label">ชื่อเรื่อง</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount_time" class="col-sm-2 col-form-label" style="white-space: nowrap;">ระยะเวลา เริ่มต้น-สิ้นสุด</label>
                        <input type="text" class="form-control" name="amount_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="type_work_s_j" class="col-sm-2 col-form-label">ลักษณะ เดี่ยว/ร่วม</label>
                        <select id="type_work_s_j" name="type_work_s_j" class="form-select" required>
                            <option value="" selected>กรุณาเลือก</option>
                            <option value="เดี่ยว">เดี่ยว</option>
                            <option value="ร่วม">ร่วม</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="type_work" class="col-sm-2 col-form-label">ลักษณะงาน</label>
                        <select id="type_work1" name="type_work" class="form-select" onchange="calc1()" required>
                            <option value="" selected>กรุณาเลือก</option>
                            <option value="เอกสารประกอบการสอน">เอกสารประกอบการสอน</option>
                            <option value="เอกสารคำสอน">เอกสารคำสอน</option>
                            <option value="หนังสือ/ตำรา">หนังสือ/ตำรา</option>
                            <option value="VirtualClassroom/E-learning/CAI">VirtualClassroom/E-learning/CAI</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="participation" class="col-sm-2 col-form-label">ร้อยละการมีส่วนร่วม</label>
                        <input type="text" class="form-control" name="participation" id="participation1" oninput="calc1()" required>
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
<!-- แก้ไขข้อมูล -->
<div class="modal fade" id="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">แก้ไขข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="1_7/edit_1_7.php" method="post">
                    <div class="mb-3">
                        <label for="type" class="col-sm-2 col-form-label">ประเภท</label>
                        <input type="text" class="form-control" name="type" value="<?php echo $data['type']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="col-sm-2 col-form-label">ชื่อเรื่อง</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $data['title']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount_time" class="col-sm-2 col-form-label" style="white-space: nowrap;">ระยะเวลา เริ่มต้น-สิ้นสุด</label>
                        <input type="text" class="form-control" name="amount_time" class="form-select" value="<?php echo $data['amount_time']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="type_work_s_j" class="col-sm-2 col-form-label">ลักษณะ เดี่ยว/ร่วม</label>
                        <select id="type_work_s_j" name="type_work_s_j" class="form-select" required>
                            <option value="เดี่ยว" <?php if ($data['type_work_s_j'] === 'เดี่ยว') echo 'selected'; ?>>เดี่ยว</option>
                            <option value="ร่วม" <?php if ($data['type_work_s_j'] === 'ร่วม') echo 'selected'; ?>>ร่วม</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="type_work" class="col-sm-2 col-form-label">ลักษณะงาน</label>
                        <select id="type_work2" name="type_work" class="form-select" onchange="calc2()" required>
                            <option value="เอกสารประกอบการสอน" <?php if ($data['type_work'] === 'เอกสารประกอบการสอน') echo 'selected'; ?>>เอกสารประกอบการสอน</option>
                            <option value="เอกสารคำสอน" <?php if ($data['type_work'] === 'เอกสารคำสอน') echo 'selected'; ?>>เอกสารคำสอน</option>
                            <option value="หนังสือ/ตำรา" <?php if ($data['type_work'] === 'หนังสือ/ตำรา') echo 'selected'; ?>>หนังสือ/ตำรา</option>
                            <option value="VirtualClassroom/E-learning/CAI" <?php if ($data['type_work'] === 'VirtualClassroom/E-learning/CAI') echo 'selected'; ?>>VirtualClassroom/E-learning/CAI</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="participation" class="col-sm-2 col-form-label">ร้อยละการมีส่วนร่วม</label>
                        <input type="text" class="form-control" name="participation" id="participation2" value="<?php echo $data['participation']; ?>" oninput="calc2()" required>
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
<!-- อัพโหลดไฟล์ -->
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">อัพโหลดไฟล์</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="1_7/upload_1_7.php" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="file" class="col-sm-2 col-form-label">อัปโหลดไฟล์</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file" id="fileInput" required>
                            <br>
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
            window.location.href = 'index.php?page=1_7/index_1_7'; // เปลี่ยนเส้นทาง URL เพื่อเปลี่ยนหน้าเว็บไปที่ 'index.php?page=_1_7'
        });
    });
    // เมื่อโมดัลแสดงอยู่และถูกซ่อน
    $(document).ready(function() {
        $('#uploadModal').on('hidden.bs.modal', function() { //$('#uploadModal') จะเลือกองค์ประกอบที่มี id เป็น "uploadModal".
            window.location.href = 'index.php?page=1_7/index_1_7'; // เปลี่ยนเส้นทาง URL เพื่อเปลี่ยนหน้าเว็บไปที่ 'index.php?page=_1_7'
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

    function calc1() {
        var type_work = document.getElementById('type_work1').value;
        var participation = document.getElementById('participation1').value;

        if (type_work == 'เอกสารประกอบการสอน') {
            var calculatedAmountWork = 5 * (participation / 100);
            document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        } else if (type_work == 'เอกสารคำสอน') {
            var calculatedAmountWork = 8 * (participation / 100);
            document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        } else if (type_work == 'หนังสือ/ตำรา') {
            var calculatedAmountWork = 12 * (participation / 100);
            document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        } else if (type_work == 'VirtualClassroom/E-learning/CAI') {
            var calculatedAmountWork = 5 * (participation / 100);
            document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        } else {
            var calculatedAmountWork = 0;
            document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        }
    }

    function calc2() {
        var type_work = document.getElementById('type_work2').value;
        var participation = document.getElementById('participation2').value;

        if (type_work == 'เอกสารประกอบการสอน') {
            var calculatedAmountWork = 5 * (participation / 100);
            document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
        } else if (type_work == 'เอกสารคำสอน') {
            var calculatedAmountWork = 8 * (participation / 100);
            document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
        } else if (type_work == 'หนังสือ/ตำรา') {
            var calculatedAmountWork = 12 * (participation / 100);
            document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
        } else if (type_work == 'VirtualClassroom/E-learning/CAI') {
            var calculatedAmountWork = 5 * (participation / 100);
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