
@section('content')
@section('title', 'Đăng nhập')
<!DOCTYPE html>
<head>
<title>Login-Customer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{ asset('/backend/css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('/backend/css/style-responsive.css') }}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset('/backend/css/font.css') }}" type="text/css"/>
<link href="{{ asset('/backend/css/font-awesome.css') }}" rel="stylesheet">
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng nhập</h2>
    <?php
    $message = Session::get('message');
    if ($message){
        echo '<span class="text-alert">'. $message .'</span>';
        session()->put('message', null);
    }
    ?>
		<form action="{{ route('user.cus_login') }}" method="post">
            @csrf
			{{ csrf_field() }}
			
			<input type="email" class="ggg" name="email" placeholder="Nhập email" required="">
			@if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
			<input type="password" class="ggg" name="password" placeholder="Nhập mật khẩu" required="">
			@if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
			<h6><a href="forget-password">Quên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" name="login">
		</form>
		<p>Bạn chưa có tài khoản?<a href="{{route('user.cus_register')}}">Tạo tài khoản</a></p>
		<br><br><p><a href="{{route('home.index')}}" class="active">Quay lại trang chủ</a></p>
</div>
</div>
<script src="{{ asset('backend/js/bootstrap.js') }}"></script>
<script src="{{ asset('/backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('/backend/js/scripts.js') }}"></script>
<script src="{{ asset('/backend/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('/backend/js/jquery.nicescroll.js') }}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>