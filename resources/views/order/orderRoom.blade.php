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

    <!-- RUANGAN -->
    <div class="d-flex align-items-center justify-content-around flex-wrap">
      <div class="mb-2" style="width: 34rem;">
        <div class="container pb-3">
          <h1 class="text-center text-dark">{{ str_replace("_", " ", ucfirst($nama_ruangan)) }}</h1>
          <img src="/src/img/{{ $nama_ruangan }}.webp" class="card-img-top rounded img-fluid" alt="Gambar ruangan" max-width>
        </div>

            <form action="/orderRuangan" method="post">
                @csrf
                <div class="d-none">
                    <input type="text" name="Ruangan_id_ruangan" value="{{ $id_ruangan }}">
                    <input type="number" name="Akun_id_akun" value="{{ auth()->user()->akun->id_akun }}">
                </div>
                <div class="form-group py-2"> <!-- Date input -->
                    <label class="control-label" for="tanggal_pemakaian">Tanggal Pemakaian</label>
                    <input class="form-control" id="tanggal_pemakaian" name="tanggal_pemakaian" placeholder="MM/DD/YYYY" type="date"/>
                </div>
                <div class="form-group py-2"> <!-- Jam mulai pemakaian -->
                    <label class="control-label" for="waktu_mulai">Jam Mulai Pemakaian</label>
                    <input class="form-control" id="waktu_mulai" name="waktu_mulai" placeholder="HH:MM" type="time"/>
                </div>
                <div class="form-group py-2"> <!-- Jam selesai pemakaian -->
                    <label class="control-label" for="waktu_selesai">Jam Selesai Pemakaian</label>
                    <input class="form-control" id="waktu_selesai" name="waktu_selesai" placeholder="HH:MM" type="time"/>
                    <div class="d-flex justify-content-center w-100 px-5 my-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!---->

@include('Partials.footer')
@endsection
