<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
        <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
        <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/app.css">       
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Athiti:wght@400;500;600&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>  
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>addproject</title>
    <style>
        .body1 {
            background-image: url("img/background-body-addproject-3.jpg");
        }
        .textadd {
            margin-top: 10px;
            padding-left: 20px;
            padding-right: 20px;
            font-size: 25px;
            color: black;
        }
        .border1 {
            padding-top: 8px;
            border: 1px solid #D9A327;
            margin-left: 30px;
            margin-right: 1285px;
        }

        .border2 {
            padding-top: 30px;
            margin-left: 150px;
            margin-right: 150px;
        }

        .tile {
            /* background-color: #7CE1B5; */
            background-image: url("img/background-body-addproject-4.jpg");
            margin-left: 200px;
            margin-right: 200px;
            
        }

        .step {
            height: 50px;
            width: 50px;
            margin: 0 10px;
            margin-right: 10px;
            background-color: #b150c7;
            border: none;  
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
            float: center;
            
        }

        .font {
            text-align: center;
            font-size: 18px;
            padding-top: 10px;
            color: #fff;
        }

        .btnp {
            background-color: #FFCC66;
        }

        .btnn {
            background-color: #00CCFF;
        }

        .btnnn {
            margin-top: 20px;
            margin-left: 278px;
            background-color: darkgrey;
        }

        input {
            padding: 5px;
            width: 30%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
            border: 1px solid red;
        }

        select {
            padding: 5px;
            width: 30%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        select.invalid {
            background-color: #ffdddd;
            border: 1px solid red;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 8px 15px;
            border-radius: 20%;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #37b848;
        }

        /* set label */
        label {
            font-size: 20px;
            margin-top: 20px;
        }

        .imgup {
            background-color: #4CAF50;
            width: 100px;
            height: 100px;
        }

        .input-tb {
            width: 28.9%;
            height: 100px;
        }

        .select-tbb {
            width: 28.9%;
        }

        .select-tbbb {
            width: 29%;
        }

        .select-tbbbb {
            width: 30%;
        }

        .select-tbbbbbb {
            width: 32%;
        }

        .input-tbb {
            width: 29.1%;
        }
        .input-tbbb {
            width: 30.3%;
        }

        .input-tbbbb {
            width: 29.9%;
        }

    </style>
</head>
<body class="body1">

        <div class="border2">
        <ul class="app-breadcrumb breadcrumb magne-right">
            <li class="breadcrumb-item magne-right-text"><a href="{{action('ProjectController@itemproject')}}">หน้าหลัก</a></li>
            <li class="breadcrumb-item magne-right-text"><a href="#">สร้างผลงาน</a></li>
        </ul><br>
            <div class="tile">
                <div class="tile-body">
                    <div class="containeradd ">
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step font">1</span>
                            <span class="step font">2</span>
                        
                        </div>
                        <center><h1><div class="containeradd textadd" >กรอกรายละเอียดผลงาน</div></h1></center>
                        <form id="addprojectfrom" action="insertprojectmdd" method="POST" enctype="multipart/form-data">
                        @csrf    
                        <div class="tab">
                                <center><label for="text" class="" style="margin-top: -5px;">ขั้นตอนที่ 1</label><br></center>
                                <center><label for="text" class="">เกี่ยวกับผลงาน</label><br></center>
                                <center style="margin-top:10px;margin-left:-40px;">ชื่อเรื่อง: <input type="text" class="" name="project_name" id="project_name" oninput="this.className = ''"><br></center>
                                <center style="margin-top:10px;margin-left:-40px;">คำสำคัญ: <input type="text" class="" name="keyword_project" id="keyword_project" oninput="this.className = ''"><br></center>
                                <center style="margin-top:10px;margin-left:-71px;">คำอธิบายย่อ: <input type="text" class="input-tb" name="des_project" id="des_project" oninput="this.className = ''"><br></center>
                                
                                <a href="homeMDD"><button type="button" class="btnnn ">ย้อนกลับ</button></a>
                                
                            </div>

                            <div class="tab">
                                <center><label for="text" class="">ขั้นตอนที่ 2</label><br></center>
                                <center style="margin-top:10px;margin-left:-63px;">ชนิดเอกสาร: <select name="type_project" class="select-tbb" id="type_project" oninput="this.className = ''">
                                            <option value="" disabled selected>เลือกชนิดเอกสาร</option>
                                            @foreach($chk_type as $type)
                                                <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                                            @endforeach
                                        </select><br></center>
                                       
                                <center style="margin-top:10px;margin-left:-40px;">ประเภท: <select name="genre_project" class="select-tbbb" id="genre_project" oninput="this.className = ''">
                                            <option value="" disabled selected>เลือกประเภท</option>
                                            @foreach($chk_genre as $genre)
                                                <option value="{{$genre->genre_id}}">{{$genre->genre_name}}</option>
                                            @endforeach
                                        </select><br></center>
                                <center style="margin-top:10px;margin-left:-50px;">หมวดหมู่: <select name="category_project" class="select-tbbbb" id="category_project" oninput="this.className = ''">
                                            <option value="" disabled selected>เลือกหมวดหมู่</option>
                                            @foreach($chk_category as $category)
                                                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select><br></center>
                            </div>
                            
                            <div style="overflow:10px;">
                                <div style="float:center;">
                                    <button type="button" id="prevBtn" class="btnp btnnn" onclick="nextPrev(-1)">ย้อนกลับ</button>
                                </div>
                                <div style="float:left; margin-left: 380px; margin-top: -41px;">
                                    <button type="button" id="nextBtn" class="btnn" onclick="nextPrev(1)">ถัดไป</button>
                                </div>
                            </div>
                        </form>
                         
                    </div>
                </div>
            </div>
        </div>
         
        <script class="text/javascript">
            $('#type_project').change(function(){
                if($(this).val()!=""){
                    var type_project=$(this).val();
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('insertproject')}}",
                        method:'POST',
                        data:{type_project:type_project,_token:_token}
                    })
                }
            });
            
            $('#genre_project').change(function(){
                if($(this).val()!=""){
                    var genre_project=$(this).val();
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('insertproject')}}",
                        method:'POST',
                        data:{genre_project:genre_project,_token:_token}
                    })
                }
            });

            $('#category_project').change(function(){
                if($(this).val()!=""){
                    var category_project=$(this).val();
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('insertproject')}}",
                        method:'POST',
                        data:{category_project:category_project,_token:_token}
                    })
                }
            });
        </script>

        <!-- <script>
            if ($message = Session::get('success')) {
                    swal({
                        title: "เกิดข้อผิดพลาด",
                        text: "กรุณากรอกข้อมูลให้ครบ",
                        icon: "warning",
                        button: "ตกลง",
                        });
                    }else {
                        swal({
                            title: "เรียบร้อย",
                            text: "ข้อมูลได้บันทึกเรียบร้อยเเล้ว",
                            icon: "success",
                            button: "ตกลง",
                            });
            }
        </script> -->

        <script>
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab
            function showTab(n) {
                // This function will display the specified tab of the form...
                var x = document.getElementsByClassName("tab");
                x[n].style.display = "block";
                //... and fix the Previous/Next buttons:
                if (n == 0) {
                    document.getElementById("prevBtn").style.display = "none";
                } else {
                    document.getElementById("prevBtn").style.display = "inline";
                }
                if (n == (x.length - 1)) {
                    document.getElementById("nextBtn").innerHTML = "ยืนยัน";  
                    document.getElementById("nextBtn").innerHTML = "ถัดไป";
                }
                //... and run a function that will display the correct step indicator:
                fixStepIndicator(n)
            }
            function nextPrev(n) {
                // This function will figure out which tab to display
                // นำค่าที่ได้จาก class tab มาเก็บไว้ที่ตัวเเปร x
                var x = document.getElementsByClassName("tab");
                // Exit the function if any field in the current tab is invalid:
                //เช็คข้อมูลว่ามีใน textbox หรือไม่ ไปเช็คที่ฟังก์ชัน validateForm เเละ retrun false ไป 
                if (n == 1 && !validateForm()) return false;
                // Hide the current tab:
                
                x[currentTab].style.display = "none";
                // Increase or decrease the current tab by 1:
                currentTab = currentTab + n;
                // if you have reached the end of the form...
                if (currentTab >= x.length) {
                    // ... the form gets submitted:
                    document.getElementById("addprojectfrom").submit();
                    
                }
                // Otherwise, display the correct tab:
                showTab(currentTab);
            }


            function uploadPrev(n) {
                // This function will figure out which tab to display
                // นำค่าที่ได้จาก class tab มาเก็บไว้ที่ตัวเเปร x
                var x = document.getElementsByClassName("tab");
                // Exit the function if any field in the current tab is invalid:
                //เช็คข้อมูลว่ามีใน textbox หรือไม่ ไปเช็คที่ฟังก์ชัน validateForm เเละ retrun false ไป 
                if (n == 1 && !validateForm()) return false;
                // Hide the current tab:
                
                x[currentTab].style.display = "none";
                // Increase or decrease the current tab by 1:
                currentTab = currentTab + n;
                // if you have reached the end of the form...
                if (currentTab >= x.length) {
                    // ... the form gets submitted:
                    document.getElementById("addeprojectfrom").submit();
                    return false;
                }
                // Otherwise, display the correct tab:
                showTabupload(currentTab);
            }
            function validateForm() {
                // This function deals with validation of the form fields
                var x, y, i, z, valid = true;
                x = document.getElementsByClassName("tab");
                y = x[currentTab].getElementsByTagName("input");
                z = x[currentTab].getElementsByTagName("select");
                // A loop that checks every input field in the current tab:
                for (i = 0; i < y.length; i++) {
                    // If a field is empty...
                    if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                    }
                }
                for (i = 0; i < z.length; i++) {
                    // If a field is empty...
                    if (z[i].value == "") {
                    // add an "invalid" class to the field:
                    z[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                    }
                }
                // If the valid status is true, mark the step as finished and valid:
                if (valid) {
                    document.getElementsByClassName("step")[currentTab].className += " finish";
                }
                return valid; // return the valid status
            }
            function fixStepIndicator(n) {
                // This function removes the "active" class of all steps...
                var i, x = document.getElementsByClassName("step");
                for (i = 0; i < x.length; i++) {
                    x[i].className = x[i].className.replace(" active", "");
                }
                //... and adds the "active" class on the current step:
                x[n].className += " active";
            }

           
        </script>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="js/plugins/pace.min.js"></script>
        <!-- Page specific javascripts-->
        <script type="text/javascript" src="js/plugins/chart.js"></script>
        
</body>
        
</html>