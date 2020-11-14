<!DOCTYPE html>
<html >

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Twitter meta-->
    <!-- Open Graph Meta-->
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv=”refresh” content="0;/homeBD">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- import icon -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font Athiti -->
    <link href="https://fonts.googleapis.com/css2?family=Athiti:wght@400;500;600&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <title>ICTThesis</title>

    <style>
        .user-size {
            margin-top: -3px;
        }

        .user-sizes {
            width: 100px;
            margin-top: -6px;
            margin-left: 20px;
        }

        .content {
            margin-top: 8px;
        }

        .search-left {
            margin-left: 50px;
        }

        .top {
            margin-top: 5px;
        }

        .btn-login {
            height: 43px;
            margin-left: -20px;
            background-color: white;
            border-radius: 5px;
        }

        .name-scle {
            font-size: 16px;
            color: #000000;
            -ms-flex-item-align: center;
            align-self: center;
            margin-top: -30px;
            margin-left: 70px;
            font-family: 'Athiti', sans-serif;

        }

 
        .img-top {
            background-image: url("/img/background-BD-item.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            
        }

        .img-down {
            background-image: url("/img/background-body-addproject-2.jpg");
            height: 100%;
            background-position: center 550px;
            background-repeat: no-repeat;
            background-size: cover;
            /* opacity: 0.5; */
        }

        .span-i-user {
            font-size: 33px;
            color: none;
            margin-left: -85px;
            margin-top: -1.5px;
            margin-right: -7px;
        }

        .font-Athiti {
            font-family: 'Athiti', sans-serif;
            font-weight: 600;
        }

        .text-mage {
            font-size: 17px;
            margin-left: 40px;
            padding: 3px;
            margin-top: -35px;
        }

        .btn-outline-primaryy {
            color: #000000;
            /* background-color: #D9A327; */
            border-color: #D9A327;
        }

        .btn-outline-primaryy:hover {
            color: #D9A327;
            border-color: #D9A327;
        }

        .btn-outline-primaryy:focus,
        .btn-outline-primaryy.focus {
            box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.5);
        }

        .btn-outline-primaryy.disabled,
        .btn-outline-primaryy:disabled {
            color: #fff;
            background-color: transparent;
        }

        .btn-outline-primaryy:not(:disabled):not(.disabled):active,
        .btn-outline-primaryy:not(:disabled):not(.disabled).active,
        .show>.btn-outline-primaryy.dropdown-toggle {
            color: #fff;
            background-color: #D9A327;
            border-color: #fff;
        }

        .btn-outline-primaryy:not(:disabled):not(.disabled):active:focus,
        .btn-outline-primaryy:not(:disabled):not(.disabled).active:focus,
        .show>.btn-outline-primaryy.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.1rem #fff;
        }

        btn-outline-primaryy-sidenav {
            color: #000000;
            /* border-color: #D9A327; */
        }

        .btn-outline-primaryy-sidenav:hover {
            color: #D9A327;
            /* border-color: 1px solid #D9A327; */
            /* background-color: #D9A327; */
            text-decoration: underline;
        }

        .btn-outline-primaryy-sidenav:focus,
        .btn-outline-primaryy-sidenav.focus {
            box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.5);
        }

        .btn-outline-primaryy-sidenav.disabled,
        .btn-outline-primaryy-sidenav:disabled {
            color: #fff;
            background-color: transparent;
        }

        .btn-outline-primaryy-sidenav:not(:disabled):not(.disabled):active,
        .btn-outline-primaryy-sidenav:not(:disabled):not(.disabled).active,
        .show>.btn-outline-primaryy-sidenav.dropdown-toggle {
            color: #fff;
            background-color: #D9A327;
            border-color: #fff;
        }

        .btn-outline-primaryy-sidenav:not(:disabled):not(.disabled):active:focus,
        .btn-outline-primaryy-sidenav:not(:disabled):not(.disabled).active:focus,
        .show>.btn-outline-primaryy-sidenav.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.1rem #fff;
        }

        .btn-primaryyy {
            font-size: 18px;
            color: #fff;
            background-color: rgb(76, 175, 80);
            border-color: #707070;
        }

        .btn-primaryyy:hover {
            color: #fff;
            background-color: rgb(87, 212, 87);
            border-color: #707070;
        }

        .user-size-size {
            width: 100px;
        }

        .layoutname-top-BD {
            margin-left: 50px;

        }

        .layoutprovince-size-p {
            width: 42%;
        }

        .img-profile {
            width: 39px;
        }

        .img-user-size {
            width: 100%;
        }

        .D-layout {
            margin-left: 30px;
            margin-top: 30px;
            margin-right: -300px;
        }

        .size-img-re{
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            -o-background-size: 100% 100%, auto;
            -moz-background-size: 100% 100%, auto;
            -webkit-background-size: 100% 100%, auto;
            background-size: 100% 100%, auto;
        }

        .sidenav a, .dropdown-btn ,.dropdown-btn2,.dropdown-btn3{
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 18px;
            color: #000000;
            display: block;
            border: none;
            background: none;
            width: 95%;
            text-align: left;
            cursor: pointer;
            outline: none;
            margin-left: 5px;
            font-family: 'Athiti', sans-serif;
        }

        /* On mouse-over */
        .sidenav a:hover, .dropdown-btn:hover ,.dropdown-btn2:hover,.dropdown-btn3:hover{
            color: #D9A327;
        }

        /* Main content */
        .main {
            margin-left: 200px; /* Same as the width of the sidenav */
            font-size: 20px; /* Increased text to enable scrolling */
            padding: 0px 10px;
        }

        /* Add an active class to the active dropdown button */
        .active-item {
            color: black;
            border-color: none;
            
        }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
            display: block;
            background-color: #ffffff;
            padding-left: 8px;
        }

        /* Optional: Style the caret down icon */
        .fa-caret-down {
            float: right;
            padding-right: 8px;
        }

        .breadcrumb-detail {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding: .75rem 1rem;
            margin-bottom: 1rem;
            list-style: none;
            border-radius: .25rem;
        }

        a:active{
            color: #7B68EE;
            text-decoration: underline;
        }

        a:hover{
            color: #0099FF;
            text-decoration: underline;
        }

        .front>a:hover {
            color: #F5F5F5;
            font-weight: bold;
            
        }

        .imghover:hover{
	        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border: 1 solid black;
        }

        .labelmax{
            width:20px;
            overflow: hidden;
        }

        .breadcrumb-de {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            list-style: none;
            border-radius: 0.25rem;
        }

    </style>
</head>

<body style="font-family: 'Athiti', sans-serif;">
    <!-- successappproject -->
    @if ($message = Session::get('successappproject'))
    <script>
        swal({
            title: "เรียบร้อย",
            text: "ข้อมูลได้บันทึกเรียบร้อยเเล้ว",
            icon: "success",
            button: "ตกลง",
        });
    </script>
    @endif
    <!-- login pupup -->
    @if(isset($_SESSION['message'])){
    <script>
        swal({
            title: "ยินดีต้อนรับเข้าสู่ระบบ",
            icon: "success",
            button: "ตกลง",
        });
    </script>
    <?php unset($_SESSION['message']); ?>
    }
    @endif

    @if(isset($_SESSION['notpass'])){
    <script>
        swal({
            title: "รหัสผ่านของคุณผิด",
            icon: "error",
            button: "ตกลง",
        });
    </script>
    <?php unset($_SESSION['notpass']); ?>
    }
    @endif

    <!-- logout popup -->
    @if($message = Session::get('logout'))
    <script>
        swal({
            title: "ออกจากระบบเรียบร้อย",
            icon: "success",
            button: "ตกลง",
        });
    </script>
    @endif

    @if ($message = Session::get('successupdate'))
    <script>
        swal({
            title: "อัพเดทข้อมูลเรียบร้อย",
            icon: "success",
            button: "ตกลง",
        });
    </script>
    @endif

    @if ($message = Session::get('successregister'))
    <script>
        swal({
            title: "สมัครสมาชิกเรียบร้อย",
            icon: "success",
            button: "ตกลง",
        });
    </script>
    @endif
        @if(isset($_COOKIE['download'])?$_COOKIE['download']:'')
        @else
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        @foreach($item as $datas)
                        <h5 class="modal-title" id="exampleModalLongTitle">ดาวโหลดไฟล์เอกสาร<?php echo $datas->type_name ?></h5>
                        @endforeach
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{action ('ProjectController@downloadfile')}}" method="POST">
                            @csrf
                            @foreach($item as $datas)
                            <input type="text" name="project_id" id="project_id" style="display: none;" value="<?php echo $datas->project_id; ?>">
                            
                            @endforeach
                            @foreach($itemadmin as $datas)
                            <input type="text" name="project_id" id="project_id" style="display: none;" value="<?php echo $datas->project_id; ?>">
                            
                            @endforeach
                    </div>
                    
                    <button type="submit" target="_blank" class="btn btn-primary" id="button-download" onclick="myFunction()">ดาวโหลดไฟล์เอกสาร</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
       
            <!-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">ความพึ่งพอใจของเนื้อหา</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"> -->
                        <dialog id="myDialog" >
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">ความพึ่งพอใจของเนื้อหา</h5>
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                                <!-- <span aria-hidden="true">&times;</span> -->
                            <!-- </button> -->
                        </div>
                            <form action="{{URL::to('star')}}" method="GET">
                                @csrf
                                @foreach($item as $datas)
                                <input type="text" name="project_id" id="project_id" style="display: none;" value="<?php echo $datas->project_id; ?>">
                                @endforeach
                                @foreach($itemadmin as $datas)
                                <input type="text" name="project_id" id="project_id" style="display: none;" value="<?php echo $datas->project_id; ?>">
                                @endforeach
                                <div class="rateyo" name="rating" id="rating" data-rateyo-rating="5" data-rateyo-num-stars="5" data-rateyo-score="3">
                                </div>
                                <input type="hidden" name="rating">
                       

                        <button type="submit" class="btn btn-primary">ตกลง</button>
                        </form>
                        </div>
                         </div>
                        </dialog>
                    <!-- </div>
                </div>
            </div>
        </dialog> -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" style="margin-left:450px;margin-top:5px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body" style="margin-top:-5px;">
                    <h3>
                        <div class="card-header">{{ __('สมัครสมาชิก') }}</div>
                    </h3>
                    <div class="card-body">
                        <form method="POST" action="registers">
                            @csrf
                            <div class="container" style="margin-left:-4%;">
                                <div class="form-row" style="padding: 0px 0px 10px 0px;">
                                    <div class="col">
                                        <label for="text" style="margin-left: 10%;color:back;font-weight: bold;font-size: 16px;">ชื่อ </label><span style="color: red;font-size: 14px;"> (ไม่ต้องใส่คำนำหน้า)</span>
                                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{ old('firstname') }}" required autocomplete="off" autofocus placeholder="กรอกชื่อจริงของคุณ" autofocus>
                                    </div>
                                    <div class="col">
                                        <label for="text" style="margin-left: 10%;color:back;font-weight: bold;font-size: 16px;">นามสกุล</label>
                                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ old('lastname') }}" required autocomplete="off" autofocus placeholder="กรอกนามสกุลของคุณ" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-5">
                                            <label for="text" style="margin-left: 11%;color:back;font-weight: bold;font-size: 16px;">เพศ</label>
                                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                                <option value="" disabled selected>เลือกเพศ</option>
                                                <option value="ชาย">ชาย</option>
                                                <option value="หญิง">หญิง</option>
                                            </select>   
                                        </div>
                                        <div class="col-7">
                                            <label for="text" style="margin-left: 8%;color:back;font-weight: bold;font-size: 16px;">สาขาวิชา</label>
                                            <select name="branch" class="form-control @error('branch') is-invalid @enderror">
                                                <option value="" disabled selected>เลือกสาขาวิชา</option>
                                                @foreach($chk_branch as $branch)
                                                    <option value="{{$branch->branch_id}}">{{$branch->branch_name}}</option>
                                                @endforeach
                                            </select>   
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" style="margin-left: 5%;color:back;font-weight: bold;font-size: 16px;">ชื่อผู้ใช้</label>
                                    <input type="text" class="form-control" id="username_u" name="username" required autocomplete="off" placeholder="กรอกชื่อผู้ใช้ของคุณ" title="กรอกชื่อผู้ใช้ของคุณ">
                                </div>

                                <div class="form-group">
                                    <label for="text" style="margin-left: 5%;color:back;font-weight: bold;font-size: 16px;">ตั้งรหัสผ่าน</label>
                                    <input type="text" id="password_u" name="password" class="form-control" required autocomplete="off" placeholder="ตั้งรหัสผ่านอย่างน้อย 8 ตัว" title="กรอกรหัสผ่านอย่างน้อย 8 ตัว">
                                </div>

                                <div class="form-group">
                                    <label for="text" style="margin-left: 5%;color:back;font-weight: bold;font-size: 16px;">ยินยันรหัสผ่านอีกครั้ง</label>
                                    <input type="text" id="password-confirm" name="password_confirmation" class="form-control" required autocomplete="off" placeholder="กรอกรหัสผ่านอีกครั้ง" title="ยินยันรหัสผ่านอีกครั้ง">
                                </div>

                                <div class="form-group">
                                    <label for="text" style="margin-left: 6%;color:back;font-weight: bold;font-size: 16px;">อีเมล</label>
                                    <input type="email" name="email" class="form-control" placeholder="กรอกอีเมลของคุณ" title="กรอกอีเมลของคุณ" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row mb-0 layoutbutton-ok col-md-8 offset-md-4" >
                                <button type="submit" class=" btn btn-success " style="width: 100%;margin-left:-60px;font-size:16px;">
                                    {{ __('สมัคร') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app sidebar-mini ">
        <header class="app-header">
            <!-- font Athiti -->
            <nav class="app-menu navbar navbar-expand-lg navbar-light" style="height: 52px;">
            <a href="{{action('ProjectController@itemproject')}}" class="app-header__logo font-Athiti">ICTThesis</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- main.css-->
                <li class="app-search search-left">
                    <form action="{{URL::to('search')}}" method="GET">
                        <div class="input-group mb-3 app-search-input">
                            <input type="text" class="form-control" style="width: 400px;border-right: #fff;" placeholder="ค้นหา..." aria-label="ค้นหา..." aria-describedby="basic-addon2" autocomplete="off">
                            <div class="input-group-append" style="">
                                <button class="input-group-text" id="basic-addon2" style="background-color: #fff;border-left: #fff;" ><i class="fa fa-search"></i></button>
                            </div>
                            </div>
                        </div>
                            <div id="searchList">
                            </div>
                            <script>
                                var path="{{route('dropdownsearch')}}";
                                $('input.typehead').typehead({
                                    source:function (query,process){
                                        return $.data(path,{query:name},function (data){
                                            return process(data);
                                        });
                                    }
                                });
                                // $(document).ready(function(){
                                // $('#project_name').keyup(function(){ 
                                //         var keyword = $(this).val();
                                //         if(keyword != '')
                                //         {
                                //         var _token = $('input[name="_token"]').val();
                                //         $.ajax({
                                //         url:"{{ route('search') }}",
                                //         method:"GET",
                                //         data:{keyword:keyword, _token:_token},
                                //         success:function(data){
                                //         $('#search').fadeIn();  
                                //                     $('#searchList').html(data);
                                //         }
                                //         });
                                //         }
                                //     });
                                //     $(document).on('click', 'li', function(){  
                                //         $('#search').val($(this).text());  
                                //         $('#searchList').fadeOut();  
                                //     });  
                                // });
                            </script>
                            <!-- <button class="app-search__button" id="searchbt" ><i class="fa fa-search" ></i></button> -->
                            
                        
                        </form>
                </li>
                <!-- <div class="app-navbar__overlay" data-toggle="sidebar" aria-label="Hide Sidebar"></div> -->
                <nav class="app-navmenu ">
                    <li class="active1 menulink fontlink"><a href="{{action('ProjectController@itemproject')}}">หน้าเเรก</a></li>
                    <li class="active2 menulink fontlink"><a href="{{action('AutocompleteController@detailview')}}">ค้นหาเเบบละเอียด</a></li>
                    <li class="active3 menulink fontlink"><a href="#">เกี่ยวกับ</a></li>
                    <li class="active4 menulink fontlink"><a href="#">ติดต่อ</a></li>
                </nav>
                <li style="margin-left: -10%;margin-right: 2%;">
                    <div class="links front" style="font-size: 20px;">
                    @if(!isset($_SESSION['status']) == 'userM' & !isset($_SESSION['statusA']) == 'admin')

                    @elseif (isset($_SESSION['status']) == 'user')
                        @if(!isset($_SESSION['project']))
                        <a href="{{url ('addproject')}}" style="font-weight: normal;"><span class="add-span"><i class="fas fa-plus-circle fa-lg " style="color: #A9A9A9;" title="สร้างผลงงานคุณ"></i> สร้างผลงงาน</span></a><br>
                        @elseif(isset($_SESSION['project']))
                        <a href="{{url ('listdetil')}}" style="font-weight: normal;" class="view"><span class="add-span"><i class="fas fa-book fa-lg " style="color: #A9A9A9;" title="ผลงงานคุณ"></i> ผลงงานคุณ</span></a><br>
                        @endif
                    @elseif (isset($_SESSION['statusA']) == 'admin')
                    <div class="links front">
                    <a href="{{URL::to('homeadmin')}}" style="font-weight: normal;" class="view"><span class="add-span"><i class="far fa-caret-square-left fa-lg" style="color: #A9A9A9;" title="กลับสู่หน้าผู้ดูเเลระบบ"></i> หน้าผู้ดูเเลระบบ</span></a><br>
                    </div>
                    @endif

                    </div>
                </li>
                <div class="navbar-dark layoutaccout">
                    
                    <ul class="navbar-nav ml-auto ml-md-0">
                        <?php
                        if (!isset($_SESSION['status']) == 'user' & !isset($_SESSION['statusA']) == 'admin' & !isset($_SESSION['statusR']) == 'guest' & !isset($_SESSION['statusP']) == 'personnel') { ?>
                            <div class="front nav-item" style="margin-top: px;font-family: 'Athiti', sans-serif;font-size: 16px;margin-right:-100px;">
                                <a class="text-item" id="userDropdown" href="login" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn-login btn btn-outline-primaryy"><i class="fas fa-user-circle span-i-user"></i>
                                        <div class="text-mage" >เข้าสู่ระบบ</div>
                                    </button></a>
                                <div class="dropdown-menu dropdown-menu-right" style="margin-right: -10%;" aria-labelledby="userDropdown">
                                    <ul class="navbar-nav ml-auto" style="margin-right:-90px;">
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">

                                                <h3>
                                                    <div class="card-header" style="margin-right:-15%;">{{ __('เข้าสู่ระบบ') }}</div>
                                                </h3>
                                                <div class="" style="font-family: 'Athiti', sans-serif;font-size: 16px;">
                                                    <form method="POST" action="{{URL::to('loginBD')}}">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <input id="username" type="username" class="form-control @error('email') is-invalid @enderror" style="width: 210px;height: 40px;margin-left:31px;font-size: 16px;" name="username" value="<?php if(isset($_SESSION['username'])?$_SESSION['username']:''){ echo $_SESSION['username'];}?>" required autocomplete="username" autofocus placeholder="ชื่อผู้ใช้ของคุณ">

                                                                @error('username')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" style="width: 210px; height: 40px;margin-left:31px;font-size: 16px;" name="password" required autocomplete="current-password" placeholder="รหัสผ่านของคุณ">

                                                                @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-6 offset-md-4">
                                                                <div class="form-check" style="margin-left:-50px;">
                                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                    <label class="form-check-label" style="color: black;font-size: 14px;margin-top:-8%;" for="remember">
                                                                        {{ __('จดจำฉันไว้') }}
                                                                    </label>

                                                                    
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row mb-0">


                                                            <div class="col-md-8 offset-md-4">
                                                                @if (Route::has('password.request'))
                                                                <a class="btn btn-link btn-re" style="margin-top:-10px; margin-left: 5px; " href="{{ route('password.request') }}">
                                                                    {{ __('ลืมรหัสผ่านใช่หรือไม่?') }}
                                                                </a>
                                                                @endif
                                                                <button type="submit" class="btn btn-primaryyy" style="width: 210px; margin-left:-58px; ">
                                                                    ล็อกอิน
                                                                </button>

                                                                <div style="margin-left:-30px; margin-top: 10px;">คุณยังไม่มีบัญชี?</div>
                                                                <a type="submit" id="button" class="btn btn-link btn-layouts" style="margin-left:70px;margin-top:-49px;" href="#" data-toggle="modal" data-target="#exampleModalCenter">สร้างบัญชี</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <?php } else if (isset($_SESSION['status']) == 'user') {
                        ?>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link " id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(isset($_SESSION['pathimg'])?$_SESSION['pathimg']:'')
                                        @else
                                            <img class="rounded-circle user-sizes img-profile" src="{{URL::to('imgaccount/default.png')}}" alt="USer Atver">
                                    @endif
                                    <div class="name-scle dropdown-toggle ">{{$_SESSION['nameuser']}}</div>
                                    
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <ul class="navbar-nav ml-auto">
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <center>
                                                    <div class="image">
                                                        <a href="{{URL::to('profile')}}">
                                                        @if(isset($_SESSION['pathimg'])?$_SESSION['pathimg']:'')
                                                            @else
                                                                <img src="{{URL::to('imgaccount/default.png')}}" alt="" class="img-user-size user-avatar rounded-circle" />
                                                        @endif
                                                        </a>

                                                    </div>
                                                </center>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <span class="caret">{{$_SESSION['nameuser']}}</span>
                                                    </h5>
                                                        <span class="email">{{$_SESSION['emailuser']}}</span>
                                                        <br>
                                                        <span class="email">{{$_SESSION['ProgramName_TH']}}</span>
                                                        <br>
                                                        <span class="Department">คณะเทคโนโลยีสารสนเทศเเละการสื่อสาร</span>
                                                </div>
                                            </div>
                                            <center>
                                          
                                            <div class="top dropdown-item" >
                                                @if(!isset($_SESSION['project']))
                                                <a href="{{URL::to('addproject')}}" class="view" style="color: black;text-decoration: none;"><i class="fas fa-plus-circle" style="margin-right: 2%;"></i>สร้างผลงาน</a><br>
                                                @elseif(isset($_SESSION['project']))
                                                <a href="{{URL::to('listdetil')}}" class="view" style="color: black;text-decoration: none;"><i class="fas fa-book" style="margin-right: 2%;"></i>ผลงานของฉัน</a><br>
                                                @endif
                                            </div>
                                            <a class="dropdown-item" href="{{URL::to('logout')}}" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt" ></i>
                                                {{ __('ออกจากระบบ') }}
                                            </a></center>
                                            <form id="logout-form" action="{{URL::to('logout')}}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </ul>
                                </div>
                            </li>
                        <?php }

                        //*** login personnel ***/
                        else if (isset($_SESSION['statusP']) == 'personnel') { ?>
                            <li class="nav-item dropdown" style="margin-left: 30%;">
                                <a class="nav-link " id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(isset($_SESSION['pathimg'])?$_SESSION['pathimg']:'')
                                        @else
                                            <img class="rounded-circle user-sizes img-profile" src="{{URL::to('imgaccount/default.png')}}" alt="USer Atver">
                                    @endif
                                    <div class="name-scle dropdown-toggle ">{{$_SESSION['nameuser']}}</div>
                                    
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <ul class="navbar-nav ml-auto">
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <center>
                                                    <div class="image">
                                                        <a href="{{URL::to('profile')}}">
                                                        @if(isset($_SESSION['pathimg'])?$_SESSION['pathimg']:'')
                                                            <img src="{{URL::to('imgaccount/'.$_SESSION['pathimg'])}}" alt="" class="img-user-size user-avatar rounded-circle" />
                                                            @else
                                                                <img src="{{URL::to('imgaccount/default.png')}}" alt="" class="img-user-size user-avatar rounded-circle" />
                                                        @endif
                                                        </a>

                                                    </div>
                                                </center>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <span class="caret">{{$_SESSION['nameuser']}}</span>
                                                    </h5>
                                                        <span class="Department">{{$_SESSION['Department']}}</span><br>
                                                        <span class="Department">คณะเทคโนโลยีสารสนเทศเเละการสื่อสาร</span>
                                                </div>
                                            </div>

                                           
                                            <center>
                                            <a class="dropdown-item" href="{{URL::to('logout')}}" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt" ></i>
                                                {{ __('ออกจากระบบ') }}
                                            </a></center>
                                            <form id="logout-form" action="{{URL::to('logout')}}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </ul>
                                </div>
                            </li>
                        <?php }

                        //*** login register ***/
                        else if (isset($_SESSION['statusR']) == 'guest') { ?>
                            <li class="nav-item dropdown" style="margin-left: 30%;">
                                <a class="nav-link " id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(isset($_SESSION['pathimg'])?$_SESSION['pathimg']:'')
                                        <img src="{{URL::to('imgaccount/'.$_SESSION['pathimg'])}}" alt="" class="rounded-circle user-sizes img-profile" />
                                        @else
                                            <img class="rounded-circle user-sizes img-profile" src="{{URL::to('imgaccount/default.png')}}" alt="USer Atver">
                                    @endif
                                    <div class="name-scle dropdown-toggle ">{{$_SESSION['name']}}</div>
                                    
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <ul class="navbar-nav ml-auto">
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <center>
                                                    <div class="image">
                                                        <a href="{{URL::to('profile')}}">
                                                        @if(isset($_SESSION['pathimg'])?$_SESSION['pathimg']:'')
                                                            <img src="{{URL::to('imgaccount/'.$_SESSION['pathimg'])}}" alt="" class="img-user-size user-avatar rounded-circle" />
                                                            @else
                                                                <img src="{{URL::to('imgaccount/default.png')}}" alt="" class="img-user-size user-avatar rounded-circle" />
                                                        @endif
                                                        </a>

                                                    </div>
                                                </center>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <span class="caret">{{$_SESSION['name']}}</span>
                                                    </h5>
                                                        <span class="email">{{$_SESSION['email']}}</span>
                                                </div>
                                            </div>

                                           
                                            <center>
                                            <a class="dropdown-item" href="{{URL::to('logout')}}" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt" ></i>
                                                {{ __('ออกจากระบบ') }}
                                            </a></center>
                                            <form id="logout-form" action="{{URL::to('logout')}}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </ul>
                                </div>
                            </li>
                        <?php }

                        //*** loginadmin ***//
                        else  if (isset($_SESSION['statusA']) == 'admin') {?>
                            <li class="nav-item dropdown">
                                <a class="nav-link " id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @foreach($adminaccount as $img)
                                    <img class="rounded-circle user-sizes img-profile" src="{{URL::to('img_admin/'.$img->pathimg)}}" alt="USer Atver">

                                    @endforeach
                                    <div class="name-scle dropdown-toggle ">{{$_SESSION['adminname']}}</div>
                                    
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <ul class="navbar-nav ml-auto">
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <center>
                                                    <div class="image">
                                                        <a href="{{URL::to('profile')}}">
                                                            @foreach($adminaccount as $img)
                                                            <img src="{{URL::to('img_admin/'.$img->pathimg)}}" alt="" class="img-user-size user-avatar rounded-circle" />
                                                            @endforeach
                                                        </a>

                                                    </div>
                                                </center>
                                                <div class="content">
                                                    <h5 class="name">
                                                        @foreach($adminaccount as $user)
                                                        <span class="caret">{{$_SESSION['adminname']}}</span>

                                                    </h5>
                                                    <span class="email">{{$_SESSION['adminemail']}}</span>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <a href="{{URL::to('profileadmin')}}" class="top dropdown-item"><i class="fas fa-user" style="margin-right: 2%;"></i>โปรไฟล์</a>
                                            <div class="links front">
                                                <a href="{{URL::to('homeadmin')}}" class="view" style="color: black;text-decoration: none;"><i class="far fa-caret-square-left" style="margin-right: 2%;"></i>กลับสู่หน้าผู้ดูเเลระบบ</a><br>
                                            </div>
                                            <a class="dropdown-item" href="{{URL::to('logout')}}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                                {{ __('ออกจากระบบ') }}
                                            </a>
                                            <form id="logout-form" action="{{URL::to('logout')}}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                
            </div>
            </nav>
               
        </header>
        <div class="app-sidebar__overlay" data-toggle="sidebar" aria-label="Hide Sidebar"></div>
        <!-- app-sidebar css ของ main.css ส่วนของ เเท็บ ซ้ายมือ -->
        <aside class="app-sidebar">
            <ul class="app-menu">
                <li>
                    <div id="layoutSidenav">
                        <div id="layoutSidenav_nav">
                            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                                <div class="sb-sidenav-menu">
                                    <div class="nav">
                                        <div class="font-Athiti">
                                            <a href="{{action('ProjectController@itemproject')}}"><button type="button" class="btn-control btn-default btn-outline-primaryy " style="font-size:18px;">ปริญญาตรี</button></a>
                                            <a href="{{action('Project_MDDController@itemproject')}}"><button type="button" class="btn-control btn-default btn-outline-primaryy " style="font-size:18px;">ปริญญาเอก โท </button></a>
                                        </div><br>
                                            <div class="sidenav" >
                                                
                                            <button class="dropdown-btn" style="border-top: 0.5px solid #000000;border-radius: 10%;">ประเภท
                                                <i class="fa fa-caret-down fa-lg" style="width: 20px;"></i>
                                            </button>
                                                <div class="dropdown-container">
                                                    @foreach($chk_genre as $genre)
                                                    <a href="genre/{{$genre->genre_id}}" class=" btn-default btn-outline-primaryy-sidenav" style="font-size:17px;">{{$genre->genre_name}}</a>
                                                    <!-- <a href="#">โปรแกรมประยุกต์สำหรับอุปกรณ์เคลื่อนที่</a>
                                                    <a href="#">ไอโอที(IoT)</a>
                                                    <a href="#">ปัญญาประดิษฐ์(Ai)</a>
                                                    <a href="#">ไอโอที(IoT)</a>
                                                    <a href="#">ไอโอที(IoT)</a> -->
                                                    @endforeach
                                                </div>
                                            
                                        
                                            <button class="dropdown-btn" style="border-top: 0.5px solid #000000;border-radius: 10%;">หมวดหมู่
                                                <i class="fa fa-caret-down fa-lg" style="width: 20px;"></i>
                                            </button>
                                                <div class="dropdown-container">
                                                    @foreach($chk_category as $category)
                                                    <a href="category/{{$category->category_id}}" class="btn-default btn-outline-primaryy-sidenav" style="font-size:17px;">{{$category->category_name}}</a>
                                                    <!-- <a href="#">โปรแกรมประยุกต์สำหรับอุปกรณ์เคลื่อนที่</a>
                                                    <a href="#">ไอโอที(IoT)</a>
                                                    <a href="#">ปัญญาประดิษฐ์(Ai)</a>
                                                    <a href="#">ไอโอที(IoT)</a>
                                                    <a href="#">ไอโอที(IoT)</a> -->
                                                    @endforeach
                                                </div>
                                        

                                            <button class="dropdown-btn " style="border-top: 0.5px solid #000000;border-radius: 10%;">ชนิดเอกสาร
                                                <i class="fa fa-caret-down fa-lg" style="width: 20px;"></i>
                                            </button>
                                                <div class="dropdown-container">
                                                    @foreach($chk_type as $type)
                                                    <a href="typeproject/{{$type->type_id}}" class="btn-default btn-outline-primaryy-sidenav" style="font-size:17px;">{{$type->type_name}}</a>
                                                    <!-- <a href="#">โปรแกรมประยุกต์สำหรับอุปกรณ์เคลื่อนที่</a>
                                                    <a href="#">ไอโอที(IoT)</a>
                                                    <a href="#">ปัญญาประดิษฐ์(Ai)</a>
                                                    <a href="#">ไอโอที(IoT)</a>
                                                    <a href="#">ไอโอที(IoT)</a> -->
                                                    @endforeach
                                                </div>
                                        </div>

                                        </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </li>
                <style>
                    hr {
                        display: block;
                        unicode-bidi: isolate;
                        margin-inline-start: auto;
                        margin-inline-end: auto;
                        overflow: hidden;
                        border-style: inset;
                        border-width: 2px;
                    }
                </style>
                <p>
                    <hr>
                </p>

                <div class="layoutlogre">
                   
                </div>
                </li>
            </ul>
        </aside>

        <div class="rowcolumn1 img-top" >
            <div class="" style="margin-left:20%;width: 77%;">
            <div class="col-md-12" >
                <ul class="app-breadcrumb breadcrumb-de magne-right">
                    <li class="breadcrumb-item magne-right-text"><a href="{{action('ProjectController@itemproject')}}">หน้าหลัก</a></li>

                    @foreach($item as $datas)
                    <li class="breadcrumb-item magne-right-text" >
                        <label for="" data-toggle="tooltip" data-placement="top" title="{{$datas->project_name}}">
                            <?php 
                                $str = $datas->project_name;
                                $count = utf8_strlen($str);
                                create_str($count,$str,$datas);   
                            ?>
                        </label>
                    </li>
                    @endforeach

                    @foreach($itemadmin as $datas)
                    <li class="breadcrumb-item magne-right-text" >
                        <label for="" data-toggle="tooltip" data-placement="top" title="{{$datas->project_name}}">
                            <?php 
                                $str = $datas->project_name;
                                $count = utf8_strlen($str);
                                create_str($count,$str,$datas);   
                            ?>
                        </label>
                    </li>
                    @endforeach

                    <?php ?>

                </ul><br>
                <a href=""></a>
                <div class="tile" style="margin-top: -3%;">
                    <div class="tile-body">
                        <div class="row">
                            <div class="imgfromming">
                                @if(isset($item)?$item:'')
                                    @foreach($item as $datas)
                                    <div class="columnimgitem">
                                        <img src="{{URL::to('project/img_logo/'.$datas->logo)}}" alt="USer Atver" class="fromimg">
                                    </div>
                                    @endforeach
                                @else
                                    @foreach($itemadmin as $itemadmins)
                                    <div class="columnimgitem">
                                        <img src="{{URL::to('project/img_logo/'.$itemadmins->logo)}}" alt="USer Atver" class="fromimg">
                                    </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="text-N-d">
                            @if(isset($item)?$item:'')
                                @foreach($item as $datas)
                                <label for="text" style="font-size: 25px;padding: 10px 10px 10px 0px;"><?php echo $datas->project_name; ?></label>              
                                <div class="text-auth-d">
                                    <label for="text">คำสำคัญ : <?php echo $datas->keyword_project1; ?> <?php echo $datas->keyword_project2; ?> <?php echo $datas->keyword_project3; ?> <?php echo $datas->keyword_project4; ?></label>
                                </div>
                                <div class="text-auth-N-d">
                                    <label for="text">หมวดหมู่ : <?php echo $datas->genre_name; ?></label>
                                </div>
                                <div class="text-auth-N-d">
                                    <label for="text">ผู้จัดทำ : 
                                        <?php 
                                            $o1 = $datas->owner_p1;
                                            if(isset($o1)?$o1:''){
                                                echo $datas->owner_p1;
                                            }
                                            else{
                                                echo '-';
                                            }
                                            $o2 = $datas->owner_p2;
                                            if(isset($o2)?$o2:''){
                                                echo ', '.$datas->owner_p2;
                                            }
                                            $o3 = $datas->owner_p3;
                                            if(isset($o3)?$o3:''){
                                                echo ', '.$datas->owner_p2;
                                            }
                                            $o4 = $datas->owner_p4;
                                            if(isset($o4)?$o4:''){
                                                echo ', '.$datas->owner_p2;
                                            }
                                            
                                        ?>
                                    </label>
                                </div>
                                @endforeach
                            @else
                                @foreach($itemadmin as $datas)
                                <label for="text" style="font-size: 25px;padding: 10px 10px 10px 0px;"><?php echo $datas->project_name; ?></label>              
                                <div class="text-auth-d">
                                    <label for="text">คำสำคัญ : <?php echo $datas->keyword_project1; ?><?php echo $datas->keyword_project2; ?> <?php echo $datas->keyword_project3; ?> <?php echo $datas->keyword_project4; ?></label>
                                </div>
                                <div class="text-auth-N-d">
                                    <label for="text">หมวดหมู่ : <?php echo $datas->genre_name; ?></label>
                                </div>
                                <div class="text-auth-N-d">
                                    <label for="text">ผู้จัดทำ : <?php echo $datas->owner_p1; ?> <?php echo $datas->owner_p2; ?> <?php echo $datas->owner_p3; ?> <?php echo $datas->owner_p4; ?></label>
                                </div>
                                @endforeach
                            @endif
                            </div>
                        </div>
                        <hr>

                        <center>
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                @foreach($imgback as $datas)
                                <div class="carousel-inner">
                                    <div class="carousel-item active ">
                                        <div class="backgroundimgproject">
                                            <img class="size-img-re"  src="{{URL::to('project/img_backgrund/'.$datas->img_p_1)}}" alt="First slide">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="backgroundimgprojectt">
                                            <img class="size-img-re" src="{{URL::to('project/img_backgrund/'.$datas->img_p_2)}}" alt="Second slide">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="backgroundimgprojecttt">
                                            <img class="size-img-re" src="{{URL::to('project/img_backgrund/'.$datas->img_p_3)}}" alt="Third slide">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </center>

                        <!-- detailitem -->

                        <!-- <center>
                            <div class="container emp-profile textD">
                                <div class="row ">
                                    <div class="col-md-6 ">
                                        <ul class="nav nav-tabs " id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">รายละเอียด</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">ข้อมูลส่วนตัว</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </center> -->

                        <div class=" textDrow ">
                            <div class="tab-content profile-tab backgroundD" id="myTabContent">
                                <div class="tab-pane fade show active" >
                                    <div class="row ">
                                        <div class="col-md-6" style="width:100px">
                                            <div class="laout-text-d">
                                                @if(isset($item)?$item:'')
                                                    @foreach($item as $datas)
                                                    <div class="D-text D-layout">
                                                        <!-- <table style="width:100%" border=1> -->
                                                        <label for="" style="margin-left:50px;font-size: 20px;font-weight: bold;">รายละเอียด<?php echo $datas->type_name; ?></label>
                                                        <table style="width:100%;margin-left:80px;">
                                                            <tr>
                                                                <td style="vertical-align: baseline;" ><label for="text"><b>ชื่อเรื่อง :</b></label></td>
                                                                <td  colspan=1 style="width:70%;vertical-align: baseline;"><?php echo $datas->project_name; ?></td>
                                                            <tr>
                                                                <td style="vertical-align: baseline;" ><label for="text"><b>ชื่อเรื่องภาษาอังกฤษ :</b></label></td>
                                                                <td style="vertical-align: baseline;" colspan=1><?php echo $datas->name_en; ?></td>
                                                            <tr>
                                                                <td style="vertical-align: baseline;" ><label for="text"><b>เจ้าของโครงงาน :</b></label></td>
                                                                <td style="vertical-align: baseline;" colspan=1>
                                                                    <?php 
                                                                        $o1 = $datas->owner_p1;
                                                                        if(isset($o1)?$o1:''){
                                                                            echo $datas->owner_p1;
                                                                        }
                                                                        else{
                                                                            echo '-';
                                                                        }
                                                                        $o2 = $datas->owner_p2;
                                                                        if(isset($o2)?$o2:''){
                                                                            echo ', '.$datas->owner_p2;
                                                                        }
                                                                        $o3 = $datas->owner_p3;
                                                                        if(isset($o3)?$o3:''){
                                                                            echo ', '.$datas->owner_p2;
                                                                        }
                                                                        $o4 = $datas->owner_p4;
                                                                        if(isset($o4)?$o4:''){
                                                                            echo ', '.$datas->owner_p2;
                                                                        }
                                                                    ?>
                                                                </td>
                                                            <tr>
                                                                <td style="vertical-align: baseline;" ><label for="text"><b>อาจารย์ที่ปรึกษา :</b></label></td><?php $_SESSION['advisor_p']=$datas->advisor_p; ?>
                                                                <td style="vertical-align: baseline;" colspan=1><a href="{{url ('advisor_p')}} "><?php echo $datas->advisor_p; ?></a></td>
                                                            <tr>
                                                                <td style="vertical-align: baseline;"><label for="text"><b>คำสำคัญ :</b></label></td>
                                                                <td colspan=1 style="vertical-align: baseline;">
                                                                    <?php echo $datas->keyword_project1; ?>
                                                                    <?php echo $datas->keyword_project2; ?>
                                                                    <?php echo $datas->keyword_project3; ?>
                                                                    <?php echo $datas->keyword_project4; ?>
                                                                </td>
                                                            <tr>
                                                                <td style="vertical-align: baseline;"><label for="text" class=""><b>บทคัดย่อ :</b></label></td>
                                                                <td style="vertical-align: baseline;" colspan=1  ><?php echo $datas->des_project; ?></td>
                                                            </tr>
                                                        </table>
                                                        <!-- เช็ค ว่า มีข้อมูล ของข้อมูลจำเพาะมาหรือไม่ -->
                                                        <?php $chk = $datas->os_p; ?>
                                                        @if(isset($chk)?$chk:'')
                                                        <label for="" style="margin-left:50px;font-size: 20px;font-weight: bold;">ข้อมูลจำเพาะ</label>
                                                        <table style="width:100%;margin-left:80px;">
                                                            <tr>
                                                                <td style="vertical-align: baseline;"><label for="text"><b>ระบบปฏิบัติการ :</b></label></td>
                                                                <td colspan=1 style="width:70%;vertical-align: baseline;"><?php $os = $datas->os_p; if(isset($os)?$os:''){ echo $datas->os_p;}else{ echo '-';} ?></td>
                                                            <tr>
                                                                <td style="vertical-align: baseline;"><label for="text"><b>โปรเเกรมรันโปรเเกรม :</b></label></td>
                                                                <td colspan=1 style="vertical-align: baseline;"><?php $pro_run_p = $datas->pro_run_p; if(isset($pro_run_p)?$pro_run_p:''){ echo $datas->pro_run_p;}else{ echo '-';} ?></td>
                                                            <tr>
                                                                <td style="vertical-align: baseline;"><label for="text"><b>โปรเเกรมจำลองเซิฟเวอร์ :</b></label></td>
                                                                <td colspan=1 style="vertical-align: baseline;"><?php  $pro_server = $datas->pro_server; if(isset($pro_server)?$pro_server:''){ echo $datas->pro_server;}else{ echo '-';} ?></td>
                                                            <tr>
                                                                <td style="vertical-align: baseline;"><label for="text"><b>อื่นๆ :</b></label></td>
                                                                <td colspan=1 style="vertical-align: baseline;"><?php  $other_p = $datas->other_p; if(isset($other_p)?$other_p:''){ echo $datas->other_p;}else{ echo '-';} ?></td>
                                                            </tr>
                                                        </table>
                                                        @else
                                                        @endif
                                                        
                                                        <label for="" style="margin-left:50px;font-size: 20px;font-weight: bold;">ช่องทางการติดต่อ</label>
                                                        <table style="width:100%;margin-left:80px;">
                        
                                                            <tr>
                                                                <td style="vertical-align: baseline;"><label for="text"><b>Email :</b></label></td>
                                                                <td colspan=1 style="width:70%;vertical-align: baseline;"><?php $email = $datas->email_p; if(isset($email)?$email:''){echo $datas->email_p;}else{echo '-';} ?></td>
                                                            <tr>
                                                                <td style="vertical-align: baseline;"><label for="text"><b>Facebook :</b></label></td>
                                                                <td colspan=1 style="vertical-align: baseline;"><?php $facebook = $datas->facebook_p; if(isset($facebook)?$facebook:''){echo $datas->facebook_p;}else{echo '-';} ?></td>
                                                            <tr>
                                                                <td style="vertical-align: baseline;"><label for="text"><b>เบอร์โทรศัพท์ :</b></label></td>
                                                                <td colspan=1 style="vertical-align: baseline;"><?php $phone = $datas->phone_p; if(isset($phone)?$phone:''){echo $datas->phone_p;}else{echo '-';}  ?></td>
                                                            </tr>
                                                        </table>

                                                        <div class="">
                                                        <label for="" style="margin-left:50px;font-size: 20px;font-weight: bold;">เอกสารของ<?php echo $datas->type_name; ?></label>
                                                        @if(!isset($_SESSION['status'])=='user')
                                                            <div style="width:100%;margin-left:80px;opacity:0.5;">
                                                                <div class="container">
                                                                    <div class="row">
                                                                   
                                                                        @if(isset($filead)?$filead:'')
                                                                            @foreach($filead as $datas)
                                                                                <?php $file_a = $datas->fileA_name; ?>
                                                                                @if(isset($file_a)?$file_a:'')
                                                                                <div class="column-download-not" title="<?php echo $file_a = $datas->fileA_name; ?>">
                                                                                    <center><b><label for="" class="column-download-text-un">บทคัดย่อ</label></b></center>
                                                                                    <div class="column-download-icon">
                                                                                        <center><i class="fas fa-file-alt fa-2x" style="color:#FB00E0;"></i></center>
                                                                                    </div>
                                                                                </div>
                                                                                @else
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                        @endif

                                                                        @if(isset($filebook)?$filebook:'')
                                                                            @foreach($filebook as $datas)
                                                                                <?php $filebook = $datas->fileB_name; ?>
                                                                                @if(isset($filebook)?$filebook:'')
                                                                                <div class="column-download-not" title="<?php echo $filebook = $datas->fileB_name; ?>">
                                                                                    <center><b><label for="" class="column-download-text-un">เล่ม<?php echo $datas->type_name; ?></label></b></center>
                                                                                    <div class="column-download-icon">
                                                                                        <center><i class="fas fa-book-open fa-2x" style="color: #4100E3;"></i></center>
                                                                                    </div>
                                                                                </div>
                                                                                @else
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                        @endif

                                                                        @if(isset($filepostter)?$filepostter:'')
                                                                            @foreach($filepostter as $datas)
                                                                                <?php $filepostter = $datas->fileP_name; ?>
                                                                                @if(isset($filepostter)?$filepostter:'')
                                                                                <div class="column-download-not" title="<?php echo $filepostter = $datas->fileP_name; ?>">
                                                                                    <center><b><label for="" class="column-download-text-un">สไลด์นำเสนอ</label></b></center>
                                                                                    <div class="column-download-icon">
                                                                                        <center><i class="fab fa-slideshare fa-2x" style="color: #0C7BFA;"></i></center>
                                                                                    </div>
                                                                                </div>
                                                                                @else
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                        @endif

                                                                        @if(isset($fileslide)?$fileslide:'')
                                                                            @foreach($fileslide as $datas)
                                                                                <?php $fileslide = $datas->fileS_name; ?>
                                                                                @if(isset($fileslide)?$fileslide:'')
                                                                                <div class="column-download-not" title="<?php echo $fileslide = $datas->fileS_name; ?>">
                                                                                    <center><b><label for="" class="column-download-text-un">โปสเตอร์</label></b></center>
                                                                                    <div class="column-download-icon">
                                                                                        <center><i class="fas fa-paste fa-2x" style="color: #00E3AF;"></i></center>
                                                                                    </div>
                                                                                </div>
                                                                                @else
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                        @endif

                                                                        @if(isset($linkcode)?$linkcode:'')
                                                                            @foreach($linkcode as $datas)
                                                                                <?php $linkcode = $datas->path_code; ?>
                                                                                @if(isset($linkcode)?$linkcode:'')
                                                                                <div class="column-download-not" title="<?php echo $linkcode = $datas->path_code; ?>">
                                                                                    <center><b><label for="" class="column-download-text-un">ไฟล์โปรเเกรม</label></b></center>
                                                                                    <div class="column-download-icon">
                                                                                        <center><i class="fas fa-file-code fa-2x" style="color: #0AFF00;"></i></center>
                                                                                    </div>
                                                                                </div>
                                                                                @else
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                        @endif
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif(isset($_SESSION['status'])=='user')
                                                        <div style="width:100%;margin-left:80px;">
                                                            <div class="container">
                                                                <div class="row">
                                                                    @if(isset($filead)?$filead:'')
                                                                        @foreach($filead as $datas)
                                                                            @if(isset($datas)?$datas:'')
                                                                                @if(isset($_SESSION['download_a'])?$_SESSION['download_a']:'')
                                                                                <div class="column-download-after" title="<?php echo $datas->fileA_name; ?>">
                                                                                    <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                        <center><b><label for="" class="column-download-after-text" title="<?php echo $datas->fileA_name; ?>">บทคัดย่อ</label></b></center>
                                                                                        <div class="column-download-icon">
                                                                                            <center><i class="fas fa-file-alt fa-2x" style="color:#FB00E0;" title="<?php echo $datas->fileA_name; ?>"></i></center>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                                @else
                                                                                <div class="column-download" title="<?php echo $datas->fileA_name; ?>">
                                                                                    <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                        <center><b><label for="" class="column-download-text" title="<?php echo $datas->fileA_name; ?>">บทคัดย่อ</label></b></center>
                                                                                        <div class="column-download-icon">
                                                                                            <center><i class="fas fa-file-alt fa-2x" style="color:#FB00E0;" title="<?php echo $datas->fileA_name; ?>"></i></center>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                                @endif
                                                                            @else
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                    @endif

                                                                    @if(isset($filebook)?$filebook:'')
                                                                        @foreach($filebook as $datas)
                                                                            @if(isset($datas)?$datas:'')
                                                                                @if(isset($_SESSION['download'])?$_SESSION['download']:'')
                                                                                <div class="column-download-after" title="<?php echo $filebook = $datas->fileB_name; ?>">
                                                                                    <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                        <center><b><label for="" class="column-download-after-text">เล่ม<?php echo $datas->type_name; ?></label></b></center>
                                                                                        <div class="column-download-icon">
                                                                                            <center><i class="fas fa-book-open fa-2x" style="color: #4100E3;"></i></center>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                                @else
                                                                                <div class="column-download" title="<?php echo $filebook = $datas->fileB_name; ?>">
                                                                                    <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                        <center><b><label for="" class="column-download-text">เล่ม<?php echo $datas->type_name; ?></label></b></center>
                                                                                        <div class="column-download-icon">
                                                                                            <center><i class="fas fa-book-open fa-2x" style="color: #4100E3;"></i></center>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                                @endif
                                                                            @else
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                    @endif

                                                                    @if(isset($fileslide)?$fileslide:'')
                                                                        @foreach($fileslide as $datas)
                                                                            @if(isset($datas)?$datas:'')
                                                                                @if(isset($_SESSION['download_s'])?$_SESSION['download_s']:'')
                                                                                <div class="column-download-after" title="<?php echo $fileslide = $datas->fileS_name; ?>">
                                                                                    <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                        <center><b><label for="" class="column-download-after-text">สไลด์นำเสนอ</label></b></center>
                                                                                        <div class="column-download-icon">
                                                                                            <center><i class="fab fa-slideshare fa-2x" style="color: #0C7BFA;"></i></center>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                                @else
                                                                                <div class="column-download" title="<?php echo $fileslide = $datas->fileS_name; ?>">
                                                                                    <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                        <center><b><label for="" class="column-download-text">สไลด์นำเสนอ</label></b></center>
                                                                                        <div class="column-download-icon">
                                                                                            <center><i class="fab fa-slideshare fa-2x" style="color: #0C7BFA;"></i></center>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                                @endif
                                                                            @else
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                    @endif

                                                                    @if(isset($filepostter)?$filepostter:'')
                                                                        @foreach($filepostter as $datas)
                                                                            @if(isset($datas)?$datas:'')
                                                                                @if(isset($_SESSION['download_p'])?$_SESSION['download_p']:'')
                                                                                    <div class="column-download-after" title="<?php echo $filepostter = $datas->fileP_name; ?>">
                                                                                        <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                            <center><b><label for="" class="column-download-after-text">โปสเตอร์</label></b></center>
                                                                                            <div class="column-download-icon">
                                                                                                <center><i class="fas fa-paste fa-2x" style="color: #00E3AF;"></i></center>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="column-download" title="<?php echo $filepostter = $datas->fileP_name; ?>">
                                                                                        <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                            <center><b><label for="" class="column-download-text">โปสเตอร์</label></b></center>
                                                                                            <div class="column-download-icon">
                                                                                                <center><i class="fas fa-paste fa-2x" style="color: #00E3AF;"></i></center>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                                                @endif
                                                                            @else
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                    @endif

                                                                    @if(isset($linkcode)?$linkcode:'')
                                                                        @foreach($linkcode as $datas)
                                                                            @if(isset($datas)?$datas:'')
                                                                                @if(isset($_SESSION['download_l'])?$_SESSION['download_l']:'')
                                                                                    <div class="column-download-after" title="<?php echo $linkcode = $datas->path_code; ?>">
                                                                                        <a href="{{URL::to($datas->path_code)}}" target="_blank">
                                                                                            <center><b><label for="" class="column-download-after-text">ไฟล์โปรเเกรม</label></b></center>
                                                                                            <div class="column-download-icon">
                                                                                                <center><i class="fas fa-file-code fa-2x" style="color: #0AFF00;"></i></center>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="column-download" title="<?php echo $linkcode = $datas->path_code; ?>">
                                                                                        <a href="{{URL::to($datas->path_code)}}" target="_blank">
                                                                                            <center><b><label for="" class="column-download-text">ไฟล์โปรเเกรม</label></b></center>
                                                                                            <div class="column-download-icon">
                                                                                                <center><i class="fas fa-file-code fa-2x" style="color: #0AFF00;"></i></center>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                                                @endif
                                                                            @else
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                    @endif
                                                                
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @elseif(isset($_SESSION['statusR'])=='guest')
                                                        <div style="width:100%;margin-left:80px;">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <?php $file_d = $datas->namefile; ?>
                                                                    @if(isset($file_d)?$file_d:'')
                                                                        @if(isset($_SESSION['download_a'])?$_SESSION['download_a']:'')
                                                                            <div class="column-download-after" title="<?php echo $file_d = $datas->namefile; ?>">
                                                                                <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                    <center><b><label for="" class="column-download-after-text">บทคัดย่อ</label></b></center>
                                                                                    <div class="column-download-icon">
                                                                                        <center><i class="fas fa-file-alt fa-2x" style="color:#FB00E0;"></i></center>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        @else
                                                                            <div class="column-download" title="<?php echo $file_d = $datas->namefile; ?>">
                                                                                <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                    <center><b><label for="" class="column-download-text">บทคัดย่อ</label></b></center>
                                                                                    <div class="column-download-icon">
                                                                                        <center><i class="fas fa-file-alt fa-2x" style="color:#FB00E0;"></i></center>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- <p>ดาวน์โหลดไฟล์ข้อมูล<a href="#" class="a-layout" data-toggle="modal" data-target="#exampleModalLong">คลิก</a></p> -->
                                                        @else
                                                        <?php echo 'เกิดข้อผิดพลาด'; ?>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endforeach
                                        
                                            @else
                                                @foreach($itemadmin as $datas)
                                                <div class="D-text D-layout">
                                                <label for="" style="margin-left:50px;font-size: 20px;font-weight: bold;">รายละเอียด<?php echo $datas->type_name; ?></label>
                                                    <table style="width:100%;margin-left:80px;">
                                                        <tr>
                                                            <td style="vertical-align: baseline;"><label for="text"><b>ชื่อเรื่อง :</b></label></td>
                                                            <td colspan=1 style="width:70%;vertical-align: baseline;"><?php echo $datas->project_name; ?></td>
                                                        <tr>
                                                            <td style="vertical-align: baseline;"><label for="text"><b>ชื่อเรื่องภาษาอังกฤษ :</b></label></td>
                                                            <td colspan=1 style="vertical-align: baseline;"><?php echo $datas->name_en; ?></td>
                                                        <tr>
                                                            <td style="vertical-align: baseline;"><label for="text"><b>เจ้าของโครงงาน :</b></label></td>
                                                            <td colspan=1 style="vertical-align: baseline;"><?php echo $datas->owner_name; ?></td>
                                                        <tr>
                                                            <td style="vertical-align: baseline;"><label for="text"><b>อาจารย์ที่ปรึกษา :</b></label></td><?php $_SESSION['advisor_p']=$datas->advisor_p; ?>
                                                            <td colspan=1 style="vertical-align: baseline;"><a href="{{url ('advisor_p')}}"><?php echo $datas->advisor_p; ?></a></td>
                                                        <tr>
                                                            <td style="vertical-align: baseline;"><label for="text"><b>คำสำคัญ :</b></label></td>
                                                            <td colspan=1 style="vertical-align: baseline;">
                                                                <?php echo $datas->keyword_project1; ?>
                                                                <?php echo $datas->keyword_project2; ?>
                                                                <?php echo $datas->keyword_project3; ?>
                                                                <?php echo $datas->keyword_project4; ?>
                                                            </td>
                                                        <tr>
                                                            <td style="vertical-align: baseline;"><label for="text" class=""><b>บทคัดย่อ :</b></label></td>
                                                            <td colspan=1 style="vertical-align: baseline;" ><?php echo $datas->des_project; ?></td>
                                                        </tr>
                                                    </table>

                                                    <!-- !-- เช็ค ว่า มีข้อมูล ของข้อมูลจำเพาะมาหรือไม่ -->
                                                    <?php $chk = $datas->os_p; ?>
                                                    @if(isset($chk)?$chk:'')
                                                    <label for="" style="margin-left:50px;font-size: 20px;font-weight: bold;">ข้อมูลจำเพาะ</label>
                                                    <table style="width:100%;margin-left:80px;">
                                                        <tr>
                                                            <td style="vertical-align: baseline;"><label for="text"><b>ระบบปฏิบัติการ :</b></label></td>
                                                            <td colspan=1 style="width:70%;vertical-align: baseline;"><?php $os = $datas->os_p; if(isset($os)?$os:''){ echo $datas->os_p;}else{ echo '-';} ?></td>
                                                        <tr>
                                                            <td style="vertical-align: baseline;"><label for="text"><b>โปรเเกรมรันโปรเเกรม :</b></label></td>
                                                            <td colspan=1 style="vertical-align: baseline;"><?php $pro_run_p = $datas->pro_run_p; if(isset($pro_run_p)?$pro_run_p:''){ echo $datas->pro_run_p;}else{ echo '-';} ?></td>
                                                        <tr>
                                                            <td style="vertical-align: baseline;"><label for="text"><b>โปรเเกรมจำลองเซิฟเวอร์ :</b></label></td>
                                                            <td colspan=1 style="vertical-align: baseline;"><?php  $pro_server = $datas->pro_server; if(isset($pro_server)?$pro_server:''){ echo $datas->pro_server;}else{ echo '-';} ?></td>
                                                        <tr>
                                                            <td style="vertical-align: baseline;"><label for="text"><b>อื่นๆ :</b></label></td>
                                                            <td colspan=1 style="vertical-align: baseline;"><?php  $other_p = $datas->other_p; if(isset($other_p)?$other_p:''){ echo $datas->other_p;}else{ echo '-';} ?></td>
                                                        </tr>
                                                    </table>
                                                    @else
                                                    @endif

                                                    <label for="" style="margin-left:50px;font-size: 20px;font-weight: bold;">ช่องทางการติดต่อ</label>
                                                        <table style="width:100%;margin-left:80px;">
                        
                                                            <tr>
                                                                <td style="vertical-align: baseline;"><label for="text"><b>Email :</b></label></td>
                                                                <td colspan=1 style="width:70%;vertical-align: baseline;"><?php $email = $datas->email_p; if(isset($email)?$email:''){echo $datas->email_p;}else{echo '-';} ?></td>
                                                            <tr>
                                                                <td style="vertical-align: baseline;"><label for="text"><b>Facebook :</b></label></td>
                                                                <td colspan=1 style="vertical-align: baseline;"><?php $facebook = $datas->facebook_p; if(isset($facebook)?$facebook:''){echo $datas->facebook_p;}else{echo '-';} ?></td>
                                                            <tr>
                                                                <td style="vertical-align: baseline;"><label for="text"><b>เบอร์โทรศัพท์ :</b></label></td>
                                                                <td colspan=1 style="vertical-align: baseline;"><?php $phone = $datas->phone_p; if(isset($phone)?$phone:''){echo $datas->phone_p;}else{echo '-';}  ?></td>
                                                            </tr>
                                                        </table>

                                                    <label for="" style="margin-left:50px;font-size: 20px;font-weight: bold;">เอกสารของ<?php echo $datas->type_name; ?></label>
                                                    <div class="">

                                                    @if(!isset($_SESSION['status'])=='user')
                                                        <div style="width:100%;margin-left:80px;opacity:0.5;">
                                                            <div class="container">
                                                                <div class="row">
                                                                    @if(isset($filead)?$filead:'')
                                                                        @foreach($filead as $datas)
                                                                            <?php $file_a = $datas->fileA_name; ?>
                                                                            @if(isset($file_a)?$file_a:'')
                                                                            <div class="column-download-not" title="<?php echo $file_a = $datas->fileA_name; ?>">
                                                                                <center><b><label for="" class="column-download-text-un">บทคัดย่อ</label></b></center>
                                                                                <div class="column-download-icon">
                                                                                    <center><i class="fas fa-file-alt fa-2x" style="color:#FB00E0;"></i></center>
                                                                                </div>
                                                                            </div>
                                                                            @else
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                    @endif

                                                                    @if(isset($filebook)?$filebook:'')
                                                                        @foreach($filebook as $datas)
                                                                            <?php $filebook = $datas->fileB_name; ?>
                                                                            @if(isset($filebook)?$filebook:'')
                                                                            <div class="column-download-not" title="<?php echo $filebook = $datas->fileB_name; ?>">
                                                                                <center><b><label for="" class="column-download-text-un">เล่ม<?php echo $datas->type_name; ?></label></b></center>
                                                                                <div class="column-download-icon">
                                                                                    <center><i class="fas fa-book-open fa-2x" style="color: #4100E3;"></i></center>
                                                                                </div>
                                                                            </div>
                                                                            @else
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                    @endif

                                                                    @if(isset($filepostter)?$filepostter:'')
                                                                        @foreach($filepostter as $datas)
                                                                            <?php $filepostter = $datas->fileP_name; ?>
                                                                            @if(isset($filepostter)?$filepostter:'')
                                                                            <div class="column-download-not" title="<?php echo $filepostter = $datas->fileP_name; ?>">
                                                                                <center><b><label for="" class="column-download-text-un">สไลด์นำเสนอ</label></b></center>
                                                                                <div class="column-download-icon">
                                                                                    <center><i class="fab fa-slideshare fa-2x" style="color: #0C7BFA;"></i></center>
                                                                                </div>
                                                                            </div>
                                                                            @else
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                    @endif

                                                                    @if(isset($fileslide)?$fileslide:'')
                                                                        @foreach($fileslide as $datas)
                                                                            <?php $fileslide = $datas->fileS_name; ?>
                                                                            @if(isset($fileslide)?$fileslide:'')
                                                                            <div class="column-download-not" title="<?php echo $fileslide = $datas->fileS_name; ?>">
                                                                                <center><b><label for="" class="column-download-text-un">โปสเตอร์</label></b></center>
                                                                                <div class="column-download-icon">
                                                                                    <center><i class="fas fa-paste fa-2x" style="color: #00E3AF;"></i></center>
                                                                                </div>
                                                                            </div>
                                                                            @else
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                    @endif

                                                                    @if(isset($linkcode)?$linkcode:'')
                                                                        @foreach($linkcode as $datas)
                                                                            <?php $linkcode = $datas->path_code; ?>
                                                                            @if(isset($linkcode)?$linkcode:'')
                                                                            <div class="column-download-not" title="<?php echo $linkcode = $datas->path_code; ?>">
                                                                                <center><b><label for="" class="column-download-text-un">ไฟล์โปรเเกรม</label></b></center>
                                                                                <div class="column-download-icon">
                                                                                    <center><i class="fas fa-file-code fa-2x" style="color: #0AFF00;"></i></center>
                                                                                </div>
                                                                            </div>
                                                                            @else
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                    @endif
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- <table style="width:100%;margin-left:80px;" >
                                                            <thead >
                                                                <tr>
                                                                    <th ><center>บทคัดย่อ</center></th>
                                                                    <th><center>เล่ม</center></th>
                                                                    <th><center>สไลด์นำเสนอ</center></th>
                                                                    <th><center>โปสเตอร์</center></th>
                                                                    <th><center>ไฟล์โปรเเกรม</center></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr style="opacity: 0.5;">
                                                                    <td ><center><i class="fas fa-file-alt fa-2x" style="color:#FB00E0;"></i></center></td>
                                                                    <td><center><i class="fas fa-book-open fa-2x" style="color: #4100E3;"></i></center></td>
                                                                    <td><center><i class="fab fa-slideshare fa-2x" style="color: #0C7BFA;"></i></center></td>
                                                                    <td><center><i class="fas fa-paste fa-2x" style="color: #00E3AF;"></i></center></td>
                                                                    <td><center><i class="fas fa-file-code fa-2x" style="color: #0AFF00;"></i></center></td>
                                                                </tr>
                                                            </tbody>
                                                        </table> -->
                                                    @elseif(isset($_SESSION['status'])=='user')
                                                        <div style="width:100%;margin-left:80px;">
                                                            <div class="container">
                                                            <div class="row">
                                                                    <?php $file_d = $datas->namefile; ?>
                                                                    @if(isset($file_d)?$file_d:'')
                                                                        @if(isset($_SESSION['download_a'])?$_SESSION['download_a']:'')
                                                                        <div class="column-download-after" title="<?php echo $datas->namefile; ?>">
                                                                            <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                <center><b><label for="" class="column-download-after-text" title="<?php echo $datas->namefile; ?>">บทคัดย่อ</label></b></center>
                                                                                <div class="column-download-icon">
                                                                                    <center><i class="fas fa-file-alt fa-2x" style="color:#FB00E0;" title="<?php echo $datas->namefile; ?>"></i></center>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        @else
                                                                        <div class="column-download" title="<?php echo $datas->namefile; ?>">
                                                                            <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                <center><b><label for="" class="column-download-text" title="<?php echo $datas->namefile; ?>">บทคัดย่อ</label></b></center>
                                                                                <div class="column-download-icon">
                                                                                    <center><i class="fas fa-file-alt fa-2x" style="color:#FB00E0;" title="<?php echo $datas->namefile; ?>"></i></center>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        @endif
                                                                    @else
                                                                    @endif
                                                        
                                                                    <?php $file_b = $datas->namefile; ?>
                                                                    @if(isset($file_b)?$file_b:'')
                                                                        @if(isset($_SESSION['download'])?$_SESSION['download']:'')
                                                                        <div class="column-download-after" title="<?php echo $file_p = $datas->namefile; ?>">
                                                                            <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                <center><b><label for="" class="column-download-after-text">เล่ม<?php echo $datas->type_name; ?></label></b></center>
                                                                                <div class="column-download-icon">
                                                                                    <center><i class="fas fa-book-open fa-2x" style="color: #4100E3;"></i></center>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        @else
                                                                        <div class="column-download" title="<?php echo $file_p = $datas->namefile; ?>">
                                                                            <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                <center><b><label for="" class="column-download-text">เล่ม<?php echo $datas->type_name; ?></label></b></center>
                                                                                <div class="column-download-icon">
                                                                                    <center><i class="fas fa-book-open fa-2x" style="color: #4100E3;"></i></center>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        @endif
                                                                    @else
                                                                    @endif

                                                                    <?php $file_p = $datas->namefile; ?>
                                                                    @if(isset($file_p)?$file_p:'')
                                                                        @if(isset($_SESSION['download_s'])?$_SESSION['download_s']:'')
                                                                        <div class="column-download-after" title="<?php echo $file_p = $datas->namefile; ?>">
                                                                            <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                <center><b><label for="" class="column-download-after-text">สไลด์นำเสนอ</label></b></center>
                                                                                <div class="column-download-icon">
                                                                                    <center><i class="fab fa-slideshare fa-2x" style="color: #0C7BFA;"></i></center>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        @else
                                                                        <div class="column-download" title="<?php echo $file_p = $datas->namefile; ?>">
                                                                            <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                <center><b><label for="" class="column-download-text">สไลด์นำเสนอ</label></b></center>
                                                                                <div class="column-download-icon">
                                                                                    <center><i class="fab fa-slideshare fa-2x" style="color: #0C7BFA;"></i></center>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        @endif
                                                                    @else
                                                                    @endif

                                                                    <?php $file_post = $datas->namefile; ?>
                                                                    @if(isset($file_post)?$file_post:'')
                                                                        @if(isset($_SESSION['download_p'])?$_SESSION['download_p']:'')
                                                                            <div class="column-download-after" title="<?php echo $file_p = $datas->namefile; ?>">
                                                                                <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                    <center><b><label for="" class="column-download-after-text">โปสเตอร์</label></b></center>
                                                                                    <div class="column-download-icon">
                                                                                        <center><i class="fas fa-paste fa-2x" style="color: #00E3AF;"></i></center>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        @else
                                                                            <div class="column-download" title="<?php echo $file_p = $datas->namefile; ?>">
                                                                                <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                    <center><b><label for="" class="column-download-text">โปสเตอร์</label></b></center>
                                                                                    <div class="column-download-icon">
                                                                                        <center><i class="fas fa-paste fa-2x" style="color: #00E3AF;"></i></center>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                    @endif

                                                                    <?php $linkcode = $datas->namefile; ?>
                                                                    @if(isset($linkcode)?$linkcode:'')
                                                                        @if(isset($_SESSION['download_l'])?$_SESSION['download_l']:'')
                                                                            <div class="column-download-after" title="<?php echo $linkcode = $datas->path_code; ?>">
                                                                                <a href="{{URL::to($datas->path_code)}}" target="_blank" >
                                                                                    <center><b><label for="" class="column-download-after-text">ไฟล์โปรเเกรม</label></b></center>
                                                                                    <div class="column-download-icon">
                                                                                        <center><i class="fas fa-file-code fa-2x" style="color: #0AFF00;"></i></center>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        @else
                                                                            <div class="column-download" title="<?php echo $linkcode = $datas->path_code; ?>">
                                                                                <a href="{{URL::to($datas->path_code)}}" target="_blank" >
                                                                                    <center><b><label for="" class="column-download-text">ไฟล์โปรเเกรม</label></b></center>
                                                                                    <div class="column-download-icon">
                                                                                        <center><i class="fas fa-file-code fa-2x" style="color: #0AFF00;"></i></center>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                    @endif
                                                                
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @elseif(isset($_SESSION['status'])=='guest')
                                                        <div style="width:100%;margin-left:80px;">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <?php $file_d = $datas->namefile; ?>
                                                                    @if(isset($file_d)?$file_d:'')
                                                                        @if(isset($_SESSION['download_a'])?$_SESSION['download_a']:'')
                                                                            <div class="column-download-after" title="<?php echo $file_d = $datas->namefile; ?>">
                                                                                <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                    <center><b><label for="" class="column-download-after-text">บทคัดย่อ</label></b></center>
                                                                                    <div class="column-download-icon">
                                                                                        <center><i class="fas fa-file-alt fa-2x" style="color:#FB00E0;"></i></center>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        @else
                                                                            <div class="column-download" title="<?php echo $file_d = $datas->namefile; ?>">
                                                                                <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModalLong">
                                                                                    <center><b><label for="" class="column-download-text">บทคัดย่อ</label></b></center>
                                                                                    <div class="column-download-icon">
                                                                                        <center><i class="fas fa-file-alt fa-2x" style="color:#FB00E0;"></i></center>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- <p>ดาวน์โหลดไฟล์ข้อมูล<a href="#" class="a-layout" data-toggle="modal" data-target="#exampleModalLong">คลิก</a></p> -->
                                                    @else
                                                    <?php echo 'มีข้อมผิดพลาด'; ?>
                                                    @endif
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

        <script>
            $(function() {
                $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
                    var rating = data.rating;
                    $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
                    $(this).parent().find('.result').text('rating :' + rating);
                    $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
                });
            });
        </script>

        <script>
            function myFunction() {
                setTimeout(function(){ document.getElementById("myDialog").showModal(); }, 3000); 
                // $('#button-download').click(function(){
                //     var projectid = document.getElementById("project_id").value;
                //     var userid = document.getElementById("user_id").value;
                //     // var _token = $('input[name="_token"]').val();
                //     // console.log(user_id);
                //     $.ajax({
                //         type: "GET",
                //         url: "{{URL::to('download_use')}}",
                //         // contentType: "application/json; charset=utf-8",
                //         dataType="json",
                //         data: {projectid:'1',userid:'1'},
                //         success:function(data)
                //         {
                //             // // console.log(data);
                //             // alert(data);
                //             // // if(data !== ''){
                //             // //     setTimeout(function(){ document.getElementById("myDialog").showModal(); }, 3000);
                //             // // }else{

                //             // // }
                //         },

                //     });
                // });

            } 
            </script>
        <script>
            // Capture the "click" event of the link.
            var link = document.getElementById("the-link");
            link.addEventListener("click", function(evt) {
                // Stop the link from doing what it would normally do.
                evt.preventDefault();
                // Open the file download in a new window. (It should just
                // show a normal file dialog)
                window.open(this.href, "_blank");
                // Then redirect the page you are on to whatever page you
                // want shown once the download has been triggered.
                window.location = "/thank_you.html";
            }, true);
        </script>

        <script>
            /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
            test("dropdown-btn");
            test("dropdown-btn2");
            test("dropdown-btn3");
            test("dropdown-btn4");
            test("dropdown-btn5");
            test("dropdown-btn6");
            test("dropdown-btn7");
            function test(input){
                var dropdown2 = document.getElementsByClassName(input);
                var i;

                for (i = 0; i < dropdown2.length; i++) {
                    dropdown2[i].addEventListener("click", function() {
                    this.classList.toggle("active-item");
                    var dropdownContent = this.nextElementSibling;
                    if (dropdownContent.style.display === "block") {
                        dropdownContent.style.display = "none";
                    } else {
                        dropdownContent.style.display = "block";
                    }
                    });
                }
            }
        </script>

        <!-- <script>    
            $("#chk").click(function(){
                setTimeout(function () {
                    document.write( 'data-toggle=\"modal\" data-target=\"#exampleModalLong\"' );
                }, 5000);
            })
        </script> -->

        <!-- The javascript plugin to display page loading on top-->
        <script src="js/plugins/pace.min.js"></script>
        <!-- Page specific javascripts-->
        <!-- <script>
            $(window).scroll(function(){
                var scroll = $(window).scrollTop();
                $(".img-down .img-top").css({
                    width: (100 + scroll/5) + "%"
                })
            })
        </script> -->
    </div>
    <!-- Modal -->
    <?php
        function utf8_strlen($str){ 
            $c = strlen($str);
            $l = 0;
            for ($i = 0; $i < $c; ++$i)
            {
                if ((ord($str[$i]) & 0xC0) != 0x80)
                {
                    ++$l;
                }
            }
            return $l;
        } 

        

        function create_str($count,$str,$datas) {
            // echo $count;
            if($count>20 & $count<25) {
                $strcount = substr($str,0,-10);
                $strcount1 = substr($strcount,0,-8);
                $strcut = $strcount1."...";
                echo $strcut;
            }elseif($count>25 & $count<30){
                $strcount = substr($str,0,-10);
                $strcount1 = substr($strcount,0,-20);
                $strcut = $strcount1."...";
                echo $strcut;
            }elseif($count>30 & $count <40){
                $strcount = substr($str,0,-10);
                $strcount1 = substr($strcount,0,-8);
                $strcount2 = substr($strcount1,0,-10);
                $strcount3 = substr($strcount2,0,-8);
                $strcut = $strcount3."...";
                echo $strcut;
            }elseif($count>40 & $count <50){
                $strcount = substr($str,0,-50);
                $strcount1 = substr($strcount,0,-50);
                $strcount2 = substr($strcount1,0,-5);
                $strcut = $strcount2."...";
                echo $strcut;
            }elseif($count>50 & $count <80){
                $strcount = substr($str,0,-65);
                $strcount1 = substr($strcount,0,-50);
                $strcount2 = substr($strcount1,0,-5);
                $strcut = $strcount2."...";
                echo $strcut;
            }
            elseif($count>80 & $count <120){
                $strcount = substr($str,0,-65);
                $strcount1 = substr($strcount,0,-65);
                $strcount2 = substr($strcount1,0,-85);
                $strcount3 = substr($strcount2,0,-5);
                $strcut = $strcount3."...";
                echo $strcut;
            }else{
                echo $datas->project_name;
            }  
              
        }

        function check_rating($rating) {
            for($i=0;$i<$rating;$i++){
                echo '<i class="fas fa-star" style="color: #ffb712;"></i>';
            }
            for($i=0;$i < 5-$rating;$i++) {
                echo '<i class="far fa-star" style="color: #ffb712;"></i>';
            }
        }

        function create_star($svgrate){
            if(isset($svgrate)?$svgrate:''){
                if($svgrate < 2 & $svgrate> 0){
                    echo'<div class="rating">';
                        check_rating($svgrate);
                        if(isset($svgrate)?$svgrate:''){
                            echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><i class="fas fa-user" style="color: #A9A9A9;"></i>';
                        }
                    echo'</div>';
                }
                
                elseif($svgrate >= 2 & $svgrate < 3) {
                    echo'<div class="rating">';
                        check_rating($svgrate);
                        if(isset($svgrate)?$svgrate:''){
                            echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><i class="fas fa-user" style="color: #A9A9A9;"></i>';
                        }
                    echo '</div>';
                }
                
                elseif($svgrate >= 3 & $svgrate < 4) {
                    echo'<div class="rating">';
                        check_rating($svgrate);
                        if(isset($svgrate)?$svgrate:''){
                            echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><i class="fas fa-user" style="color: #A9A9A9;"></i>';
                        }
                    echo '</div>';
                }
                
                elseif($svgrate >= 4 & $svgrate < 5){
                    echo'<div class="rating">';
                        check_rating($svgrate);
                        if(isset($svgrate)?$svgrate:''){
                            echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><i class="fas fa-user" style="color: #A9A9A9;"></i>';
                        } 
                    echo'</div>';}
                
                elseif($svgrate >= 5){
                    echo'<div class="rating">';
                        check_rating($svgrate);
                        if(isset($svgrate)?$svgrate:''){
                            echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><i class="fas fa-user" style="color: #A9A9A9;"></i>';
                        }
                    echo'</div>';
                    }
                else{
                    echo'<div class="rating">';
                        check_rating($svgrate);
                        if(isset($svgrate)?$svgrate:''){
                            echo'<span class=""> ('.(round($svgrate, $precision = 1)).')</span><i class="fas fa-user" style="color: #A9A9A9;"></i>';
                        }
                    echo '</div>';}
            
                }
            else{
                echo'<div class="rating">';
                    check_rating(0);  echo'<span class="">(0)</span><i class="fas fa-user" style="color: #A9A9A9;"></i>';
                echo'</div>';
            }    
        }
      
    ?>
</body>

</html>