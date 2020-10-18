@extends('layouts.app')

@section('content')
<div class="containerlog">
    <div class="row justify-content-center"> <!-- เซต magintop -->
        <div class="col-md-8">
            <div class="card">
                <h3><div class="card-header">{{ __('เข้าสู่ระบบ') }}</div></h3>

                <div class="card-body">
                    <form method="GET" action="logintestt">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้ :') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('email') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="กรอกชื่อผู้ใช้ของคุณ">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน :') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="กรอกรหัสผ่านของคุณ">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('จดจำฉันไว้') }}
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
            
                            
                            <div class="col-md-8 offset-md-4" style="margin-top:-27px;">
                                <a type="submit" class="btn btn-link btn-layouts" href="">สร้างบัญชี</a>
                                <button type="submit" class="btn btn-primary" >
                                    ล็อกอิน
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link btn-re" href="{{ route('password.request') }}">
                                        {{ __('คุณลืมรหัสใช่หรือไม่?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="col-md-8 offset-md-4 ">
                        <a href="homeBD"><button class="btn btn-primary-ok-back sizebutton ">กลับ</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
