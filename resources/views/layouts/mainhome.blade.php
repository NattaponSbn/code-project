<!DOCTYPE html>
<html>
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
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/app.css">   
        <!-- font Athiti -->
        <link href="https://fonts.googleapis.com/css2?family=Athiti:wght@600&display=swap" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <title>ICTThesis</title>
    </head>
    <body class="app sidebar-mini ">
        <header class="app-header">
            <a href="homeBD" class="app-header__logo" >ICTThesis</a>
            <!-- main.css-->
            <ul class="app-nav">
                <li class="app-search">
                    <input class="app-search__input" type="search" placeholder="ค้นหาวิจัย โครงงาน วิทยานิพน">
                    <button class="app-search__button"><i class="fa fa-search"></i></button>
                </li>
                <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
                <nav class="app-navmenu" >    
                    <li class="active1 menulink" ><a href="homeBD">หน้าเเรก</a></li>
                    <li class="active2 menulink"><a href="#">ค้นหาเเบบละเอียด</a></li>
                    <li class="active3 menulink"><a href="#">เกี่ยวกับ</a></li>
                    <li class="active4 menulink"><a href="#">ติดต่อ</a></li>
                </nav>
            </ul>
            
            <ul class="navbar-nav ml-auto">
                 <!-- Authentication Links -->
                @guest
                                
                @if (Route::has('register'))
                        
                @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                             {{ __('ออกจากระบบ') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </div>
                    </li>
                    @endguest
            </ul>
        </header>
           
            <div class="app-sidebar__overlay" data-toggle="sidebar" aria-label="Hide Sidebar"></div>
                <aside class="app-sidebar mage">
                    <ul class="app-menu">
                    <li>
                        <div>
                            <button type="button" class="btn-control btn-default" ><a href="homeBD">ปริญญาตรี</a> </button>
                            <button type="button" class="btn-control btn-default" ><a href="homeMDD">ปริญญาเอก โท</a> </button>
                        </div><br>
                        <div>
                            <label for="" class="labelfront">ประเภท</label>
                            <select name="" id="" class="form-control">
                            <option value="">ทั้งหมด</option>
                            <option value=""></option>
                            </select>
                        </div><br>
                        <div>
                            <label for="" class="labelfront">หมวดหมู่</label>
                            <select name="" id="" class="form-control">
                            <option value="">ทั้งหมด</option>
                            <option value=""></option>
                            </select>
                        </div><br>
                        <div>
                            <label for="" class="labelfront">ชนิดเอกสาร</label>
                            <select name="" id="" class="form-control">
                            <option value="">ทั้งหมด</option>
                            <option value=""></option>
                            </select>
                        </div><br>
                        <div>
                            <label for="" class="labelfront">สาขาวิชา</label>
                            <select name="" id="" class="form-control">
                            <option value="">ทั้งหมด</option>
                            <option value=""></option>
                            </select>
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
                    <p><hr></p>
                    
                    <div class="layoutlogre">
                    @if (Route::has('login'))
                        <div class="top-right links front">
                            @auth
                                <a href="{{ url('/home') }}" >ออกระบบ</a><br>
                            @else
                            
                                <a href="{{ route('login') }}" >เข้าสู่ระบบ</a><br>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">สมัครสมาชิก</a><br>
                                @endif
                                
                            @endauth
                           
                            <a href="{{ url('/data') }}" class="view">ดูรายละเอียดผู้ใช้</a><br>
                        </div>
                    @endif
                    </div>
                    
                    

                    </ul>
                    </li>
                </aside>

                <div>@yield('content')</div>

                
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="js/plugins/pace.min.js"></script>
        <!-- Page specific javascripts-->
        <script type="text/javascript" src="js/plugins/chart.js"></script>
        
    </body>
</html>