<?php
  require_once "config/db.php";

    if (isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->prepare("DELETE FROM personal_1_2_a WHERE code = :delete_id");
        $deletestmt->bindParam(':delete_id', $delete_id);
        $deletestmt->execute();
        
        if($deletestmt){
            $_SESSION['success'] = "ข้อมูลถูกลบสำเร็จ";
            echo "<script>window.location.href = 'index.php?page=1_2_a';</script>";
            exit;
        }
    }
    if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];
        $stmt = $conn->prepare("SELECT * FROM personal_1_2_a WHERE code = ?");
        $stmt->execute([$edit_id]);
        $data = $stmt->fetch();
    ?>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = new bootstrap.Modal(document.getElementById("modal"));
            modal.show();
        });
        </script> 
    <?php
    }
    if (isset($_GET['upload'])) {
        $_SESSION['upload']= $_GET['upload'];
        $upload_id = $_SESSION['upload'];
    ?>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = new bootstrap.Modal(document.getElementById("uploadModal"));
            modal.show();
        });
        </script> 
    <?php
    }
?>

<div class="container">
    <div class="pagetitle mt-3">
        <h1>ก.ภาระงานอาจารย์ที่ปรึกษาหมู่เรียน</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">ภาระงานอาจารย์ที่ปรึกษาของนักศึกษา</li>
          <li class="breadcrumb-item active">ก.ภาระงานอาจารย์ที่ปรึกษาหมู่เรียน</li>
        </ol>
      </nav>
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
    <?php if(isset($_SESSION['success'])){?>
            <div class="alert alert-success" id="alert-success">
                <?php
                    echo $_SESSION['success'];
                    unset ($_SESSION['success']);
                ?>
            </div>   
            <script>
                setTimeout(function(){
                    document.getElementById('alert-success').style.display = 'none';
                }, 3000);
             </script> 
    <?php }?>
    <table class="table table-bordered text-center align-middle">
        <thead class="align-middle table-secondary">
            <tr>
                <th scope="col">สาขาวิชา</th>
                <th scope="col">รหัส</th>
                <th scope="col">ระดับชั้น</th>
                <th scope="col">หมู่เรียน</th>
                <th scope="col">จำนวนนักศึกษา</th>
                <th scope="col">จำนวนภาระงาน</th>
                <th scope="col">อัปโหลดไฟล์</th>
                <th scope="col">จัดการข้อมูล</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->query("SELECT * FROM personal_1_2_a");
                $stmt->execute();
                $personal = $stmt->fetchAll();

                if (!$personal) {
                    echo "<tr><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></tr>";
                } else {
                    foreach ($personal as $per) {
                        ?>
                        <tr>
                            <td style="white-space: nowrap;"><?= $per['major']; ?></td>
                            <td><?= $per['code']; ?></td>
                            <td><?= $per['level']; ?></td>
                            <td><?= $per['group_study']; ?></td>
                            <td><?= $per['amount_student']; ?></td>
                            <td><?= $per['amount_work']; ?></td>
                            <?php if ($per['file']) { ?>
                                <td style="white-space: nowrap;">
                                    <a href="uploads/<?=$per['file']; ?>"><?= $per['file']; ?></a>
                                    <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_2_a&delete=<?= $per['code']; ?>" class="btn btn-warning">
                                            <div class="icon d-flex">
                                                <i class="bi bi-trash"></i>&nbsp;
                                                <div class="label">ลบ</div>
                                            </div>
                                    </a>
                                </td>
                            <?php } else { ?>
                                <td>
                                    <a style="white-space: nowrap;"href="?page=1_2_a&upload=<?= $per['code']; ?>" class="btn btn-warning">
                                        <div class="icon d-flex">
                                            <i class="bi bi-upload"></i>&nbsp;
                                            <div class="label">อัปโหลด</div>
                                        </div>
                                    </a>
                                </td>
                            <?php } ?>
                            <td class="d-flex justify-content-center">
                                <?php if ($per['file']) { ?>
                                    <a href="?page=1_2_a&edit=<?= $per['code']; ?>" class="btn btn-primary">
                                        <div class="icon d-flex">
                                            <i class="bi bi-pencil-square"></i>&nbsp;
                                            <div class="label">แก้ไข</div>
                                        </div>
                                    </a>&nbsp;
                                    <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_2_a&delete=<?= $per['code']; ?>" class="btn btn-danger">
                                        <div class="icon d-flex">
                                            <i class="bi bi-trash"></i>&nbsp;
                                            <div class="label">ลบ</div>
                                        </div>
                                    </a>
                                <?php } else { ?>
                                    <a href="?page=1_2_a&edit=<?= $per['code']; ?>" class="btn btn-primary">
                                        <div class="icon d-flex">
                                            <i class="bi bi-pencil-square"></i>&nbsp;
                                            <div class="label">แก้ไข</div>
                                        </div>
                                    </a>&nbsp;
                                    <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" href="?page=1_2_a&delete=<?= $per['code']; ?>" class="btn btn-danger">
                                        <div class="icon d-flex">
                                            <i class="bi bi-trash"></i>&nbsp;
                                            <div class="label">ลบ</div>
                                        </div>
                                    </a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                    }
                }
                ?>                
            <tr>
                <th scope="row" colspan="5">รวมจำนวนภาระงานตลอดภาคเรียน</th>
                <td scope="row" >0.00</td>
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
                    <form action="1_2_a/insert_1_2_a.php" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="major" class="col-sm-2 col-form-label ">สาขาวิชา</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="major" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="code" class="col-sm-2 col-form-label">รหัส</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="code" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="level" class="col-sm-2 col-form-label">ระดับชั้น</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="level" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="group_study" class="col-sm-2 col-form-label">หมู่เรียน</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="group_study" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="amount_student" class="col-sm-2 col-form-label">จำนวนนักศึกษา</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="amount_student" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="amount_work" class="col-sm-2 col-form-label">จำนวนภาระงาน</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="amount_work" required>
                            </div>
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
                    <form action="edit_1_2_a.php" method="post">
                    <?php
                        // if (isset($_GET['edit'])){
                        //     $id = $_GET['edit'];
                        //     $stmt = $conn->query("SELECT * FROM personal_1_2_a WHERE code = $code");
                        //     $stmt->execute();
                        //     $data = $stmt->fetch();
                        // }
                    ?>
                        <div class="row mb-3">
                            <label for="major" class="col-sm-2 col-form-label">สาขาวิชา</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="major" value="<?php echo $data['major']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="code" class="col-sm-2 col-form-label">รหัส</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="code" value="<?php echo $data['code']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="level" class="col-sm-2 col-form-label">ระดับชั้น</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="level" value="<?php echo $data['level']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="group_study" class="col-sm-2 col-form-label">หมู่เรียน</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="group_study" value="<?php echo $data['group_study']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="amount_student" class="col-sm-2 col-form-label">จำนวนนักศึกษา</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="amount_student" value="<?php echo $data['amount_student']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="amount_work" class="col-sm-2 col-form-label">จำนวนภาระงาน</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="amount_work" value="<?php echo $data['amount_work']; ?>">
                            </div>
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
                    <form action="upload_1_2_a.php" method="post" enctype="multipart/form-data">
                    <?php
                        // if (isset($_GET['edit'])){
                        //     $id = $_GET['edit'];
                        //     $stmt = $conn->query("SELECT * FROM personal_1_2_a WHERE code = $code");
                        //     $stmt->execute();
                        //     $data = $stmt->fetch();
                        // }
                    ?>
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
    $(document).ready(function () {
        $('#modal').on('hidden.bs.modal', function () {
            window.location.href = 'index.php?page=1_2_a';
        });
    });
    $(document).ready(function () {
        $('#uploadModal').on('hidden.bs.modal', function () {
            window.location.href = 'index.php?page=1_2_a';
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
