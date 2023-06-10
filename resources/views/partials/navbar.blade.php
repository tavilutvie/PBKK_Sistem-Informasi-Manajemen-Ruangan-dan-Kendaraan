<!-- Navbar -->
<nav class="container-fluid navbar navbar-expand-lg bg-light sticky-top px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
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
                            Kategori Pemesanan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./res/list_ruangan.php">Ruangan</a></li>
                            <li><a class="dropdown-item" href="./res/list_kendaraan.php">Kendaraan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link" href="#">Akun Saya</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <form class="d-flex mx-2" role="search">
                        <input class="form-control me-2" type="search" placeholder="Ingin menyewa apa?"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Cari</button>
                    </form>
                    <div class="dropdown mx-2 d-none d-md-block">
                        <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="./src/icon/AccountIcon.svg" alt="Account Icon" width="36px" height="36px">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-item">Halo, User</li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./res/list_pesanan.php">Pesanan Anda</a></li>
                            <form class="my-3" action="./helper/logout_process.php" method="post">
                                <button type="submit" class="dropdown-item">Keluar</button>
                            </form>
                            <li><a class="dropdown-item" href="login">Login</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="register">Buat Akun Baru</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!---->