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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link href="css/app.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
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
        body {
            background-image: url("img/background-body-addproject-3.jpg");
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            -o-background-size: 100% 100%, auto;
            -moz-background-size: 100% 100%, auto;
            -webkit-background-size: 100% 100%, auto;
            background-size: 100% 100%, auto;
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
            display: block;
            width: 70%;
            margin-left: 20px;
            height: calc(1.6em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #6c757d;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        .input-ses{
            border-color: #38c172;
        }

        input.invalid {
            border-color: #e3342f;
        }

        textarea {
            display: block;
            flex: 0 0 91.6666666667%;
            max-width: 91.6666666667%;
            width: 91.6666666667%;
            margin-left: 20px;
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #6c757d;
            border-radius: 0.25rem;
            padding-right: 15px;
            padding-left: 15px;
        }

        /* Mark input boxes that gets an error on validation: */
        

        select {
            display: block;
            width: 70%;
            margin-left: 20px;
            height: calc(1.6em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #6c757d;
            border-radius: 0.25rem;
            transition: border-color 1s ease-in-out, box-shadow 0.15s ease-in-out;
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        select.invalid {
            border-color: #e3342f;
        }

        textarea.invalid {
            border-color: #e3342f;
        }

        input.success {
            border-color: #38c172;
        }

        select.success {
            border-color: #38c172;
        }

        textarea.success {
            border-color: #38c172;
        }

        textarea:focus, input:focus{
            outline: none;
        }
        
        *:focus {
            outline: none;
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

        .danger {
            background-color: #ffffcc;
            width: 30%;
            height: auto;
            
        }

        .danger_d {
            font-size: 15px;
            color: red; 
        }

        .form-control::placeholder {
            color: #6c757d;
            opacity: 1;
            font-size: 14px;
        }

    </style>
</head>

<body>
    <div class="addproject">
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
                            <span class="step font">3</span>
                        </div>
                        <center>
                            <h1>
                                <div class="containeradd textadd">กรอกรายละเอียดผลงาน</div>
                            </h1>
                        </center>
                        <form id="addprojectfrom" action="insertproject" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab">
                                <center><label for="text" class="" style="margin-top: -5px;">ขั้นตอนที่ 1</label><br></center>
                                <div class="container">

                                    <div class="align-self-start " style="margin-left: 30px;">
                                        <div class="form-group">
                                            <label for="text" class="text-left fontdetail" style="margin-top:-20px;">ชื่อเรื่อง(TH):<span style="color: red;font-size: 20;">*</span></label>
                                            <div class="col-sm-12">
                                                <textarea type="text" class="form-control" name="project_name" id="project_name"  oninput="this.className = ''" placeholder="ชื่อโครงงานภาษาไทย" rows="4" ></textarea>   
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="text-left fontdetail control-label" style="margin-top:-20px;">ชื่อเรื่อง(EN):<span style="color: red;font-size: 20;">*</span></label>
                                            <div class="col-sm-12">
                                                <textarea type="text" class="form-control" name="project_name_en" id="project_name_en" oninput="this.className = ''" placeholder="ชื่อโครงงานภาษาอังกฤษ" rows="4"  disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                
                                
                                    <div class="align-self-start " >
                                    <div class="container">
                                    <div class="row">
                                    <div class="col">
                                        <div class="form-group ">
                                            <label for="text" class="text-left fontdetail" style="margin-top:-20px;margin-left:30px;">เจ้าของโครงงาน:<span style="color: red;font-size: 20;">*<span class="danger_d">(ไม่ต้องระบุคำนำหน้า)</span></span></label>
                                            <div class="col-sm-11" style="margin-left:25px;">
                                                <label for="text" class="text-left fontdetail" style="margin-top:-20px;margin-left:25px;">คนที่ 1</label>
                                                <input type="text" class="form-control"  name="owner_p1" id="owner_p1" placeholder="กรุณากรอกชื่อของคุณ" oninput="this.className = ''" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="col-sm-11" style="margin-left:25px;">
                                                <label for="text" class="text-left fontdetail" style="margin-top:-20px;margin-left:25px;">คนที่ 3</label>
                                                <input type="text" class="form-control"  name="owner_p3" id="owner_p3" placeholder="กรุณากรอกชื่อของคุณ" oninput="this.className = ''" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="text" class="text-left fontdetail" style="margin-top:-20px;margin-left:40px;">อาจารย์ที่ปรึกษา:<span style="color: red;font-size: 20;">*</span></label>
                                            <div class="col-sm-11" style="margin-left:25px;">
                                                <input type="text" class="form-control"  name="advisor_p" id="advisor_p" placeholder="กรุณากรอกชื่ออาจารย์ที่ปรึกษา" oninput="this.className = ''" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group" >
                                            <label for="text" class="text-left fontdetail" style="margin-top: 5.6%;"></label>
                                            <div class="col-sm-11" style="margin-left:-25px;">
                                                <label for="text" class="text-left fontdetail" style="margin-top:-20px;margin-left:20px;">คนที่ 2</label>
                                                <div class="input-owner">
                                                    <input type="text" class="form-control"  name="owner_p2" id="owner_p2" placeholder="กรุณากรอกชื่อของคุณ" oninput="this.className = ''" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-sm-11" style="margin-left:-25px;">
                                                <label for="text" class="text-left fontdetail" style="margin-top:-23px;margin-left:20px;">คนที่ 4</label>
                                                <div class="input-owner">
                                                    <input type="text" class="form-control" name="owner_p4" id="owner_p4" placeholder="กรุณากรอกชื่อของคุณ" oninput="this.className = ''" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group " >
                                            <label for="text" class="text-left fontdetail" style="margin-top:-20px;">สาขาวิชา:<span style="color: red;font-size: 20;">*</span></label>
                                            <div class="col-sm-11" style="margin-left:-25px;">
                                                <select name="branch_project" class="form-control " id="branch_project" oninput="this.className = ''" disabled>
                                                    <option value="" disabled selected>เลือกสาขาวิชา</option>
                                                    @foreach($chk_branch as $branch)
                                                    <option value="{{$branch->branch_id}}">{{$branch->branch_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100">
                                    <div class="container">
                                    <div class="align-self-start" style="margin-left:80px;">
                                        <div class="form-group ">
                                            <label for="text" class="text-left fontdetail" style="margin-top:-20px;">ปีที่จัดทำเอกสาร:<span style="color: red;font-size: 20;">*<span class="danger_d" style="font-size: 14px;">(พ.ศ.)</span></span></label>
                                            <div class="col-sm-9">
                                                <!-- <input type="text" class="form-control"  name="year_project" id="year_project" maxlength="4" placeholder="กรอกปีที่จัดทำเอกสาร เช่น 2561" oninput="this.className = ''" disabled> -->
                                                <select name="year_project" class="form-control" id="year_project" oninput="this.className = ''" disabled>
                                                    <option value="" disabled selected>เลือกปีของเอกสาร</option>
                                                    @foreach($chk_year as $year)
                                                    <option value="{{$year->NO_Y}}">{{$year->year}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="text" class="text-left fontdetail" style="margin-top:-20px;">ชนิดเอกสาร:<span style="color: red;font-size: 20;">*</span></label>
                                            <div class="col-sm-9">
                                                <select name="type_project" class="form-control " id="type_project" oninput="this.className = ''" disabled>
                                                    <option value="" disabled selected>เลือกชนิดเอกสาร</option>
                                                    @foreach($chk_type as $type)
                                                    <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="text" class="text-left fontdetail" style="margin-top:-20px;">ประเภทเอกสาร:<span style="color: red;font-size: 20;">*</span></label>
                                            <div class="col-sm-9">
                                                <select name="genre_project" class="form-control" id="genre_project" oninput="this.className = ''" disabled>
                                                    <option value="" disabled selected>เลือกประเภท</option>
                                                    @foreach($chk_genre as $genre)
                                                    <option value="{{$genre->genre_id}}">{{$genre->genre_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="text" class="text-left fontdetail" style="margin-top:-20px;">หมวดหมู่เอกสาร:<span style="color: red;font-size: 20;">*</span></label>
                                            <div class="col-sm-9">
                                                <select name="category_project" class="form-control" id="category_project" oninput="this.className = ''" disabled>
                                                    <option value="" disabled selected>เลือกหมวดหมู่</option>
                                                    @foreach($chk_category as $category)
                                                    <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <div style="overflow:10px;">
                                <a href="homeBD"><button type="button" class="btnnn ">ยกเลิก</button></a>
                                </div>
                            </div>
                            <div class="tab">
                                <center><label for="text" class="">ขั้นตอนที่ 2</label><br></center>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                        <div class="align-self-start " style="margin-left:30px;">
                                            <div class="form-group">
                                                <label for="text" class="text-left fontdetail" style="margin-top:-20px;">คำอธิบายย่อ:<span style="color: red;font-size: 20;">* <span class="danger_d">ป้อนบทคัดย่อลงช่องข้างล่างนี้เพื่อหาคำสำคัญ</span></span></label>
                                                <div class="col-sm-11">
                                                    <textarea type="text" class="form-control" name="des_project" id="des_project" rows="7" oninput="this.className = ''" data-toggle="tooltip" data-placement="top" title="ใส่บทคัทย่อ หลังจากนั้นกดปุ่มค้นหาคำสำคัญ" ></textarea>
                                                </div><br>
                                                <center><button type="button" class="Sse_des" id="des_p" onClick="UpdateStatus()" >ค้นหาคำสำคัญ</button></center>
                                            </div>

                                        </div>
                                        <div class="align-self-start " style="margin-left:120px;">
                                            <div class="form-group">
                                                <label for="text" class="text-left fontdetail" style="margin-top:-20px;">คำสำคัญ1:</label>
                                                @if(!isset($_SESSION['keyid1']))
                                                <div class="col-sm-8" id="listkey1">
                                                    <input type="text" class="hol" name="keyword_project_1" id="keyword_project_1" >
                                                </div>
                                                @elseif(isset($_SESSION['keyid1']))
                                                <div class="col-sm-8" id="listkey1">
                                                    
                                                </div>
                                                @endif
                                                <div class="col-md-5" style="position: relative;margin-top: -2px;margin-left: 125px;">
                                                    <div class="list-group" id="show-list">

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="text" class="text-left fontdetail" style="margin-top:-20px;">คำสำคัญ2:</label>
                                                @if(!isset($_SESSION['keyid2']))
                                                <div class="col-sm-8" id="listkey2">
                                                    <input type="text" class="hol" name="keyword_project_2" id="keyword_project_2" >
                                                </div>
                                                @elseif(isset($_SESSION['keyid2']))
                                                <div class="col-md-5" style="position: relative;margin-top: -2px;margin-left: 125px;">
                                                    <div class="list-group2" id="show-list2">

                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="text" class="text-left fontdetail" style="margin-top:-20px;">คำสำคัญ3:</label>
                                                @if(!isset($_SESSION['keyid3']))
                                                <div class="col-sm-8" id="listkey3">
                                                    <input type="text" class="" name="keyword_project_3" id="keyword_project_3" >
                                                </div>
                                                @elseif(isset($_SESSION['keyid4']))
                                                <div class="col-md-5" style="position: relative;margin-top: -2px;margin-left: 125px;">
                                                    <div class="list-group3" id="show-list3">

                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="text" class="text-left fontdetail" style="margin-top:-20px;">คำสำคัญ4:</label>
                                                @if(!isset($_SESSION['keyid3']))
                                                <div class="col-sm-8" id="listkey4">
                                                    <input type="text" class="" name="keyword_project_4" id="keyword_project_4" >
                                                </div>
                                                @elseif(isset($_SESSION['keyid4']))
                                                <div class="col-md-5" style="position: relative;margin-top: -2px;margin-left: 125px;">
                                                    <div class="list-group4" id="show-list4">

                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="tab">
                                <center><label for="text" class="" style="margin-top: -5px;">ขั้นตูดอนที่ 3</label><br></center>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <center><label for="text" class="">อัปโหลดไฟล์บทคัดย่อ<span style="color: red;font-size: 20;">*</span></label><br></center>
                                            <center><p class="danger">เลือกไฟล์ต้องเป็น .pdf เท่านั้น</p></center>
                                            <input type="file" class="" name="filead" id="file_ad" accept=".pdf" required>      
                                            <div class="invalid-feedback">
                                                กรุณาเลือกไฟล์
                                            </div>
                                        
                                        
                                            <center><label for="text" class="">อัปโหลดไฟล์เล่มโครงงาน<span style="color: red;font-size: 20;">*</span></label><br></center>
                                            <center><p class="danger">เลือกไฟล์ต้องเป็น .pdf เท่านั้น</p></center>
                                            <input type="file" class="" name="fileproject" id="file_project" accept=".pdf" required>      
                                            <div class="invalid-feedback">
                                                กรุณาเลือกไฟล์
                                            </div>
                                        </div>
                                        
                                        <div class="col">
                                            <center><label for="text" class="">อัปโหลดไฟล์สไลด์นำเสนอ<span style="color: red;font-size: 20;">*</span></label><br></center>
                                            <center><p class="danger">เลือกไฟล์ต้องเป็น .pdf เท่านั้น</p></center>
                                            <input type="file" class="" name="fileslide" id="fileslide" accept=".pdf" required>      
                                            <div class="invalid-feedback">
                                                กรุณาเลือกไฟล์
                                            </div>
                                       
                                            <center><label for="text" class="">อัปโหลดไฟล์โปสเตอร์<span style="color: red;font-size: 20;">*</span></label><br></center>
                                            <center><p class="danger">เลือกไฟล์ต้องเป็น .pdf เท่านั้น</p></center>
                                            <input type="file" class="" name="filepost" id="filepost" accept=".pdf" required>      
                                            <div class="invalid-feedback">
                                                กรุณาเลือกไฟล์
                                            </div>
                                        </div>
                                      
                                        <div class="w-100">
                                            <center><label for="text" class="">วางลิ้ง Source Code<span style="color: red;font-size: 20;">*</span></label><br></center>
                                            <div class="form-group">
                                            <center><div class="col-sm-8">
                                                    <input type="text" class="form-control" name="linkcode" id="linkcode">
                                                </div></center>
                                            </div>
                                        </div>
                                        <div class="w-100">
                                            <div class="col">
                                                <center><label for="text" class="">อัปโหลดไฟล์เอกสารตรวจสอบเอกสาร<span style="color: red;font-size: 20;">*</span></label><br></center>
                                                <center><p class="danger_d">**กรุณาตรวจสอบเอกสารผ่านเว็บไซต์นี้<a href="https://www.prepostseo.com/plagiarism-checker" target="_blank">คลิก</a>เเละทำการดาวน์โหลดไฟล์เอกสารเพื่อนำมาอัปโหลด**</p></center>
                                                <center><div style="width: 40%;">
                                                    <input type="file" class="" name="fileproject_chk" id="file_project_chk" accept=".pdf" required>      
                                                    <div class="invalid-feedback">
                                                        กรุณาเลือกไฟล์
                                                    </div>
                                                </div></center>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>

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
    </div>

  
    <script>
        function setFocusToTextBox(){
            $("#project_name").focus();
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

    <script>
       let SpacialCharacter = /[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
        //จับ Event key
        $('textarea[type=text]').on("keypress", function(event) {
            var keyChar = String.fromCharCode(event.keyCode);

            var output = SpacialCharacter.test(keyChar);
                
            var text = $(this).val();
            
            $(this).val(text.replace(SpacialCharacter, ''));
            
            
            console.log(event.key);
            
            return !output;
        });

        $('textarea[type=text]').bind('paste', function (e){
            //keydown or keyup
            $(e.target).keyup(getInput);
        });
        
        function getInput(e){
                var inputText = $(e.target).val();
            $(this).val(inputText.replace(SpacialCharacter, ''));
                $(e.target).unbind('keyup');
        }

    </script>

    <script type="text/javascript">
        function UpdateStatus(){
            var var1= document.getElementById("des_project").value;
            $.ajax({
                    method:"GET",
                    url:"{{route('adddes_project')}}",    
                    data:{'data1':var1},
                    success:function(responsedata){
                        // $('#keyword_project_1').html(responsedata);
                    }
            })
        }     
    </script>

    <script type="text/javascript">
        $("#project_name").keyup(function(){
            var pattern_thai = /^[ก-๏\s]+$/u;
            var input_name_th = $("#project_name").val();
            if(input_name_th !='') {
                if(!input_name_th.match(pattern_thai)){
                    alert("กรุณากรอกชื่อโครงงานภาษาไทย ให้ถูกต้อง");
                    return false;
                }         
            }
            else{

            }
        });

        $("#project_name_en").keyup(function(){
            var pattern_eng = /^[a-zA-Z\s]+$/;
            var input_name_en = $("#project_name_en").val();
            if(input_name_en !='') {
                if(!input_name_en.match(pattern_eng)){
                    alert("กรุณากรอกชื่อโครงงานภาษาอังกฤษ ให้ถูกต้อง");
                    return false;
                }
            }
            else{

            }
                       
        });
    </script>

    <script type="text/javascript">
        $("#des_p").bind("click", function() {
            var des = document.getElementById("des_project").value;
            $.ajax({
                    method:"GET",
                    url:"{{route('list_keyword')}}",    
                    data:{key1:des},
                    success:function(response){
                        $('#listkey1').html(response);
                        
                    }
                })
        });

        $("#des_p").bind("click", function() {
            var des = document.getElementById("des_project").value;
            $.ajax({
                    method:"GET",
                    url:"{{route('list_keyword')}}",    
                    data:{key2:des},
                    success:function(response){
                        $('#listkey2').html(response);
                        
                    }
                })
        });

        $("#des_p").bind("click", function() {
            var des = document.getElementById("des_project").value;
            $.ajax({
                    method:"GET",
                    url:"{{route('list_keyword')}}",    
                    data:{key3:des},
                    success:function(response){
                        $('#listkey3').html(response);
                        
                    }
                })
        });

        $("#des_p").bind("click", function() {
            var des = document.getElementById("des_project").value;
            $.ajax({
                    method:"GET",
                    url:"{{route('list_keyword')}}",    
                    data:{key4:des},
                    success:function(response){
                        $('#listkey4').html(response);
                        
                    }
                })
        });
    </script>

    <script>
        // $('#owner_p1').click(function() {
        //         var data= document.getElementById("owner_p1").value;
        //         if(data!=''){
        //             document.getElementById("owner_p2").disabled = false;
        //             // document.getElementById("type_project").disabled = true;
        //         }else{
        //             document.getElementById("owner_p2").disabled = true;
        //         }
        //     })
    </script>

    <script>
        $(document).ready(function() {
            $('#project_name').keyup(function() {
                var data= document.getElementById("project_name").value;
                if(data!=''){
                    document.getElementById("project_name_en").disabled = false;
                    // document.getElementById("type_project").disabled = true;
                }else{
                    document.getElementById("project_name_en").disabled = true;
                }
            })
            $('#project_name_en').keyup(function() {
                var data= document.getElementById("project_name_en").value;
                if(data!=''){
                    document.getElementById("owner_p1").disabled = false;
                    // document.getElementById("type_project").disabled = true;
                }else{
                    document.getElementById("owner_p1").disabled = true;
                }
            })
            $('#owner_p1').keyup(function() {
                var data= document.getElementById("owner_p1").value;
                if(data!=''){
                    document.getElementById("owner_p2").disabled = false;
                    // document.getElementById("type_project").disabled = true;
                }else{
                    document.getElementById("owner_p2").disabled = true;
                }
            })
            $('#owner_p2').keyup(function() {
                var data= document.getElementById("owner_p2").value;
                if(data!=''){
                    document.getElementById("owner_p3").disabled = false;
                    // document.getElementById("type_project").disabled = true;
                }else{
                    document.getElementById("owner_p3").disabled = true;
                }
            })
            $('#owner_p3').keyup(function() {
                var data= document.getElementById("owner_p3").value;
                if(data!=''){
                    document.getElementById("owner_p4").disabled = false;
                    // document.getElementById("type_project").disabled = true;
                }else{
                    document.getElementById("owner_p4").disabled = true;
                }
            })
            $('#owner_p1').keyup(function() {
                var data= document.getElementById("owner_p1").value;
                if(data!=''){
                    document.getElementById("advisor_p").disabled = false;
                    // document.getElementById("type_project").disabled = true;
                }else{
                    document.getElementById("advisor_p").disabled = true;
                }
            })
            $('#advisor_p').keyup(function() {
                var data= document.getElementById("advisor_p").value;
                if(data!=''){
                    document.getElementById("branch_project").disabled = false;
                    // document.getElementById("type_project").disabled = true;
                }else{
                    document.getElementById("branch_project").disabled = true;
                }
            })
            $('#branch_project').change(function() {
                var data= document.getElementById("branch_project").value;
                if(data!=''){
                    document.getElementById("year_project").disabled = false;
                    // document.getElementById("type_project").disabled = true;
                }else{
                    document.getElementById("year_project").disabled = true;
                }
            })
            $('#year_project').change(function() {
                var data= document.getElementById("year_project").value;
                if(data!=''){
                    document.getElementById("type_project").disabled = false;
                    // document.getElementById("type_project").disabled = true;
                }else{
                    document.getElementById("type_project").disabled = true;
                }
            })
            $('#type_project').change(function() {
                var data= document.getElementById("type_project").value;
                if(data!=''){
                    document.getElementById("genre_project").disabled = false;
                    // document.getElementById("type_project").disabled = true;
                }else{
                    document.getElementById("genre_project").disabled = true;
                }
            })
            $('#genre_project').change(function() {
                var data= document.getElementById("genre_project").value;
                if(data!=''){
                    document.getElementById("category_project").disabled = false;
                    // document.getElementById("type_project").disabled = true;
                }else{
                    document.getElementById("category_project").disabled = true;
                }
            })
        });
    </script>
        
    <!-- <script type="text/javascript">
        function UpdateStatus(){  
            //make an ajax call and get status value using the same 'id'
            var var1= document.getElementById("des_project").value;
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    method:"POST",
                    url:"{{route('des_project')}}",    
                    data:{data1:var1,_token: _token},
                    success:function(responsedata){
                        $('#hok').html(responsedata);
                    }
                })
            document.getElementById("keyword_project_1").disabled = false;
            document.getElementById("keyword_project_2").disabled = false;
            document.getElementById("keyword_project_3").disabled = false;
            document.getElementById("keyword_project_4").disabled = false;
        }
    </script> -->

    <script type="text/javascript">

        $(document).ready(function() {
            $('#keyword_project_1').keyup(function() {
                var key_p_1 = $(this).val();
                var _token = $('input[name="_token"]').val();
                if (key_p_1 != '') {
                    $.ajax({
                        url: "{{route('keyword_project')}}",
                        method: 'POST',
                        data: {
                            key_p_1: key_p_1,
                            _token: _token
                        },
                        success: function(response) {
                            $('#show-list').html(response);
                        }
                    });
                } else {
                    $('#show-list').html('');
                }
                $(document).on('click', 'a', function() {
                    $('#keyword_project_1').val($(this).text());
                    $('#show-list').html('');

                });
            });
        });

        $(document).ready(function() {
            $('#keyword_project_2').keyup(function() {
                var key_p_2 = $(this).val();
                var _token = $('input[name="_token"]').val();
                if (key_p_2 != '') {
                    $.ajax({
                        url: "{{route('keyword_project')}}",
                        method: 'POST',
                        data: {
                            key_p_2: key_p_2,
                            _token: _token
                        },
                        success: function(response) {
                            $('#show-list2').html(response);
                        }
                    });
                } else {
                    $('#show-list2').html('');
                }
                $(document).on('click', 'a', function() {
                    $('#keyword_project_2').val($(this).text());
                    $('#show-list2').html('');
                });
            });
        });

        $(document).ready(function() {
            $('#keyword_project_3').keyup(function() {
                var key_p_3 = $(this).val();
                var _token = $('input[name="_token"]').val();
                if (key_p_3 != '') {
                    $.ajax({
                        url: "{{route('keyword_project')}}",
                        method: 'POST',
                        data: {
                            key_p_3: key_p_3,
                            _token: _token
                        },
                        success: function(response) {
                            $('#show-list3').html(response);
                        }
                    });
                } else {
                    $('#show-list3').html('');
                }
                $(document).on('click', 'a', function() {
                    $('#keyword_project_3').val($(this).text());
                    $('#show-list3').html('');
                });
            });
        });

        $(document).ready(function() {
            $('#keyword_project_4').keyup(function() {
                var key_p_4 = $(this).val();
                var _token = $('input[name="_token"]').val();
                if (key_p_4 != '') {
                    $.ajax({
                        url: "{{route('keyword_project')}}",
                        method: 'POST',
                        data: {
                            key_p_4: key_p_4,
                            _token: _token
                        },
                        success: function(response) {
                            $('#show-list4').html(response);
                        }
                    });
                } else {
                    $('#show-list4').html('');
                }
                $(document).on('click', 'a', function() {
                    $('#keyword_project_4').val($(this).text());
                    $('#show-list4').html('');
                });
            });
        });
    </script>

    <script class="text/javascript">
        $('#type_project').change(function() {
            if ($(this).val() != "") {
                var type_project = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{route('insertproject')}}",
                    method: 'POST',
                    data: {
                        type_project: type_project,
                        _token: _token
                    }
                })
            }
        });

        $('#genre_project').change(function() {
            if ($(this).val() != "") {
                var genre_project = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{route('insertproject')}}",
                    method: 'POST',
                    data: {
                        genre_project: genre_project,
                        _token: _token
                    }
                })
            }
        });

        $('#category_project').change(function() {
            if ($(this).val() != "") {
                var category_project = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{route('insertproject')}}",
                    method: 'POST',
                    data: {
                        category_project: category_project,
                        _token: _token
                    }
                })
            }
        });
    </script>

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
                // document.getElementById("nextBtn").innerHTML = "ถัดไป";
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
            // h = document.getElementsByClassName("input-owner");
            // k = x[currentTab].getElementsByTagName("textarea");
            k = x[currentTab].getElementsByTagName("textarea");
            // y = x[currentTab].getElementsByTagName("input");
            z = x[currentTab].getElementsByTagName("select");
            
            

            // A loop that checks every input field in the current tab:
            // for (i = 0; i < 8; i++) {
                // If a field is empty...
                // if (y[0]) {
                //     if (y[0].value == "") {
                //     // add an "invalid" class to the field:
                //     y[0].className += " invalid";
                //     // and set the current valid status to false
                //     $(document).keyup(function() {
                       
                //             if(y[0].value == ""){
                //                 y[0].className += " invalid";
                //                 valid = false;
                //             }else{
                //                 y[0].className += " success";
                //             }
                //     })
                //     valid = false;
                //     }
                //     else if(y[0].value !== ""){
                //         y[0].className += " success";
                //         $(document).keyup(function() {
                            
                //             if(y[0].value == ""){
                //                 y[0].className += " success";
                                
                //                 valid = false;
                //             }else{
                //                 y[0].className += " invalid";
                //             }
                //         })
                //     }
                // }

                // if(y[2].value !== ""){
                //     if (y[2].value == "") {
                //     // add an "invalid" class to the field:
                //     y[2].className += " invalid";
                //     // and set the current valid status to false
                //     $(document).keyup(function() {
                       
                //             if(y[2].value == ""){
                //                 y[2].className += " invalid";
                //                 valid = false;
                //             }else{
                //                 y[2].className += " success";
                //             }
                //     })
                //     valid = false;
                //     }
                //     else if(y[2].value !== ""){
                //         y[2].className += " success";
                //         $(document).keyup(function() {
                            
                //             if(y[2].value == ""){
                //                 y[2].className += " success";
                                
                //                 valid = false;
                //             }else{
                //                 y[2].className += " invalid";
                //             }
                //         })
                //     }
                // }
                // else{
                //         valid = false;
                //     }
    
                
                // else if(y[i=2]) {
                //     if(y[2].value == "") {
                //     // add an "invalid" class to the field:
                //     y[2].className += " invalid";
                //     // and set the current valid status to false
                //     $(document).keyup(function() {
                       
                //         if(y[2].value == ""){
                //             y[2].className += " invalid";
                //             valid = false;
                //         }else{
                //             y[2].className += " success";
                //         }
                //     })
                //     valid = false;
                //     }
                //     else if(y[2].value !== ""){
                //         y[2].className += " success";
                //         $(document).keyup(function() {
                            
                //             if(y[2].value == ""){
                //                 y[2].className += " success";
                                
                //                 valid = false;
                //             }else{
                //                 y[2].className += " invalid";
                //             }
                //         })
                //     }
                // }
                

                // if (y[5].value == "") {
                //     // add an "invalid" class to the field:
                //     y[5].className += " invalid";
                //     // and set the current valid status to false
                //     $(document).keyup(function() {
                       
                //             if(y[5].value == ""){
                //                 y[5].className += " invalid";
                //                 valid = false;
                //             }else{
                //                 y[5].className += " success";
                //             }
                //     })
                //     valid = false;
                // }
                // else if(y[5].value !== ""){
                //     y[5].className += " success";
                //     $(document).keyup(function() {
                        
                //             if(y[5].value == ""){
                //                 y[5].className += " success";
                                
                //                 valid = false;
                //             }else{
                //                 y[5].className += " invalid";
                //             }
                            
                       
                //     })
                // }

                // if (y[6].value == "") {
                //     // add an "invalid" class to the field:
                //     y[6].className += " invalid";
                //     // and set the current valid status to false
                //     $(document).keyup(function() {
                       
                //             if(y[6].value == ""){
                //                 y[6].className += " invalid";
                //                 valid = false;
                //             }else{
                //                 y[6].className += " success";
                //             }
                //     })
                //     valid = false;
                // }
                // else if(y[6].value !== ""){
                //     y[6].className += " success";
                //     $(document).keyup(function() {
                        
                //             if(y[6].value == ""){
                //                 y[6].className += " success";
                                
                //                 valid = false;
                //             }else{
                //                 y[6].className += " invalid";
                //             }
                            
                       
                //     })
                // }

                // if (y[7].value == "") {
                //     // add an "invalid" class to the field:
                //     y[7].className += " invalid";
                //     // and set the current valid status to false
                //     $(document).keyup(function() {
                       
                //             if(y[7].value == ""){
                //                 y[7].className += " invalid";
                //                 valid = false;
                //             }else{
                //                 y[7].className += " success";
                //             }
                //     })
                //     valid = false;
                // }
                // else if(y[7].value !== ""){
                //     y[7].className += " success";
                //     $(document).keyup(function() {
                        
                //             if(y[7].value == ""){
                //                 y[7].className += " success";
                                
                //                 valid = false;
                //             }else{
                //                 y[7].className += " invalid";
                //             }
                            
                       
                //     })
                // }

                // if (y[8].value == "") {
                //     // add an "invalid" class to the field:
                //     y[8].className += " invalid";
                //     // and set the current valid status to false
                //     $(document).keyup(function() {
                       
                //             if(y[8].value == ""){
                //                 y[8].className += " invalid";
                //                 valid = false;
                //             }else{
                //                 y[8].className += " success";
                //             }
                //     })
                //     valid = false;
                // }
                // else if(y[8].value !== ""){
                //     y[8].className += " success";
                //     $(document).keyup(function() {
                        
                //             if(y[8].value == ""){
                //                 y[8].className += " success";
                                
                //                 valid = false;
                //             }else{
                //                 y[8].className += " invalid";
                //             }
                            
                       
                //     })
                // }
                
            // }
            for (i = 0; i < z.length; i++) {
                // If a field is empty...
                if (z[i].value == "") {
                    // add an "invalid" class to the field:
                    z[i].className += " invalid";
                    // and set the current valid status to false
                    $(document).change(function() {
                        for (i = 0; i < z.length; i++) {
                            if(z[i].value == ""){
                                z[i].className += " invalid";
                                
                                valid = false;
                            }else{
                                z[i].className += " success";
                            }
                            
                        }
                    })
                    valid = false;
                }
                else if(z[i].value !== ""){
                   
                    z[i].className += " success";
                    $(document).change(function() {
                        for (i = 0; i < z.length; i++) {
                            if(z[i].value == ""){
                                z[i].className += " success";
                                
                                valid = false;
                            }else{
                                z[i].className += " invalid";
                            }
                            
                        }
                    })
                }
            }
         
            // If a field is empty...
            for (i = 0; i < k.length; i++) {
                // If a field is empty...
                if (k[i].value == "") {
                    // add an "invalid" class to the field:
                    k[i].className += " invalid";
                    // and set the current valid status to false
                    $(document).change(function() {
                        for (i = 0; i < k.length; i++) {
                            if(k[i].value == ""){
                                k[i].className += " invalid";
                                
                                valid = false;
                            }else{
                                k[i].className += " success";
                            }
                            
                        }
                    })
                    valid = false;
                }
                else if(k[i].value !== ""){
                    k[i].className += " success";
                    $(document).change(function() {
                        for (i = 0; i < k.length; i++) {
                            if(k[i].value == ""){
                                k[i].className += " success";
                                
                                valid = false;
                            }else{
                                k[i].className += " invalid";
                            }
                            
                        }
                    })
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>

</body>

</html>