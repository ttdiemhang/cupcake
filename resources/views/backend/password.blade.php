<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/lte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/plugins/lte//plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/plugins/lte//dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script>
        function  showHidden() {
            $(".col-md-6 i").click(function () {
let $this=$(this);
if ($this.hasClass('active'))
{
$this.parent('.col-md-6').find('input').attr('type','password')
    $this.removeClass('active');
}else {
    $this.parent('.col-md-6').find('input').attr('type','text')
    $this.addClass('active');
}
            })
        }
    </script>
</head>
<body class="hold-transition login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Đổi mật khẩu') }}</div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('admin-update') }}">
                            @csrf

{{--                            <input type="hidden" name="token" value="{{ $token }}">--}}

                            <div class="form-group row" style="position: relative">
                                <label for="password_old" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu cũ') }}</label>
                                <div class="col-md-6">

                                    <input  type="password" class="form-control @error('password_old') is-invalid @enderror" name="password_old" value="{{ $email ?? old('email') }}" >
                                    @error('password_old')

                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <i style="position: absolute; top:35%; right: 15px; cursor: pointer" class="fa fa-eye" onclick="showHidden()"></i>
                                </div>
                            </div>

                            <div class="form-group row" style="position: relative">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu mới') }}</label>
                                <i class="fa fa-eye"></i>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="position: relative">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Xác nhận mật khẩu') }}</label>
                                <i class="fa fa-eye"></i>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirm" >
                                    @error('password_confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/plugins/lte//plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/lte//plugins/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>
</html>
