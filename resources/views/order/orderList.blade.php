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
                <th scope="col">Batalkan Pesanan</th>
            </tr>
        </thead>
        <tbody>
            <div class="d-none">
                {{ $iterator = 1; }}
            </div>
            @foreach ($pesanan_ruangans as $pesanan_ruangan)
                <form action="/orderList/deleteRuangan/{{ $pesanan_ruangan['id_pesanan_ruangan'] }}" method="post">
                    @csrf
                    <tr>
                        <td>{{ $iterator }}</td>
                        <td>{{ str_replace('_', ' ', ucfirst($pesanan_ruangan['nama_ruangan'])) }}</td>
                        <td>{{ explode(' ', $pesanan_ruangan['waktu_mulai'])[0] }}</td>
                        <td>{{ explode(' ', $pesanan_ruangan['waktu_mulai'])[1] }}</td>
                        <td>{{ explode(' ', $pesanan_ruangan['waktu_selesai'])[1] }}</td>
                        <td>{{ $pesanan_ruangan['status_dokumen'] }}</td>
                        <td>{{ $pesanan_ruangan['status_pesanan'] }}</td>
                        <td><button type="submit" class="btn btn-primary" @if ($pesanan_ruangan['status_pesanan'] == "Dibatalkan" || $pesanan_ruangan['status_pesanan'] == "Disetujui" || $pesanan_ruangan['status_pesanan'] == "Gagal")
                        disabled
                        @endif>Batalkan</button></td>
                    </tr>
                    <div class="d-none">
                    {{ $iterator = $iterator + 1 }}
                    </div>
                </form>
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
                <th scope="col">Batalkan Pesanan</th>
            </tr>
        </thead>
        <tbody>
            <div class="d-none">
                {{ $iterator = 1; }}
            </div>
            @foreach ($pesanan_kendaraans as $pesanan_kendaraan)
                <form action="/orderList/deleteKendaraan/{{ $pesanan_kendaraan['id_pesanan_kendaraan'] }}" method="post">
                    @csrf
                    <tr>
                        <td>{{ $iterator }}</td>
                        <td>{{ $pesanan_kendaraan['jenis_kendaraan'] }}</td>
                        <td>{{ $pesanan_kendaraan['nomor_plat'] }}</td>
                        <td>{{ explode(' ', $pesanan_kendaraan['waktu_mulai'])[0] }}</td>
                        <td>{{ explode(' ', $pesanan_kendaraan['waktu_mulai'])[1] }}</td>
                        <td>{{ explode(' ', $pesanan_kendaraan['waktu_selesai'])[1] }}</td>
                        <td>{{ $pesanan_kendaraan['status_dokumen'] }}</td>
                        <td>{{ $pesanan_kendaraan['status_pesanan'] }}</td>
                        <td><button type="submit" class="btn btn-primary" @if ($pesanan_ruangan['status_pesanan'] == "Dibatalkan" || $pesanan_ruangan['status_pesanan'] == "Disetujui" || $pesanan_ruangan['status_pesanan'] == "Gagal")
                        disabled
                        @endif>Batalkan</button></td>
                    </tr>
                    <div class="d-none">
                    {{ $iterator = $iterator + 1 }}
                    </div>
                </form>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center w-100 px-5 my-5">
        <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
    </div>

    @include('Partials.footer')
@endsection
