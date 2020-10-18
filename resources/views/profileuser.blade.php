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
                  <form class="form" action="profileupdate" method="POST" id="registrationForm" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @foreach($user as $users)
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 layout-imgup"><!--left col-->
                                <div class="text-center">
                                @foreach($imgaccount as $img)
                                    <img src="imgaccount\<?php echo $img->pathimg; ?>" id="showimg" name="showimg" class="avatar img-circle img-thumbnail" alt="imgupload">
                                @endforeach
                                    <h6>อัพโหลดรูปภาพของคุณ...</h6>
                                    <input type="file" class="text-center center-block file-upload image" name="img" OnChange="showPreview(this)">
                                </div></hr><br>
                            </div><!--/col-3-->
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                          <div class="col-xs-6" style="margin-top:10px;">
                              <label for="name"><h5>ชื่อ-สุกล</h5></label>
                              <input type="text" class="form-control front layoutprovince-size" name="name" id="name" placeholder="ชื่อ-สุกล" 
                              value="{{ $users->name }}">
                          </div>
                      </div>
                      <div class="form-group ">
                          <div class="col-xs-6 layout">
                              <label for="gender"><h5>เพศ</h5></label>
                              <select name="gender" id="gender" class="layoutprovince-size form-control front"placeholder="enter phone">
                                <option value="" disabled selected>เลือกเพศ</option>
                                <option value="ชาย" <?php if($users->gender =="ชาย"){ echo 'selected' ; } ?>>ชาย</option>
                                <option value="หญิง" <?php if($users->gender =="หญิง"){ echo  'selected' ; } ?>>หญิง</option>
                                </select>
                          </div>
                      </div>
          
                      <div class="form-group ">
                          <div class="col-xs-6 ">
                             <label for="province"><h5>จังหวัด</h5></label>
                             <select name="province" id="province" class="layoutprovince-size form-control front">
                                <option value="" disabled selected >เลือกจังหวัด</option>
                                <option value="กรุงเทพมหานคร" <?php if($users->province=="กรุงเทพมหานคร"){ echo 'selected' ; } ?>>กรุงเทพมหานคร</option>
                                <option value="กระบี่" <?php if($users->province=="กรุงเทพมหานคร"){ echo 'selected' ; } ?>>กระบี่ </option>
                                <option value="กาญจนบุรี" <?php if($users->province=="กระบี่"){ echo 'selected' ; } ?>>กาญจนบุรี </option>
                                <option value="กาฬสินธุ์" <?php if($users->province=="กาญจนบุรี"){ echo 'selected' ; } ?>>กาฬสินธุ์ </option>
                                <option value="กำแพงเพชร" <?php if($users->province=="กำแพงเพชร"){ echo 'selected' ; } ?>>กำแพงเพชร </option>
                                <option value="ขอนแก่น" <?php if($users->province=="ขอนแก่น"){ echo 'selected' ; } ?>>ขอนแก่น</option>
                                <option value="ชัยนาท" <?php if($users->province=="ชัยนาท"){ echo 'selected' ; } ?>>ชัยนาท </option>
                                <option value="ชัยภูมิ" <?php if($users->province=="ชัยภูมิ"){ echo 'selected' ; } ?>>ชัยภูมิ </option>
                                <option value="ชุมพร" <?php if($users->province=="ชุมพร"){ echo 'selected' ; } ?>>ชุมพร </option>
                                <option value="ชลบุรี" <?php if($users->province=="ชลบุรี"){ echo 'selected' ; } ?>>ชลบุรี </option>
                                <option value="เชียงใหม่" <?php if($users->province=="เชียงใหม่"){ echo 'selected' ; } ?>>เชียงใหม่ </option>
                                <option value="เชียงราย" <?php if($users->province=="เชียงราย"){ echo 'selected' ; } ?>>เชียงราย </option>
                                <option value="ตรัง" <?php if($users->province=="ตรัง"){ echo 'selected' ; } ?>>ตรัง </option>
                                <option value="ตราด" <?php if($users->province=="ตราด"){ echo 'selected' ; } ?>>ตราด </option>
                                <option value="ตาก" <?php if($users->province=="ตาก"){ echo 'selected' ; } ?>>ตาก </option>
                                <option value="นครนายก" <?php if($users->province=="นครนายก"){ echo 'selected' ; } ?>>นครนายก </option>
                                <option value="นครปฐม" <?php if($users->province=="นครปฐม"){ echo 'selected' ; } ?>>นครปฐม </option>
                                <option value="นครพนม" <?php if($users->province=="นครพนม"){ echo 'selected' ; } ?>>นครพนม </option>
                                <option value="นครราชสีมา" <?php if($users->province=="นครราชสีมา"){ echo 'selected' ; } ?>>นครราชสีมา </option>
                                <option value="นครศรีธรรมราช" <?php if($users->province=="นครศรีธรรมราช"){ echo 'selected' ; } ?>>นครศรีธรรมราช </option>
                                <option value="นครสวรรค์" <?php if($users->province=="นครสวรรค์"){ echo 'selected' ; } ?>>นครสวรรค์ </option>
                                <option value="นราธิวาส" <?php if($users->province=="นราธิวาส"){ echo 'selected' ; } ?>>นราธิวาส </option>
                                <option value="น่าน" <?php if($users->province=="น่าน"){ echo 'selected' ; } ?>>น่าน </option>
                                <option value="นนทบุรี" <?php if($users->province=="นนทบุรี"){ echo 'selected' ; } ?>>นนทบุรี </option>
                                <option value="บึงกาฬ" <?php if($users->province=="บึงกาฬ"){ echo 'selected' ; } ?>>บึงกาฬ</option>
                                <option value="บุรีรัมย์" <?php if($users->province=="บุรีรัมย์"){ echo 'selected' ; } ?>>บุรีรัมย์</option>
                                <option value="ประจวบคีรีขันธ์" <?php if($users->province=="ประจวบคีรีขันธ์"){ echo 'selected' ; } ?>>ประจวบคีรีขันธ์ </option>
                                <option value="ปทุมธานี" <?php if($users->province=="ปทุมธานี"){ echo 'selected' ; } ?>>ปทุมธานี </option>
                                <option value="ปราจีนบุรี" <?php if($users->province=="ปราจีนบุรี"){ echo 'selected' ; } ?>>ปราจีนบุรี </option>
                                <option value="ปัตตานี" <?php if($users->province=="ปัตตานี"){ echo 'selected' ; } ?>>ปัตตานี </option>
                                <option value="พะเยา" <?php if($users->province=="พะเยา"){ echo 'selected' ; } ?>>พะเยา </option>
                                <option value="พระนครศรีอยุธยา" <?php if($users->province=="พระนครศรีอยุธยา"){ echo 'selected' ; } ?>>พระนครศรีอยุธยา </option>
                                <option value="พังงา" <?php if($users->province=="พังงา"){ echo 'selected' ; } ?>>พังงา </option>
                                <option value="พิจิตร" <?php if($users->province=="พิจิตร"){ echo 'selected' ; } ?>>พิจิตร </option>
                                <option value="พิษณุโลก" <?php if($users->province=="พิษณุโลก"){ echo 'selected' ; } ?>>พิษณุโลก </option>
                                <option value="เพชรบุรี" <?php if($users->province=="เพชรบุรี"){ echo 'selected' ; } ?>>เพชรบุรี </option>
                                <option value="เพชรบูรณ์" <?php if($users->province=="เพชรบูรณ์"){ echo 'selected' ; } ?>>เพชรบูรณ์ </option>
                                <option value="แพร่" <?php if($users->province=="แพร่"){ echo 'selected' ; } ?>>แพร่ </option>
                                <option value="พัทลุง" <?php if($users->province=="พัทลุง"){ echo 'selected' ; } ?>>พัทลุง </option>
                                <option value="ภูเก็ต" <?php if($users->province=="ภูเก็ต"){ echo 'selected' ; } ?>>ภูเก็ต </option>
                                <option value="มหาสารคาม" <?php if($users->province=="มหาสารคาม"){ echo 'selected' ; } ?>>มหาสารคาม </option>
                                <option value="มุกดาหาร" <?php if($users->province=="มุกดาหาร"){ echo 'selected' ; } ?>>มุกดาหาร </option>
                                <option value="แม่ฮ่องสอน" <?php if($users->province=="แม่ฮ่องสอน"){ echo 'selected' ; } ?>>แม่ฮ่องสอน </option>
                                <option value="ยโสธร" <?php if($users->province=="ยโสธร"){ echo 'selected' ; } ?>>ยโสธร </option>
                                <option value="ยะลา" <?php if($users->province=="ยะลา"){ echo 'selected' ; } ?>>ยะลา </option>
                                <option value="ร้อยเอ็ด" <?php if($users->province=="ร้อยเอ็ด"){ echo 'selected' ; } ?>>ร้อยเอ็ด </option>
                                <option value="ระนอง" <?php if($users->province=="ระนอง"){ echo 'selected' ; } ?>>ระนอง </option>
                                <option value="ระยอง" <?php if($users->province=="ระยอง"){ echo 'selected' ; } ?>>ระยอง </option>
                                <option value="ราชบุรี" <?php if($users->province=="ราชบุรี"){ echo 'selected' ; } ?>>ราชบุรี</option>
                                <option value="ลพบุรี" <?php if($users->province=="ลพบุรี"){ echo 'selected' ; } ?>>ลพบุรี </option>
                                <option value="ลำปาง" <?php if($users->province=="ลำปาง"){ echo 'selected' ; } ?>>ลำปาง </option>
                                <option value="ลำพูน" <?php if($users->province=="ลำพูน"){ echo 'selected' ; } ?>>ลำพูน </option>
                                <option value="เลย" <?php if($users->province=="เลย"){ echo 'selected' ; } ?>>เลย </option>
                                <option value="ศรีสะเกษ" <?php if($users->province=="ศรีสะเกษ"){ echo 'selected' ; } ?>>ศรีสะเกษ</option>
                                <option value="สกลนคร" <?php if($users->province=="สกลนคร"){ echo 'selected' ; } ?>>สกลนคร</option>
                                <option value="สงขลา" <?php if($users->province=="สงขลา"){ echo 'selected' ; } ?>>สงขลา </option>
                                <option value="สมุทรสาคร" <?php if($users->province=="สมุทรสาคร"){ echo 'selected' ; } ?>>สมุทรสาคร </option>
                                <option value="สมุทรปราการ" <?php if($users->province=="สมุทรปราการ"){ echo 'selected' ; } ?>>สมุทรปราการ </option>
                                <option value="สมุทรสงคราม" <?php if($users->province=="สมุทรสงคราม"){ echo 'selected' ; } ?>>สมุทรสงคราม </option>
                                <option value="สระแก้ว" <?php if($users->province=="สระแก้ว"){ echo 'selected' ; } ?>>สระแก้ว </option>
                                <option value="สระบุรี" <?php if($users->province=="สระบุรี"){ echo 'selected' ; } ?>>สระบุรี </option>
                                <option value="สิงห์บุรี" <?php if($users->province=="สิงห์บุรี"){ echo 'selected' ; } ?>>สิงห์บุรี </option>
                                <option value="สุโขทัย" <?php if($users->province=="สุโขทัย"){ echo 'selected' ; } ?>>สุโขทัย </option>
                                <option value="สุพรรณบุรี" <?php if($users->province=="สุพรรณบุรี"){ echo 'selected' ; } ?>>สุพรรณบุรี </option>
                                <option value="สุราษฎร์ธานี" <?php if($users->province=="สุราษฎร์ธานี"){ echo 'selected' ; } ?>>สุราษฎร์ธานี </option>
                                <option value="สุรินทร์" <?php if($users->province=="สุรินทร์"){ echo 'selected' ; } ?>>สุรินทร์ </option>
                                <option value="สตูล" <?php if($users->province=="สตูล"){ echo 'selected' ; } ?>>สตูล </option>
                                <option value="หนองคาย" <?php if($users->province=="หนองคาย"){ echo 'selected' ; } ?>>หนองคาย </option>
                                <option value="หนองบัวลำภู" <?php if($users->province=="หนองบัวลำภู"){ echo 'selected' ; } ?>>หนองบัวลำภู </option>
                                <option value="อำนาจเจริญ" <?php if($users->province=="อำนาจเจริญ"){ echo 'selected' ; } ?>>อำนาจเจริญ </option>
                                <option value="อุดรธานี" <?php if($users->province=="อุดรธานี"){ echo 'selected' ; } ?>>อุดรธานี </option>
                                <option value="อุตรดิตถ์" <?php if($users->province=="อุตรดิตถ์"){ echo 'selected' ; } ?>>อุตรดิตถ์ </option>
                                <option value="อุทัยธานี" <?php if($users->province=="อุทัยธานี"){ echo 'selected' ; } ?>>อุทัยธานี </option>
                                <option value="อุบลราชธานี" <?php if($users->province=="อุบลราชธานี"){ echo 'selected' ; } ?>>อุบลราชธานี</option>
                                <option value="อ่างทอง" <?php if($users->province=="อ่างทอง"){ echo 'selected' ; } ?>>อ่างทอง </option>
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h5>อีเมล</h5></label>
                              <input type="email" class="form-control layoutprovince-size front" name="email" id="email" placeholder="you@email.com" title="enter your email."
                              value="<?php echo $users->email; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="username"><h5>ชื่อผู้ใช้</h5></label>
                              <input type="text" class="form-control layoutprovince-size front" name="username" id="username" placeholder="you@email.com" title="enter your email."
                              value="<?php echo $users->username; ?>">
                          </div>
                      </div>
                      @endforeach
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <a href="homeBD"><button  class="btn btn-lg" type="button"  >กลับ</button></a>
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





                                                      