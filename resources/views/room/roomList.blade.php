@extends('Template.head')


@section('main_content')

@include('Partials.navbar')

<div class="list_pemesanan d-flex justify-content-center align-items-center flex-wrap">

    <div class="card m-2" style="width: 18rem;">
        <img src="public/src/img/___NAMA_RUANGAN___.webp" class="card-img-top" alt="Gambar ruangan" width="268px" height="160px">
        <div class="card-body">
            <h5 class="card-title">___NAMA_RUANGAN___</h5>
            <p class="card-text">Jenis Ruangan: ___JENIS_RUANGAN____</p>
            <a href="/roomList/___NAMA_RUANGAN___" class="btn btn-primary">Lihat
                Detail</a>
        </div>
    </div>

    <div class="card m-2" style="width: 18rem;">
        <img src="https://cdn.discordapp.com/attachments/925983525344247858/1116955030575120484/images_2.jpg" class="card-img-top" alt="Gambar ruangan" width="268px" height="160px">
        <div class="card-body">
            <h5 class="card-title">nama_ruangan</h5>
            <p class="card-text">Jenis Ruangan: jenis_ruangan</p>
            <a href="/roomDetail" class="btn btn-primary">Lihat
                Detail</a>
        </div>
    </div>

    <div class="card m-2" style="width: 18rem;">
        <img src="https://cdn.discordapp.com/attachments/925983525344247858/1116955030575120484/images_2.jpg" class="card-img-top" alt="Gambar ruangan" width="268px" height="160px">
        <div class="card-body">
            <h5 class="card-title">nama_ruangan</h5>
            <p class="card-text">Jenis Ruangan: jenis_ruangan</p>
            <a href="/roomDetail" class="btn btn-primary">Lihat
                Detail</a>
        </div>
    </div>

    <div class="card m-2" style="width: 18rem;">
        <img src="https://cdn.discordapp.com/attachments/925983525344247858/1116955030575120484/images_2.jpg" class="card-img-top" alt="Gambar ruangan" width="268px" height="160px">
        <div class="card-body">
            <h5 class="card-title">nama_ruangan</h5>
            <p class="card-text">Jenis Ruangan: jenis_ruangan</p>
            <a href="/roomDetail" class="btn btn-primary">Lihat
                Detail</a>
        </div>
    </div>

    <div class="card m-2" style="width: 18rem;">
        <img src="https://cdn.discordapp.com/attachments/925983525344247858/1116955030575120484/images_2.jpg" class="card-img-top" alt="Gambar ruangan" width="268px" height="160px">
        <div class="card-body">
            <h5 class="card-title">nama_ruangan</h5>
            <p class="card-text">Jenis Ruangan: jenis_ruangan</p>
            <a href="/roomDetail" class="btn btn-primary">Lihat
                Detail</a>
        </div>
    </div>

    <div class="card m-2" style="width: 18rem;">
        <img src="https://cdn.discordapp.com/attachments/925983525344247858/1116955030575120484/images_2.jpg" class="card-img-top" alt="Gambar ruangan" width="268px" height="160px">
        <div class="card-body">
            <h5 class="card-title">nama_ruangan</h5>
            <p class="card-text">Jenis Ruangan: jenis_ruangan</p>
            <a href="/roomDetail" class="btn btn-primary">Lihat
                Detail</a>
        </div>
    </div>

</div>


    <div class="d-flex justify-content-center w-100 px-5 my-5">
        <a href="/" class="btn btn-primary m-2">Kembali ke Beranda</a>
    </div>

@include('Partials.footer')
@endsection
