<?php 
    $url = 'https://www.prepostseo.com/apis/checkSentence'; // กำหนด URl ของเว็บไวต์ B
    $request = 'This is unique paragraph black permanent marker'; // กำหนด HTTP Request โดยระบุ username=guest และ password=เguest (รูปแบบเหมือนการส่งค่า $_GET แต่ข้างหน้าข้อความไม่มีเครื่องหมาย ?)
    $key = '8405791ef34d67710469e7fc10fc6e50';
    $data = [
        'collection' => 'RapidAPI'
      ];
    $ch = curl_init(); // เริ่มต้นใช้งาน cURL
      
    curl_setopt($ch, CURLOPT_URL, $url); // กำหนดค่า URL
    curl_setopt($ch, CURLOPT_POST, true); // กำหนดรูปแบบการส่งข้อมูลเป็นแบบ $_POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // กำหนดค่า HTTP Request
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // กำหนดให้ cURL คืนค่าผลลัพท์
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Key: 8405791ef34d67710469e7fc10fc6e5',
        'Content-Type: application/json'
      ]);
      
      
    $response = curl_exec($ch); // ประมวลผล cURL
    curl_close($ch); // ปิดการใช้งาน cURL
      
    echo $response; // แสดงผลการทำงาน

?>