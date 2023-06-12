@extends('Template.head')

@section('main_content')

@include('Partials.navbar')

<div class="list_pemesanan d-flex justify-content-center align-items-center flex-wrap">

    @foreach ($kendaraans as $kendaraan)
        <div class="card m-2" style="width: 18rem;">
            <img src="public/src/img/{{ $kendaraan->jenis_kendaraan }}.webp" class="card-img-top" alt="Gambar kendaraan" width="268px" height="160px">
            <div class="card-body">
                <h5 class="card-title">{{ $kendaraan->jenis_kendaraan }}</h5>
                <p class="card-text">Nomor Plat kendaraan: {{ $kendaraan->nomor_plat }}</p>
                <p class="card-text @if ($kendaraan->status_operasional == 0) text-danger @endif">Status Operasional kendaraan:
                    @if ($kendaraan->status_operasional == 1)
                        Tersedia
                    @else
                        Tidak Tersedia
                    @endif
                </p>

                @if ($kendaraan->status_operasional == 1)
                    <a href="{{ $kendaraan->id_kendaraan }}/schedule" class="btn btn-primary">Pesan Sekarang</a>
                @else
                    <a href="{{ $kendaraan->id_kendaraan }}/schedule" class="btn btn-primary disabled">Pesan Sekarang</a>
                @endif
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center w-100 px-5 my-5">
        <a href="/" class="btn btn-primary m-2">Kembali ke Beranda</a>
    </div>

@include('Partials.footer')
@endsection
