@extends('layout.app')

@section('title', 'Đăng ký')

@section('content')
<div class="login-form-container">
    <div class="w3layouts-main">
        <div class="form-head">Đăng ký</div>

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
            @php Session::put('message', null); @endphp
        @endif

        <form action="{{ route('user.cus_register') }}" method="post">
            @csrf

            <div class="field-column">
                <label for="name">Họ tên</label>
                <input type="text" name="name" class="demo-input-box" placeholder="Nhập họ tên" value="{{ old('name') }}">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="field-column">
                <label for="email">Email</label>
                <input type="email" name="email" class="demo-input-box" placeholder="Nhập email" value="{{ old('email') }}">
                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="field-column">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" class="demo-input-box" placeholder="Nhập mật khẩu">
                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="field-column">
                <label for="phone">Số điện thoại</label>
                <input type="number" name="phone" class="demo-input-box" placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
                @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="field-column">
                <label for="address">Địa chỉ</label>
                <input type="text" name="address" class="demo-input-box" placeholder="Nhập địa chỉ" value="{{ old('address') }}">
                @error('address') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-nav-row">
                <input type="checkbox" id="remember"> <label for="remember">Nhớ đăng nhập</label> |
                <a href="#" class="form-link">Quên mật khẩu?</a>
            </div>

            <div class="mt-3">
                <input type="submit" value="Đăng ký" class="btnLogin">
            </div>

            <div class="form-nav-row mt-2">
                <a href="{{ route('user.cus_login') }}" class="form-link">Đã có tài khoản?</a>
            </div>
        </form>
    </div>
</div>
@endsection
