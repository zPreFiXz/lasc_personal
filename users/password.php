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
                <h3 class="card-title pb0 fs-4 mt-3" style="padding:0px;">เปลี่ยนรหัสผ่าน</h3>
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
                <form action="users/password_db.php" method="post">
                    <div class="mb-3">
                        <?php if(isset($_GET['lastPage'])){?>
                            <input type="hidden" name="lastPage" value="<?= $_GET["lastPage"] ?>">
                        <?php } ?>
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
                    <div class="d-flex justify-content-center mb-3">
                        <button type="submit" name="edit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    $conn = null;
?>
</html>