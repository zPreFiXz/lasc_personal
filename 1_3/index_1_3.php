<?php
require_once "config/db.php";

if (isset($_GET['delete_file'])) {
    $delete_file_id = $_GET['delete_file']; // รับค่า ID ที่ต้องการลบ
    $stmt = $conn->prepare("SELECT file FROM personal_1_3 WHERE id = :delete_file_id");
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

    $delete_file = $conn->prepare("UPDATE personal_1_3 SET file = '' WHERE id = :delete_file_id");
    $delete_file->bindParam(':delete_file_id', $delete_file_id);
    $delete_file->execute();
}
//delete 
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $stmt = $conn->prepare("SELECT file FROM personal_1_3 WHERE id = :delete_id");
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

    $deletestmt = $conn->prepare("DELETE FROM personal_1_3 WHERE id = :delete_id");
    $deletestmt->bindParam(':delete_id', $delete_id);
    $deletestmt->execute();

    if ($deletestmt) {
        $_SESSION['success'] = "ข้อมูลถูกลบสำเร็จ";
        echo "<script>window.location.href = 'index.php?page=1_3/index_1_3';</script>";
        exit;
    }
}

//edit
if (isset($_GET['edit'])) {
    // เก็บค่า ID ที่ต้องการแก้ไขในตัวแปร session ชื่อ 'edit'
    $_SESSION['edit'] = $_GET['edit'];
    $edit_id = $_SESSION['edit'];
    // เตรียมคำสั่ง SQL สำหรับเลือกข้อมูลที่ต้องการแก้ไขจากตาราง personal_1_3 โดยใช้ ID
    $stmt = $conn->prepare("SELECT * FROM personal_1_3 WHERE id = ?");
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
<?php
}
//upload file
if (isset($_GET['upload'])) {
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
<?php
}
?>

<div class="container">
    <div class="pagetitle mt-3">
        <h1>1.3 ภาระงานอาจารย์นิเทศและ /หรืออาจารย์ผู้ควบคุมการฝึกประสบการณ์วิชาชีพ /สหกิจศึกษา /บ่มเพาะวิสาหกิจ </h1>
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
    <?php
    // ตรวจสอบว่ามีตัวแปร session ชื่อ 'success' อยู่หรือไม่
    if (isset($_SESSION['success'])) { ?>
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

    <?php
    // ตรวจสอบว่ามีพารามิเตอร์ 'id' ใน URL หรือไม่
    if (isset($_GET['id'])) {
        $id = $_GET['id']; // รับค่าพารามิเตอร์ 'id' จาก URL
        $stmt = $conn->query("SELECT * FROM personal where id =$id"); // ดึงข้อมูลจากตาราง personal โดยใช้ ID
        $stmt->execute();
        $data = $stmt->fetch();  // เก็บข้อมูลที่ได้จากการคิวรีในตัวแปร $data

    }
    ?>

    <table class="table table-bordered text-center">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col">สาขาวิชา</th>
                <th scope="col">ระดับชั้น</th>
                <th scope="col">จำนวนนักศึกษา</th>
                <th scope="col">ระยะเวลาที่ปฏิบัติ</th>
                <th scope="col">สถานที่ทำงาน</th>
                <th scope="col">จำนวนภาระงาน</th>               
                <th scope="col">อัปโหลดเอกสาร</th>
                <th scope="col">จัดการข้อมูล</th>

            </tr>
        </thead>

        <tbody>
            <?php
            $stmt = $conn->query("SELECT*FROM personal_1_3"); // ดึงข้อมูลจากตาราง personal_1_3
            $stmt->execute(); // ประมวลผลคำสั่ง SQL เพื่อดึงข้อมูลจากฐานข้อมูล
            $personal = $stmt->fetchAll(); // เก็บผลลัพธ์ที่ได้จากการดึงข้อมูลทั้งหมดในตัวแปร $personal
            // ตรวจสอบว่ามีข้อมูลหรือไม่
            if (!$personal) { // ไม่มีข้อมูล
                echo " <tr><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></tr>";
            } else {
                // วนลูปแสดงข้อมูลที่ดึงมา
                foreach ($personal as $per) {
            ?>
                    <tr> <!-- แสดงแถวของตาราง (row) โดยใช้ข้อมูลจากตัวแปร $per ในแต่ละคอลัมน์ของตาราง -->

                        <td><?php echo $per['Major']; ?></td>
                        <td><?php echo $per['level']; ?></td>
                        <td><?php echo $per['amount_student']; ?></td>
                        <td><?php echo $per['amount_time']; ?></td>
                        <td><?php echo $per['workplace']; ?></td>
                        <td><?php echo $per['amount_work']; ?></td>

                        <?php if ($per['file']) { ?>
                            <td style="white-space: nowrap;">
                                <a href="<?= "uploads/" . $per['file']; ?>" class="btn btn-secondary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-eye"></i>&nbsp;
                                        <div class="label">ดูไฟล์</div>
                                    </div>
                                </a>
                                <a onclick="return confirm('ต้องการลบไฟล์หรือไม่')" href="?page=1_3/index_1_3&delete_file=<?= $per['id']; ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบไฟล์</div>
                                    </div>
                                </a>
                            </td>

                            <td class="d-flex justify-content-center">
                                <!-- ปุ่มแก้ไข ส่งแบบ get มี url-->
                                <a href="?page=1_3/index_1_3&edit=<?= $per['id']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp; <!--ปุ่มลบ -->
                                <a onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?'); " href="?page=1_3/index_1_3&delete=<?= $per['id'] ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบ</div>
                                    </div>
                                </a>
                            </td>
                        <?php } else { ?>
                            <td>
                                <a style="white-space: nowrap;" href="?page=1_3/index_1_3&upload=<?= $per['id']; ?>" class="btn btn-warning">
                                    <div class="icon d-flex">
                                        <i class="bi bi-upload"></i>&nbsp;
                                        <div class="label">อัปโหลด</div>
                                    </div>
                                </a>
                            </td>

                            <td class="d-flex justify-content-center">
                                <!-- ปุ่มแก้ไข ส่งแบบ get มี url-->
                                <a href="?page=1_3/index_1_3&edit=<?= $per['id']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp; <!--ปุ่มลบ -->
                                <a onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?'); " href="?page=1_3/index_1_3&delete=<?= $per['id'] ?>" class="btn btn-danger">
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
                <th scope="row" colspan="5">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                <td>0.00</td>
                <td colspan="2"></td>
            </tr>
        </tbody>
        <div class="modal fade" id="ExtralargeModal" tabindex="-1">

            <!-- หน้าเพิ่มข้อมูล -->
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">เพิ่มข้อมูล</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="1_3/insert_1_3.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="Major" class="col-form-label">สาขาวิชา:</label>
                                <input type="text" required class="form-control" name="Major" required>
                            </div>
                            <div class="mb-3">
                                <label for="level" class="col-form-label">ระดับชั้น:</label>
                                <input type="text" required class="form-control" name="level" required>
                            </div>
                            <div class="mb-3">
                                <label for="amount_student" class="col-form-label">จำนวนนักศึกษา:</label>
                                <input type="text" required class="form-control" name="amount_student" required>
                            </div>

                            <div class="mb-3">
                                <label for="amount_time" class="col-form-label">ระยะเวลาที่ปฏิบัติ:</label>
                                <input type="text" required class="form-control" name="amount_time" required>
                            </div>

                            <div class="mb-3">
                                <label for="workplace" class="col-form-label">สถานที่ทำงาน:</label>
                                <input type="text" required class="form-control" name="workplace" required>
                            </div>

                            <div class="mb-3">
                                <label for="amount_work" class="col-form-label">จำนวนภาระงาน:</label>
                                <input type="text" required class="form-control" name="amount_work" required>
                            </div>


                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-success">บันทืก</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- แก้ไขข้อมูล -->
        <div class="modal fade" id="modal" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">แก้ไขข้อมูล</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="1_3/edit_1_3.php" method="post">
                            <div class="mb-3">
                                <label for="Major" class="col-form-label">สาขาวิชา:</label>
                                <input type="text" required class="form-control" name="Major" value="<?php echo $data['Major']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="level" class="col-form-label">ระดับชั้น:</label>
                                <input type="text" required class="form-control" name="level" value="<?php echo $data['level']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="amount_student" class="col-form-label">จำนวนนักศึกษา:</label>
                                <input type="text" required class="form-control" name="amount_student" value="<?php echo $data['amount_student']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="amount_time" class="col-form-label">ระยะเวลาที่ปฏิบัติ:</label>
                                <input type="text" required class="form-control" name="amount_time" value="<?php echo $data['amount_time']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="workplace" class="col-form-label">สถานที่ทำงาน:</label>
                                <input type="text" required class="form-control" name="workplace" value="<?php echo $data['workplace']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="amount_work" class="col-form-label">จำนวนภาระงาน</label>
                                <input type="text" required class="form-control" name="amount_work" value="<?php echo $data['amount_work']; ?>">
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <button type="update" name="update" class="btn btn-primary">บันทึก</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</div>

<!-- อัพโหลดไฟล์ -->
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">อัพโหลดไฟล์</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="1_3/upload_1_3.php" method="post" enctype="multipart/form-data">
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
</table>
</div>

<!-- เรียกใช้ไลบรารี jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // เมื่อเอกสารโหลดเสร็จ
    $(document).ready(function() {
        // เมื่อโมดัลแสดงอยู่และถูกซ่อน
        $('#modal').on('hidden.bs.modal', function() { //$('#modal') จะเลือกองค์ประกอบที่มี id เป็น "modal".
            window.location.href = 'index.php?page=1_3/index_1_3'; // เปลี่ยนเส้นทาง URL เพื่อเปลี่ยนหน้าเว็บไปที่ 'index.php?page=1_3'
        });
    });
    // เมื่อโมดัลแสดงอยู่และถูกซ่อน
    $(document).ready(function() {
        $('#uploadModal').on('hidden.bs.modal', function() { //$('#uploadModal') จะเลือกองค์ประกอบที่มี id เป็น "uploadModal".
            window.location.href = 'index.php?page=1_3/index_1_3'; // เปลี่ยนเส้นทาง URL เพื่อเปลี่ยนหน้าเว็บไปที่ 'index.php?page=1_3'
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
</script>