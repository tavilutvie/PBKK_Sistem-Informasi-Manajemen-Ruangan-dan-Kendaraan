<!-- Navbar -->
<nav class="container-fluid navbar navbar-expand-lg bg-light sticky-top px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img id="logo-simrk" src="/src/img/SIMRKLogo.png" alt="Logo SIMRK" width="180" height="80.04">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            @if ($page === "Home")
                                <b>Beranda</b>
                            @else
                                Beranda
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">
                            @if ($page === "About")
                                <b>Tentang Kami</b>
                            @else
                                Tentang Kami
                            @endif
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @if ($page === "Ruangan")
                                <b>Kategori Pemesanan - Ruangan</b>
                            @elseif ($page === "Kendaraan")
                                <b>Kategori Pemesanan - Kendaraan</b>
                            @else
                                Kategori Pemesanan
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/roomList">Ruangan</a></li>
                            <li><a class="dropdown-item" href="/vehicleList">Kendaraan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown d-md-none">
                    @guest
                        <a href="login" class="nav-link">Login</a>
                        <a href="register" class="nav-link">Buat Akun</a>
                    @endguest
                    @auth
                        <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                                Halo, {{ auth()->user()->name }}
                                @if (auth()->user()->akun->is_verified == true)
                                    <span class="badge bg-success">Akun Terverifikasi</span>
                                @else
                                    <span class="badge bg-danger">Menunggu Verifikasi</span>
                                @endif
                        </a>
                        <ul class="dropdown-menu">
                            @if (auth()->user()->akun->is_verified == true)
                                <li><a href="/orderList" class="dropdown-item">Pesanan Anda</a></li>
                            @endif
                            <form class="my-2" action="/logout" method="GET">
                                @csrf
                                <button type="submit" class="dropdown-item">Keluar</button>
                            </form>
                        </ul>
                    @endauth
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="dropdown mx-2 d-none d-md-block">
                        <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/src/icon/AccountIcon.svg" alt="Account Icon" width="36px" height="36px">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @auth
                                <li class="dropdown-item">
                                    Halo, {{ auth()->user()->name }}
                                    @if (auth()->user()->akun->is_verified == true)
                                        <span class="badge bg-success">Akun Terverifikasi</span>
                                    @else
                                        <span class="badge bg-danger">Menunggu Verifikasi</span>
                                    @endif
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                @if (auth()->user()->akun->is_verified == true)
                                <li><a class="dropdown-item" href="/orderList">Pesanan Anda</a></li>
                                @endif
                                <form class="my-3" action="/logout" method="GET">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Keluar</button>
                                </form>
                            @endauth
                            @guest
                                <li><a class="dropdown-item" href="login">Login</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="register">Buat Akun Baru</a></li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!---->
