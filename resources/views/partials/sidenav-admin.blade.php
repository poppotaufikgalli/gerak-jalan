<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route('main')}}">
                    <div class="sb-nav-link-icon"><i class="bx bx-tachometer"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{route('konfig')}}">
                    <div class="sb-nav-link-icon"><i class="bx bx-cog"></i></div>
                    Konfigurasi
                </a>
                <a class="nav-link" href="{{route('lomba')}}">
                    <div class="sb-nav-link-icon"><i class="bx bx-layer"></i></div>
                    Kategori Lomba
                </a>
                <a class="nav-link" href="{{route('kat_peserta')}}">
                    <div class="sb-nav-link-icon"><i class="bx bx-layer"></i></div>
                    Kategori Peserta
                </a>
                <!--<a class="nav-link" href="{{route('lomba')}}">
                    <div class="sb-nav-link-icon"><i class="bx bx-layer"></i></div>
                    Kategori Penjurian
                </a>
                <a class="nav-link" href="{{route('pos_juri')}}">
                    <div class="sb-nav-link-icon"><i class="bx bx-flag"></i></div>
                    Data Pos Juri
                </a>-->
                <a class="nav-link" href="{{route('pendaftar', ['id' => 0])}}">
                    <div class="sb-nav-link-icon"><i class="bx bx-user"></i></div>
                    Data Pendaftar
                </a>
                <div class="sb-sidenav-menu-heading">Penjurian</div>
                @if($katLomba)
                    @foreach($katLomba as $key => $value)
                        <a class="nav-link" href="{{route('penilaian', ['id' => $value->id])}}">
                            <div class="sb-nav-link-icon"><i class="bx bx-tachometer"></i></div>
                            {{$value->judul}}
                        </a>
                    @endforeach
                @endif
                <!--<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="bx bx-columns"></i></div>
                    Pendaftar
                    <div class="sb-sidenav-collapse-arrow"><i class="bx bx-chevron-down"></i></div>
                </a>
                <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link sub-nav-link" href="{{route('pendaftar', ['id' => 0])}}">Semua</a>
                        @if($katLomba)
                            @foreach($katLomba as $key => $value)
                                <a class="nav-link sub-nav-link" href="layout-sidenav-light.html">{{$value->judul}}</a>
                            @endforeach
                        @endif
                        
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="bx bx-book-open"></i></div>
                    Kategori Lomba
                    <div class="sb-sidenav-collapse-arrow"><i class="bx bx-chevron-down"></i></div>
                </a>-->
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="{{route('user')}}">
                    <div class="sb-nav-link-icon"><i class="bx bx-chart"></i></div>
                    Pengguna
                </a>
                <!--<a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="bx bx-chart"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="bx bx-table"></i></div>
                    Tables
                </a>-->
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{session()->get('nama')}}
        </div>
    </nav>
</div>