<?php
    require "config/db.php";
    $stmt = $conn->query("SELECT * FROM `term&year` where id = 1"); // ดึงข้อมูลจากตาราง personal โดยใช้ ID
    $stmt->execute();
    $data = $stmt->fetch();
?>
<div class="container">
    <div class="pagetitle mt-3">
        <h1>Dashboard admin</h1>
    </div>
    <hr> <!-- เส้น -->
    <div class="d-flex justify-content-end ">
        <button class="btn btn-success mb-3" type="button" data-bs-toggle="modal" data-bs-target="#largeModal">
            <div class="icon d-flex">
                <i class="bi bi-arrow-repeat"></i> &nbsp;
                <div class="label">เปลี่ยนปีการศึกษาและภาคเรียน</div>
            </div>
        </button>
    </div>
</div>

<div class="modal fade" id="largeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เปลี่ยนปีการศึกษาและภาคเรียน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="term&year/term&year.php" method="post">
                <div class="modal-body">
                    <label for="year" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                    <input type="text" class="form-control" name="year" value="<?php echo $data['year']; ?>" required>

                    <label for="term" class="col-sm-2 col-form-label">ภาคการศึกษา</label>
                    <select type="text" class="form-select" name="term" required>
                        <option value="1" <?php if($data['term'] === '1') echo 'selected'?>>1</option>
                        <option value="2" <?php if($data['term'] === '2') echo 'selected'?>>2</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" name="submit" class="btn btn-primary">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
</div>