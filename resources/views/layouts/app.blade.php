<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Portal') }}</title>
        <!-- Bootstrap core CSS -->
        
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        
        <link href="assets/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/animate.min.css" rel="stylesheet">
        
        <!-- Custom styling plus plugins -->
        <link href="assets/css/custom.css" rel="stylesheet">
        <link href="assets/css/icheck/flat/green.css" rel="stylesheet">
        
        <link href="assets/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/customestyle.css" rel="stylesheet" type="text/css" />
        
        <script src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <!--[if lt IE 9]>
              <script src="../assets/js/ie8-responsive-file-warning.js"></script>
              <![endif]-->
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
              <![endif]-->
        <!-- Styles -->
        @if (Auth::guest())
        <link href="css/app.css" rel="stylesheet">
        @endif
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        
        <!-- bootstrap progress js -->
        <script type="text/javascript" src="assets/js/progressbar/bootstrap-progressbar.min.js"></script>
        <script type="text/javascript" src="assets/js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script type="text/javascript" src="assets/js/icheck/icheck.min.js"></script>
        
        <script type="text/javascript" src="assets/js/custom.js"></script>
        
        <!-- Datatables-->
        <script type="text/javascript" src="assets/js/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/js/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="assets/js/datatables/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="assets/js/datatables/buttons.bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/datatables/jszip.min.js"></script>
        <script type="text/javascript" src="assets/js/datatables/pdfmake.min.js"></script>
        <script type="text/javascript" src="assets/js/datatables/vfs_fonts.js"></script>
        <script type="text/javascript" src="assets/js/datatables/buttons.html5.min.js"></script>
        <script type="text/javascript" src="assets/js/datatables/buttons.print.min.js"></script>
        <script type="text/javascript" src="assets/js/datatables/dataTables.fixedHeader.min.js"></script>
        <script type="text/javascript" src="assets/js/datatables/dataTables.keyTable.min.js"></script>
        <script type="text/javascript" src="assets/js/datatables/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="assets/js/datatables/responsive.bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/datatables/dataTables.scroller.min.js"></script>
        <!-- daterangepicker -->
        <script type="text/javascript" src="assets/js/moment/moment.min.js"></script>
        <!-- pace -->
        <script type="text/javascript" src="assets/js/pace/pace.min.js"></script>
        
        
        <link rel="stylesheet" href="assets/js/chosen/chosen.css">
        <script type="text/javascript" src="assets/js/chosen/chosen.jquery.js"></script>

        
        <script type="text/javascript" >
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body class="nav-md">    
        @if (Auth::guest())
<!--    <body>-->
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        
                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Portal') }}
                        </a>
                    </div>
                    
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>
                        
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <!--<li><a href="{{ url('/register') }}">Register</a></li>-->
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            
            @yield('content')
        </div>
        
        <!-- Scripts -->
        <script src="/js/app.js"></script>
        @else
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="{{ url('/') }}" class="site_title">
<!--                                <i class="fa fa-paw"></i> 
                                <span>{{ config('app.name', 'Portal') }}</span>-->
                                
                            </a>
                        </div>
                        <div class="clearfix"></div>
                        
                        <!-- menu prile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
<!--                                <img src="uploads/@if(empty(Auth::user()->attachments)){{'user.jpg'}}@else{{Auth::user()->attachments}}@endif" alt="..." class="img-circle profile_img">-->
                                <img src="images/logo.png" alt="logo" style="width: 86px; height: auto;" />
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2> {{ Auth::user()->name }} </h2>
                            </div>
                        </div>
                        <!-- /menu prile quick info -->
                        
                        <br />
                        
                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            
                            <div class="menu_section">
                                <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>
                                <ul class="nav side-menu">
                                    <li class="@if($page == 'dashboard')active @endif"><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" @if($page == 'dashboard')style="display:block;" @endif>
                                            <li class="@if($page == 'dashboard')current-page @endif"><a href="dashboard">Dashboard</a></li>
                                        </ul>
                                    </li>
                                    <li class="@if($page == 'products' || $page == 'inventorylevels' || $page == 'needsrestocking' || $page == 'discontinued' || $page == 'productcategory' || $page == 'productsuppliers')active @endif"><a><i class="fa fa-cubes"></i> Products <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" @if($page == 'products' || $page == 'inventorylevels' || $page == 'needsrestocking' || $page == 'discontinued' || $page == 'productcategory' || $page == 'productsuppliers')style="display:block;" @endif>
                                            <li class="@if($page == 'products')current-page @endif"><a href="products">Products list</a></li>
                                            <li class="@if($page == 'inventorylevels')current-page @endif"><a href="inventorylevels">Inventory Levels</a></li>
                                            <li class="@if($page == 'needsrestocking')current-page @endif"><a href="needsrestocking">Needs Restocking</a></li>
                                            <li class="@if($page == 'discontinued')current-page @endif"><a href="discontinued">Discontinued Products</a></li>
                                            <li class="@if($page == 'productcategory')current-page @endif"><a href="productcategory">Product Categories</a></li>
                                            <li class="@if($page == 'productsuppliers')current-page @endif"><a href="productsuppliers">Product Suppliers</a></li>
                                        </ul>
                                    </li>
                                    <li class="@if($page == 'orders' || $page == 'needinvoicing' || $page == 'readytoship' || $page == 'awaitingpayment' || $page == 'completedorders' || $page == 'ordercustomers' || $page == 'shippers')active @endif"><a><i class="fa fa-paper-plane"></i> Orders <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" @if($page == 'orders' || $page == 'needinvoicing' || $page == 'readytoship' || $page == 'awaitingpayment' || $page == 'completedorders' || $page == 'ordercustomers' || $page == 'shippers') style="display:block;" @endif>
                                            <li class="@if($page == 'orders')current-page @endif"><a href="orders">Orders list</a></li>
                                            <li class="@if($page == 'needinvoicing')current-page @endif"><a href="needinvoicing">Need Invoicing</a></li>
                                            <li class="@if($page == 'readytoship')current-page @endif"><a href="readytoship">Ready To Ship</a></li>
                                            <li class="@if($page == 'awaitingpayment')current-page @endif"><a href="awaitingpayment">Awaiting Payment</a></li>
                                            <li class="@if($page == 'completedorders')current-page @endif"><a href="completedorders">Completed Orders</a></li>
                                            <li class="@if($page == 'ordercustomers')current-page @endif"><a href="ordercustomers">Customers</a></li>
                                            <li class="@if($page == 'ordershippers')current-page @endif"><a href="ordershippers">Shippers</a></li>
                                        </ul>
                                    </li>
                                    <li class="@if($page == 'purchases' || $page == 'awaitingapproval' || $page == 'inventoryreceiving' || $page == 'completedpurchases' || $page == 'purchasessuppliers')active @endif"><a><i class="fa fa-shopping-cart"></i> Purchases <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" @if($page == 'purchases' || $page == 'awaitingapproval' || $page == 'inventoryreceiving' || $page == 'completedpurchases' || $page == 'purchasessuppliers') style="display:block;" @endif>
                                            <li class="@if($page == 'purchases')current-page @endif"><a href="purchases">Orders list</a></li>
                                            <li class="@if($page == 'awaitingapproval')current-page @endif"><a href="awaitingapproval">Awaiting Approval</a></li>
                                            <li class="@if($page == 'inventoryreceiving')current-page @endif"><a href="inventoryreceiving">Inventory Receiving</a></li>
                                            <li class="@if($page == 'completedpurchases')current-page @endif"><a href="completedpurchases">Completed Purchases</a></li>
                                            <li class="@if($page == 'purchasessuppliers')current-page @endif"><a href="purchasessuppliers">Suppliers</a></li>
                                        </ul>
                                    </li>
                                    <li class="@if($page == 'customers' || $page == 'employees' || $page == 'suppliers' || $page == 'categories' || $page == 'shippers')active @endif"><a><i class="fa fa-users"></i> Advanced <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" @if($page == 'customers' || $page == 'employees' || $page == 'suppliers' || $page == 'categories' || $page == 'shippers') style="display:block;" @endif>
                                            <li class="@if($page == 'customers')current-page @endif"><a href="customers">Customers</a></li>
                                            <!--<li class="@if($page == 'employees')current-page @endif"><a href="employees">Employees</a></li>-->
                                            <li class="@if($page == 'suppliers')current-page @endif"><a href="suppliers">Suppliers</a></li>
                                            <li class="@if($page == 'categories')current-page @endif"><a href="categories">Categories</a></li>
                                            <li class="@if($page == 'shippers')current-page @endif"><a href="shippers">Shippers</a></li>
                                        </ul>
                                    </li>
                                    <li class="@if($page == 'reportcenter')active @endif"><a><i class="fa fa-file-text"></i> Reports <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" @if($page == 'reportcenter') style="display:block;" @endif>
                                            <li class="@if($page == 'reportcenter')current-page @endif"><a href="reportcenter">Report Center</a></li>
                                        </ul>
                                    </li>
                                    @if(Auth::user()->user_type == 1)
                                    <li class="@if($page == 'userlist')active @endif"><a><i class="fa fa-user"></i> User Profiles <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" @if($page == 'userlist') style="display:block;" @endif>
                                            <li class="@if($page == 'userlist')current-page @endif" ><a href="userlist" >Users List</a></li>
                                        </ul>
                                    </li>
                                    <li class="@if($page == 'settings')active @endif"><a><i class="fa fa-cog"></i> Settings <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" @if($page == 'settings') style="display:block;" @endif>
                                            <li class="@if($page == 'settings')current-page @endif" ><a href="settings" >Settings</a></li>
                                        </ul>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            
                        </div>
                        <!-- /sidebar menu -->
                        
                        <!-- /menu footer buttons -->
                        <!--<div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>-->
                        <!-- /menu footer buttons -->
                    </div>
                </div>
                <!-- top navigation -->
                <div class="top_nav">
                    
                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            
                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="uploads/@if(empty(Auth::user()->attachments)){{'user.jpg'}}@else{{Auth::user()->attachments}}@endif" alt="">{{ Auth::user()->name }}
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="{{ url('/logout') }}"
                                               onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out pull-right"></i>
                                                Logout
                                            </a>
                                            
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li role="presentation" class="dropdown">
                                    <!--<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">6</span>
                                    </a>-->
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                        <li>
                                            <a>
                                                <span class="image">
                                                    <img src="assets/images/img.jpg" alt="Profile Image" />
                                                </span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image">
                                                    <img src="assets/images/img.jpg" alt="Profile Image" />
                                                </span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image">
                                                    <img src="assets/images/img.jpg" alt="Profile Image" />
                                                </span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image">
                                                    <img src="assets/images/img.jpg" alt="Profile Image" />
                                                </span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="text-center">
                                                <a>
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                
                            </ul>
                        </nav>
                    </div>
                    
                </div>
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main">
                    @if($page == 'dashboard')
                    <div class="row">    
                        <div class="tab-pane fade in active " id="one">
                            <ul class="nav navbar-nav in" id="one-nav">
                                
                                <li><a href="#" id="btn-customer-order" data-toggle="modal" data-target="#newCustomerOrder"><i class="fa fa-user-plus" aria-hidden="true"></i> New Customer Order </a></li>
                                <li><a href="#" id="btn-create-purchase-order" data-toggle="modal" data-target="#newPurchaseOrder"><i class="fa fa-user-plus" aria-hidden="true"></i> New Purchase Order</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
        
        @if(Auth::user()->first_login == 0 && Auth::user()->user_type != 1)
            @include('user.resetPasswordModal')
        @endif
        
        @endif
        <div id="divProcessing" style="width: 100%; height: 100%; position: absolute; background-color: rgba(0, 0, 0, 0.2); 
             top: 0; left: 0; z-index: 100000; display: none;" >
            
            <div align="center" style="margin-top: 250px;">
                <span style="" >
                    <h1 style="width: 220px; height: 45px; background-color: #000000; color: #ffffff; ">Processing...</h1>
                </span>
            </div>
            
        </div>
    </body>
</html>
