<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ICTThesis</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html {
            background-color: green;
            
        }
        body {
            background-color: green;
            background-image:  url("img/useradd.jpg");
            background-size: cover ;
            background-repeat: no-repeat;
            background-position:fixed;
            background-attachment: fixed;
            background-position-x: 150px;
            background-position-y: -50px;
            
        }

    </style>
</head>
<body>
            <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            
                                <h3><div class="card-header">เพิ่มสมาชิก</div></h3>
                                    <div class="card-body">
                                        @if(\Session::has('success')) 
                                            <div class="alert alert-success"> 
                                            <p>{{ \Session::get('success') }}</p> 
                                            </div> 
                                        @endif 
                                        <form method="POST" action="adddata">
                                            @csrf
                                            <div class="form-group row layoutname">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ-สกุล') }}</label>
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
                                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('เพศ') }}</label>
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

                                            <div class="form-group row layoutname layoutname-top">
                                                <label for="province" class=" col-md-4 col-form-label text-md-right">{{ __('จังหวัด') }}</label>
                                                <div class="col-md-6 layoutinput">
                                                    <select name="province" id="" class="layoutprovince-size form-control @error('name') is-invalid @enderror">
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
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('อีเมล') }}</label>
                                                <div class="col-md-6 layoutinput">
                                                    <input id="email" type="email" class="layoutnom-size form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@mail.com">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row layoutname layoutname-top">
                                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('ตั้งชื่อผู้ใช้') }}</label>
                                                <div class="col-md-6 layoutinput">
                                                    <input id="username" type="text" class="layoutnom-size form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="ตั้งชื่อผู้ใช้">
                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row layoutname">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('ตั่งรหัสผ่าน') }}</label>
                                                <div class="col-md-6 layoutinput">
                                                    <input id="password" type="password" class="layoutnom-size form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="ตั้งรหัสผ่านอย่างน้อย 8 ตัว">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row layoutname layoutname-top">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>

                                                <div class="col-md-6 layoutinput">
                                                    <input id="password-confirm" type="password" class="layoutnom-size form-control" name="password_confirmation" required autocomplete="new-password" placeholder="กรอกรหัสผ่านอีกครั้ง">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0 layoutbutton-ok col-md-8 offset-md-4">
                                                    <button type="submit" class=" btn btn-success " >
                                                        {{ __('เพิ่ม') }}
                                                    </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>