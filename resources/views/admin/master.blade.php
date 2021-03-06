<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}
    {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') !!}
    {!! Html::style('bower_components/AdminLTE/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('bower_components/AdminLTE/dist/css/skins/skin-blue.min.css') !!}
    <!--[if lt IE 9]>
    {!! Html::script('//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') !!}
    {!! Html::script('//oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}
    <![endif]-->
    {!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
    @yield('head')
    {{--{!! Html::style('css/style.css') !!}--}}
    {!! Html::style('css/app.min.css') !!}
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{!! url('admin') !!}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>ADM</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Teedlee</b>Admin</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    @include('admin.nav')

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"><h1>@yield('title')</h1></section>

        <!-- Main content -->
        <section class="content">
            @include('admin/alerts')
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2016 <a href="{!! url('') !!}">Teedlee</a>.</strong> All rights
        reserved.
    </footer>
</div>
{!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
{!! Html::script('bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! Html::script('bower_components/AdminLTE/plugins/fastclick/fastclick.js') !!}
{!! Html::script('js/ui.js') !!}
{!! Html::script('js/script.js') !!}
{!! Html::script('bower_components/AdminLTE/dist/js/app.min.js') !!}
@yield('scripts')
</body>
</html>
