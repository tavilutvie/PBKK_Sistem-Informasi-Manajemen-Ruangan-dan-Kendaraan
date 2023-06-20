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

<div class="container pt-4">
    <h1 class="text-center text-dark border-5 py-2">Verifikasi Akun</h1>

    <a href="/admin" class="btn btn-primary">Back to Admin Page</a>

    <h2 class="text-center text-dark border-5 py-1">LIST AKUN BELUM TERVERIFIKASI</h2>

    <h2 class="text-center text-dark border-5 py-1">LIST PEMESANAN RUANGAN</h2>
    <table class="container table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nama Depan</th>
                    <th scope="col">Nama Belakang</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Foto Tanda Pengenal</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <div class="d-none">
                    {{
                        $iterator = 1;
                     }}
                </div>
                @foreach ($daftar_akuns as $daftar_akun)
                    <tr>
                        <td>{{ $iterator }}</td>
                        <td>{{ $daftar_akun['email'] }}</td>
                        <td>{{ $daftar_akun['nama_depan'] }}</td>
                        <td>{{ $daftar_akun['nama_belakang'] }}</td>
                        <td>{{ $daftar_akun['nomor_telepon'] }}</td>
                        <td>{{ $daftar_akun['nip'] }}</td>
                        <td>{{ $daftar_akun['jabatan'] }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ $daftar_akun['foto_tanda_pengenal'] }}" target="_blank">
                                Lihat Tanda Pengenal
                            </a>
                        </td>
                        <td>
                            <form action="/adminVerifyAccount" method="post">
                                @csrf
                                <input type="hidden" name="id_akun" value="{{ $daftar_akun['id_akun'] }}">
                                <button type="submit" class="btn btn-success">Verifikasi</button>
                            </form>
                        </td>
                    </tr>
                    <div class="d-none">
                        {{ $iterator = $iterator + 1 }}
                    </div>
                @endforeach
            </tbody>
        </table>
</div>

@endsection
