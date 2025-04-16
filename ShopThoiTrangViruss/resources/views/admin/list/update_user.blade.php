@extends('admin.dashboard')

@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="card-header text-center">Cập nhật thông tin người dùng</h3>
                        <div class="card-body">
                            <form action="{{ route('user.postUpdateUser') }}" method="POST">
                                @csrf
                                <input name="id" type="hidden" value="{{ $user->id_user }}">
                                
                                <!-- Tên -->
                                <div class="form-group mb-3">
                                    <label for="name">Tên</label>
                                    <input type="text" placeholder="Tên" id="name" class="form-control" name="name"
                                           value="{{ $user->name }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <label for="email_address">Email</label>
                                    <input type="email" placeholder="Email" id="email_address" class="form-control"
                                           value="{{ $user->email }}" name="email" required>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <!-- Mật khẩu -->
                                <div class="form-group mb-3">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" placeholder="Mật khẩu" id="password" class="form-control"
                                           name="password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <!-- Số điện thoại -->
                                <div class="form-group mb-3">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" placeholder="Số điện thoại" id="phone" class="form-control"
                                           value="{{ $user->phone }}" name="phone" required>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>

                                <!-- Địa chỉ -->
                                <div class="form-group mb-3">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" placeholder="Địa chỉ" id="address" class="form-control"
                                           value="{{ $user->address }}" name="address" required>
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>

                                <!-- Nút cập nhật -->
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection