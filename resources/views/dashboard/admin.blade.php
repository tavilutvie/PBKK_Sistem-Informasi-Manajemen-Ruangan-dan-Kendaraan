@extends('Template.head')
@section('main_content')
<!-- TITLE -->
<div class="container pt-4">
    <h1 class="text-center text-dark border-5 py-2">ADMIN PAGE</h1>

    <div class="d-flex justify-content-left w-100 px-5 mt-4 mb-3">
        <a href="/adminLog" class="btn btn-primary">ADMIN LOG</a>
    </div>

    <!-- RUANGAN -->
    <h2 class="text-center text-dark border-5 py-1">LIST PEMESANAN RUANGAN</h2>
    <table class="container table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Status Dokumen</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu Mulai</th>
                    <th scope="col">Waktu Selesai</th>
                    <th scope="col">Nama Ruangan</th>
                    <th scope="col">Status Pesanan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <div class="d-none">
                    {{
                        $iterator = 1;
                     }}
                </div>
                @foreach ($ruangan_orders as $ruangan_order)
                    <form action="/admin/updateRuangan/{{ $ruangan_order['id_pesanan_ruangan'] }}" method="post">
                        @csrf
                        <tr>
                            <td>{{ $iterator }}</td>
                            <td>{{ $ruangan_order['username'] }}</td>
                            <td>
                                <div class="form-check">
                                    <input name="status_dokumen" class="form-check-input" type="checkbox" id="flexCheckDefault"
                                    @if ($ruangan_order['status_dokumen'] == 1)
                                        checked>
                                        <div class="d-none">
                                            {{ $ruangan_order['status_pesanan'] = 'Pengecekan Dokumen' }}
                                        </div>
                                    @else
                                        >
                                        <div class="d-none">
                                            {{ $ruangan_order['status_pesanan'] = 'Menunggu Dokumen' }}
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td><input name="tanggal_pesanan" type="date" value="{{ $ruangan_order['tanggal'] }}" readonly="readonly"></td>
                            <td><input name="waktu_mulai" type="time" value="{{ explode(" ", $ruangan_order['waktu_mulai'])[1] }}" readonly="readonly"></td>
                            <td><input name="waktu_selesai" type="time" value="{{ explode(" ", $ruangan_order['waktu_selesai'])[1] }}" readonly="readonly"></td>
                            <td><input name="nama_ruangan" type="text" value="{{ $ruangan_order['nama_ruangan'] }}" readonly="readonly"></td>
                            <td>
                                <select name="status_pesanan" class="form-select" required
                                @if ($ruangan_order['status_dokumen'] == 0)
                                    disabled>
                                    <option value="Menunggu Dokumen" selected>Menunggu Dokumen</option>
                                @else
                                    >
                                @endif>
                                    <option value="Pengecekan Dokumen">Pengecekan Dokumen</option>
                                    <option value="Disetujui">Disetujui</option>
                                    <option value="Gagal">Gagal</option>
                                </select>
                            </td>
                            <td><button type="submit" class="btn btn-primary">UPDATE NOW</button></td>
                        </tr>
                    </form>
                    <div class="d-none">
                        {{ $iterator = $iterator + 1 }}
                    </div>
                @endforeach
            </tbody>
        </table>
    <!--  -->

    <!-- KENDARAAN -->
    <h2 class="text-center text-dark border-5 py-1">LIST PEMESANAN KENDARAAN</h2>
    <table class="container table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Status Dokumen</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu Mulai</th>
                    <th scope="col">Waktu Selesai</th>
                    <th scope="col">Jenis Kendaraan</th>
                    <th scope="col">Status Pesanan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <div class="d-none">
                    {{
                        $iterator = 1;
                     }}
                </div>
                @foreach ($kendaraan_orders as $kendaraan_order)
                <form action="/admin/updateKendaraan/{{ $kendaraan_order['id_pesanan_kendaraan'] }}" method="post">
                        @csrf
                        <tr>
                            <td>{{ $iterator }}</td>
                            <td>{{ $kendaraan_order['username'] }}</td>
                            <td>
                                <div class="form-check">
                                    <input name="status_dokumen" class="form-check-input" type="checkbox" id="flexCheckDefault"
                                    @if ($kendaraan_order['status_dokumen'] == 1)
                                        checked>
                                        <div class="d-none">
                                            {{ $kendaraan_order['status_pesanan'] = 'Pengecekan Dokumen' }}
                                        </div>
                                    @else
                                        >
                                        <div class="d-none">
                                            {{ $kendaraan_order['status_pesanan'] = 'Menunggu Dokumen' }}
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td><input name="tanggal_pesanan" type="date" value="{{ $kendaraan_order['tanggal'] }}" readonly="readonly"></td>
                            <td><input name="waktu_mulai" type="time" value="{{ explode(" ", $kendaraan_order['waktu_mulai'])[1] }}" readonly="readonly"></td>
                            <td><input name="waktu_selesai" type="time" value="{{ explode(" ", $kendaraan_order['waktu_selesai'])[1] }}" readonly="readonly"></td>
                            <td><input name="jenis_kendaraan" type="text" value="{{ $kendaraan_order['jenis_kendaraan'] }}" readonly="readonly"></td>
                            <td>
                                <select name="status_pesanan" class="form-select" required
                                @if ($kendaraan_order['status_dokumen'] == 0)
                                    disabled>
                                    <option value="Menunggu Dokumen" selected>Menunggu Dokumen</option>
                                @else
                                    >
                                @endif>
                                    <option value="Pengecekan Dokumen">Pengecekan Dokumen</option>
                                    <option value="Disetujui">Disetujui</option>
                                    <option value="Gagal">Gagal</option>
                                </select>
                            </td>
                            <td><button type="submit" class="btn btn-primary">UPDATE NOW</button></td>
                        </tr>
                    </form>
                    <div class="d-none">
                        {{ $iterator = $iterator + 1 }}
                    </div>
                @endforeach
            </tbody>
        </table>
    <!--  -->
    
        <div class="d-flex justify-content-center w-100 px-5 mt-4 mb-5">
            <a href="/logout" class="btn btn-primary">LOGOUT</a>
        </div>
</div>
@endsection
