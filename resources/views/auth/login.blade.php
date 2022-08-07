<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Practical Exam</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css')}}">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body">
                    <div class="header" style="text-align: center; margin-top:20px;">
                    <h2 style="font-size: 1rem;">LOGIN USER</h2>
            </div>
                <form method="POST" action="{{ route('login') }}">

                    @csrf
                    @if(Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif

                    <div class="input-group form-group">
                        <label for="username" class="input-group">Email</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope white-icon"></i></span>
                        </div>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" name="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group form-group">
                        <label for="password" class="input-group">Password</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key white-icon"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="social-auth-links text-center mb-3" style="margin-top: 30px;">
                        <button type="submit" name="submit" class="btn btn-default btn-block" style="font-weight: 500">Login</button>
                    </div>
                </form>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>

</html>
