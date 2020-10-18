<?php
    exec("python querydata.py",$return);
echo json_encode($return);
?>