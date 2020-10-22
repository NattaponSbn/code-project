<?php 
     if(!isset($_SESSION['status'])=='user'){
        header( "refresh: 0; url=/homeBD" );
        exit(0);
    }
?>
<!DOCTYPE html>
<html lang="en" style="font-family: 'Athiti', sans-serif;">

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
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Athiti:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>project</title>
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
            /* padding-top: 30px;
            margin-left: 150px;
            margin-right: 150px; */
            width: 100%;
            margin-top: 40px;
        }

        .tile {
            /* background-color: #7CE1B5; */
            background-image: url("img/background-body-addproject-2.jpg");
            /* margin-left: 200px;
            margin-right: 200px; */
            width: 60%;
            position: center;

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
            border-radius: 10%;
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
            text-decoration: none;
        }

        .front>a:hover {
            color: #F5F5F5;
            font-weight: bold;
            text-decoration: none;
        }

        .danger_d {
            font-size: 15px;
            color: red; 
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
            color: #7B68EE;
            text-decoration: underline;
        }

        a:hover{
            color: #0099FF;
            text-decoration: underline;
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

        hr.new {
            border: 0.5px solid #fff;
            width: 90%;
        }

    </style>
</head>
@if ($message = Session::get('successupdate'))
<script>
    swal({
        title: "อัพเดทข้อมูลเรียบร้อย",
        icon: "success",
        button: "ตกลง",
    });
</script>
@endif

<body class="body1" style="font-family: 'Athiti', sans-serif;">
<div class="app sidebar-mini ">
        <header class="app-header">
            <!-- font Athiti -->
            <nav class="app-menu navbar navbar-expand-lg navbar-light" style="height: 52px;">
            <a href="{{action('ProjectController@itemproject')}}" class="app-header__logo font-Athiti" style="font-family: 'Athiti', sans-serif;">ICTThesis</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- main.css-->
          
                <!-- <div class="app-navbar__overlay" data-toggle="sidebar" aria-label="Hide Sidebar"></div> -->
                <nav class="app-navmenu " style="margin-left: 1100px;">
                    <li class="active1 menulink fontlink"><a href="{{action('ProjectController@itemproject')}}">หน้าเเรก</a></li>
                    <li class="active2 menulink fontlink"><a href="SearchAdvance">ค้นหาเเบบละเอียด</a></li>
                    <li class="active3 menulink fontlink"><a href="#">เกี่ยวกับ</a></li>
                    <li class="active4 menulink fontlink"><a href="#">ติดต่อ</a></li>
                </nav>
                <li style="margin-left: -10%;margin-right: 2%;">
                    <div class="links front" style="font-size: 20px;">
                        @if(!isset($_SESSION['status']) == 'userM' & !isset($_SESSION['statusA']) == 'admin')

                        @elseif (isset($_SESSION['status']) == 'user')
                            @if(!isset($_SESSION['project']))
                            <a href="addproject" class="view"><i class="far fa-plus-square fa-lg i-hover" title="สร้างผลงงานคุณ"></i></a><br>
                            @elseif(isset($_SESSION['project']))
                            <a href="listdetil" class="view"><i class="fas fa-book fa-lg i-hover" title="ผลงงานคุณ"></i></a><br>
                            @endif
                        @elseif (isset($_SESSION['statusA']) == 'admin')
                        <div class="links front">
                            <a href="homeadmin" class="view">กลับสู่หน้าผู้ดูเเลระบบ</a><br>
                        </div>
                        @endif
                    </div>
                </li>
                <div class="navbar-dark layoutaccout" style="margin-right: 50px;">
                    <ul class="navbar-nav ml-auto ml-md-0">
                        <?php
                        if (!isset($_SESSION['status']) == 'user' & !isset($_SESSION['statusA']) == 'admin') { ?>
                            <div class="front nav-item" style="margin-top: px;font-family: 'Athiti', sans-serif;font-size: 16px;margin-right:-100px;">
                                <a class="text-item" id="userDropdown" href="login" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn-login btn btn-outline-primaryy"><i class="fas fa-user-circle span-i-user"></i>
                                        <div class="text-mage" >เข้าสู่ระบบ</div>
                                    </button></a>
                                <div class="dropdown-menu dropdown-menu-right" style="margin-top: px;" aria-labelledby="userDropdown">
                                    <ul class="navbar-nav ml-auto" style="margin-right:-90px;">
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">

                                                <h3>
                                                    <div class="card-header" style="margin-right:-15%;">{{ __('เข้าสู่ระบบ') }}</div>
                                                </h3>
                                                <div class="" style="font-family: 'Athiti', sans-serif;font-size: 16px;">
                                                    <form method="POST" action="{{url ('loginBD')}}">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <input id="username" type="username" class="form-control @error('email') is-invalid @enderror" style="width: 210px;height: 40px;margin-left:31px;font-size: 16px;" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="ชื่อผู้ใช้ของคุณ">

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
                                    @foreach($imgaccount as $img)
                                    <img class="rounded-circle user-sizes img-profile" src="/imgaccount/<?php echo $img->pathimg; ?>" alt="USer Atver">

                                    @endforeach
                                    @foreach($imgaccount as $user)
                                    <div class="name-scle dropdown-toggle "><?php echo $user->name; ?></div>
                                    @endforeach
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <ul class="navbar-nav ml-auto">
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <center>
                                                    <div class="image">
                                                        <a href="profile">
                                                            @foreach($imgaccount as $img)
                                                            <img src="\imgaccount\<?php echo $img->pathimg; ?>" alt="" class="img-user-size user-avatar rounded-circle" />
                                                            @endforeach
                                                        </a>

                                                    </div>
                                                </center>
                                                <div class="content">
                                                    <h5 class="name">
                                                        @foreach($imgaccount as $user)
                                                        <span class="caret"><?php echo $user->name; ?></span>

                                                    </h5>
                                                    <span class="email"><?php echo $user->email; ?></span>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <a href="profile" class="top dropdown-item"><i class="fas fa-user" style="margin-right: 2%;"></i>โปรไฟล์</a>
                                            <div class="top dropdown-item" >
                                                @if(!isset($_SESSION['project']))
                                                <a href="addproject" class="view" style="color: black;text-decoration: none;"><i class="far fa-plus-square" style="margin-right: 2%;"></i>สร้างผลงาน</a><br>
                                                @elseif(isset($_SESSION['project']))
                                                <a href="listdetil" class="view" style="color: black;text-decoration: none;"><i class="fas fa-book" style="margin-right: 2%;"></i>ผลงานของฉัน</a><br>
                                                @endif
                                            </div>
                                            <a class="dropdown-item" href="logout" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt" ></i>
                                                {{ __('ออกจากระบบ') }}
                                            </a>
                                            <form id="logout-form" action="{{url ('logout')}}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </ul>
                                </div>
                            </li>
                        <?php }

                        // admin

                        else  if (isset($_SESSION['statusA']) == 'admin') {
                        ?>
                            <li class="nav-item dropdown">

                                <a class="nav-link " id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @foreach($adminaccount as $img)
                                    <img class="rounded-circle user-sizes img-profile" src="/img_admin/<?php echo $img->pathimg; ?>" alt="USer Atver">

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
                                                        <a href="profile">
                                                            @foreach($adminaccount as $img)
                                                            <img src="\img_admin\<?php echo $img->pathimg; ?>" alt="" class="img-user-size user-avatar rounded-circle" />
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

                                            <a href="{{url ('profileadmin')}}" class="top dropdown-item"><i class="fas fa-user" style="margin-right: 2%;"></i>โปรไฟล์</a>
                                            <div class="links front">
                                                <a href="'{{url ('homeadmin')}}" class="view" style="color: black;text-decoration: none;"><i class="far fa-caret-square-left" style="margin-right: 2%;"></i>กลับสู่หน้าผู้ดูเเลระบบ</a><br>
                                            </div>
                                            <a class="dropdown-item" href="logout" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                                {{ __('ออกจากระบบ') }}
                                            </a>
                                            <form id="logout-form" action="{{url ('logout')}}" method="POST" style="display: none;">
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
               
        </header><br>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
                <div class="border2 row justify-content-center">
                <ul class="breadcrumb-detail" style="margin-left:800px;">
                    <li class="breadcrumb-item active"><a href="{{action('ProjectController@itemproject')}}">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active"><a href="{{action('ListdataController@listdetil')}}">รายชื่อผลงาน</a></li>
                    <li class="breadcrumb-item"> รายละเอียดผลงาน(<?php echo $_SESSION['nameuser']; ?>)</li>
                </ul>
                    <!-- <ul class="app-breadcrumb breadcrumb magne-right">
                        <li class="breadcrumb-item magne-right-text"><a href="{{action('ProjectController@itemproject')}}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item magne-right-text"><a href="#">เเสดงผลงาน</a></li>
                    </ul><br> -->
            
                    <div class="tile" style="margin-left:20%;width: 60%;">
                        <script language="JavaScript">
                            function showPreviewlogo(ele) {
                                $('#showlogo').attr('src', ele.value); // for IE
                                if (ele.files && ele.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        $('#showlogo').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(ele.files[0]);
                                }
                            }

                            function showPreview(ele) {
                                $('#showimage').attr('src', ele.value); // for IE
                                if (ele.files && ele.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        $('#showimage').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(ele.files[0]);
                                }
                            }
                        </script>
                        <div class="col-sm justify-content-center">
                            <center>
                                    <div class="containeradd textadd " style="font-size:30px;">เเก้ไขรายละเอียดผลงาน</div>
                            </center>
                            <form id="addprojectfrom" action="editproject" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <center>
                                    <div class="container my-4">
                                        <label for="text" class="">โลโก้ผลงาน</label>
                                        <br>
                                        <div class="col-md-4">
                                            @if(isset($dataimg)?$dataimg:'')
                                                @foreach($dataimg as $imglogo)
                                                <img id="showlogo" style="background:#9d9d9d;width:170px;height:180px;" src="\project\img_logo\<?php echo $imglogo->logo; ?>">
                                                @endforeach
                                                @else
                                                <img id="showlogo" style="background:#9d9d9d;width:170px;height:180px;" src="\img\fromimg.png">
                                            @endif
                                        </div>

                                        <label for="text" class="">ภาพโชว์ผลงาน</label><br>
                                        <center>
                                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                </ol>
                                                @foreach($dataimg as $datas)
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active ">
                                                        <div class="backgroundimgproject">
                                                            <img class="size-img-re" width="100%" height="100%" src="/project/img_backgrund/<?php echo $datas->img_p_1; ?>" alt="First slide">
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="backgroundimgprojectt">
                                                            <img class="size-img-re" width="100%" height="100%" src="/project/img_backgrund/<?php echo $datas->img_p_2; ?>" alt="Second slide">
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="backgroundimgprojecttt">
                                                            <img class="size-img-re" width="100%" height="100%" src="/project/img_backgrund/<?php echo $datas->img_p_3; ?>" alt="Third slide">
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
                                        
                                        <!-- <div class="col-md-4" style="width: 100%;">
                                            <div id="carouselExampleIndicators" style="width: 100%;" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner" style="width: 400px;margin-left:-33%;padding-left:-30%">
                                                    <div class="carousel-item active">
                                                        <div class="table-responsive">
                                                            @if(isset($dataimg)?$dataimg:'')
                                                                @foreach($dataimg as $img)
                                                                <img id="showimage" style="background:#9d9d9d;width:400px;height:250px;" src="\project\img_backgrund\<?php echo $img->img_p_1; ?>">
                                                                @endforeach
                                                            @else
                                                                <img id="showimage" style="background:#9d9d9d;width:400px;height:250px;" src="\img\background-body-addproject-4.jpg">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="table-responsive">
                                                            @if(isset($dataimg)?$dataimg:'')
                                                                @foreach($dataimg as $img)
                                                                <img id="showimage" style="background:#9d9d9d;width:400px;height:250px;" src="\project\img_backgrund\<?php echo $img->img_p_2; ?>">
                                                                @endforeach
                                                            @else
                                                                <img id="showimage" style="background:#9d9d9d;width:400px;height:250px;" src="\img\background-body-addproject-4.jpg">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="table-responsive" >
                                                            @if(isset($dataimg)?$dataimg:'')
                                                                @foreach($dataimg as $img)
                                                                <img id="showimage" style="background:#9d9d9d;width:400px;height:250px;" src="\project\img_backgrund\<?php echo $img->img_p_3; ?>">
                                                                @endforeach
                                                            @else
                                                                <img id="showimage" style="background:#9d9d9d;width:400px;height:250px;" src="\img\background-body-addproject-4.jpg">
                                                            @endif
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
                                        </div> -->

                                        <label for="text" class="">โลโก้</label><span class="text-muted">(.png )</span><br>
                                        <span style="color: red;font-size: 20;">* <span class="danger_d">กรุณาใส่รูปโลโก้ผลงาน</span></span><br>
                                        <input type="file" name="filelogo" id="fileimgToUpload" class="" OnChange="showPreviewlogo(this)"><br>

                                        <label for="text" class="">รูปโชว์ผลงาน</label><span class="text-muted">(.png .jpeg)</span><br>
                                        <span style="color: red;font-size: 20;">* <span class="danger_d">กรุณาใส่รูปโชว์ผลงาน ตัวอย่างเช่น หน้าจอผู้ใช้</span></span><br>
                                        <input type="file" multiple[3] name="fileimg[]" id="fileToUpload" accept=".jpg, .jpeg, .png"  OnChange="showPreview(this)">

                                </center>

                                <center><label for="text" class="" style="font-weight: bold;font-size:25px;">รายละเอียดเกี่ยวกับผลงาน</label></center><br>
                                <div class="container">
                                    <div class="row">
                                        @foreach($data as $datas)
                                        <div class="col">
                                            <div class="align-self-start " style="margin-left:40px;">
                                                <div class="form-group">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">ชื่อเรื่อง:</label>
                                                    <div class="col-sm-11">
                                                        <textarea type="text" class="form-control" name="project_name" id="project_name" rows="3" ><?php echo $datas->project_name; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">ชื่อเรื่องภาษาอังกฤษ: </label>
                                                    <div class="col-sm-11">
                                                        <textarea type="text" class="form-control" name="project_name_en" id="project_name_en" rows="3" ><?php echo $datas->name_en; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">คำสำคัญที่1: </label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control" name="keyword_project1" id="keyword_project1" value="<?php echo $datas->keyword_project1; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">คำสำคัญที่2: </label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control" name="keyword_project2" id="keyword_project3" value="<?php echo $datas->keyword_project2; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">คำสำคัญที่3: </label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control" name="keyword_project3" id="keyword_project3" value="<?php echo $datas->keyword_project3; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">คำสำคัญที่4: </label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control" name="keyword_project4" id="keyword_project4" value="<?php echo $datas->keyword_project4; ?>">
                                                    </div>
                                                </div>
                                                
                                                

                                            </div>
                                        </div>

                                        <div class="col ">
                                            <div class="align-self-start " style="margin-left:40px;">
                                                <div class="form-group">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">เจ้าของคนที่1: </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="owner_project1" id="owner_project1" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">เจ้าของคนที่2: </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="owner_project2" id="owner_project2" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">อาจารย์ที่ปรึกษา: </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="advisor_project" id="advisor_project" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">ปีที่จัดทำเอกสาร: </label>
                                                    <div class="col-sm-10">
                                                        <select name="year_project" class="form-control" id="year_project" oninput="this.className = ''">
                                                            <option value="" disabled selected>ปีที่จัดทำเอกสาร</option>
                                                            @foreach($chk_year as $year)
                                                            <option value="{{$year->NO_Y}}" 
                                                                <?php if ($datas->project_year == $year->NO_Y) {
                                                                    echo 'selected';
                                                                } ?>>{{$year->year}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">สาขา: </label>
                                                    <div class="col-sm-10">
                                                        <select name="branch_project" class="form-control" id="branch_project" oninput="this.className = ''">
                                                            <option value="" disabled selected>เลือกสาขา</option>
                                                            @foreach($chk_branch as $branch)
                                                            <option value="{{$branch->branch_id}}" 
                                                                <?php if ($datas->branch_id == $branch->branch_id) {
                                                                    echo 'selected';
                                                                } ?>>{{$branch->branch_name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">ชนิดเอกสาร:</label>
                                                    <div class="col-sm-10">
                                                        <select name="type_project" class="form-control" id="type_project" oninput="this.className = ''">
                                                            <option value="" disabled selected>เลือกชนิดเอกสาร</option>
                                                            @foreach($chk_type as $type)
                                                            <option value="{{$type->type_id}}" <?php if ($datas->type_id == $type->type_id) {
                                                                                                    echo 'selected';
                                                                                                } ?>>{{$type->type_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">ประเภท: </label>
                                                    <div class="col-sm-10">
                                                        <select name="genre_project" class="form-control" id="genre_project" oninput="this.className = ''">
                                                            <option value="" disabled selected>เลือกประเภท</option>
                                                            @foreach($chk_genre as $genre)
                                                            <option value="{{$genre->genre_id}}" <?php if ($datas->genre_id == $genre->genre_id) {
                                                                                                        echo 'selected';
                                                                                                    } ?>>{{$genre->genre_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">หมวดหมู่: </label>
                                                    <div class="col-sm-10">
                                                        <select name="category_project" class="form-control" id="category_project" oninput="this.className = ''">
                                                            <option value="" disabled selected>เลือกหมวดหมู่</option>
                                                            @foreach($chk_category as $category)
                                                            <option value="{{$category->category_id}}" <?php if ($datas->category_id == $category->category_id) {
                                                                                                            echo 'selected';
                                                                                                        } ?>>{{$category->category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col">
                                            <div class="align-self-start " style="margin-left:40px;">
                                                
                                                <div class="form-group">
                                                    <label for="text" class="text-left fontdetail" style="margin-top:-20px;">คำอธิบายย่อ: </label>
                                                    <div class="col-sm-12">
                                                        <textarea type="text" class="form-control" rows="6" name="des_project" id="des_project"><?php echo $datas->des_project; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col">
                                        <div class="align-self-start" style="margin-left:40px;">
                                            <center><label for="text" class="">ข้อมูลติดต่อ</label><br></center>
                                            @foreach($datapubilc as $pubilc)
                                            <div class="form-group ">
                                                <label for="text" class="text-left fontdetail" style="margin-top:-20px;">Facebook: </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $pubilc->facebook; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="text" class="text-left fontdetail" style="margin-top:-20px;">Email: </label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $pubilc->email; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="text" class="text-left fontdetail" style="margin-top:-20px;">เบอร์โทร: </label>
                                                <div class="col-sm-10">
                                                    <input type="phone" class="form-control" name="phone" id="phone" value="<?php echo $pubilc->phone; ?>">
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                        </div>

                        <div style="overflow:10px;">
                            <div style="float:center;">
                                <a href="{{action('ListdataController@listdetil')}}"><button type="button" class="btnp btnnn">ย้อนกลับ</button></a>
                            </div>
                            <div style="float:left; margin-left: 380px; margin-top: -41px;">
                                <button type="submit" class="btnn">เเก้ไข</button>
                            </div>
                        </div>
                        </form>
                    </div>
               
                </div>
            </div>
        </div>
    </div>
    </div>

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
                var type_project = $(this).val();
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
                var type_project = $(this).val();
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="js/formimg.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../themes/fas/theme.js" type="text/javascript"></script>
    <script src="../themes/explorer-fas/theme.js" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
</body>

</html>