@extends('Template.head')
@section('main_content')
<!-- TITLE -->
<div class="container pt-4">
    <h1 class="text-center text-dark border-5 py-2">ADMIN PAGE</h1>
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
                <tr>
                    <td>1</td>
                    <td>budiM</td>
                    <td><div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault"></label>
                    </td>
                    <td>2022-12-13</td>
                    <td>08:00:00</td>
                    <td>10:00:00</td>
                    <td>Teater B</td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Pengecekan Dokumen
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Pengecekan Dokumen</a></li>
                            <li><a class="dropdown-item" href="#">Disetujui</a></li>
                            <li><a class="dropdown-item" href="#">Gagal</a></li>
                        </ul>
                        </div>
                    </td>
                    <td><button type="button" class="btn btn-primary">UPDATE NOW</button></td>
                </tr>

                <td>2</td>
                    <td>budiM</td>
                    <td><div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault"></label>
                    </td>
                    <td>2022-12-13</td>
                    <td>08:00:00</td>
                    <td>10:00:00</td>
                    <td>Teater B</td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Pengecekan Dokumen
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Pengecekan Dokumen</a></li>
                            <li><a class="dropdown-item" href="#">Disetujui</a></li>
                            <li><a class="dropdown-item" href="#">Gagal</a></li>
                        </ul>
                        </div>
                    </td>
                    <td><button type="button" class="btn btn-primary">UPDATE NOW</button></td>
                </tr>

                <td>3</td>
                    <td>budiM</td>
                    <td><div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault"></label>
                    </td>
                    <td>2022-12-13</td>
                    <td>08:00:00</td>
                    <td>10:00:00</td>
                    <td>Teater B</td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Pengecekan Dokumen
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Pengecekan Dokumen</a></li>
                            <li><a class="dropdown-item" href="#">Disetujui</a></li>
                            <li><a class="dropdown-item" href="#">Gagal</a></li>
                        </ul>
                        </div>
                    </td>
                    <td><button type="button" class="btn btn-primary">UPDATE NOW</button></td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-center w-100 px-5 mt-4 mb-5">
            <a href="/logout" class="btn btn-primary">LOGOUT</a>
        </div>
</div>
@endsection
