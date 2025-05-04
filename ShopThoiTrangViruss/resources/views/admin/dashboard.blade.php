<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10.48.0 - CRUD User Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{ asset('css-bootstrap/js/scripts.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5">
        <div class="container">
            <a class="navbar-brand mr-auto title" href="#">Quản trị viên</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}">Danh mục</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.listproduct') }}">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.orderindexAdmin') }}">Đơn Hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manufacturer.listmanufacturer') }}">Hãng Sản Xuất</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.listuser') }}">Người dùng</a>
                    </li>
                 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Đăng Xuất</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Đăng Nhập</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <style>
        /* Cải thiện giao diện navbar */
        .title {
            color: white !important;
            font-weight: bold;
            font-size: 20px;
        }

        .nav-link {
            font-size: 15px;
            font-weight: bold;
            color: white !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #f1c40f !important; /* Màu vàng khi hover */
        }

        nav {
            background: #217b7e; /* Màu nền navbar */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng */
        }

        .pagination {
            background: white !important;
        }

        /* Thêm khoảng cách giữa các mục trong navbar */
        .nav-item {
            margin-right: 15px;
        }

        /* Tăng kích thước nút toggle trên thiết bị nhỏ */
        .navbar-toggler {
            border: none;
        }

        .navbar-toggler-icon {
            background-color: white;
            border-radius: 5px;
            padding: 5px;
        }
    </style>
</body>

</html>
