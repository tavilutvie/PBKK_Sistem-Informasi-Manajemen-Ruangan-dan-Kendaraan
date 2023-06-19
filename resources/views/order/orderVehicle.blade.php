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
    <div class="container py-3">
        <h2 class="text-center text-dark border-bottom border-5 pt-2">Masukkan Data Pemesan</h2>
    </div>
    <!---->

    <!-- KENDARAAN -->
    <div class="d-flex align-items-center justify-content-around flex-wrap">
        <div class="mb-2" style="width: 34rem;">
            <div class="container pb-3">
                <h1 class="text-center text-dark">jenis_kendaraan</h1>
                <h3 class="text-center text-dark py-2">nomor_plat</h3>
                <img src="/src/img/{{ $jenis_kendaraan }}.webp" class="card-img-top rounded img-fluid" alt="Gambar kendaraan"
                    max-width>
            </div>

            <form action="/orderKendaraan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="d-none">
                    <input type="text" name="Kendaraan_id_kendaraan" value="{{ $id_kendaraan }}">
                    <input type="number" name="Akun_id_akun" value="{{ auth()->user()->akun->id_akun }}">
                </div>
                <div class="form-group py-2">
                    <!-- Date input -->
                    <label class="control-label" for="tanggal_pemakaian">Tanggal Pemakaian</label>
                    <input class="form-control" id="tanggal_pemakaian" name="tanggal_pemakaian" placeholder="MM/DD/YYYY"
                        type="date" required/>
                </div>
                <div class="form-group py-2">
                    <!-- Jam mulai pemakaian -->
                    <label class="control-label" for="waktu_mulai">Jam Mulai Pemakaian</label>
                    <input class="form-control" id="waktu_mulai" name="waktu_mulai" placeholder="HH:MM" type="time" required/>
                </div>
                <div class="form-group py">
                    <label for="formFile" class="form-label">Dokumen Peminjaman</label>
                    <input type="file" class="form-control" name="dokumen_peminjaman" accept=".pdf, .doc, .docx">
                    <p class="p-3 bg-warning text-center rounded-bottom">Dokumen tidak wajib di-upload. Anda dapat menyerahkannya secara langsung pada Kantor Sarpras. Selama dokumen belum diterima, pesanan tidak akan diproses.</p>
                </div>
                <div class="d-flex justify-content-center w-100 px-5 my-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!---->

    @include('Partials.footer')
@endsection
