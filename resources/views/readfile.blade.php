<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $namefile_chk;?></title>
</head>
<body>
  <?php
    if(isset($file_chk)?$file_chk:''){
      $file = 'project/'.$file_chk;
      $filename = $namefile_chk;
      header('Content-type: application/pdf');
      header('Content-Disposition: inline; filename="' . $filename . '"');
      header('Content-Transfer-Encoding: binary');
      header('Accept-Ranges: bytes');
      @readfile($file);
    }
  ?> 
</body>
</html>
