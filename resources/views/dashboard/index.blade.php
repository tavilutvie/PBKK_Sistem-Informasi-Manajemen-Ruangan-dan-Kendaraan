@extends('Template.head')

@section('main_content')

@include('Partials.navbar')

@if (session()->has('success'))
    <div class="d-flex justify-content-center align-items-center bg-success">
        <div class="alert alert-success alert-dismissible fade show w-25 my-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div class="d-flex justify-content-center align-items-center bg-danger">
        <div class="alert alert-danger alert-dismissible fade show w-25 my-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

    <!-- Carousel -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-item active">
          <img src="/src/img/GedungRektorat.webp" class="d-block w-100" alt="Gedung Rektorat">
          <div class="carousel-caption d-none d-md-block">
            <div class="container w-50 bg-dark rounded">
              <h5>SISTEM INFORMASI MANAJEMEN PEMINJAMAN RUANGAN DAN KENDARAAN</h5>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/src/img/GedungRiset.webp" class="d-block w-100" alt="Gedung Riset">
          <div class="carousel-caption d-none d-md-block">
            <div class="container w-50 bg-dark rounded">
              <h5>SISTEM INFORMASI MANAJEMEN PEMINJAMAN RUANGAN DAN KENDARAAN</h5>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/src/img/GrahaITS.webp" class="d-block w-100" alt="Graha ITS">
          <div class="carousel-caption d-none d-md-block">
            <div class="container w-50 bg-dark rounded">
              <h5>SISTEM INFORMASI MANAJEMEN PEMINJAMAN RUANGAN DAN KENDARAAN</h5>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- -->

    <!-- Ruangan -->
    <div id="ruangan">
        <div class="container">
            <div class="row my-4">
                <div class="col">
                    <h1 class="text-center my-4">Ruangan</h1>
                    <p class="text-center">ITS menyediakan berbagai ruangan di berbagai area yang ada di ITS.
                        Ruangan-ruangan ini sepenuhnya digunakan untuk mendukung semua kegiatan elemen dari ITS, mulai
                        dari mahasiswa, dosen, dan staf ITS. Pemesanan tiap ruang yang ada di ITS dapat dilakukan pada
                        website ini.</p>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-around flex-wrap">
                <div class="card my-3" style="width: 18rem; height: 24rem;">
                    <img src="/src/img/Pascasarjana.webp" class="card-img-top rounded" alt="Pascasarjana">
                    <div class="card-body">
                        <h5 class="card-title">Pascasarjana</h5>
                        <p class="card-text">Ruang Pascasarjana yang cukup besar dapat digunakan oleh mahasiswa ITS untuk berbagai keperluan mahasiswa ITS</p>
                    </div>
                </div>
                <div class="card my-3" style="width: 18rem; height: 24rem;">
                    <img src="/src/img/Teater_A.webp" class="card-img-top rounded" alt="Teater A">
                    <div class="card-body">
                        <h5 class="card-title">Teater A</h5>
                        <p class="card-text">ITS memiliki 3 teater dilengkapi dengan kebutuhan layar, sound, dan
                                pendingin ruangan yang dapat digunakan oleh mahasiswa ITS</p>
                    </div>
                </div>
                <div class="card my-3" style="width: 18rem; height: 24rem;">
                    <img src="/src/img/GrahaITS.webp" class="card-img-top rounded" alt="Graha ITS">
                    <div class="card-body">
                        <h5 class="card-title">Graha ITS</h5>
                        <p class="card-text">Graha ITS adalah gedung yang berada di kampus ITS yang berfungsi sebagai
                            tempat untuk mengadakan acara-acara besar. Graha ITS memiliki kapasitas sampai 1500 orang</p>
                    </div>
                </div>
            </div>
            <div id="selengkapnya" class="text-center my-4">
                <a href="/roomList" class="btn btn-success"><b>Ruang Lainnya</b></a>
            </div>
        </div>
    </div>
    <!---->

    <!-- Kendaraan -->
    <div id="kendaraan">
        <div class="container">
            <div class="row my-4">
                <div class="col">
                    <h1 class="text-center my-4">Kendaraan</h1>
                    <p class="text-center">Selain ruangan, ITS juga senantiasa menyediakan peminjaman kendaraan. ITS
                        memahami bahwa ITS merupakan institut yang cukup luas untuk dilakukannya pemindahan
                        barang-barang dari satu gedung ke gedung lainnya. Maka dari itu, ITS ingin melengkapi kebutuhan
                        elemen ITS yang sekiranya membutuhkan kendaraan untuk pemindahan barang</p>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-around flex-wrap">
                <div class="card my-3" style="width: 18rem; height: 24rem;">
                    <img src="/src/img/Mobil_Pickup.webp" class="card-img-top rounded" alt="Mobil Pickup">
                    <div class="card-body">
                        <h5 class="card-title">Mobil Pickup</h5>
                        <p class="card-text">Mobil Pickup dapat digunakan untuk pemindahan barang-barang yang berukuran
                            kecil sampai sedang</p>
                    </div>
                </div>
                <div class="card my-3" style="width: 18rem; height: 24rem;">
                    <img src="/src/img/Truk_Box.webp" class="card-img-top rounded" alt="Truk Box">
                    <div class="card-body">
                        <h5 class="card-title">Truk Box</h5>
                        <p class="card-text">Truk Box dapat digunakan untuk mengangkat barang cukup besar, membantu
                            mahasiswa saat melakukan pindah kos</p>
                    </div>
                </div>
                <div class="card my-3" style="width: 18rem; height: 24rem;">
                    <img src="/src/img/Truk_Engkel.webp" class="card-img-top rounded" alt="Graha ITS">
                    <div class="card-body">
                        <h5 class="card-title">Graha ITS</h5>
                        <p class="card-text">Graha ITS adalah gedung yang berada di kampus ITS yang berfungsi sebagai
                            tempat untuk mengadakan acara-acara besar. Graha ITS memiliki kapasitas sampai 1500 orang</p>
                    </div>
                </div>
            </div>
            <div id="selengkapnya" class="text-center my-4">
                <a href="/vehicleList" class="btn btn-success"><b>Kendaraan Lainnya</b></a>
            </div>
        </div>
    </div>
    <!---->

@include('Partials.footer')

@endsection

