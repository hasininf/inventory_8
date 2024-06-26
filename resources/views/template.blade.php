<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ url('assets') }}/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('assets') }}/plugins/select2/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('assets') }}/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets') }}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ url('assets') }}/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-green-light sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{ url('assets') }}/index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b></b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">INV <b>Inventory</b></span>
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

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-sign-out"></i>
                            </a>

                        </li>
                    </ul>
                </div>
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
                        <img src="{{ url('assets') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>
                            @auth
                                Hello, {{ Auth::user()->name }}
                            @endauth
                        </p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="{{ url('dashboard') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('kategori') }}">
                            <i class="fa fa-building"></i> <span>Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('satuan') }}">
                            <i class="fa fa-table"></i> <span>Satuan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('barang') }}">
                            <i class="fa fa-table"></i> <span>Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('transaksimasuk') }}">
                            <i class="fa fa-cart-plus"></i> <span>Transaksi Masuk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('transaksikeluar') }}">
                            <i class="fa  fa-shopping-cart"></i> <span>Transaksi Keluar</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('laporan') }}">
                            <i class="fa fa-file"></i> <span>Laporan</span>
                        </a>
                    </li>
                    @if (Auth::check())
                        <li>
                            <a href="{{ route('logout') }}">
                                <i class="fa fa-power-off"></i> <span>Keluar</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        @yield('content')
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 3.0.0
            </div>
            <strong>Shared by <i class="fa fa-love"></i><a href="https://emhatech.com">EmhaTech</a>
        </footer>

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ url('assets') }}/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ url('assets') }}/bootstrap/js/bootstrap.min.js"></script>

    <!-- Select2 -->
    <script src="{{ url('assets') }}/plugins/select2/select2.full.min.js"></script>
    <!-- DataTables -->
    <script src="{{ url('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('assets') }}/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="{{ url('assets') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{ url('assets') }}/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('assets') }}/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('assets') }}/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $(".select2").select2();
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

    @yield('script')
</body>

</html>
