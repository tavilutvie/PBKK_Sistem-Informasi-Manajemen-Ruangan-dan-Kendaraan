@extends('layouts.template')

@include('partials.navbar')

@section('main_content')
    <!-- TITLE -->
    <div class="container py-5">
        <h1 class="text-center text-dark border-bottom border-5 py-2">Daftar Pemesanan Ruangan</h1>
    </div>
    <!---->



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
            <tr>
                <td>1</td>
                <td>jenis_kendaraan</td>
                <td>nomor_plat_kendaran</td>
                <td>11/11/2222</td>
                <td>7:00</td>
                <td>9:00</td>
                <td>
                    Sudah
                </td>
                <td>Diterima</td>
            </tr>

            <tr>
                <td>2</td>
                <td>jenis_kendaraan</td>
                <td>11/11/2222</td>
                <td>7:00</td>
                <td>9:00</td>
                <td>
                    Belum Diberikan
                </td>
                <td>Ditolak</td>
            </tr>

        </tbody>
    </table>

    <div class="d-flex justify-content-center w-100 px-5 my-5">
        <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
@endsection
