<?php
require_once "config/db.php";
//delete file
if (isset($_GET['delete_file'])) {
    $delete_file_id = $_GET['delete_file']; // รับค่า ID ที่ต้องการลบ
    $stmt = $conn->prepare("SELECT file FROM personal_1_10 WHERE id = :delete_file_id");
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

    $delete_file = $conn->prepare("UPDATE personal_1_10 SET file = '' WHERE id = :delete_file_id");
    $delete_file->bindParam(':delete_file_id', $delete_file_id);
    $delete_file->execute();
}
//delete 
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];


    $stmt = $conn->prepare("SELECT file FROM personal_1_10 WHERE id = :delete_id");
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

    $deletestmt = $conn->prepare("DELETE FROM personal_1_10 WHERE id = :delete_id");
    $deletestmt->bindParam(':delete_id', $delete_id);
    $deletestmt->execute();

    if ($deletestmt) {
        $_SESSION['success'] = "ข้อมูลถูกลบสำเร็จ";
        echo "<script>window.location.href = 'index.php?page=1_10/index_1_10';</script>";
        exit;
    }
}

//edit
if (isset($_GET['edit'])) {
    // เก็บค่า ID ที่ต้องการแก้ไขในตัวแปร session ชื่อ 'edit'
    $_SESSION['edit'] = $_GET['edit'];
    $edit_id = $_SESSION['edit'];
    // เตรียมคำสั่ง SQL สำหรับเลือกข้อมูลที่ต้องการแก้ไขจากตาราง personal_1_10 โดยใช้ ID
    $stmt = $conn->prepare("SELECT * FROM personal_1_10 WHERE id = ?");
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
        <h1>10. ภาระงานเฉพาะกิจที่เกี่ยวข้อง นอกจากข้อ 1-9 (งานที่มหาวิทยาลัยมอบหมายเป็นการเฉพาะกิจภายในคณะสำนัก สถาบัน วิทยาลัย ศูนย์ หรือภายนอกมหาวิทยาลัย)</h1>
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
                <th scope="col">วัน/เดือน/ปี</th>
                <th scope="col">งาน/โครงการ/กิจกรรม/โครงการยุทธศาสตร์/วารสาร</th>
                <th scope="col">ตำแหน่งที่ได้รับมอบหมายในงาน/โครงการ</th>
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
            $stmt = $conn->query("SELECT*FROM personal_1_10 WHERE userId = '$userId'"); // ดึงข้อมูลจากตาราง personal_1_10
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

                        <td style="white-space: nowrap;"><?= $per['date']; ?></td>
                        <td><?= $per['project']; ?></td>
                        <td style="white-space: nowrap;"><?= $per['position']; ?></td>
                        <td><?= $per['type_work']; ?></td>
                        <td><?= $per['amount_time']; ?></td>
                        <td><?= $per['amount_work']; ?></td>
                        <?php $totalAmountWork += floatval($per['amount_work']);?>

                        <?php if ($per['file']) { ?>
                            <td style="white-space: nowrap;">
                                <a href="<?= "uploads/" . $per['file']; ?>" target="_blank" class="btn btn-secondary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-eye"></i>&nbsp;
                                        <div class="label">ดูไฟล์</div>
                                    </div>
                                </a>
                                <a onclick="return confirm('ต้องการลบไฟล์หรือไม่')" href="?page=1_10/index_1_10&delete_file=<?= $per['id']; ?>" class="btn btn-danger">
                                    <div class="icon d-flex">
                                        <i class="bi bi-trash"></i>&nbsp;
                                        <div class="label">ลบไฟล์</div>
                                    </div>
                                </a>
                            </td>

                            <td class="d-flex justify-content-center">
                                <!-- ปุ่มแก้ไข ส่งแบบ get มี url-->
                                <a href="?page=1_10/index_1_10&edit=<?= $per['id']; ?>" class="btn btn-primary">
                                    <div class="icon d-flex">
                                        <i class="bi bi-pencil-square"></i>&nbsp;
                                        <div class="label">แก้ไข</div>
                                    </div>
                                </a>&nbsp; <!--ปุ่มลบ -->
                                <a onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?'); " href="?page=1_10/index_1_10&delete=<?= $per['id'] ?>" class="btn btn-danger d-flex">
                                    <div class="icon"></div>
                                    <i class="bi bi-trash"></i>&nbsp;
                                    <div class="label">ลบ</div>
</div>
</a>
</td>
<?php } else { ?>
    <td>
        <a style="white-space: nowrap;" href="?page=1_10/index_1_10&upload=<?= $per['id']; ?>" class="btn btn-warning">
            <div class="icon d-flex">
                <i class="bi bi-upload"></i>&nbsp;
                <div class="label">อัปโหลด</div>
            </div>
        </a>
    </td>

    <td class="d-flex justify-content-center">
        <!-- ปุ่มแก้ไข ส่งแบบ get มี url-->
        <a href="?page=1_10/index_1_10&edit=<?= $per['id']; ?>" class="btn btn-primary">
            <div class="icon d-flex">
                <i class="bi bi-pencil-square"></i>&nbsp;
                <div class="label">แก้ไข</div>
            </div>
        </a>&nbsp; <!--ปุ่มลบ -->
        <a onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?'); " href="?page=1_10/index_1_10&delete=<?= $per['id'] ?>" class="btn btn-danger">
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
    <td><?= number_format($totalAmountWork, 2); ?></td>
    <td colspan="3"></td>
</tr>
</tbody>
<div class="modal fade" id="ExtralargeModal" tabindex="-1">

    <!-- หน้าเพิ่มข้อมูล -->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เพิ่มข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="1_10/insert_1_10.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="userId" value="<?=$userId?>">
                    <div class="mb-3">
                        <label for="date" class="col-sm-2 col-form-label">วัน/เดือน/ปี</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <div class="mb-3" style="white-space: nowrap;">
                        <label for="project" class="col-sm-2 col-form-label">งาน/โครงการ/กิจกรรม/โครงการยุทธศาสตร์/วารสาร</label>
                        <input type="text" class="form-control" name="project" required>
                    </div>
                    <div class="mb-3" style="white-space: nowrap;">
                        <label for="position" class="col-sm-2 col-form-label">ตำแหน่งที่ได้รับมอบหมายในงาน/โครงการ</label>
                            <select name="position" class="form-select" id="position1" onchange="calc1()" required>
                                <option value="" selected>กรุณาเลือก</option>
                                <option value="ประธาน">ประธาน</option>
                                <option value="กรรมการและเลขานุการ">กรรมการและเลขานุการ</option>
                                <option value="กรรมการและผู้ช่วยเลขานุการ">กรรมการและผู้ช่วยเลขานุการ</option>
                                <option value="กรรมการ">กรรมการ</option>
                                <option value="ที่ปรึกษา">ที่ปรึกษา</option>
                                <option value="ผู้ออกแบบ">ผู้ออกแบบ</option>
                            </select> 
                    </div>
                    <div class="mb-3">
                        <label for="type_work" class="col-sm-2 col-form-label">ลักษณะงาน</label>   
                            <select name="type_work" class="form-select" id="type_work1" onchange="calc1()" required>
                                <option value="" selected>กรุณาเลือก</option>
                                <option value="งานต่อเนื่อง">งานต่อเนื่อง</option>
                                <option value="งานไม่ต่อเนื่อง/ชั่วคราว">งานไม่ต่อเนื่อง/ชั่วคราว</option>
                                <option value="ออกแบบ/เขียนแบบอาคาร">ออกแบบ/เขียนแบบอาคาร</option>
                                <option value="ตรวจการจ้างอาคาร">ตรวจการจ้างอาคาร</option>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount_time" class="col-sm-2 col-form-label">จำนวนชั่วโมงทำงาน</label>
                        <input type="text" class="form-control" name="amount_time" required>
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
                <form action="1_10/edit_1_10.php" method="post">
                    <div class="mb-3">
                        <label for="date" class="col-sm-2 col-form-label">วัน/เดือน/ปี</label>
                        <input type="date" class="form-control" name="date" value="<?php echo $data['date']; ?>" required>
                    </div>
                    <div class="mb-3" style="white-space: nowrap;">
                        <label for="project" class="col-sm-2 col-form-label">งาน/โครงการ/กิจกรรม/โครงการยุทธศาสตร์/วารสาร</label>
                        <input type="text" class="form-control" name="project" value="<?php echo $data['project']; ?>" required> 
                    </div>
                    <div class="mb-3" style="white-space: nowrap;">
                        <label for="position" class="col-sm-2 col-form-label">ตำแหน่งที่ได้รับมอบหมายในงาน/โครงการ</label>
                        <select name="position"  class="form-select" id="position2" onchange="calc2()" required>
                            <option value="ประธาน" <?php if ($data['position'] === 'ประธาน') echo 'selected'; ?>>ประธาน</option>
                            <option value="กรรมการและเลขานุการ" <?php if ($data['position'] === 'กรรมการและเลขานุการ') echo 'selected'; ?>>กรรมการและเลขานุการ</option>
                            <option value="กรรมการและผู้ช่วยเลขานุการ" <?php if ($data['position'] === 'กรรมการและผู้ช่วยเลขานุการ') echo 'selected'; ?>>กรรมการและผู้ช่วยเลขานุการ</option>
                            <option value="กรรมการ" <?php if ($data['position'] === 'กรรมการ') echo 'selected'; ?>>กรรมการ</option>
                            <option value="ที่ปรึกษา" <?php if ($data['position'] === 'ที่ปรึกษา') echo 'selected'; ?>>ที่ปรึกษา</option>
                            <option value="ผู้ออกแบบ" <?php if ($data['position'] === 'ผู้ออกแบบ') echo 'selected'; ?>>ผู้ออกแบบ</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="type_work" class="col-sm-2 col-form-label">ลักษณะงาน</label>
                            <select name="type_work" class="form-select" id="type_work2" onchange="calc2()" required>
                                <option value="งานต่อเนื่อง" <?php if ($data['type_work'] === 'งานต่อเนื่อง') echo 'selected'; ?>>งานต่อเนื่อง</option>
                                <option value="งานไม่ต่อเนื่อง/ชั่วคราว" <?php if ($data['type_work'] === 'งานไม่ต่อเนื่อง/ชั่วคราว') echo 'selected'; ?>>งานไม่ต่อเนื่อง/ชั่วคราว</option>
                                <option value="ออกแบบ/เขียนแบบอาคาร" <?php if ($data['type_work'] === 'ออกแบบ/เขียนแบบอาคาร') echo 'selected'; ?>>ออกแบบ/เขียนแบบอาคาร</option>
                                <option value="ตรวจการจ้างอาคาร" <?php if ($data['type_work'] === 'ตรวจการจ้างอาคาร') echo 'selected'; ?>>ตรวจการจ้างอาคาร</option>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount_time" class="col-sm-2 col-form-label">จำนวนชั่วโมงทำงาน</label>
                        <input type="text" class="form-control" name="amount_time" value="<?php echo $data['amount_time']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount_work" class="col-sm-2 col-form-label">จำนวนภาระงาน</label>
                        <input type="text" class="form-control" name="amount_work" id="amount_work2" value="<?php echo $data['amount_work']; ?>" readonly>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">อัพโหลดไฟล์</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="1_10/upload_1_10.php" method="post" enctype="multipart/form-data">
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
            window.location.href = 'index.php?page=1_10/index_1_10'; // เปลี่ยนเส้นทาง URL เพื่อเปลี่ยนหน้าเว็บไปที่ 'index.php?page=_1_10'
        });
    });
    // เมื่อโมดัลแสดงอยู่และถูกซ่อน
    $(document).ready(function() {
        $('#uploadModal').on('hidden.bs.modal', function() { //$('#uploadModal') จะเลือกองค์ประกอบที่มี id เป็น "uploadModal".
            window.location.href = 'index.php?page=1_10/index_1_10'; // เปลี่ยนเส้นทาง URL เพื่อเปลี่ยนหน้าเว็บไปที่ 'index.php?page=_1_10'
        });
    });

    // เมื่อเอกสารโหลดเสร็จแล้ว

    let fileInput = document.getElementById('fileInput'); //ใช้ getElementById() เพื่อเข้าถึงองค์ประกอบที่มี id เป็น 'fileInput'
    let previewFile = document.getElementById('previewFile'); //ใช้ getElementById() เพื่อเข้าถึงองค์ประกอบที่มี id เป็น 'previewFile'

    function calc1() {
        var position = document.getElementById('position1').value;
        var type_work = document.getElementById('type_work1').value;


        if (type_work == 'งานต่อเนื่อง'){
            if (position == 'ประธาน'){
                var calculatedAmountWork = 3;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการและเลขานุการ'){
                var calculatedAmountWork = 2.5;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการและผู้ช่วยเลขานุการ'){
                var calculatedAmountWork = 2;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการ'){
                var calculatedAmountWork = 1.5;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'ที่ปรึกษา'){
                var calculatedAmountWork = 1;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else{
                var calculatedAmountWork = 0;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }
        }else if (type_work == 'งานไม่ต่อเนื่อง/ชั่วคราว'){
            if (position == 'ประธาน'){
                var calculatedAmountWork = 2;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการและเลขานุการ'){
                var calculatedAmountWork = 1.5;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการและผู้ช่วยเลขานุการ'){
                var calculatedAmountWork = 1;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการ'){
                var calculatedAmountWork = 0.5;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else{
                var calculatedAmountWork = 0;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }
        }else if (type_work == 'ออกแบบ/เขียนแบบอาคาร'){
            if (position == 'ประธาน'){
                var calculatedAmountWork = 2.5;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการและเลขานุการ'){
                var calculatedAmountWork = 1.5;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการ'){
                var calculatedAmountWork = 1;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'ผู้ออกแบบ'){
                var calculatedAmountWork = 2;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else{
                var calculatedAmountWork = 0;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }
        }else if (type_work == 'ตรวจการจ้างอาคาร'){
            if (position == 'ประธาน'){
                var calculatedAmountWork = 4;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการและเลขานุการ'){
                var calculatedAmountWork = 3;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการ'){
                var calculatedAmountWork = 2;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }else {
                var calculatedAmountWork = 0;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
            }
        }else{
                var calculatedAmountWork = 0;
                document.getElementById('amount_work1').value = calculatedAmountWork.toFixed(2);
        }
    }
    function calc2() {
        var position = document.getElementById('position2').value;
        var type_work = document.getElementById('type_work2').value;


        if (type_work == 'งานต่อเนื่อง'){
            if (position == 'ประธาน'){
                var calculatedAmountWork = 3;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการและเลขานุการ'){
                var calculatedAmountWork = 2.5;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการและผู้ช่วยเลขานุการ'){
                var calculatedAmountWork = 2;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการ'){
                var calculatedAmountWork = 1.5;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'ที่ปรึกษา'){
                var calculatedAmountWork = 1;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else{
                var calculatedAmountWork = 0;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }
        }else if (type_work == 'งานไม่ต่อเนื่อง/ชั่วคราว'){
            if (position == 'ประธาน'){
                var calculatedAmountWork = 2;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการและเลขานุการ'){
                var calculatedAmountWork = 1.5;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการและผู้ช่วยเลขานุการ'){
                var calculatedAmountWork = 1;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการ'){
                var calculatedAmountWork = 0.5;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else{
                var calculatedAmountWork = 0;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }
        }else if (type_work == 'ออกแบบ/เขียนแบบอาคาร'){
            if (position == 'ประธาน'){
                var calculatedAmountWork = 2.5;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการและเลขานุการ'){
                var calculatedAmountWork = 1.5;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการ'){
                var calculatedAmountWork = 1;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'ผู้ออกแบบ'){
                var calculatedAmountWork = 2;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else{
                var calculatedAmountWork = 0;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }
        }else if (type_work == 'ตรวจการจ้างอาคาร'){
            if (position == 'ประธาน'){
                var calculatedAmountWork = 4;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการและเลขานุการ'){
                var calculatedAmountWork = 3;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else if (position == 'กรรมการ'){
                var calculatedAmountWork = 2;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }else {
                var calculatedAmountWork = 0;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
            }
        }else{
                var calculatedAmountWork = 0;
                document.getElementById('amount_work2').value = calculatedAmountWork.toFixed(2);
        }
    }
</script>