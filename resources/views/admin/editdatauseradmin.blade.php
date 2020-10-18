<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/app.css"> 
</head>
<body>
    <div class="continer">
        <h1>Edit</h1>
        @if(count($errors)>0)
            <div class="alert alert-danger">
            <ul> @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            </ul>
            </div>
        @endif
        <form action="<?php echo $admin[0]->admin_id; ?>" method="POST">
                {{csrf_field()}}
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <div class="form-group">
                    <label>ชื่อ-นามสุกล</label>
                    <input type="text" name="name" id="" class="form-control"  aria-describedby="emailHelp"
                       value="<?php echo $admin[0]->admin_name; ?>" placeholder="กรอกชื่อนามสุกล">
                </div>

                <div class="form-group">
                    <label>อีเมล</label>
                    <input type="email" name="email" id="" class="form-control"  aria-describedby="emailHelp"
                        value="<?php echo $admin[0]->admin_email; ?>" placeholder="อีเมลล์">
                </div>

                <input type="submit" class="btn btn-primary" value="Update" />
            </form>
    </div>
    
</body>
</html>



