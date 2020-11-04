<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>คู่มือระบบจัดเก็บโครงงาน วิจัยและวิทยานิพนธ์</title>
</head>
<body>
<?php
$filename = 'คู่มือระบบจัดเก็บโครงงาน วิจัยและวิทยานิพนธ์.pdf';
  $file = "$filename";
  
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?> 
</body>
</html>
