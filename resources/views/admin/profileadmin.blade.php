<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="croppie.css" />
    
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        html{
            background-color: #fff;
        }
        body{
            background-color: #fff;
        }

        .layout-header{
            margin-top: 30px;
        }

        .layout-imgup{
            margin-left: 100px;
        }

        .layout-content{
            margin-left: 550px;
        }

        .layout-input{
            
        }

        .front{
            font-size: 17px;
        }

        img {
            display: block;
            max-width: 100%;
        }
        
        
    </style>
</head>
<body>

    @if ($message = Session::get('successupdate'))
        <script>
        swal({
            title: "อัพเดทข้อมูลเรียบร้อย",
            icon: "success",
            button: "ตกลง",
        });
        </script>
    @endif
  
        <script language="JavaScript">
            function showPreview(ele)
            {
                    $('#showimg').attr('src', ele.value); // for IE
                    if (ele.files && ele.files[0]) {
                        var reader = new FileReader();
                        
                        reader.onload = function (e) {
                            $('#showimg').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(ele.files[0]);
                    }
            }
        </script>
    
    	<div class="col-sm-9 layout-content">
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <center style="margin-left:-650px;margin-top:40px;"><div class="col-sm-10"><h1>โปรไฟล์</h1></div></center>
                  <form class="form" action="profileupdateadmin" method="POST" id="registrationForm" enctype="multipart/form-data">
                    {{csrf_field()}}
                    
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 layout-imgup"><!--left col-->
                                <div class="text-center">
                                @foreach($imgaccount as $img)
                                    <img src="\img_admin\<?php echo $img->pathimg; ?>" id="showimg" name="showimg" class="avatar img-circle img-thumbnail" alt="imgupload">
                                @endforeach
                                    <h6>อัพโหลดรูปภาพของคุณ...</h6>
                                    <input type="file" class="text-center center-block file-upload image" name="img" OnChange="showPreview(this)">
                                </div></hr><br>
                            </div><!--/col-3-->
                        </div>
                    </div>
                    
                    @foreach($user as $users)
                    <div class="form-group">
                          <div class="col-xs-6" style="margin-top:10px;">
                              <label for="name"><h5>ชื่อ-สุกล</h5></label>
                              <input type="text" class="form-control front layoutprovince-size" name="name" id="name" placeholder="ชื่อ-สุกล" 
                              value="{{ $users->admin_name }}">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h5>อีเมล</h5></label>
                              <input type="email" class="form-control layoutprovince-size front" name="email" id="email" placeholder="you@email.com" title="enter your email."
                              value="<?php echo $users->admin_email; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="username"><h5>ชื่อผู้ใช้</h5></label>
                              <input type="text" class="form-control layoutprovince-size front" name="username" id="username" placeholder="you@email.com" title="enter your email."
                              value="<?php echo $users->admin_user; ?>">
                          </div>
                      </div>
                      @endforeach
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <a href="homeadmin"><button  class="btn btn-lg" type="button"  >กลับ</button></a>
                               	<!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                            </div>
                      </div>
              	</form>
              
              <hr>
              
             
             </div><!--/tab-pane-->
             
              	</form>
              </div>

               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
    
</body>
       
        
</html>





                                                      