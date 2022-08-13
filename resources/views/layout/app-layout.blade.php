
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Practical Exam</title>
    <!-- Tell the browser to be responsive to screen width -->
  <meta name="csrf-token" content="{{ csrf_token()}}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- SweetAlert2 -->
  <script src="{{ asset('assets/sweetalert2/sweetalert2.js')}}"></script>
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  @yield('style')
  </head>
<body class="layout-fixed sidebar-collapse">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <!-- Left navbar links -->
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Prescribe Digital</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            </ul>
            <div class="navbar-custom-menu">
                <ul class="navbar-nav ml-auto">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu" style="padding-top: 6px;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="margin-top: 12px;">
                            <a href="#" class="dropdown-item" style="padding-top: 20px;">
                                <!-- Message Start -->
                                <div class="media">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title black">
                                            {{Auth::user()->name}}
                                        </h3>
                                        <p class="text-sm black">{{Auth::user()->role}}</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#"class="dropdown-item black" data-toggle="modal"
                                data-target="#modal-profile">
                                <i class="fas fa-user"></i>&nbsp;&nbsp;Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item black" href="{{ route('logout')}}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ route('logout')}}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <i class="nav-icon fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->


  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- Content Wrapper. Contains page content -->

  <!-- PROFILE MODAL -->
  @include('profile.modal-profile')
  <!-- PROFILE MODAL -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js')}}"></script>

<script>var SITE_URL = "{{URL::to('/')}}";</script>
<script src="{{ asset('assets/js/admin-layout.js') }}"></script>
@yield('script')
</body>
</html>
