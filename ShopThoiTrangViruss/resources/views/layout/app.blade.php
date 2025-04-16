<!DOCTYPE html>
<html lang="vi">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Trang chủ')</title>

    <!-- Giao diện từ mẫu -->
    <link href="{{ asset('/css/form.css') }}" rel="stylesheet" type="text/css" />
    <style>
        body {
            font-family: Arial;
            color: #333;
            font-size: 0.95em;
            background-image: url("{{ asset('img/bg.png') }}");
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>

    <div>
        @yield('content')
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
</body>
</html>
