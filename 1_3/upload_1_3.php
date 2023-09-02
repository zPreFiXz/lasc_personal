<?php
    session_start(); //เริ่มต้น
    require_once "../config/db.php"; // นำเข้าไฟล์การกำหนดค่าฐานข้อมูล MySQL

    $firstname = $_SESSION['firstname'];

    if(isset($_POST['upload'])) {
        $id = $_SESSION['upload']; // เช็คว่ามีการกดปุ่ม 'upload' จากฟอร์มหรือไม่
        $file = $_FILES['file']; // รับค่า id จากเซสชัน
        // กำหนดนามสกุลไฟล์ที่อนุญาตให้อัปโหลด
        $allow = array('jpg', 'jpeg', 'png', 'pdf', 'docx','ppt');
        //แยกชื่อกับนามสกุลของไฟล์ โดยใช้ . 
        $extension = explode(".", $file['name']);
        //แปลงนามสกุลไฟล์ให้เป็นตัวพิมพ์เล็ก
        $fileActExt = strtolower(end($extension));
        // ตั้งค่าโซนเวลาให้เป็นเวลาประเทศไทย
        date_default_timezone_set('Asia/Bangkok');
        // สร้างชื่อไฟล์ใหม่ที่ไม่ซ้ำกันโดยใช้เลขสุ่ม.นามสกุลไฟล์
        $fileNew = date('Y-m-d_H-i-s'). "_" . $firstname . "." . $fileActExt;  
        //อัพโหลดไปที่โฟล์เดอร์อะไร
        $filePath = "../uploads/".$fileNew;// กำหนดพาธของไฟล์ที่จะบันทึก

        // เช็คว่านามสกุลไฟล์
        if (in_array($fileActExt, $allow)) {
            //เช็คขนาดไฟล์และerror
            if($file['size'] > 0 && $file['error'] == 0 ) {
                //เช็คว่ามีการอัปโหลดไปที่โฟลเดอร์ยัง
                move_uploaded_file($file['tmp_name'], $filePath);
                // สร้างคำสั่ง SQL สำหรับอัพเดตชื่อไฟล์ในตาราง personal_1_3
                $sql = "UPDATE personal_1_3 SET file = :file WHERE id = :id";

                $stmt = $conn->prepare($sql); // เตรียมคำสั่ง SQL สำหรับการเตรียมการทำงานร่วมกับฐานข้อมูล
                $stmt->bindParam(':id', $id); // กำหนดค่าพารามิเตอร์ :id
                $stmt->bindParam(':file', $fileNew); // กำหนดค่าพารามิเตอร์ :file
                $stmt->execute(); // ประมวลผลคำสั่ง SQL
                unset($_SESSION['upload']); // ลบตัวแปรเซสชันที่ชื่อ upload
            }
        }
    }

    $conn = null;
    
    if ($stmt) {
        $_SESSION['success'] = "อัปโหลดไฟล์สำเร็จ";
        header("location: ../index.php?page=1_3/index_1_3"); // นำทางไปยังหน้า index.php?page=1_3
    }else {
        $_SESSION['error'] = "อัพโหลดไฟล์ไม่สำเร็จ";
        header("location: ../index.php?page=1_3/index_1_3"); // นำทางไปยังหน้า index.php?page=1_3
    }
?>