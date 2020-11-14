<!DOCTYPE html>
<html class="img-down">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <!-- Open Graph Meta-->
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv=”refresh” content="0;/homeBD">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- import icon -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font Athiti -->
    <link href="https://fonts.googleapis.com/css2?family=Athiti:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

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

        body {
            background-image: url("img/background-MDD.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        html {
            background-image: url("img/background-body-left.jpg");
            height: 100%;
            background-position: center 550px;
            background-repeat: no-repeat;
            background-size: cover;
        }

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

        .btn-login {
            height: 43px;
            margin-left: -20px;
            background-color: white;
            border-radius: 5px;
        }

        .img-top {
            background-image: url("img/background-body-addproject-5.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .img-down {
            background-image: url("img/background-body-addproject-2.jpg");
            height: 100%;
            background-position: center 550px;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .span-i-user {
            font-size: 33px;
            color: none;
            margin-left: -85px;
            margin-top: -1.5px;
            margin-right: -7px;
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

        .btn-outline-primaryy-sidenav {
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

        .font-Athiti {
            font-family: 'Athiti', sans-serif;
            font-weight: 600;
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
            color: blue;
        }

        a:hover{
            color: blue;
            
        }

        .front>a:hover {
            color: #F5F5F5;
            font-weight: bold;
            
        }

        .imghover:hover{
	        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border: 1 solid black;
        }


    </style>
</head>

<body class="img-top">

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

    @if($message = Session::get('logout'))
    <script>
        swal({
            title: "ออกจากระบบเรียบร้อย",
            icon: "success",
            button: "ตกลง",
        });
    </script>
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

    @if ($message = Session::get('successupdate'))
    <script>
        swal({
            title: "สร้างผลงานเรียบร้อย",
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
                        <form method="POST" action="{{URL::to('registers')}}">
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
    <div class="wrapper">
    <div class="app sidebar-mini ">
        <header class="app-header">
            <!-- font Athiti -->
            <nav class="app-menu navbar navbar-expand-lg navbar-light" style="height: 52px;">
            <a href="homeMDD" class="app-header__logo font-Athiti">ICTThesis</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- main.css-->
                <li class="app-search search-left">
                    <form action="{{URL::to('searchmdd')}}" method='GET' >
                       
                            <div class="input-group mb-3 app-search-input">
                                <input type="text" class="form-control" name='mddsearch' id="mddsearch" style="width: 400px;border-right: #fff;" placeholder="ค้นหา..." aria-label="ค้นหา..." aria-describedby="basic-addon2" autocomplete="off">
                                <div class="input-group-append" style="">
                                    <button class="input-group-text" id="basic-addon2" style="background-color: #fff;border-left: #fff;" ><i class="fa fa-search"></i></button>
                                </div>
                                </div>
                            </div>
                        
                            <!-- <input class="form-control " style="padding-right: 50%;" name='search' id="search" type="search" placeholder="ค้นหา..." autocomplete="off" ></div> -->
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
                            
                            
                        
                        </form>
                </li>
                <!-- <div class="app-navbar__overlay" data-toggle="sidebar" aria-label="Hide Sidebar"></div> -->
                <nav class="app-navmenu">
                    <li class="active1 menulink fontlink"><a href="homeMDD">หน้าเเรก</a></li>
                    <li class="active2 menulink fontlink"><a href="SearchAdvancemdd">ค้นหาเเบบละเอียด</a></li>
                    <li class="active3 menulink fontlink"><a href="#about">เกี่ยวกับ</a></li>
                    <li class="active4 menulink fontlink"><a href="#contact">ติดต่อ</a></li>
                </nav>
                <li style="margin-left: -10%;margin-right: 2%;">
                    <div class="links front" style="font-size: 20px;">
                    @if(!isset($_SESSION['status']) == 'userM' & !isset($_SESSION['statusA']) == 'admin')

                    @elseif (isset($_SESSION['status']) == 'user')
                        @if(!isset($_SESSION['project']))
                        <a href="addproject" style="font-weight: normal;"><span class="add-span"><i class="fas fa-plus-circle fa-lg " style="color: #A9A9A9;" title="สร้างผลงงานคุณ"></i> สร้างผลงงาน</span></a><br>
                        @elseif(isset($_SESSION['project']))
                        <a href="listdetil" style="font-weight: normal;" class="view"><span class="add-span"><i class="fas fa-book fa-lg " style="color: #A9A9A9;" title="ผลงงานคุณ"></i> ผลงงานคุณ</span></a><br>
                        @endif
                    @elseif (isset($_SESSION['statusA']) == 'admin')
                        <a href="{{URL::to('homeadmin')}}" style="font-weight: normal;" class="view"><span class="add-span"><i class="far fa-caret-square-left fa-lg" style="color: #A9A9A9;" title="กลับสู่หน้าผู้ดูเเลระบบ"></i> หน้าผู้ดูเเลระบบ</span></a><br>
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

                        // login admin
                        else  if (isset($_SESSION['statusA']) == 'admin') {
                        ?>
                            <li class="nav-item dropdown">
                           
                                
                                   
                                <a class="nav-link " id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @foreach($adminaccount as $img)
                                    <img class="rounded-circle user-sizes img-profile" src="{{URL::to('img_admin/'.$img->pathimg)}}" alt="USer Atver">

                                    @endforeach
                                    @foreach($adminaccount as $user)
                                    <div class="name-scle dropdown-toggle "><?php echo $user->admin_name; ?></div>
                                    @endforeach
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
                                                        <span class="caret"><?php echo $user->admin_name; ?></span>

                                                    </h5>
                                                    <span class="email"><?php echo $user->admin_email; ?></span>
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
        <aside class="app-sidebar" id="sidebar">
            <ul class="app-menu" >
                <li >
                    <div id="layoutSidenav" >
                        <div id="layoutSidenav_nav" >
                            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" >
                                <div class="sb-sidenav-menu" >
                                <div class="nav" >
                                    <br>
                                        <div class="sidenav" >
                                            <button class="dropdown-btn" style="border-top: 0.5px solid #000000;border-radius: 10%;">ระดับวิทยานิพนธ์
                                                <i class="fa fa-caret-down fa-lg" style="width: 20px;"></i>
                                            </button>
                                            <div class="dropdown-container">
                                                <a href="{{action('ProjectController@itemproject')}}" class="btn-default btn-outline-primaryy-sidenav " style="font-size:17px;">ปริญญาตรี</a>
                                                <a href="{{action('Project_MDDController@itemproject')}}" class="btn-default btn-outline-primaryy-sidenav " style="font-size:17px;">ปริญญาเอก โท</a>
                                            </div>
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
                </p>
            </ul>
        </aside>
        <div class="img-top">@yield('content')</div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
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
            $(window).scroll(function(){
                var scroll = $(window).scrollTop();
                $("#sidebar").css({
                    // width: (100 + scroll/5) + "%",
                    height: (161 + scroll/-10)+ "%"
                })
            })
           
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
        <!-- The javascript plugin to display page loading on top-->
        <script src="js/plugins/pace.min.js"></script>
        <!-- Page specific javascripts-->
    </div>

</body>

</html>