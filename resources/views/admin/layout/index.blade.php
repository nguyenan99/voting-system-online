<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">

    <!-- Font Awesome -->
        <link rel="stylesheet" href="admin_asset/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="admin_asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="admin_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="admin_asset/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="admin_asset/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="admin_asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="admin_asset/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="admin_asset/plugins/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->


        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <div class="" style="margin-right: 5px">
                    <h3>Tìm kiếm</h3>
                </div>

                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">

            </div>
        </form>


    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        @if(Auth::user()->role == 1)
        <div class="sidebar">
            <!-- Sidebar customer panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="admin_asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Xin chào Admin </br> {{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Bảng điều khiển
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/candidate/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ứng viên</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/users/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Người dùng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/position/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Vị trí ứng cử</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="admin/column-searching" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kết quả tổng quan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/result2" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách trúng cử</p>
                                </a>
                            </li>
{{--                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">--}}

{{--                                <li class="nav-item has-treeview menu-open">--}}
{{--                                    <a href="#" class="nav-link">--}}
{{--                                        <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                                        <p>--}}
{{--                                            Kết quả theo vị trí--}}
{{--                                            <i class="right fas fa-angle-left"></i>--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                    <hr style="border : 0.5px solid white ">--}}
{{--                                    @foreach($positi as $p)--}}
{{--                                    <ul class="nav nav-treeview">--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a href="admin/candidate/listByPosition/{{$p->id}}" class="nav-link">--}}
{{--                                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                                <p>Kết quả tại vị trí: {{$p->position_name}}</p>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                    @endforeach--}}
{{--                                    <hr style="border : 0.5px solid white ">--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                            <hr style="border : 0.5px solid white ">
                            <li class="nav-item ">
                                <a href="admin/users/repair_account"  class="nav-link" >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tài khoản</p>
                             </a>
                            <li class="nav-item ">
                                <a href="admin/users/add"  class="nav-link" >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo tài khoản admin</p>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a href="logout" onclick="return confirm('Are you sure?')" class="nav-link" >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Logout</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>

        @else
        <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar customer panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="admin_asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Xin chào {{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <?php
                                    $user = Auth::user();
                                    ?>
                                    <a href="customer/history_vote/{{$user->id}}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Your votes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="customer/profile" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profile</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="logout" onclick="return confirm('Are you sure?')" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Logout</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        @endif
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->
{{--        Main Content --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
{{--        / main content --}}


    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.3-pre
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

{{--script--}}
    @yield('sc')
{{--script--}}
<!-- jQuery -->
<script src="admin_asset/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin_asset/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="admin_asset/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="admin_asset/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="admin_asset/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="admin_asset/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="admin_asset/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="admin_asset/plugins/moment/moment.min.js"></script>
<script src="admin_asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="admin_asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="admin_asset/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin_asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin_asset/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin_asset/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin_asset/dist/js/demo.js"></script>
{{--<script src="admin_asset/plugins/jquery/jquery.min.js"></script>--}}
{{--<!-- jQuery UI 1.11.4 -->--}}
{{--<script src="admin_asset/plugins/jquery-ui/jquery-ui.min.js"></script>--}}
{{--<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->--}}
{{--<script>--}}
{{--    $.widget.bridge('uibutton', $.ui.button)--}}
{{--</script>--}}
{{--<!-- Bootstrap 4 -->--}}
{{--<script src="admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
{{--<!-- ChartJS -->--}}
{{--<script src="admin_asset/plugins/chart.js/Chart.min.js"></script>--}}
{{--<!-- Sparkline -->--}}
{{--<script src="admin_asset/plugins/sparklines/sparkline.js"></script>--}}
{{--<!-- JQVMap -->--}}
{{--<script src="admin_asset/plugins/jqvmap/jquery.vmap.min.js"></script>--}}
{{--<script src="admin_asset/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>--}}
{{--<!-- jQuery Knob Chart -->--}}
{{--<script src="admin_asset/plugins/jquery-knob/jquery.knob.min.js"></script>--}}
{{--<!-- daterangepicker -->--}}
{{--<script src="admin_asset/plugins/moment/moment.min.js"></script>--}}
{{--<script src="admin_asset/plugins/daterangepicker/daterangepicker.js"></script>--}}
{{--<!-- Tempusdominus Bootstrap 4 -->--}}
{{--<script src="admin_asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>--}}
{{--<!-- Summernote -->--}}
{{--<script src="admin_asset/plugins/summernote/summernote-bs4.min.js"></script>--}}
{{--<!-- overlayScrollbars -->--}}
{{--<script src="admin_asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>--}}
{{--<!-- AdminLTE App -->--}}
{{--<script src="admin_asset/dist/js/adminlte.js"></script>--}}
{{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
{{--<script src="admin_asset/dist/js/pages/dashboard.js"></script>--}}
{{--<!-- AdminLTE for demo purposes -->--}}
{{--<script src="admin_asset/dist/js/demo.js"></script>--}}
</body>
</html>
