<!doctype html>
<html class="no-js" lang="">
<head>
<!-- Head -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Es.Kopi</title>
    <meta name="description" content="Admin Es.Kopi">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('assets/admin/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css')}}">

    <!-- Boostrap -->
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{asset('assets/admin/scss/style.css')}}">
    <link href="{{asset('assets/admin/css/lib/vector-map/jqvmap.min.css')}}" rel="stylesheet">

    <link href='{{url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800')}} rel='stylesheet' type='text/css'>
<!-- End -->
</head>
<body>
<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{url ('/')}}">K-Style Outlet</a>
                <a class="navbar-brand hidden" href="{{url ('/')}}">K</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{url ('Dashboards')}}" class="mt-3"> <i class="menu-icon fa fa-dashboard"></i><Strong>Dashboard</Strong></a>
                    </li>
                    <h3 class="menu-title">Master</h3>
                    <li class="active">
                        <a href="{{route ('Transaksis.index')}}"> <i class="menu-icon fa fa-cart-arrow-down"></i><Strong>Transaksi</Strong></a>
                    </li>
                    <li class="active">
                        <a href="{{route ('TransaksiDetail')}}"> <i class="menu-icon fa fa-cart-arrow-down"></i><Strong>Transaksi Detail</Strong></a>
                    </li>
                    <li class="active">
                        <a href="{{route ('Produks.index')}}"> <i class="menu-icon fa fa-table"></i><strong>Produk</strong></a>
                    </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
<!-- /#left-panel -->

<!-- Left/Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div style="float: left; margin-top: 7px; margin-right: 10px">{{Auth::user()->name}}</div>
                            <img class="user-avatar rounded-circle" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%" src="{{asset ('assets/admin/images/default.png')}}" alt="Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i> <strong>Keluar</strong> 
                            </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </div>
                    </div>
                    <div class="" id="language-select">
                            <i class="flag-icon flag-icon-id"></i>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->
       @yield('Page Title')

       @yield('Content')
             <!-- .content -->
    </div>
<!-- Left/Right-panel -->

<!-- Javascript -->
    <!-- Right Panel -->
    <script src="{{asset('assets/admin/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins.js')}}"></script>
    <script src="{{asset('assets/admin/js/main.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/chart-js/Chart.bundle.js')}}"></script>
    <script src="{{asset('assets/admin/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/admin/js/widgets.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/vector-map/jquery.vmap.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/vector-map/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>

    <!-- Table -->
    <script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/lib/data-table/datatables-init.js')}}"></script>


    <!-- Modal -->
    <script src="{{asset('https://code.jquery.com/jquery-3.6.0.min.js')}}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js')}}" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <!-- Date -->
    <script src="{{url('https://code.jquery.com/jquery-1.12.4.js')}}"></script>
    <script src="{{url('https://code.jquery.com/ui/1.12.1/jquery-ui.js')}}"></script>
    <script>
        $(function(){
            $(".datepicker").datepicker();
        });
    </script>
<!-- End -->
</body>
</html>
