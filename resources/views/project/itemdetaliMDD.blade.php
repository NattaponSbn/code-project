<!DOCTYPE html>
<html class="img-down">
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
                margin-top:-6px;
                margin-left: 20px;
           }

           .content{
                margin-top: 8px;
           }

           .search-left{
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

           .name-scle{
                font-size: 16px;
                color: #FFFFFF;
                -ms-flex-item-align: center;
                    align-self: center;
                margin-top: -30px;
                margin-left: 70px;
                font-family: 'Athiti', sans-serif;
                
           }

           html {
               background-image: url("/img/background-MDD-item.jpg");
           }

           .img-top {
               background-image: url("/img/background-MDD-item.jpg");
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
           }

           .span-i-user {
                font-size: 33px; 
                color: none; 
                margin-left: -85px;
                margin-top:-1.5px;
                margin-right: -7px;
           }
           
           .text-mage {
               font-size:17px;
               margin-left: 40px;
               padding:3px;
               margin-top:-35px;
           }

           .btn-outline-primaryy {
                color: #D9A327;
                border-color: #D9A327;
            }

            .btn-outline-primaryy:hover {
                color: #fff;
                background-color: #D9A327;
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
            .show > .btn-outline-primaryy.dropdown-toggle {
                color: #fff;
                background-color: #D9A327;
                border-color: #fff;
            }

            .btn-outline-primaryy:not(:disabled):not(.disabled):active:focus,
            .btn-outline-primaryy:not(:disabled):not(.disabled).active:focus,
            .show > .btn-outline-primaryy.dropdown-toggle:focus {
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

            .img-profile{
                width: 39px;
            }

            .img-user-size {
               width: 100%;
           }

           .font-Athiti {
                font-family: 'Athiti', sans-serif;
                font-weight: 600;
            }

            .breadcrumb-mdd {
                display: flex;
                flex-wrap: wrap;
                padding: 0.75rem 1rem;
                margin-bottom: 1rem;
                list-style: none;
                border-radius: 0.25rem;
            }

            .sidenav a, .dropdown-btn ,.dropdown-btn2,.dropdown-btn3{
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 18px;
            color: #FFF5EE;
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
            color: white;
            border-color: none;
            
        }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
            display: block;
            background-color: #262626;
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
              
        </style>
    </head>
    <body class="img-top" style="font-family: 'Athiti', sans-serif;">

           <!-- error addproject -->
             
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
            <!-- logout popup -->

            @if (!empty($_GET['logout'])) {
                <script>
                    swal({
                        title: "ออกจากระบบเรียบร้อย",
                        icon: "success",
                        button: "ตกลง",
                    });
                </script>
                <?php unset($_GET['logout']); ?>
            }
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

            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">ความพึ่งพอใจเอกสารที่ท่านได้ดาวน์โหลด</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{action ('Project_MDDController@downloadfile')}}" method="POST">
                                @csrf
                                @foreach($item as $datas)
                                <input type="text" name="project_id" id="project_id" style="display: none;" value="<?php echo $datas->project_m_id; ?>">
                                @endforeach
                                @foreach($itemadmin as $datas)
                                <input type="text" name="project_id" id="project_id" value="<?php echo $datas->project_m_id; ?>">
                                @endforeach
                                <div class="rateyo" name="rating" id="rating" data-rateyo-rating="5" data-rateyo-num-stars="5" data-rateyo-score="3">
                                </div>
                                <input type="hidden" name="rating">
                        </div>

                        <button type="submit" class="btn btn-primary">ดาวน์โหลดไฟล์ข้อมูล</button>
                        </form>
                    </div>
                </div>
            </div>
            
        <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" style="margin-left:450px;margin-top:5px;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body" style="margin-top:-5px;">
                        <h3><div class="card-header">{{ __('สมัครสมาชิก') }}</div></h3>
                            <div class="card-body">
                                <form method="POST" action="registers">
                                    @csrf
                                    <div class="form-group row layoutname layoutname-BD">
                                        
                                        <div class="col-md-6 layoutinput">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="กรอกชื่อนามสกุลของคุณ">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row layoutname">
                                        
                                        <div class="col-md-6 layoutinput">
                                            <select name="gender" id="" class="layoutgender-size form-control @error('gender') is-invalid @enderror">
                                                <option value="">เลือกเพศ</option>
                                                <option value="ชาย">ชาย</option>
                                                <option value="หญิง">หญิง</option>
                                            </select>
                                                @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row  layoutname-top-BD" style="margin-left:230px;margin-top: -54px;">
                                        
                                        <div class="col-md-6 layoutinput">
                                            <select name="province" id="" class="layoutprovince-size-p form-control @error('name') is-invalid @enderror" style="width: 260%;">
                                                <option value="">เลือกจังหวัด</option>
                                                <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                                <option value="กระบี่">กระบี่ </option>
                                                <option value="กาญจนบุรี">กาญจนบุรี </option>
                                                <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                                                <option value="กำแพงเพชร">กำแพงเพชร </option>
                                                <option value="ขอนแก่น">ขอนแก่น</option>
                                                <option value="ชัยนาท">ชัยนาท </option>
                                                <option value="ชัยภูมิ">ชัยภูมิ </option>
                                                <option value="ชุมพร">ชุมพร </option>
                                                <option value="ชลบุรี">ชลบุรี </option>
                                                <option value="เชียงใหม่">เชียงใหม่ </option>
                                                <option value="เชียงราย">เชียงราย </option>
                                                <option value="ตรัง">ตรัง </option>
                                                <option value="ตราด">ตราด </option>
                                                <option value="ตาก">ตาก </option>
                                                <option value="นครนายก">นครนายก </option>
                                                <option value="นครปฐม">นครปฐม </option>
                                                <option value="นครพนม">นครพนม </option>
                                                <option value="นครราชสีมา">นครราชสีมา </option>
                                                <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                                                <option value="นครสวรรค์">นครสวรรค์ </option>
                                                <option value="นราธิวาส">นราธิวาส </option>
                                                <option value="น่าน">น่าน </option>
                                                <option value="นนทบุรี">นนทบุรี </option>
                                                <option value="บึงกาฬ">บึงกาฬ</option>
                                                <option value="บุรีรัมย์">บุรีรัมย์</option>
                                                <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                                                <option value="ปทุมธานี">ปทุมธานี </option>
                                                <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                                                <option value="ปัตตานี">ปัตตานี </option>
                                                <option value="พะเยา">พะเยา </option>
                                                <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                                                <option value="พังงา">พังงา </option>
                                                <option value="พิจิตร">พิจิตร </option>
                                                <option value="พิษณุโลก">พิษณุโลก </option>
                                                <option value="เพชรบุรี">เพชรบุรี </option>
                                                <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                                                <option value="แพร่">แพร่ </option>
                                                <option value="พัทลุง">พัทลุง </option>
                                                <option value="ภูเก็ต">ภูเก็ต </option>
                                                <option value="มหาสารคาม">มหาสารคาม </option>
                                                <option value="มุกดาหาร">มุกดาหาร </option>
                                                <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                                                <option value="ยโสธร">ยโสธร </option>
                                                <option value="ยะลา">ยะลา </option>
                                                <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                                                <option value="ระนอง">ระนอง </option>
                                                <option value="ระยอง">ระยอง </option>
                                                <option value="ราชบุรี">ราชบุรี</option>
                                                <option value="ลพบุรี">ลพบุรี </option>
                                                <option value="ลำปาง">ลำปาง </option>
                                                <option value="ลำพูน">ลำพูน </option>
                                                <option value="เลย">เลย </option>
                                                <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                                <option value="สกลนคร">สกลนคร</option>
                                                <option value="สงขลา">สงขลา </option>
                                                <option value="สมุทรสาคร">สมุทรสาคร </option>
                                                <option value="สมุทรปราการ">สมุทรปราการ </option>
                                                <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                                                <option value="สระแก้ว">สระแก้ว </option>
                                                <option value="สระบุรี">สระบุรี </option>
                                                <option value="สิงห์บุรี">สิงห์บุรี </option>
                                                <option value="สุโขทัย">สุโขทัย </option>
                                                <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                                                <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                                <option value="สุรินทร์">สุรินทร์ </option>
                                                <option value="สตูล">สตูล </option>
                                                <option value="หนองคาย">หนองคาย </option>
                                                <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                                                <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                                <option value="อุดรธานี">อุดรธานี </option>
                                                <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                                                <option value="อุทัยธานี">อุทัยธานี </option>
                                                <option value="อุบลราชธานี">อุบลราชธานี</option>
                                                <option value="อ่างทอง">อ่างทอง </option>
                                                <option value="อื่นๆ">อื่นๆ</option>
                                            </select>
                                                @error('province')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row layoutname">
                                        
                                        <div class="col-md-6 layoutinput">
                                            <input id="email" type="email" class="layoutnom-size form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@mail.com">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row layoutname " style="margin-left:219px;margin-top: -56px;">
                                        
                                        <div class="col-md-6 layoutinput" >
                                            <input id="username" type="text" style="width: 260%;" class="layoutnom-size form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="ตั้งชื่อผู้ใช้">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row layoutname ">
                                        
                                        <div class="col-md-6 layoutinput">
                                            <input id="password" type="password" class="layoutnom-size form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="ตั้งรหัสผ่านอย่างน้อย 8 ตัว">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row layoutname " style="margin-left:219px;margin-top: -56px;">
                                        
                                        <div class="col-md-6 layoutinput">
                                            <input id="password-confirm" type="password" style="width: 260%;" class="layoutnom-size form-control" name="password_confirmation" required autocomplete="new-password" placeholder="กรอกรหัสผ่านอีกครั้ง">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0 layoutbutton-ok col-md-8 offset-md-4" >
                                            <button type="submit" class=" btn btn-success " style="width: 100%;margin-left:-60px;" href="" >
                                                {{ __('สมัคร') }}
                                            </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
    <div class="app sidebar-mini " >
        <header class="app-header">
            <!-- font Athiti -->
            <a href="{{action('Project_MDDController@itemproject')}}" class="app-header__logo font-Athiti" >ICTThesis</a> 
            <!-- main.css-->
            <ul class="app-nav">
                <li class="app-search search-left">
                    <input class="app-search__input" type="search" placeholder="ค้นหา...">
                    <button class="app-search__button"><i class="fa fa-search"></i></button>
                </li>
                <!-- <div class="app-navbar__overlay" data-toggle="sidebar" aria-label="Hide Sidebar"></div> -->
                <nav class="app-navmenu " >    
                    <li class="active1 menulink fontlink" ><a href="{{action('Project_MDDController@itemproject')}}">หน้าเเรก</a></li>
                    <li class="active2 menulink fontlink"><a href="SearchAdvance" >ค้นหาเเบบละเอียด</a></li>
                    <li class="active3 menulink fontlink"><a href="#">เกี่ยวกับ</a></li>
                    <li class="active4 menulink fontlink"><a href="#">ติดต่อ</a></li>
                </nav>
                <div class="navbar-dark layoutaccout-MDD ">
                    <ul class="navbar-nav ml-auto ml-md-0">

                        
                    <?php 
                            if(!isset($_SESSION['status'])=='user' & !isset($_SESSION['statusA'])=='admin') { ?>
                                <div class="front nav-item" style="margin-top: px;font-family: 'Athiti', sans-serif;font-size: 16px;">
                                        <a class="text-item"  id="userDropdown" href="login" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn-login btn btn-outline-primaryy"><i class="fas fa-user-circle span-i-user"></i><div class="text-mage">เข้าสู่ระบบ</div></button></a>
                                            <div class="dropdown-menu dropdown-menu-right" style="margin-top: 13px;" aria-labelledby="userDropdown">
                                                <ul class="navbar-nav ml-auto">
                                                    <div class="account-dropdown js-dropdown">
                                                        <div class="info clearfix">
                                                     
                                                            <h3><div class="card-header">{{ __('เข้าสู่ระบบ') }}</div></h3>
                                                            <div class="" style="font-family: 'Athiti', sans-serif;font-size: 16px;">
                                                                <form method="POST" action="{{url ('loginBD')}}">
                                                                    @csrf

                                                                    <div class="form-group row">
                                                                        <div class="col-md-6">
                                                                            <input id="username" type="username" class="form-control @error('email') is-invalid @enderror" style="width: 210px;height: 40px;margin-left:31px;" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="ชื่อผู้ใช้ของคุณ">

                                                                            @error('username')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-md-6">
                                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" style="width: 210px; height: 40px;margin-left:31px;" name="password" required autocomplete="current-password" placeholder="รหัสผ่านของคุณ">

                                                                            @error('password')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-md-6 offset-md-4">
                                                                            <div class="form-check" style="margin-left:-71px;">
                                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                                                <label class="form-check-label" style="color: black;" for="remember">
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
                                                                            <button type="submit" class="btn btn-primaryyy" style="width: 210px; margin-left:-70px; " >
                                                                                ล็อกอิน
                                                                            </button>

                                                                            <div style="margin-left:-30px; margin-top: 10px;">คุณยังไม่มีบัญชี?</div> 
                                                                            <a type="submit"  id="button" class="btn btn-link btn-layouts" style="margin-left:70px;margin-top:-49px;"  href="#" data-toggle="modal" data-target="#exampleModalCenter">สร้างบัญชี</a>    
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </div>
                                </div>
                             <?php }
                            
                            else if (isset($_SESSION['status'])=='user'){
                            ?>
                            
                                <li class="nav-item dropdown">
                                
                                    <a class="nav-link " id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @foreach($imgaccount as $img)
                                        <img class="rounded-circle user-sizes img-profile" src="/imgaccount/<?php echo $img->pathimg; ?>" alt="USer Atver" >
                                        
                                    @endforeach
                                    @foreach($imgaccount as $user)
                                        <div class="name-scle dropdown-toggle "><?php echo $user->name;?></div> 
                                    @endforeach
                                    </a>
                                  
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                        <ul class="navbar-nav ml-auto">
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <center><div class="image">
                                                        <a href="profile">
                                                        @foreach($imgaccount as $img)
                                                            <img src="\imgaccount\<?php echo $img->pathimg; ?>" alt="" class="img-user-size user-avatar rounded-circle"/>
                                                        @endforeach
                                                        </a>

                                                    </div></center>
                                                    <div class="content">
                                                        <h5 class="name">
                                                        @foreach($imgaccount as $user)
                                                            <span class="caret"><?php echo $user->name;?></span>
                                                        
                                                        </h5>
                                                        <span class="email"><?php echo $user->email;?></span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            
                                                <a href="profile" class="top dropdown-item"><i class="zmdi zmdi-account"></i>โปรไฟล์</a>
                                                    <a class="dropdown-item" href="logout"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
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
                            
                            else  if (isset($_SESSION['statusA'])=='admin'){
                                ?>
                                    <li class="nav-item dropdown">
                                
                                <a class="nav-link " id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @foreach($adminaccount as $img)
                                    <img class="rounded-circle user-sizes img-profile" src="/img_admin/<?php echo $img->pathimg; ?>" alt="USer Atver" >
                                    
                                @endforeach
                                @foreach($adminaccount as $user)
                                    <div class="name-scle dropdown-toggle "><?php echo $user->admin_name;?></div> 
                                @endforeach
                                </a>
                              
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <ul class="navbar-nav ml-auto">
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <center><div class="image">
                                                    <a href="profile">
                                                    @foreach($adminaccount as $img)
                                                        <img src="\img_admin\<?php echo $img->pathimg; ?>" alt="" class="img-user-size user-avatar rounded-circle"/>
                                                    @endforeach
                                                    </a>

                                                </div></center>
                                                <div class="content">
                                                    <h5 class="name">
                                                    @foreach($adminaccount as $user)
                                                        <span class="caret"><?php echo $user->admin_name;?></span>
                                                    
                                                    </h5>
                                                    <span class="email"><?php echo $user->admin_email;?></span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        
                                            <a href="profileadmin" class="top dropdown-item"><i class="zmdi zmdi-account"></i>โปรไฟล์</a>
                                                <a class="dropdown-item" href="logout"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('ออกจากระบบ') }}
                                                </a>
                                                <form id="logout-form" action="logout" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                        </div>    
                                    </ul>
                                </div> 
                            </li>
                        <?php }?>
                    </ul>
                </div>
            </header>
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
                                                    <button class="dropdown-btn" style="border-top: 0.5px solid #fff;border-radius: 10%;">ประเภท
                                                        <i class="fa fa-caret-down fa-lg" style="width: 20px;"></i>
                                                    </button>
                                                        <div class="dropdown-container">
                                                            @foreach($chk_genre as $genre)
                                                            <a href="genre/{{$genre->genre_id}}" class="btn-default btn-outline-primaryy" style="font-size:17px;color:#fff;">{{$genre->genre_name}}</a>
                                                            <!-- <a href="#">โปรแกรมประยุกต์สำหรับอุปกรณ์เคลื่อนที่</a>
                                                            <a href="#">ไอโอที(IoT)</a>
                                                            <a href="#">ปัญญาประดิษฐ์(Ai)</a>
                                                            <a href="#">ไอโอที(IoT)</a>
                                                            <a href="#">ไอโอที(IoT)</a> -->
                                                            @endforeach
                                                        </div>
                                                    
                                            
                                                    <button class="dropdown-btn" style="border-top: 0.5px solid #fff;border-radius: 10%;">หมวดหมู่
                                                        <i class="fa fa-caret-down fa-lg" style="width: 20px;"></i>
                                                    </button>
                                                        <div class="dropdown-container">
                                                            @foreach($chk_category as $category)
                                                            <a href="category/{{$category->category_id}}" class="btn-default btn-outline-primaryy" style="font-size:17px;color:#fff;">{{$category->category_name}}</a>
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
                        <?php
                        if (!isset($_SESSION['status']) == 'user' & !isset($_SESSION['statusA']) == 'admin') {
                        } else if (isset($_SESSION['status']) == 'user') { ?>
                            <div class="links front" style="font-size: 20px;">
                                @if(!isset($_SESSION['project']))
                                <a href="addproject" class="view"><i class="fas fa-book fa-lg" style="color:#212529; margin-right: 7px;margin-left: 10px;"></i>สร้างผลงาน</a><br>
                                @elseif(isset($_SESSION['project']))
                                <a href="listdetil" class="view"><i class="fas fa-book fa-lg" style="color:#212529; margin-right: 7px;margin-left: 10px;"></i>ผลงานของฉัน</a><br>
                                @endif
                            </div>
                        <?php } else  if (isset($_SESSION['statusA']) == 'admin') { ?>
                            <div class="links front">
                                <a href="homeadmin" class="view"><i class="fas fa-book fa-lg" style="color:#212529; margin-right: 7px;margin-left: 10px;"></i>กลับสู่หน้าผู้ดูเเลระบบ</a><br>
                            </div>
                        <?php }
                        ?>
                    </div>
                    </li>
                </ul>
            </aside>
               
                    <!-- img item project -->
            <div class="rowcolumn2">
                <div class="" style="margin-left:18%;width: 80%;">
                    <div class="col-md-12">
                        <ul class="app-breadcrumb breadcrumb-mdd magne-right">
                            <li class="breadcrumb-item magne-right-text"><a href="{{action('Project_MDDController@itemproject')}}">หน้าหลัก</a></li>
                            
                            @foreach($item as $datas)
                                <li class="breadcrumb-item magne-right-text" >
                                    <label for="" data-toggle="tooltip" data-placement="top" title="{{$datas->project_m_name}}">
                                        <?php 
                                            $str = $datas->project_m_name;
                                            $count = utf8_strlen($str);
                                            create_str($count,$str,$datas);   
                                        ?>
                                    </label>
                                </li>
                            @endforeach

                            @foreach($itemadmin as $datas)
                                <li class="breadcrumb-item magne-right-text" >
                                    <label for="" data-toggle="tooltip" data-placement="top" title="{{$datas->project_m_name}}">
                                        <?php 
                                            $str = $datas->project_m_name;
                                            $count = utf8_strlen($str);
                                            create_str($count,$str,$datas);   
                                        ?>
                                    </label>
                                </li>
                            @endforeach
                            
    
                        </ul><br>
                        
                        <div class="tile" style="margin-top: -3%;">
                            <div class="tile-body">
                            
                                <!-- detailitem -->
                                @foreach($item as $items) 
                                <div class="D-text D-layout">
                                    <table style="width:100%">

                                    <tr><td ><label for="text"><b>ชื่อเรื่อง :</b></label></td>
                                        <td colspan=1 ><?php echo $items->project_m_name; ?></td>
                                    <tr><td ><label for="text"><b>ชื่อเรื่องภาษาอังกฤษ :</b></label></td>
                                        <td colspan=1 ><?php echo $items->project_m_name_en; ?></td>
                                    <tr><td ><label for="text"><b>เจ้าของผลงาน :</b></label></td>
                                        <td colspan=1 ><?php echo $items->name; ?></td>
                                    <tr><td ><label for="text"><b>ที่ปรึกษา :</b></label></td>
                                        <td colspan=1 ><?php echo $items->advisor_m; ?></td>
                                    <tr><td ><label for="text"><b>หมวดหมู่ :</b></label></td>
                                        <td colspan=1 ><?php echo $items->category_name; ?></td>
                                    <tr><td ><label for="text"><b>ประเภทเอกสาร :</b></label></td>
                                        <td colspan=1 ><?php echo $items->type_name; ?></td>
                                    <tr><td ><label for="text"><b>คำสำคัญ :</b></label></td>
                                        <td colspan=1 ><?php echo $items->keyword_m_project; ?></td>
                                    <tr><td><label for="text" class=""><b>บทคัดย่อ :</b></label></td>
                                        <td colspan=1 ><?php echo $items->des_m_project; ?></td></tr>
                                    </table>
                                    
                                    <div class="a-top-layout">
                                        @if(!isset($_SESSION['status'])=='user')
                                            <p>ดาวน์โหลดไฟล์ข้อมูล<a href="" class="a-layout">คลิก</a></p>
                                        @elseif(isset($_SESSION['status'])=='user')
                                            <p>ดาวน์โหลดไฟล์ข้อมูล<a href="" class="a-layout" data-toggle="modal" data-target="#exampleModalLong">คลิก</a></p>
                                        @endif
                                    </div>
                                </div>
                                @endforeach  

                                @foreach($itemadmin as $items) 
                                <div class="D-text D-layout">
                                <table style="width:50%" >
                                    <tr><td ><label for="text"><b>ชื่อเรื่อง :</b></label></td>
                                        <td colspan=1 ><?php echo $items->project_m_name; ?></td>
                                    <tr><td ><label for="text"><b>ชื่อเรื่องภาษาอังกฤษ :</b></label></td>
                                        <td colspan=1 ><?php echo $items->project_m_name_en; ?></td>
                                    <tr><td ><label for="text"><b>เจ้าของผลงาน :</b></label></td>
                                        <td colspan=1 ><?php echo $items->owner_m_name; ?></td>
                                    <tr><td ><label for="text"><b>ที่ปรึกษา :</b></label></td>
                                        <td colspan=1 ><?php echo $items->advisor_m; ?></td>
                                    <tr><td ><label for="text"><b>หมวดหมู่ :</b></label></td>
                                        <td colspan=1 ><?php echo $items->category_name; ?></td>
                                    <tr><td ><label for="text"><b>ประเภทเอกสาร :</b></label></td>
                                        <td colspan=1 ><?php echo $items->type_name; ?></td>
                                    <tr><td ><label for="text"><b>คำสำคัญ :</b></label></td>
                                        <td colspan=1 ><?php echo $items->keyword_m_project; ?></td>
                                    <tr><td><label for="text" class=""><b>บทคัดย่อ :</b></label></td>
                                        <td colspan=1 ><?php echo $items->des_m_project; ?></td></tr>
                                    </table>
                                    <div class="a-top-layout">
                                        <p>ดาวน์โหลดไฟล์ข้อมูล<a href="" class="a-layout" data-toggle="modal" data-target="#exampleModalLong">คลิก</a></p>
                                    </div>
                                </div>
                                @endforeach  
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
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
                    this.classList.toggle("active");
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
            elseif($count>80 & $count <150){
                $strcount = substr($str,0,-65);
                $strcount1 = substr($strcount,0,-50);
                $strcount2 = substr($strcount1,0,-50);
                $strcount3 = substr($strcount2,0,-5);
                $strcut = $strcount3."...";
                echo $strcut;
            }else{
                echo $datas->project_name;
            }  
            
        }
    ?>
    </body>
</html>
    