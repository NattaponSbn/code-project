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
            margin-right: 38%;
            margin-left: 38%;
        }

        .layout-content{
            margin-right: 20%;
            margin-left: 20%;
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
            function showPreviewlogo(ele) {
                $('#profile').attr('src', ele.value); // for IE
                if (ele.files && ele.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#profile').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(ele.files[0]);
                }
            }
        </script>
    	<div class="layout-content">
        
          <div class="tab-content" >
            <div class="tab-pane active" id="home">
                <center style="margin-left:30%;margin-right: 30%;margin-top:40px;"><div class="col-sm-10"><h1>โปรไฟล์</h1></div></center>
                  <form class="form" action="{{URL::to('profileupdate')}}" method="POST" id="registrationForm" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @foreach($user as $users)
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 layout-imgup"><!--left col-->
                                <div class="text-center">
                                    @foreach($imgaccount as $img)
                                        <img id="profile" name="showimg" src="{{URL::to('imgaccount/'.$img->pathimg)}}" class="avatar img-circle img-thumbnail" alt="imgupload">
                                    @endforeach
                                    <span style="color: red;">(รูปภาพ ต้องเป็น .png หรือ jpg เท่านั้น เเละขนาดภาพต้องไม่เกิน 3 MB)</span>
                                    <h6>อัพโหลดรูปภาพของคุณ...</h6>
                                    <input type="file" class="text-center center-block file-upload image" accept=".jpg, .jpeg, .png" name="img" OnChange="showPreviewlogo(this)">
                                </div></hr><br>
                            </div><!--/col-3-->
                        </div>
                    </div>
                    <div class="container " style="margin-left:28%;margin-right:28%;">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <div class="col-sm-5" style="margin-top:10px;">
                                        <label for="name"><h5>ชื่อ-สุกล</h5></label>
                                        <input type="text" class="form-control front layoutprovince-size" name="name" id="name" placeholder="ชื่อ-สุกล" 
                                        value="{{ $users->name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-sm-5">
                                <label for="gender"><h5>เพศ</h5></label>
                                <select name="gender" id="gender" class="form-control"placeholder="enter phone">
                                    <option value="" disabled selected>เลือกเพศ</option>
                                    <option value="ชาย" <?php if($users->gender =="ชาย"){ echo 'selected' ; } ?>>ชาย</option>
                                    <option value="หญิง" <?php if($users->gender =="หญิง"){ echo  'selected' ; } ?>>หญิง</option>
                                    </select>
                            </div>
                        </div>
            
                        <div class="form-group ">
                            <div class="col-sm-5">
                                <label for="text"><h5>สาขาวิชา</h5></label>
                                <select name="branch" id="branch" class="form-control">
                                    <option value="" disabled selected >เลือกสาขาวิชา</option>
                                    @foreach($chk_branch as $branch)
                                        <option value="{{$branch->branch_id}}" 
                                            <?php if ($users->branch == $branch->branch_id) {
                                                echo 'selected';
                                            } ?>>{{$branch->branch_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="email"><h5>อีเมล</h5></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email."
                                value="<?php echo $users->email; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="username"><h5>ชื่อผู้ใช้</h5></label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="you@email.com" title="enter your email."
                                value="<?php echo $users->username; ?>">
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group" style="margin-left:10%;">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> อัพเดท</button>
                                <a href="homeBD"><button  class="btn btn-lg" type="button"  >กลับ</button></a>
                                <!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                            </div>
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

    
</body>
        <!-- <script class="text/javascript">
            $('#gender').change(function(){
                if($(this).val()!=""){
                    var gender=$(this).val();
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('insertproject')}}",
                        method:'POST',
                        data:{gender:gender,_token:_token}
                    })
                }
            });

            $('#province').change(function(){
                if($(this).val()!=""){
                    var province=$(this).val();
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('insertproject')}}",
                        method:'POST',
                        data:{province:province,_token:_token}
                    })
                }
            });

        </script> -->
        
</html>





                                                      