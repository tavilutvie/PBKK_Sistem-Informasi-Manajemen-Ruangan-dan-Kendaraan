@extends('Template.head')

@section('main_content')

@include('Partials.navbar')

    <!-- TITLE -->
    <div class="container py-5">
        <h3 class="text-center text-dark border-bottom border-5 py-2">Daftar Pemesanan {{ $username }}</h3>
    </div>

    <!-- TITLE -->
    <div class="container py-5">
        <h1 class="text-center text-dark border-bottom border-5 py-2">Daftar Pemesanan Ruangan</h1>
    </div>
    <!---->

    <table class="container table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Ruangan</th>
                <th scope="col">Tanggal Pesanan</th>
                <th scope="col">Waktu Mulai</th>
                <th scope="col">Waktu Selesai</th>
                <th scope="col">Status Dokumen</th>
                <th scope="col">Status Pemesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan_ruangans as $pesanan_ruangan)
                <tr>
                    <td>{{ $pesanan_ruangan->id_pesanan_ruangan }}</td>
                    <td>{{ str_replace("_", " ", ucfirst($pesanan_ruangan->ruangan->nama_ruangan)) }}</td>
                    <td>{{ explode(" ", $pesanan_ruangan->waktu_mulai)[0] }}</td>
                    <td>{{ explode(" ", $pesanan_ruangan->waktu_mulai)[1] }}</td>
                    <td>{{ explode(" ", $pesanan_ruangan->waktu_selesai)[1] }}</td>
                    <td>{{ $pesanan_ruangan->status_dokumen }}</td>
                    <td>{{ $pesanan_ruangan->status_pesanan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>




    <!-- TITLE -->
    <div class="container py-5">
        <h1 class="text-center text-dark border-bottom border-5 py-2">Daftar Pemesanan Kendaraan</h1>
    </div>
    <!---->

    <table class="container table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kendaraan</th>
                <th scope="col">Nomor Plat</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Waktu Mulai</th>
                <th scope="col">Waktu Selesai</th>
                <th scope="col">Status Dokumen</th>
                <th scope="col">Status Pemesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan_kendaraans as $pesanan_kendaraan)
                <tr>
                    <td>{{ $pesanan_kendaraan->id_pesanan_kendaraan }}</td>
                    <td>{{ $pesanan_kendaraan->kendaraan->jenis_kendaraan }}</td>
                    <td>{{ $pesanan_kendaraan->kendaraan->nomor_plat }}</td>
                    <td>{{ explode(" ", $pesanan_ruangan->waktu_mulai)[0] }}</td>
                    <td>{{ explode(" ", $pesanan_ruangan->waktu_mulai)[1] }}</td>
                    <td>{{ explode(" ", $pesanan_ruangan->waktu_selesai)[1] }}</td>
                    <td>{{ $pesanan_kendaraan->status_dokumen }}</td>
                    <td>{{ $pesanan_kendaraan->status_pesanan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center w-100 px-5 my-5">
        <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
    </div>

@include('Partials.footer')
@endsection
