@extends('Template.head')
@section('main_content')
<!-- TITLE -->
<div class="container pt-4">
    <h1 class="text-center text-dark border-5 py-2">ADMIN PAGE</h1>
    
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
                    <form action="admin/updateRuangan" method="post">
                        <tr>
                            <td>{{ $iterator }}</td>
                            <td>{{ $ruangan_order['username'] }}</td>
                            <td>
                                <div class="form-check">
                                    <input name="status_dokumen" class="form-check-input" type="checkbox" value="{{ $ruangan_order['status_dokumen'] }}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault"></label>
                                </div>
                            </td>
                            <td>{{ $ruangan_order['tanggal'] }}</td>
                            <td>{{ explode(" ", $ruangan_order['waktu_mulai'])[1] }}</td>
                            <td>{{ explode(" ", $ruangan_order['waktu_selesai'])[1] }}</td>
                            <td>{{ $ruangan_order['nama_ruangan'] }}</td>
                            <td>
                                <select name="status_pesanan" class="form-select" required>
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
                    <form action="admin/updateKendaraan" method="post">
                        <tr>
                            <td>{{ $iterator }}</td>
                            <td>{{ $kendaraan_order['username'] }}</td>
                            <td>
                                <div class="form-check">
                                    <input name="status_dokumen" class="form-check-input" type="checkbox" value="{{ $kendaraan_order['status_dokumen'] }}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault"></label>
                                </div>
                            </td>
                            <td>{{ $kendaraan_order['tanggal'] }}</td>
                            <td>{{ explode(" ", $kendaraan_order['waktu_mulai'])[1] }}</td>
                            <td>{{ explode(" ", $kendaraan_order['waktu_selesai'])[1] }}</td>
                            <td>{{ $kendaraan_order['jenis_kendaraan'] }}</td>
                            <td>
                                <select name="status_pesanan" class="form-select" required>
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
