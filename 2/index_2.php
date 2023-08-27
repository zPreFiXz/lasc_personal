<?php
   require_once "config/db.php";

   $userId = $_SESSION['userId'];

   $stmt = $conn->query("SELECT * FROM `term_year` where id = 1");
   $stmt->execute();
   $term_year = $stmt->fetch();
   $term =  $term_year['term'];
   $year =  $term_year['year'];

   $stmt = $conn->query("SELECT amount_work FROM personal_1_2_a WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
   $stmt->execute();
   $personal_1_2_a = $stmt->fetchAll();

   $totalAmountWork_1_2_a = 0;
   foreach ($personal_1_2_a as $per_1_2_a){
      $totalAmountWork_1_2_a += floatval($per_1_2_a['amount_work']);
   }

   $stmt = $conn->query("SELECT amount_work FROM personal_1_2_b WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
   $stmt->execute();
   $personal_1_2_b = $stmt->fetchAll();

   $totalAmountWork_1_2_b = 0;
   foreach ($personal_1_2_b as $per_1_2_b){
      $totalAmountWork_1_2_b += floatval($per_1_2_b['amount_work']);
   }
   $totalAmountWork_1_2 = $totalAmountWork_1_2_a + $totalAmountWork_1_2_b;

   $stmt = $conn->query("SELECT amount_work FROM personal_1_3 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
   $stmt->execute();
   $personal_1_3 = $stmt->fetchAll();

   $totalAmountWork_1_3 = 0;
   foreach ($personal_1_3 as $per_1_3){
      $totalAmountWork_1_3 += floatval($per_1_3['amount_work']);
   }

   $stmt = $conn->query("SELECT amount_work FROM personal_1_4 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
   $stmt->execute();
   $personal_1_4 = $stmt->fetchAll();

   $totalAmountWork_1_4 = 0;
   foreach ($personal_1_4 as $per_1_4){
      $totalAmountWork_1_4 += floatval($per_1_4['amount_work']);
   }

   $stmt = $conn->query("SELECT amount_work FROM personal_1_5_a WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
   $stmt->execute();
   $personal_1_5_a = $stmt->fetchAll();

   $totalAmountWork_1_5_a = 0;
   foreach ($personal_1_5_a as $per_1_5_a){
      $totalAmountWork_1_5_a += floatval($per_1_5_a['amount_work']);
   }

   $stmt = $conn->query("SELECT amount_work FROM personal_1_5_b WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
   $stmt->execute();
   $personal_1_5_b = $stmt->fetchAll();

   $totalAmountWork_1_5_b = 0;
   foreach ($personal_1_5_b as $per_1_5_b){
      $totalAmountWork_1_5_b += floatval($per_1_5_b['amount_work']);
   }
   $totalAmountWork_1_5 = $totalAmountWork_1_5_a + $totalAmountWork_1_5_b;

   $stmt = $conn->query("SELECT amount_work FROM personal_1_6_a WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
   $stmt->execute();
   $personal_1_6_a = $stmt->fetchAll();

   $totalAmountWork_1_6_a = 0;
   foreach ($personal_1_6_a as $per_1_6_a){
      $totalAmountWork_1_6_a += floatval($per_1_6_a['amount_work']);
   }

   $stmt = $conn->query("SELECT amount_work FROM personal_1_6_b WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
   $stmt->execute();
   $personal_1_6_b = $stmt->fetchAll();

   $totalAmountWork_1_6_b = 0;
   foreach ($personal_1_6_b as $per_1_6_b){
      $totalAmountWork_1_6_b += floatval($per_1_6_b['amount_work']);
   }
   $totalAmountWork_1_6 = $totalAmountWork_1_6_a + $totalAmountWork_1_6_b;

   $stmt = $conn->query("SELECT amount_work FROM personal_1_7 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
   $stmt->execute();
   $personal_1_7 = $stmt->fetchAll();

   $totalAmountWork_1_7 = 0;
   foreach ($personal_1_7 as $per_1_7){
      $totalAmountWork_1_7 += floatval($per_1_7['amount_work']);
   }

   $stmt = $conn->query("SELECT amount_work FROM personal_1_8 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
   $stmt->execute();
   $personal_1_8 = $stmt->fetchAll();

   $totalAmountWork_1_8 = 0;
   foreach ($personal_1_8 as $per_1_8){
      $totalAmountWork_1_8 += floatval($per_1_8['amount_work']);
   }
   
   $stmt = $conn->query("SELECT amount_work FROM personal_1_9 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
   $stmt->execute();
   $personal_1_9 = $stmt->fetchAll();

   $totalAmountWork_1_9 = 0;
   foreach ($personal_1_9 as $per_1_9){
      $totalAmountWork_1_9 += floatval($per_1_9['amount_work']);
   }

   $stmt = $conn->query("SELECT amount_work FROM personal_1_10 WHERE userId = '$userId' AND term = '$term' AND year = '$year'");
   $stmt->execute();
   $personal_1_10 = $stmt->fetchAll();

   $totalAmountWork_1_10 = 0;
   foreach ($personal_1_10 as $per_1_10){
      $totalAmountWork_1_10 += floatval($per_1_10['amount_work']);
   }

   $totalAmountWork = $totalAmountWork_1_2 + $totalAmountWork_1_3 + $totalAmountWork_1_4 + $totalAmountWork_1_5 + $totalAmountWork_1_6 + $totalAmountWork_1_7 + $totalAmountWork_1_8 + $totalAmountWork_1_9 + $totalAmountWork_1_10;
   
?>

<div class="container">
    <div class="pagetitle mt-3">
        <h1>ตอนที่ 2 : แบบสรุปภาระงานรายบุคคล</h1>
    </div>

    <table class="table table-bordered mt-3">
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
           <td class="text-center"><?= number_format($totalAmountWork_1_2, 2); ?></td> 
        </tr>
        <tr>
           <td>3. ภาระงานอาจารย์นิเทศ /อาจารย์ผู้ควบคุมการฝึกประสบการณ์วิชาชีพ</td>
           <td class="text-center"><?= number_format($totalAmountWork_1_3, 2); ?></td> 
        </tr>
        <tr>
           <td>4. ภาระงานกิจกรรมพัฒนานักศึกษา</td>
           <td class="text-center"><?= number_format($totalAmountWork_1_4, 2); ?></td> 
        </tr>
        <tr>
           <td>5. ภาระงานอาจารย์ที่ปรึกษางานวิจัย โครงการ ปัญหาพิเศษ หรืองานวิจัยอื่นที่เกี่ยวข้อง</td>
           <td class="text-center"><?= number_format($totalAmountWork_1_5, 2); ?></td> 
        </tr>
        <tr>
           <td>6. ภาระงานวิจัย</td>
           <td class="text-center"><?= number_format($totalAmountWork_1_6, 2); ?></td> 
        </tr>
        <tr>
           <td>7. ภาระผลิตผลงานทางวิชาการ</td>
           <td class="text-center"><?= number_format($totalAmountWork_1_7, 2); ?></td> 
        </tr>
        <tr>
           <td>8. ภาระงานด้านบริการวิชาการ</td>
           <td class="text-center"><?= number_format($totalAmountWork_1_8, 2); ?></td> 
        </tr>
        <tr>
           <td>9. ภาระงานทำนุบำรุงศิลปวัฒนธรรม</td>
           <td class="text-center"><?= number_format($totalAmountWork_1_9, 2); ?></td> 
        </tr>
        <tr>
           <td>10. ภาระงานเฉพาะกิจที่เกี่ยวข้อง นอกจากข้อ 1-9</td>
           <td class="text-center"><?= number_format($totalAmountWork_1_10, 2); ?></td> 
        </tr>
        <tr>
           <td>11. ภาระงานด้านการบริหาร (เฉพาะผู้ที่ได้รับการแต่งตั้งให้ดำรงตำแหน่งบริหาร)</td>
           <td class="text-center">0.00</td> 
        </tr>
        <tr>
           <th class="text-center">รวมภาระงานตลอดภาคเรียน</th>
           <td class="text-center"><?= number_format($totalAmountWork, 2); ?></td> 
        </tr>
        </tbody>
    </table>
    <p>(หมายเหตุ รวมภาระงานตลอดภาคเรียนต้องไม่ต่ำกว่า 40 ภาระงาน)</p>
</div>