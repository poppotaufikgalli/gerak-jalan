@include('layouts.header1')
@include('sweetalert::alert')
	<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-gerak-jalan">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 small" href="index.html">Gerak Jalan Proklamasi</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
                <i class='bx bx-menu'></i>
            </button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="bx bx-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-user"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                        	<form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" href="{{route('logout')}}">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            @include('partials.sidenav-admin')
            <div id="layoutSidenav_content">
    	        <main>
    	            <div class="container-fluid px-4">
    	                <h2 class="mt-4 d-flex justify-content-between">
                            @yield('title')
                            @php($back = request()->segment(1))
                            <a href="{{route($back)}}" class="link link-danger"><i class="bx bx-x-circle"></i></a>
                        </h2>
    	                <ol class="breadcrumb mb-4">
    	                    <li class="breadcrumb-item active">@yield('subtitle')</li>
    	                </ol>
    	            </div>
    	            @yield('content')    
    	        </main>
    	        <footer class="py-4 bg-light mt-auto">
    	            <div class="container-fluid px-4">
    	                <div class="d-flex align-items-center justify-content-between small">
    	                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
    	                    <div>
    	                        <a href="#">Privacy Policy</a>
    	                        &middot;
    	                        <a href="#">Terms &amp; Conditions</a>
    	                    </div>
    	                </div>
    	            </div>
    	        </footer>
    	    </div>
        </div>
    </body>
@yield('js-content')
