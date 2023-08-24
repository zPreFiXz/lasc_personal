<?php
require "config/db.php";
$stmt = $conn->query("SELECT * FROM `term_year` where id = 1"); // ดึงข้อมูลจากตาราง personal โดยใช้ ID
$stmt->execute();
$data = $stmt->fetch();
$year = date("Y") + 543;
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
    <table class="table table-bordered text-center align-middle">
        <thead class="align-middle table-secondary">
            <tr>
                <th rowspan="3">ชื่อ</th>
                <th colspan="8">จำนวนภาระงาน</th>
            </tr>
            <tr>
                <th colspan="4">
                    ปีการศึกษา <?= $year  ?>
                </th>
                <th colspan="4">
                    ปีการศึกษา <?= $year - 1 ?>
                </th>
            </tr>
            <tr>
                <th colspan="2">เทอม 1</th>
                <th colspan="2">เทอม 2</th>
                <th colspan="2">เทอม 1</th>
                <th colspan="2">เทอม 2</th>
            </tr>

        </thead>
        <tbody>
            <?php

            $stmt = $conn->query("SELECT * FROM Vadmin WHERE `year` = '$year'");
            $stmt->execute();
            $users = $stmt->fetchAll();

            $year = $year - 1;
            $stmt = $conn->query("SELECT * FROM Vadmin WHERE `year` = '$year'");
            $stmt->execute();
            $userss = $stmt->fetchAll();

            if (!$users) {
                echo "<tr><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></tr>";
            } else {
                foreach ($users as $user) {
            ?>
                    <tr>
                        <td><?= $user['firstname'], " ", $user["lastname"] ?></td>

                        <td><?= $user['term1'] ?></td>
                        <td>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#details">รายระเอียด</button>
                        </td>

                        <td><?= $user['term2'] ?></td>
                        <td>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#details">รายระเอียด</button>
                        </td>

                        <?php
                        $found = false;
                        foreach ($userss as $userss_entry) {
                            if ($userss_entry['firstname'] == $user['firstname'] && $userss_entry['lastname'] == $user['lastname']) {
                                $found = true;
                        ?>
                                <td><?= $userss_entry['term1'] ?></td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#details">รายระเอียด</button>
                                </td>
                                <td><?= $userss_entry['term2'] ?></td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#details">รายระเอียด</button>
                                </td>
                            <?php
                                break;
                            }
                        }

                        if (!$found) {
                            ?>
                            <td>0</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#details">
                                    รายระเอียด
                                </button>
                            </td>

                            <td>0</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#details">
                                    รายระเอียด
                                </button>
                            </td>
                    </tr>
        </tbody>
<?php }
                    }
                } ?>
    </table>
</div>

<div class="modal fade" id="largeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เปลี่ยนปีการศึกษาและภาคเรียน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="term_year/term_year.php" method="post">
                <div class="modal-body">
                    <label for="year" class="col-sm-2 col-form-label">ปีการศึกษา</label>
                    <input type="text" class="form-control" name="year" value="<?php echo $data['year']; ?>" required>

                    <label for="term" class="col-sm-2 col-form-label">ภาคการศึกษา</label>
                    <select type="text" class="form-select" name="term" required>
                        <option value="1" <?php if ($data['term'] === '1') echo 'selected' ?>>1</option>
                        <option value="2" <?php if ($data['term'] === '2') echo 'selected' ?>>2</option>
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


<div class="modal fade" id="details" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายระเอียด</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php require './2/index_2.php' ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary">รายละเอียด</button>
            </div>
        </div>
    </div>
</div>