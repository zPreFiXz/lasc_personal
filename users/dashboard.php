<div class="container">
    <?php 
        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $stmt = $conn->query("SELECT * FROM users WHERE firstname = '$userId'");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    ?>
    <h3 class="mt-4">ยินดีต้อนรับ, <?php echo $row['nametitle'].$row['firstname'] . ' ' . $row['lastname'] ?></h3>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>