<?php
    require_once "config/db.php";
?>

<div class="container">
    <div class="pagetitle mt-3">
        <h1>ตอนที่ 2 : แบบสรุปภาระงานรายบุคคล</h1>
    </div>

    <table class="table table-bordered">
        <thead class="align-middle table-secondary text-center">
        <tr>
            <th scope="col">รายการ</th>
            <th scope="col">จำนวนภาระงาน</th>
        </tr>
        </thead>

        <tbody>    
        <tr>
           <td>1. ภาระงานการสอน (ภาคปกติ)</td>
           <td class="text-center">0.00</td> 
        </tr>
        <tr>
           <td>2. ภาระงานอาจารย์ที่ปรึกษาของนักศึกษา (หมู่เรียน ชมรม ชุมนุม หรือที่ปรึกษาอื่น)</td>
           <td class="text-center">0.00</td> 
        </tr>
        <tr>
           <td>3. ภาระงานอาจารย์นิเทศ /อาจารย์ผู้ควบคุมการฝึกประสบการณ์วิชาชีพ</td>
           <td class="text-center">0.00</td> 
        </tr>
        <tr>
           <td>4. ภาระงานกิจกรรมพัฒนานักศึกษา</td>
           <td class="text-center">0.00</td> 
        </tr>
        <tr>
           <td>5. ภาระงานอาจารย์ที่ปรึกษางานวิจัย โครงการ ปัญหาพิเศษ หรืองานวิจัยอื่นที่เกี่ยวข้อง</td>
           <td class="text-center">0.00</td> 
        </tr>
        <tr>
           <td>6. ภาระงานวิจัย</td>
           <td class="text-center">0.00</td> 
        </tr>
        <tr>
           <td>7. ภาระผลิตผลงานทางวิชาการ</td>
           <td class="text-center">0.00</td> 
        </tr>
        <tr>
           <td>8. ภาระงานด้านบริการวิชาการ</td>
           <td class="text-center">0.00</td> 
        </tr>
        <tr>
           <td>9. ภาระงานทำนุบำรุงศิลปวัฒนธรรม</td>
           <td class="text-center">0.00</td> 
        </tr>
        <tr>
           <td>10. ภาระงานเฉพาะกิจที่เกี่ยวข้อง นอกจากข้อ 1-9</td>
           <td class="text-center">0.00</td> 
        </tr>
        <tr>
           <td>11. ภาระงานด้านการบริหาร (เฉพาะผู้ที่ได้รับการแต่งตั้งให้ดำรงตำแหน่งบริหาร)</td>
           <td class="text-center">0.00</td> 
        </tr>
        <tr>
           <th class="text-center">รวมภาระงานตลอดภาคเรียน</th>
           <td class="text-center">0.00</td> 
        </tr>
        </tbody>
    </table>
    <p>(หมายเหตุ รวมภาระงานตลอดภาคเรียนต้องไม่ต่ำกว่า 40 ภาระงาน)</p>
</div>

<!-- เรียกใช้ไลบรารี jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script>
    // เมื่อเอกสารโหลดเสร็จ
    $(document).ready(function () {
        // เมื่อโมดัลแสดงอยู่และถูกซ่อน
        $('#modal').on('hidden.bs.modal', function () { //$('#modal') จะเลือกองค์ประกอบที่มี id เป็น "modal".
            window.location.href = 'index.php?page=1_9/index_1_9'; // เปลี่ยนเส้นทาง URL เพื่อเปลี่ยนหน้าเว็บไปที่ 'index.php?page=_1_5_a'
        });
    });
        // เมื่อโมดัลแสดงอยู่และถูกซ่อน
    $(document).ready(function () {
        $('#uploadModal').on('hidden.bs.modal', function () { //$('#uploadModal') จะเลือกองค์ประกอบที่มี id เป็น "uploadModal".
            window.location.href = 'index.php?page=1_9/index_1_9'; // เปลี่ยนเส้นทาง URL เพื่อเปลี่ยนหน้าเว็บไปที่ 'index.php?page=_1_5_a'
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