<?php
$stmt = $conn->query("SELECT * FROM `term_year` where id = 1"); // ดึงข้อมูลจากตาราง personal โดยใช้ ID
$stmt->execute();
$term_year = $stmt->fetch();

?>
<div class="container">
    <div class="pagetitle mt-3">
        <h1>เปลี่ยนปีการศึกษาและภาคเรียน</h1>
    </div>
    <hr> <!-- เส้น -->
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
        <br>
        <br>
        <br>
        <br>
    <div class="pagetitle d-flex justify-content-center">
        <h1>ปีการศึกษาปัจจุบัน <?= $term_year['year']?> ภาคเรียนที่ <?= $term_year['term']?></h1>
    </div>

    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#change_term_year">เปลี่ยนปีการศึกษาและภาคเรียน</button>
    </div>

</div>
<!-- modal เปลี่ยนปีการศึกษาและภาคเรียน -->
<div class="modal fade" id="change_term_year" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เปลี่ยนปีการศึกษาและภาคเรียน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="term_year/term_year.php" method="post">
                <div class="modal-body">
                    <label for="year" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                    <input type="hidden" name="id" value="<?= $term_year['id'] ?>"> 
                    <input type="text" class="form-control" name="year" value="<?php echo $term_year['year']; ?>" required>

                    <label for="term" class="col-sm-2 col-form-label" style="white-space: nowrap;">ภาคเรียนที่</label>
                    <select type="text" class="form-select" name="term" required>
                        <option value="1" <?php if ($term_year['term'] === '1') echo 'selected' ?>>1</option>
                        <option value="2" <?php if ($term_year['term'] === '2') echo 'selected' ?>>2</option>
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