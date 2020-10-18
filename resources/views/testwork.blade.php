<?php
// $keySearch = "php";
// $myStrong = "Welcome to my php programming";
// echo str_replace($keySearch,"<font color=red><b>$keySearch<b></font>",$myStrong);


$data = 'abc defg abc สวัสดี defg hijklmnop สวัสดีค่ะ abc defg';
$keyword = 'สวัสดี';
$h = hilightkey($data,$keyword);
echo $h;
#$keyword = 'abc';
#$keyword = 'defg';

//ให้ใช้ได้เฉพาะตัวอักษร a-z และภาษาไทยเท่านั้น กันส่ง regular expression เข้ามา



function hilightkey($data,$keyword){
    if (!preg_match('|^[a-zA-Zก-๛]+$|',$keyword)){
        die('illegal keyword');
    }
    echo preg_replace('|('.$keyword.')|i', '<font color=red>$1</font>', $data);
} 

?>