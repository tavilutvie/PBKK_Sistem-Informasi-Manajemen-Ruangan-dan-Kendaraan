@extends("layouts.template")

@include("partials.navbar")

@section("main_content")
    <!-- TITLE -->
    <div class="container pt-4">
        <h1 class="text-center text-dark border-5 py-2">Mobil Pickup</h1>
    </div>
    <!---->

    <!-- kendaraan -->
            <div class="row d-flex align-items-center justify-content-around flex-wrap">
                <div class="card pt-3 my-3" style="width: 18rem;">
                    <img src="src/img/MobilPickup.webp" class="card-img-top rounded" alt="MobilPickup">
                    <div class="text-center text-lg-start my-3 my-lg-0">
                        <p class="my-3 text-dark">Tipe Kendaraan: </p>
                        <p class="my-0 my-lg-3 text-dark">No. Plat Kendaraan:</p>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="btn btn-primary my-3">Lihat Jadwal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---->

    <div class="d-flex justify-content-center w-100 px-5 mt-3 mb-5">
        <a href="#" class="btn btn-primary">Kembali ke Daftar Kendaraan</a>
    </div>
@endsection