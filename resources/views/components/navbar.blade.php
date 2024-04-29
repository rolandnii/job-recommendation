<!-- Navigation Bar-->
<header id="topnav" class="defaultscroll scroll-active">
    <!-- Tagline STart -->
    <x-tagline />
    <!-- Tagline End -->
    <!-- Menu Start -->
    <div class="container">
        <!-- Logo container-->
        <div>
            <a href="{{url('/')}}" class="logo">
                <img src="{{asset('template/images/logo-light.png')}}" alt="" class="logo-light" height="18" />
                <img src="{{asset('template/images/logo-dark.png')}}" alt="" class="logo-dark" height="18" />
            </a>
        </div>
        <div class="buy-button">
            <a href="{{url('login')}}" class="btn btn-primary"><i class="mdi mdi-cloud-upload"></i> Login</a>
        </div><!--end login button-->
        <!--end login button-->
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="has-submenu">
                    <a href="{{url('/jobs')}}">Jobs</a>
                </li>
                <li class="has-submenu">
                    <a href="{{url('/companies')}}">Companies </a>
                </li>

            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
    <!--end end-->
</header><!--end header-->
<!-- Navbar End -->
