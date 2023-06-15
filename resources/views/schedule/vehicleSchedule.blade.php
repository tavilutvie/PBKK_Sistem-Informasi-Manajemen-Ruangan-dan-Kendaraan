@extends('Template.head')

@section("main_content")

@include("Partials.navbar")
<!-- Title -->
<div class="container pt-4">
    <h1 class="text-center text-dark border-5 pt-2">JADWAL PEMAKAIAN</h1>
</div>

<!-- Kalender -->
<div class="container pt-1 border-bottom border-3 mb-4 pb-3">
    <h3 class="text-center text-dark border-5 pt-1">{{ $kendaraan['jenis_kendaraan'] }}</h3>
    <h5 class="text-center text-dark border-5 pt-1 mb-3">{{ $kendaraan['nomor_plat'] }}</h5>
    <h3 id="table-month" class="text-center text-dark border-5 pt-1 pb-3"></h3>

    <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col" class="week">S</th>
                <th scope="col" class="week">M</th>
                <th scope="col" class="week">T</th>
                <th scope="col" class="week">W</th>
                <th scope="col" class="week">T</th>
                <th scope="col" class="week">F</th>
                <th scope="col" class="week">S</th>
            </tr>
        </thead>
        <tbody id="table-body">
        </tbody>
    </table>

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="d-none">
            @if ($month == 13)
                {{ $month = 1 }}
                {{ $year = $year + 1 }}
            @elseif ($month == 0)
                {{ $month = 12 }}
                {{ $year = $year - 1 }}
            @endif
            </div>
            <a href="/vehicleList/{{ $kendaraan['id_kendaraan'] }}/schedule/{{ $month-1 }}/{{ $year }}" class="btn btn-primary m-2" id="prev"><</a>
            <a href="/vehicleList/{{ $kendaraan['id_kendaraan'] }}/schedule/{{ $month+1 }}/{{ $year }}" class="btn btn-primary m-2" id="next">></a>
        </div>
    </div>
</div>

<!-- Jadwal -->
<div class="row d-flex align-items-center justify-content-around flex-wrap">
<div>
    <h2 class="text-center text-dark border-5 py-1">Jadwal</h2>
    <table class="container table table-striped">
        <thead>
            <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu Mulai</th>
                <th scope="col">Waktu Selesai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal_sewa_kendaraans as $jadwal_sewa_kendaraan)
                <tr>
                    <td class="tanggal-pemakaian">{{ $jadwal_sewa_kendaraan['tanggal_pesanan'] }}</td>
                    <td>{{ $jadwal_sewa_kendaraan['waktu_mulai'] }}</td>
                    <td>{{ $jadwal_sewa_kendaraan['waktu_selesai'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center w-100 px-5 mt-4 mb-4">
        <a href="#" class="btn btn-success">Lakukan Pemesanan</a>
    </div>

    <div class="d-flex justify-content-center w-100 px-5 mt-4 mb-5">
        <a href="/vehicleList" class="btn btn-outline-primary">Kembali ke Daftar Kendaraan</a>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.2.slim.js" integrity="sha256-OflJKW8Z8amEUuCaflBZJ4GOg4+JnNh9JdVfoV+6biw=" crossorigin="anonymous"></script>
<script type="text/javascript">
    let currMonth = <?= $month ?>;
    let currYear = <?= $year ?>;
</script>
<script src="/js/dateview.js"></script>
<script src="/js/datecolor.js"></script>

@include('Partials.footer')
@endsection
