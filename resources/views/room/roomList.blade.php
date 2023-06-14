@extends('Template.head')

@section('main_content')

@include('Partials.navbar')

<div class="list_pemesanan d-flex justify-content-center align-items-center flex-wrap">

    @foreach ($ruangans as $ruangan)
        <div class="card m-2" style="width: 18rem;">
            <img src="/src/img/{{ $ruangan['nama_ruangan'] }}.webp" class="card-img-top" alt="Gambar ruangan" width="268px" height="160px">
            <div class="card-body">
                <h5 class="card-title">{{ str_replace("_", " ", ucfirst($ruangan['nama_ruangan'])) }}</h5>
                <p class="card-text">Jenis Ruangan: {{ ucfirst($ruangan['jenis_ruangan']) }}</p>
                <a href="/roomList/{{ $ruangan['id_ruangan'] }}" class="btn btn-primary">Lihat
                    Detail</a>
            </div>
        </div>
    @endforeach

</div>


    <div class="d-flex justify-content-center w-100 px-5 my-5">
        <a href="/" class="btn btn-primary m-2">Kembali ke Beranda</a>
    </div>

@include('Partials.footer')
@endsection
