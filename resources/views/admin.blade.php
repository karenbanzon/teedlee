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
    {!! Html::style('bower_components/AdminLTE/dist/css/skins/_all-skins.min.css') !!}
    <!--[if lt IE 9]>
    {!! Html::script('//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') !!}
    {!! Html::script('//oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
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

            {{--<div class="navbar-custom-menu">--}}
                {{--<ul class="nav navbar-nav">--}}
                    {{--<!-- User Account: style can be found in dropdown.less -->--}}
                    {{--<li class="dropdown user user-menu">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">--}}
                            {{--<span class="hidden-xs">Alexander Pierce</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<!-- User image -->--}}
                            {{--<li class="user-header">--}}
                                {{--<img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}

                                {{--<p>--}}
                                    {{--Alexander Pierce - Web Developer--}}
                                    {{--<small>Member since Nov. 2012</small>--}}
                                {{--</p>--}}
                            {{--</li>--}}
                            {{--<!-- Menu Body -->--}}
                            {{--<li class="user-body">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-xs-4 text-center">--}}
                                        {{--<a href="#">Followers</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-4 text-center">--}}
                                        {{--<a href="#">Sales</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-4 text-center">--}}
                                        {{--<a href="#">Friends</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- /.row -->--}}
                            {{--</li>--}}
                            {{--<!-- Menu Footer-->--}}
                            {{--<li class="user-footer">--}}
                                {{--<div class="pull-left">--}}
                                    {{--<a href="#" class="btn btn-default btn-flat">Profile</a>--}}
                                {{--</div>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<a href="#" class="btn btn-default btn-flat">Sign out</a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<!-- Control Sidebar Toggle Button -->--}}
                    {{--<li>--}}
                        {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{!! \Auth::user()->firstname.' '.\Auth::user()->lastname !!}</p>
                    {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                        <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Layout Options</span>
                        <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                        <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                        <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                        <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Widgets</span>
                        <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Charts</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                        <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                        <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                        <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>UI Elements</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                        <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                        <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                        <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                        <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                        <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Forms</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                        <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                        <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Tables</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                        <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../calendar.html">
                        <i class="fa fa-calendar"></i> <span>Calendar</span>
                        <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
                    </a>
                </li>
                <li>
                    <a href="../mailbox/mailbox.html">
                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
                        <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
                    </a>
                </li>
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Examples</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                        <li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                        <li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                        <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                        <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                        <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                        <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                        <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                        <li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Multilevel</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Level One
                                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    </ul>
                </li>
                <li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                <li class="header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
                {{--<small>it all starts here</small>--}}
            </h1>
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
                {{--<li><a href="#">Examples</a></li>--}}
                {{--<li class="active">Blank page</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        {{--<div class="pull-right hidden-xs">--}}
            {{--<b>Version</b> 2.3.6--}}
        {{--</div>--}}
        {{--<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights--}}
        {{--reserved.--}}
    </footer>
</div>
{!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
{!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
{!! Html::script('bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! Html::script('bower_components/AdminLTE/plugins/fastclick/fastclick.js') !!}
{!! Html::script('bower_components/AdminLTE/dist/js/app.min.js') !!}
{{--<script src="../../dist/js/demo.js"></script>--}}
</body>
</html>
