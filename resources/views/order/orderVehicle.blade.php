@extends('Template.head')

@section('main_content')

@include('Partials.navbar')
    <!-- TITLE -->
    <div class="container py-3">
        <h2 class="text-center text-dark border-bottom border-5 pt-2">Masukkan Data Pemesan</h2>
    </div>
    <!---->

    <!-- KENDARAAN -->
    <div class="row d-flex align-items-center justify-content-around flex-wrap">
      <div class="mb-2" style="width: 34rem;">
        <div class="container pb-3">
          <h1 class="text-center text-dark">jenis_kendaraan</h1>
          <h3 class="text-center text-dark py-2">nomor_plat</h3>
          <img src="/src/img/Mobil.webp" class="card-img-top rounded img-fluid" alt="Gambar ruangan" max-width>
        </div>
        
        <div class="form-group py-2"> <!-- Date input -->
            <label class="control-label" for="date">Date</label>
            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="date"/>
        </div>
        <div class="form-group py-2"> <!-- Jam mulai pemakaian -->
            <label class="control-label" for="waktu_mulai">Jam Mulai Pemakaian</label>
            <input class="form-control" id="waktu_mulai" name="waktu_mulai" placeholder="HH:MM" type="time"/>
        </div>
        <div class="form-group py-2"> <!-- Jam selesai pemakaian -->
            <label class="control-label" for="waktu_selesai">Jam Selesai Pemakaian</label>
            <input class="form-control" id="waktu_selesai" name="waktu_selesai" placeholder="HH:MM" type="time"/>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-center w-100 px-5 my-5">
        <a href="/" class="btn btn-primary">Submit</a>
    </div>
    <!---->

@include('Partials.footer')
@endsection
