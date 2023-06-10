@extends("layouts.template")

@include("partials.navbar")

@section("main_content")
    <!-- TITLE -->
    <div class="container pt-4">
        <h1 class="text-center text-dark border-5 py-2">nama_ruangan</h1>
    </div>
    <!---->

    <!-- Ruangan -->
            <div class="row d-flex align-items-center justify-content-around flex-wrap">
                <div class="card pt-3 my-3" style="width: 18rem; height: 24rem;">
                    <img src="src/img/Pascasarjana.webp" class="card-img-top rounded" alt="Pascasarjana">
                    <div class="text-center text-lg-start my-3 my-lg-0">
                        <p class="my-3 text-dark">Jenis Ruangan: jenis_ruangan</p>
                        <p class="my-0 my-lg-3 text-dark">Kuota Ruangan: kapasitas</p>
                        <div class="d-flex justify-content-center">
                            <a href="../schedule/scheduleRoom" class="btn btn-primary my-3">Lihat Jadwal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---->

    <div class="d-flex justify-content-center w-100 px-5 mt-3 mb-5">
        <a href="../room/roomList" class="btn btn-primary">Kembali ke Daftar Ruangan</a>
    </div>
@endsection