@extends('Template.head')
@section('main_content')
<!-- TITLE -->
<div class="container pt-4">
    <div class="d-flex justify-content-left w-100 px-5 mt-4 mb-3">
        <a href="/admin" class="btn btn-primary">Back to Admin Page</a>
    </div>
    <div class="d-flex justify-content-left w-100 px-5 mt-4 mb-3">
        <a href="/adminLog/export" class="btn btn-success">Export PDF</a>
    </div>
    <h1 class="text-center text-dark border-5 py-2">ADMIN LOG</h1>


    <!-- RUANGAN -->
    <table class="container table table-striped mb-5">
        <h1 class="text-dark text-center mb-5 border-3 border-bottom">RUANGAN</h1>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu Mulai</th>
                    <th scope="col">Waktu Selesai</th>
                    <th scope="col">Status Pemensanan</th>
                    <th scope="col">Status Dokumen</th>
                </tr>
            </thead>
            <tbody>
                <div class="d-none">
                    {{
                        $iterator = 1;
                     }}
                </div>
                @foreach ($ruangan_orders as $order)
                    <tr>
                        <td>{{ $iterator }}</td>
                        <td><input name="nama" type="text" value="{{ $order['nama'] }}" readonly="readonly"></td>
                        <td>{{ $order['username'] }}</td>
                        <td><input name="tanggal_pesanan" type="date" value="{{ $order['tanggal'] }}" readonly="readonly"></td>
                        <td><input name="waktu_mulai" type="time" value="{{ explode(" ", $order['waktu_mulai'])[1] }}" readonly="readonly"></td>
                        <td><input name="waktu_selesai" type="time" value="{{ explode(" ", $order['waktu_selesai'])[1] }}" readonly="readonly"></td>
                        <td><input name="status_pesanan" type="text" value="{{ $order['status_pesanan'] }}" readonly="readonly"></td>
                        @if ($order['status_dokumen'] == 1)
                            <td><input type="text" value="Dokumen Diterima" readonly="readonly"></td>
                        @elseif ($order['status_dokumen'] == 0)
                            <td><input type="text" value="Dokumen Belum Diterima" readonly="readonly"></td>
                        @endif
                    </tr>

                    <div class="d-none">
                        {{ $iterator = $iterator + 1 }}
                    </div>
                @endforeach
            </tbody>
        </table>
    <!--  -->

    <!-- KENDARAAN -->
    <table class="container table table-striped mb-5">
        <h1 class="text-dark text-center mb-5 border-3 border-bottom">KENDARAAN</h1>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Kendaraan</th>
                    <th scope="col">Nomor Plat</th>
                    <th scope="col">Username</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu Mulai</th>
                    <th scope="col">Waktu Selesai</th>
                    <th scope="col">Status Pemesanan</th>
                    <th scope="col">Status Dokumen</th>
                </tr>
            </thead>
            <tbody>
                <div class="d-none">
                    {{
                        $iterator = 1;
                     }}
                </div>
                @foreach ($kendaraan_orders as $order)
                    <tr>
                        <td>{{ $iterator }}</td>
                        <td><input name="nama" type="text" value="{{ $order['nama'] }}" readonly="readonly"></td>
                        <td><input name="plat_nomor" type="text" value="{{ $order['nomor_plat'] }}" readonly="readonly"></td>
                        <td>{{ $order['username'] }}</td>
                        <td><input name="tanggal_pesanan" type="date" value="{{ $order['tanggal'] }}" readonly="readonly"></td>
                        <td><input name="waktu_mulai" type="time" value="{{ explode(" ", $order['waktu_mulai'])[1] }}" readonly="readonly"></td>
                        <td><input name="waktu_selesai" type="time" value="{{ explode(" ", $order['waktu_selesai'])[1] }}" readonly="readonly"></td>
                        <td><input name="status_pesanan" type="text" value="{{ $order['status_pesanan'] }}" readonly="readonly"></td>
                        @if ($order['status_dokumen'] == 1)
                            <td><input type="text" value="Dokumen Diterima" readonly="readonly"></td>
                        @elseif ($order['status_dokumen'] == 0)
                            <td><input type="text" value="Dokumen Belum Diterima" readonly="readonly"></td>
                        @endif
                    </tr>

                    <div class="d-none">
                        {{ $iterator = $iterator + 1 }}
                    </div>
                @endforeach
            </tbody>
        </table>
    <!--  -->


</div>
@endsection
