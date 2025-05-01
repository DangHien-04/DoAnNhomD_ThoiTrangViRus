@extends('layout.app') <!-- Kết nối với layout app.blade.php -->

@section('title', 'Đăng nhập') <!-- Đặt tiêu đề cho trang login -->

@section('content')
    <div class="login-form-container">
        <div class="form-head">Đăng nhập</div>

        {{-- Session Message --}}
        @if (Session::has('message'))
            <div class="error-message">{{ Session::get('message') }}</div>
            @php Session::put('message', null); @endphp
        @endif

        <form action="{{ route('user.cus_login') }}" method="post" id="frmLogin" onsubmit="return validate();">
            @csrf

            {{-- Email field --}}
            <div class="field-column">
                <div>
                    <label for="email">Email</label><span id="user_info" class="error-info"></span>
                </div>
                <div>
                    <input name="email" id="user_name" type="email" class="demo-input-box" placeholder="Nhập email">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>

            {{-- Password field --}}
            <div class="field-column">
                <div>
                    <label for="password">Mật khẩu</label><span id="password_info" class="error-info"></span>
                </div>
                <div>
                    <input name="password" id="password" type="password" class="demo-input-box" placeholder="Nhập mật khẩu">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>

            {{-- Submit --}}
            <div class="field-column">
                <div>
                    <input type="submit" name="login" value="Đăng nhập" class="btnLogin">
                </div>
            </div>

            {{-- Links --}}
            <div class="form-nav-row">
                <a href="{{ url('forget-password') }}" class="form-link">Quên mật khẩu?</a>
            </div>
            <div class="login-row form-nav-row">
                <p>Bạn chưa có tài khoản?</p>
                <a href="{{ route('user.cus_register') }}" class="btn form-link">Tạo tài khoản</a>
            </div>
            <div class="login-row form-nav-row">
                <p><a href="{{ route('home.index') }}" class="form-link">Quay lại trang chủ</a></p>
            </div>
        </form>
    </div>

    {{-- Validation script --}}
    <script>
        function validate() {
            var $valid = true;
            document.getElementById("user_info").innerHTML = "";
            document.getElementById("password_info").innerHTML = "";

            var userName = document.getElementById("user_name").value;
            var password = document.getElementById("password").value;

            if (userName == "") {
                document.getElementById("user_info").innerHTML = "required";
                $valid = false;
            }
            if (password == "") {
                document.getElementById("password_info").innerHTML = "required";
                $valid = false;
            }

            return $valid;
        }
    </script>
@endsection
