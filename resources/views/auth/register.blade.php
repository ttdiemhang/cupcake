

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Đăng ký thành viên</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Utilizer Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">

    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet">
    <!-- //Fonts -->
</head>

<body>
<!-- main -->
<div class="main-top-intro">
    <div class="bg-layer">
        <!-- header -->
        <div class="wrapper">

            <!-- //header -->
            <div class="content-inner-info" style="padding-top: 6em;">
                <h2>Say Hello !!!</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{--show message fail--}}
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="content-w3layouts-main" >

                    <div class="form-w3ls-left-info">
                        <form action="{{ route('register') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @php
                                $errorClass = '';
                                if (session()->has('email')) {
                                    $errorClass = ' is-invalid';
                                }
                            @endphp
                            <input type="text" name="name" placeholder="Họ và tên" />
                            <input type="email" name="email" placeholder="Email" />


                            @php
                                $errorClass = '';
                                if(session()->has('password')) {
                                    $errorClass = ' is-invalid';
                                }
                            @endphp
                            <input type="password" name="password" placeholder="Password" />
                            <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" />
                            <input type="text" name="phone_number" placeholder="Số điện thoại" />
                            <input type="text" name="gender" placeholder="Giới tính" />
                            <input type="text" name="address" placeholder="Địa chỉ" />

                            <div class="bottom">
                                <button class="btn" type="submit">Đăng ký thành viên</button>

                            </div>

                        </form>
                    </div>

                </div>
            </div>
            <!-- copyright -->

            <!-- //copyright -->
        </div>
    </div>
</div>
<!-- //main -->

</body>

</html>
