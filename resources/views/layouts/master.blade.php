<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EMKT</title>
    <!-- Icons-->
    {{--<link href="css/coreui-icons.min.css" rel="stylesheet">--}}
    {{--<link href="css/flag-icon.min.css" rel="stylesheet">--}}
    {{--<link href="css/font-awesome.min.css" rel="stylesheet">--}}
    {{--<link href="css/simple-line-icons.css" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="css/bootstrap.min.css">--}}
    {{--<!-- Main styles for this application-->--}}
    {{--<link href="css/style.css" rel="stylesheet">--}}
    {{--<link href="css/pace.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('css/material.min.css') }}">--}}
    {{--<link rel="stylesheet" href="{{ asset('css/dataTables.material.min.css') }}">--}}
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ asset('images/CYMEDIA-LOGO-CL.png') }}" width="89"  alt="CYMEDIA Logo">
        <img class="navbar-brand-minimized" src="{{ asset('img/brand/sygnet.svg') }}" width="30" height="30" alt="CoreUI Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav d-md-down-none">

    </ul>
    <ul class="nav navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="{{ asset('img/avatars/7.jpg') }}" alt="admin@bootstrapmaster.com">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="{{ route('crear.usuario') }}">
                    <i class="fa fa-envelope-o"></i> Crear usuario

                </a>
                <a class="dropdown-item" href="{{ route('update.datos') }}">
                    <i class="fa fa-envelope-o"></i> Modificar datos

                </a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>
<div class="app-body" id="app">
    @include('partials.sidebar')
    @yield('content')
    @include('partials.aside')
</div>
@include('partials.footer')
<!-- Bootstrap and necessary plugins-->
{{--<script src="js/jquery.min.js"></script>--}}
{{--<script src="js/popper.min.js"></script>--}}
{{--<script src="js/bootstrap.min.js"></script>--}}
{{--<script src="js/pace.min.js"></script>--}}
{{--<script src="js/perfect-scrollbar.min.js"></script>--}}
{{--<script src="js/coreui.min.js"></script>--}}
{{--<!-- Plugins and scripts required by this view-->--}}
{{--<script src="js/Chart.min.js"></script>--}}
{{--<script src="js/custom-tooltips.min.js"></script>--}}
{{--<script src="js/main.js"></script>--}}
<script src="{{ asset('js/all.js') }}"></script>
{{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
{{--<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>--}}
<script src="{{ asset('js/datatables.js') }}"></script>
<script src="{{ asset('js/dataTables.select.min.js') }}"></script>
{{--<script src="{{ asset('js/dataTables.material.min.js') }}"></script>--}}

@include('sweetalert::alert')
@stack('edit-lista')
@stack('descargar-todos')
@stack('progress-bar')
</body>
</html>