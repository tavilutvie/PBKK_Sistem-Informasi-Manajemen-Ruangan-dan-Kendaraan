@extends('Template.head')
@section('main_content')

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
                    <th scope="col">Dokumen Peminjaman</th>
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
                            <td>
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                            </td>
                        </form>
                        <td class="d-flex flex-column justify-content-center align-items-center">
                            @if ($ruangan_order['dokumen_peminjaman'])
                                <a class="btn btn-success" href="{{ $ruangan_order['dokumen_peminjaman'] }}" target="_blank">
                                    Lihat Dokumen
                                </a>
                            @else
                                <form action="uploadDokumenRuangan/{{ $ruangan_order['id_pesanan_ruangan'] }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2">
                                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="dokumen_peminjaman" required>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100">UPLOAD</button>
                                </form>
                            @endif
                        </td>
                    </tr>
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
                    <th scope="col">Dokumen Peminjaman</th>
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
                            <td>
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                            </td>
                        </form>
                        <td class="d-flex flex-column justify-content-center align-items-center">
                            @if ($kendaraan_order['dokumen_peminjaman'])
                                <a class="btn btn-success" href="{{ $kendaraan_order['dokumen_peminjaman'] }}" target="_blank">
                                    Lihat Dokumen
                                </a>
                            @else
                                <form action="uploadDokumenKendaraan/{{ $kendaraan_order['id_pesanan_kendaraan'] }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2">
                                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="dokumen_peminjaman" required>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100">UPLOAD</button>
                                </form>
                            @endif
                        </td>
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
