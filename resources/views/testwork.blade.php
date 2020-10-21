<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <button type="button" id="chk" >คลิก</button>
    <label for="" id="view">ให้คะเเนน <p id="demo"></p></label>
    <div>

    </div>

    <script type="text/javascript">
    $("#chk").click(function(){
        // setTimeout( alert("The paragraph was clicked."), 5000);
        setTimeout(function () {
            
        }, 5000);
    })

    
    // $("#chk").click(function(){
    //     alert("The paragraph was clicked.");
    // });
    
</script>
</body>
</html>
 -->

<!-- <HTML>

<HEAD>
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <script language="javascript" type="text/javascript">
        function displayForm() {
            var d = document;
            var test_div = document.getElementById('pwdForm');
            document.getElementById('pwdForm').innerHTML = "รหัสเข้าใช้งาน";
            var f = test_div.appendChild(d.createElement('form'));
            var i = d.createElement('input');
            var i2 = i.cloneNode(false);
            var br = d.createElement('br');
            f.action = 'adminPage.php';
            f.method = 'POST';
            f.name = 'f';
            i.type = 'text';
            i.name = 'myText';
            i.value = '';
            i2.type = 'submit';
            i2.value = ' ส่ง ';
            f.appendChild(i);
            f.appendChild(br);
            f.appendChild(i2);
            document.getElementsByName("adminBtn")[0].disabled = true;
        }
    </script>
</HEAD>

<BODY>
    กดปุ่มเพื่อเข้าใช้งาน<br>
    <input type=button name="adminBtn" value="Admin" onclick="displayForm()">
    <div id="pwdForm"></div>
</BODY>

</HTML> -->

<!-- //โค้ดข้างบน มีการกำหนดตำแหน่งให้แสดงฟอร์ม ต่อจากปุ่มที่คลิก และเมื่อคลิกปุ่มแล้ว ให้ปุ่มไม่สามารถกดอีกได้ เพื่อไม่ให้กดปุ่มซ้ำ -->

<!-- ไฟล์ adminPage.php -->

<?php
// $thisPwd = $_POST["myText"];
// echo "รหัสที่ท่านพิมพ์คือ : $thisPwd <br>";
?>

<script language="javascript">
function js_popup(theURL,width,height) { //v2.0
leftpos = (screen.availWidth - width) / 2;
     toppos = (screen.availHeight - height) / 2;
   window.open(theURL, "viewdetails","width=" + width + ",height=" + height + ",left=" + leftpos + ",top=" + toppos);
}
</script>
 
<a href="#" onClick="js_popup('test2.php',783,600); return false;" title="Code PHP Popup">Test Code PHP Popup</a>