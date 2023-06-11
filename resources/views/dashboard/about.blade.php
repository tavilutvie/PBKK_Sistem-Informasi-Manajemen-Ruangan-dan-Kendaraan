@extends('Template.head')

@section('main_content')

@include('Partials.navbar')

    <!-- TITLE -->
    <div class="container py-5">
    <h1 class="text-center text-dark border-bottom border-5 py-2">TENTANG SIMRK ITS</h1>
</div>
<!---->

    <!-- LOGO -->
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <a href="/index.html">
                    <img src="/public/src/img/SIMRKLogo.png" alt="Logo" class="img-fluid mx-auto d-block">
                </a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-8 border-bottom border-3">
            <p class="text-center text-dark">SIMRK (Sistem Informasi Manajemen Ruangan dan Kendaraan) ITS adalah
                sebuah sistem informasi milik ITS yang digunakan untuk melayani peminjaman ruangan, kendaraan, dan
                lainnya oleh seluruh mahasiswa, dosen, dan elemen ITS sebagai bentuk pemenuhan kebutuhan warga ITS.
            </p>
        </div>
    </div>
</div>
<!---->

    <!-- Ruangan -->
    <div class="row container-fluid my-5">
        <div class="d-flex flex-wrap justify-content-center border-bottom border-3 py-3">
            <div class="d-flex justify-content-center">
                <img src="src/img/ruangan.webp" alt="Ruangan Disewakan" class="w-75 rounded">
            </div>
            <div class="w-50 text-center text-lg-start my-3 my-lg-0">
                <h2><b>RUANGAN</b></h2>
                <p class="my-3 text-dark">ITS senantiasa memenuhi kebutuhan ruangan yang dibutuhkan oleh mahasiswa dan
                    dosen. Ruangan-ruangan di ITS biasanya dipakai pada saat organisasi-organisasi mahasiswa
                    melaksanakan rapat-rapat rutin.</p>
                <p class="my-0 my-lg-3 text-dark">Ruangan-ruangan di ITS juga telah dilengkapi oleh beberapa keperluan
                    dasar untuk ruangan serbaguna, seperti layar, sound, kursi yang nyaman, serta keamanan dan
                    kebersihan.</p>
                <a href="../res/list_ruangan.php" class="btn btn-primary my-3">Pesan Sekarang</a>
            </div>
        </div>
    </div>
    <!---->

    <!-- Kendaraan -->
    <div class="row container-fluid mt-5">
        <div class="d-flex flex-wrap align-items-center align-items-lg-between flex-column-reverse flex-lg-row border-bottom border-3">
            <div class="w-50 text-center text-lg-end my-3 my-lg-0">
                <h2><b>KENDARAAN</b></h2>
                <p class="my-2 text-dark">ITS juga menyediakan kendaraan yang dapat dipakai sesuai syarat dan ketentuan
                    yang diatur oleh pihak Sarana dan Prasarana ITS.</p>
                <p class="my-0 my-lg-3 text-dark">Kendaraan-kendaraan yang disediakan terdiri dari kendaraan roda dua
                    dan roda empat. ITS menyediakan beberapa kendaraan, seperti mobil, truk pick-up, dan beberapa truk
                    besar lainnya untuk keperluan pemindahan barang dan lain sebagainya</p>
                <a href="../res/list_kendaraan.php" class="btn btn-primary my-3">Pesan Sekarang</a>
            </div>
            <div class="d-flex justify-content-center">
                <img src="../src/img/kendaraan.webp" alt="Kendaraan Disewakan" class="w-75">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center w-100 px-5 my-5">
        <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
<!---->

@include('Partials.footer')

@endsection
