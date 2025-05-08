<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                </ul>
                <!-- <ul class="header-links pull-right">
                    <li><a href="{{ route('signout') }}"><i class="fa fa-user-o"></i> Logout</a></li>
                </ul> -->
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                </ul>

            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <div class="header-logo">
                            <a href="{{ route('home.index') }}" class="logo">
                                <img src="{{ asset('./img/logo.png')}} " alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-5">
                        <div class="header-search">
                            <form action="{{ route('user.searchProduct') }}" method="GET" class="d-flex justify-content-center mb-4" style="max-width: 600px; margin: auto;">
                                <div class="input-group shadow-sm">
                                    <input
                                        type="text"
                                        name="keyword"
                                        class="form-control rounded-start-pill input-product"
                                        placeholder="🔍 Tìm kiếm sản phẩm..."
                                        aria-label="Tìm kiếm"
                                        required>
                                    <button class="btn btn-success rounded-end-pill px-4 search-btn" type="submit">
                                        Tìm kiếm
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-5 clearfix">
                        <div class="header-ctn">
                            <!-- new -->
                            <div>

                            </div>
                            <!-- /new -->
                            <?php
                            if (Session::get('id_user')) {
                            ?>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-industry"></i>
                                        <span>Nhà Sản Xuất</span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="manufacturerDropdown">
                                        @foreach ($manufacturers as $manufacturer)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('manufacturer.products', $manufacturer->id_manufacturer) }}">
                                                {{ $manufacturer->name_manufacturer }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Cart -->
                                <div>
                                    <a class href="{{ route('cart.indexCart') }}">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Giỏ hàng</span>
                                    </a>
                                </div>
                                <!-- /Cart -->
                                <div>
                                    <a class href="{{ route('order.orderIndex') }}">
                                        <i class="fa-solid fa-file-invoice"></i>
                                        <span>Đơn hàng</span>
                                    </a>
                                </div>
                                <!-- Cart -->
                                <div>
                                    <a class href="{{ route('signout')}} ">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </div>

                            <?php
                            } else {
                            ?>
                                <div>
                                    <a class href="{{ route('user.indexlogin') }}">
                                        <i class="fa-solid fa-right-to-bracket"></i>
                                        <span>Đăng nhập</span>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- /Cart -->
                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    @yield('content')

</body>
<style>
    #header {
        background: #000120 !important;
    }

    .logo img {
        object-fit: fill;
        width: 200px;
        height: 100px;
        padding-right: 20px;
    }

    * a {
        text-decoration: none;
    }

    .input-product {
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
        height: 40px;
        width: 70%;
        padding-left: 20px;
    }

    .search-btn {
        width: 15%;
    }

    .header-ctn {
        padding-right: 50px;
    }
</style>

</html>