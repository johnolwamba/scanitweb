<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">SCANIT</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                {{Auth::user()->name}}<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href=""><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li class="active">
                    <a href="{{ route('products') }}"><i class="fa fa-shopping-bag fa-fw"></i> Products</a>
                </li>
                 <li>
                    <a href="{{ route('orders') }}"><i class="fa fa-shopping-cart fa-fw"></i> Orders</a>
                </li>
                <li>
                    <a href="{{ route('payments') }}"><i class="fa fa-money fa-fw"></i> Payments</a>
                </li>
                <li>
                    <a href="{{ route('customers') }}"><i class="fa fa-users fa-fw"></i> Customers</a>
                </li>
                <li>
                    <a href="{{ route('scans') }}"><i class="fa fa-mobile-phone fa-fw"></i> Scans</a>
                </li>
                <li>
                    <a href="{{ route('stations') }}"><i class="fa fa-bitcoin fa-fw"></i> Stations</a>
                </li>
                @can('view-reports')
                <li>
                    <a href="{{ route('reports') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Reports</a>
                </li>

                 @endcan
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>