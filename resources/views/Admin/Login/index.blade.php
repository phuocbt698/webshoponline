<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/access/admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/access/admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/access/admin') }}/dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="{{ asset('/access/admin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Sweetalert2-->
    <script src="{{ asset('/access/admin') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <link rel="stylesheet"
        href="{{ asset('/access/admin') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toast-->
    <script src="{{ asset('/access/admin') }}/plugins/toastr/toastr.min.js"></script>
    <script src="{{ asset('/access/admin') }}/jsCustom/toast.js"></script>
    <link rel="stylesheet" href="{{ asset('/access/admin') }}/plugins/toastr/toastr.min.css">
    <!-- Ajax  Form-->
    <script src="{{ asset('/access/admin') }}/jsCustom/ajaxForm.js"></script>
    <script src="{{ asset('/access/admin') }}/dist/js/adminlte.min.js"></script>
    <!-- Error Element-->
    <script src="{{ asset('/access/admin') }}/jsCustom/errorElement.js"></script>


</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('login.index') }}" class="h1">
                    <b>Admin</b>
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form id="formLogin" action="{{ route('login.login') }}" method="post" onsubmit="return false;">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <span id="errorEmail" class="error invalid-feedback"></span>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" id="password" class="form-control"
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <span id="errorPassword" class="error invalid-feedback"></span>
                    </div>
                    <div class="input-group mb-3">
                        <span id="errorLogin" class="text-danger"></span>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('/access/admin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/access/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#formLogin').submit(function() {
                var formData = new FormData(this);
                var errorTagArr = [
                    'password',
                    'email',
                    'login'
                ];
                var resultAjax = ajaxLogin("{{ route('login.login') }}", formData);
                if (resultAjax.href) {
                    window.location.replace(resultAjax.href);
                } else {
                    setError(errorTagArr, resultAjax);
                }
            })
        });
    </script>
</body>

</html>
