

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/addproject.css">
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"/>
    <title>project</title>
    <style>

        html {
            background-image: url("img/background-body-addproject-3.jpg");
        }

        .body1 {
            background-image: url("img/background-body-addproject-3.jpg");
        }
        .textadd {
            padding-left: 20px;
            padding-right: 20px;
            font-size: 18px;
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
            background-image: url("img/background-body-addproject-2.jpg");
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

        .drop-zone {
            max-width: 200px;
            height: 200px;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-family: "Quicksand", sans-serif;
            font-weight: 500;
            font-size: 20px;
            cursor: pointer;
            color: #cccccc;
            border: 4px dashed #009578;
            border-radius: 5px;
        }

        .drop-zone--over {
            border-style: solid;
        }

        .drop-zone__input {
            display: none;
        }

        .drop-zone__thumb {
            width: 100%;
            height: 100%;
            border-radius: 5px;
            overflow: hidden;
            background-color: #cccccc;
            background-size: cover;
            position: relative;
        }

        .drop-zone__thumb::after {
            content: attr(data-label);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 5px 0;
            color: #ffffff;
            background: rgba(0, 0, 0, 0.75);
            font-size: 14px;
            text-align: center;
        }

        .drop-zone-img {
            max-width: 500px;
            height: 300px;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-family: "Quicksand", sans-serif;
            font-weight: 500;
            font-size: 20px;
            cursor: pointer;
            color: #cccccc;
            border: 4px dashed #009578;
            border-radius: 5px;
        }

        .drop-zone-img--over {
            border-style: solid;
        }

        .drop-zone-img__input {
            display: none;
        }

        .drop-zone-img__thumb {
            width: 100%;
            height: 100%;
            border-radius: 5px;
            overflow: hidden;
            background-color: #cccccc;
            background-size: cover;
            position: relative;
        }

        .img-back {
            opacity: 0.5;
            /* width: 100%;
            height: 100%; */
            max-width: 500px;
            height: 300px;
            border-radius: 5px;
            background-size: cover;
            position: relative;
        }

        .img-logo {
            opacity: 0.5;
            /* width: 100%;
            height: 100%; */
            max-width: 200px;
            height: 200px;
            border-radius: 5px;
            background-size: cover;
            position: relative;
        }

        .drop-zone-img__thumb::after {
            content: attr(data-label);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 5px 0;
            color: #ffffff;
            background: rgba(0, 0, 0, 0.75);
            font-size: 14px;
            text-align: center;
        }

        .disappear {
            display: none;
        }


    </style>
</head> 
    <body class="body1">
    @if ($message = Session::get('yetdata'))
        <script>
        swal({
            title: "เกิดข้อมผิดพลาด",
            text: "ชื่อผู้ใช้มีผลงานอยู่เเล้ว",
            icon: "warning",
            button: "ตกลง",
        });
        </script>
    @endif

    @if ($message = Session::get('errordata'))
        <script>
        swal({
            title: "กรุณากรอกอีกครั้ง",
            text: "เนื่องจากท่านกรอกไม่ครบ",
            icon: "warning",
            button: "ตกลง",
        });
        </script>
    @endif
        <div class="border2">
        <ul class="app-breadcrumb breadcrumb magne-right">
            <li class="breadcrumb-item magne-right-text"><a href="{{action('ProjectController@itemproject')}}">หน้าหลัก</a></li>
            <li class="breadcrumb-item magne-right-text"><a href="#">เเสดงผลงาน</a></li>
        </ul><br>
            <div class="tile">
                <script language="JavaScript">
                    function showPreviewlogo(ele)
                    {
                            $('#showlogo').attr('src', ele.value); // for IE
                            if (ele.files && ele.files[0]) {
                                var reader = new FileReader();
                                
                                reader.onload = function (e) {
                                    $('#showlogo').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(ele.files[0]);
                            }
                    }

                    function showPreview(ele)
                    {
                            $('#showimage').attr('src', ele.value); // for IE
                            if (ele.files && ele.files[0]) {
                                var reader = new FileReader();
                                
                                reader.onload = function (e) {
                                    $('#showimage').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(ele.files[0]);
                            }
                    }

                   
                </script>

                <center><h1><div class="containeradd textadd" >เเก้ไขรายละเอียดผลงาน</div></h1></center>
                    <form id="addprojectfrom" action="{{url('insertBD')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">    
                            <center>
                            <div class="container my-4">
                                <label for="text" class="">โลโก้ผลงาน</label><br>
                                <div class="col-md-4">
                                        <img id="showlogo" style="background:#9d9d9d;width:170px;height:180px;" >
                                </div>

                                <label for="text" class="">ภาพโชว์ผลงาน</label><br>
                                <div class="col-md-4">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="table-responsive">
                                                    <img id="showimage" style="background:#9d9d9d;width:400px;height:250px;margin-left:-80px;" >
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="table-responsive">
                                                    <img id="showimage" style="background:#9d9d9d;width:400px;height:250px;margin-left:-80px;" >
                                                </div>
                                            </div>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" id="next" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a> 
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" id="prev" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">prev</span>
                                            </a>   
                                        </div>
                                    </div>            
                                </div>

                                <label for="text" class="">โลโก้</label><span class="text-muted">(.PNG)</span><br>
                                <input type="file" name="filelogo" id="fileimgToUpload" class="" OnChange="showPreviewlogo(this)"><br>

                                <label for="text" class="">ภาพโชว์ผลงาน</label><span class="text-muted">(.PNG)</span><br>
                                <input type="file" multiple name="fileimg[]" id="fileToUpload"  OnChange="showPreview(this)">
                                <!-- @if(!isset($_SESSION['project'])) {
                                    
                                } @elseif (isset($_SESSION['project'])){ -->
                                    
                                <!-- }

                                @endif -->
                                
                                   <!-- <img class="img-logo drop-zone__prompt" src="project\img_logo\" alt=""> -->
                                    <!-- <div class="drop-zone__thumb" data-label="myfile.txt"></div> --> 
                                    
                               
                                   
                            </center>

                            <center><label for="text" class="">เกี่ยวกับผลงาน</label><br></center>
                            
                            <input type="text" class="disappear" name="project_id">
                            <input type="text" class="disappear" name="user_id" >
                            <center style="margin-top:10px;margin-left:-40px;">ชื่อเรื่อง: <input type="text" class="" name="project_name" id="project_name"><br></center>
                            <center style="margin-top:10px;margin-left:-40px;">ชื่อเรื่องภาษาอังกฤษ: <input type="text" class="" name="project_name_en" id="project_name_en" ><br></center>
                            <center style="margin-top:10px;margin-left:-40px;">คำสำคัญ: <input type="text" class="" name="keyword_project" id="keyword_project" ><br></center>
                            <center style="margin-top:10px;margin-left:-71px;">คำอธิบายย่อ: <input type="text" class="input-tb" name="des_project" id="des_project" ><br></center>
                            <center style="margin-top:10px;margin-left:-63px;">เจ้าของ: <select name="owner_p" id="owner_p" class="input-tbb">
                                                                                            <option value="" disabled selected>เลือก</option>
                                                                @foreach($chk_user as $user)<option value="{{$user->owner_id}}">{{$user->owner_name}}</option>@endforeach
                                                                                        </select><br></center>
                            <center style="margin-top:10px;margin-left:-63px;">อาจารย์ที่ปรึกษา: <input type="text" class="input-tbb" name="advisor_p" id="advisor" ><br></center>

                            <center style="margin-top:10px;margin-left:-63px;">ชนิดเอกสาร: <select name="type_project" class="select-tbb" id="type_project" oninput="this.className = ''">
                                        <option value="" disabled selected>เลือกชนิดเอกสาร</option>
                                        @foreach($chk_type as $type)
                                            <option value="{{$type->type_id}}" >{{$type->type_name}}</option>
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
                            <center style="margin-top:10px;margin-left:-30px;">สาขา: <select name="branch_project" class="select-tbbbbb" id="branch_project" oninput="this.className = ''">
                                        <option value="" disabled selected>เลือกสาขา</option>
                                        @foreach($chk_branch as $branch)
                                            <option value="{{$branch->branch_id}}">{{$branch->branch_name}}</option>
                                        @endforeach
                                    </select><br></center>
 
                        <div style="overflow:10px;">
                            <div style="float:center;">
                                <a href="{{action('ProjectController@showdata')}}"><button type="button" class="btnp btnnn">ย้อนกลับ</button></a>
                            </div>
                            <div style="float:left; margin-left: 380px; margin-top: -41px;">
                                <button type="submit"class="btnn" >เพิ่ม</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>

        <script class="text/javascript">
            $("#owner_p").chosen();
        </script>

        <script class="text/javascript">
            $('#owner_p').change(function(){
                if($(this).val()!=""){
                    var owner_p=$(this).val();
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('insertBD')}}",
                        method:'POST',
                        data:{owner_p:owner_p,_token:_token}
                    })
                }
            });
            $('#type_project').change(function(){
                if($(this).val()!=""){
                    var type_project=$(this).val();
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('insertBD')}}",
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
                        url:"{{route('insertBD')}}",
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
                        url:"{{route('insertBD')}}",
                        method:'POST',
                        data:{category_project:category_project,_token:_token}
                    })
                }
            });

            $('#branch_project').change(function(){
                if($(this).val()!=""){
                    var branch_project=$(this).val();
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('insertBD')}}",
                        method:'POST',
                        data:{branch_project:branch_project,_token:_token}
                    })
                }
            });
        </script>

       
        <script src="js/formimg.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../themes/fas/theme.js" type="text/javascript"></script>
        <script src="../themes/explorer-fas/theme.js" type="text/javascript"></script>
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