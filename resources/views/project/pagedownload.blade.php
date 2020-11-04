<!DOCTYPE html>
<html lang="en">
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
    <title>Download</title>
</head>
<body>
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
                            <div id="keyword_project_1">
                                
                            </div>
                            @foreach($item as $datas)
                            <input type="text" name="project_id" id="project_id" style="display: none;" value="<?php echo $datas->project_id; ?>">
                            <input type="text" name="user_id" id="user_id" style="display: none;" value="<?php echo $_SESSION['usersid']; ?>">
                            @endforeach
                            @foreach($itemadmin as $datas)
                            <input type="text" name="project_id" id="project_id" style="display: none;" value="<?php echo $datas->project_id; ?>">
                            <input type="text" name="user_id" id="user_id" style="display: none;" value="<?php echo $_SESSION['usersid']; ?>">
                            @endforeach
                    </div>
                    
                    <button type="submit" target="_blank" class="btn btn-primary" id="button-download">ดาวโหลดไฟล์เอกสาร</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
</body>
</html>