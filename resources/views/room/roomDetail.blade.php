@extends("Template.head")

@section("main_content")

@include("Partials.navbar")
    <!-- TITLE -->
    <div class="container pt-4">
        <h1 class="text-center text-dark border-5 py-2">{{ $ruangan->nama_ruangan }}</h1>
    </div>
    <!---->

    <!-- Ruangan -->
    <div class="row d-flex align-items-center justify-content-around flex-wrap">
        <div class="card pt-3 my-3" style="width: 22rem; height: 32rem;">
            <img src="src/img/{{ $ruangan->nama_ruangan }}.webp" class="card-img-top rounded" alt="Pascasarjana">
            <div class="text-center text-lg-start my-3 my-lg-0">
                <p class="my-3 text-dark">Nama Ruangan: {{ $ruangan->nama_ruangan }}</p>
                <p class="my-3 text-dark">Jenis Ruangan: {{ $ruangan->jenis_ruangan }}</p>
                <p class="my-3 text-dark">Status Operasional:
                    @if ($ruangan->status_operasional == 1)
                        Tersedia
                    @else
                        Tidak Tersedia
                    @endif
                </p>
                <p class="my-3 text-dark">Kapasitas: {{ $ruangan->kapasitas }}</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ $ruangan->id_ruangan }}/schedule" class="btn btn-primary my-3">Lihat Jadwal</a>
                </div>
            </div>
        </div>
    </div>
    <!---->

    <div class="d-flex justify-content-center w-100 px-5 mt-3 mb-5">
        <a href="/roomList" class="btn btn-primary">Kembali ke Daftar Ruangan</a>
    </div>

@include('Partials.footer')
@endsection
