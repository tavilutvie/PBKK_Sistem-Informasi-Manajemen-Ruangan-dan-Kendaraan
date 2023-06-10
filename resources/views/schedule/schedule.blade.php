@extends("layouts.template")

@include("partials.navbar")

@section("main_content")
<!-- TITLE -->
<div class="container pt-4">
    <h1 class="text-center text-dark border-5 pt-2">JADWAL PEMAKAIAN</h1>
</div>

<!-- Kalender -->
<div class="container pt-1 border-bottom border-3 mb-4 pb-3">
    <h3 class="text-center text-dark border-5 pt-1">nama_ruangan</h3>
    <h3 class="text-center text-dark border-5 pt-1 pb-3">bulan_tahun</h3>
    
    <!-- Masukin kalender disini -->
    <table class="table table-responsive w-75">
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
            <button type="button" class="btn btn-primary m-2" id="prev"><</button>
            <button type="button" class="btn btn-primary m-2" id="next">></button>  
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
            <tr>
                <td>2022-12-13</td>
                <td>08:00:00</td>
                <td>10:00:00</td>
            </tr>
            <tr>
                <td>2022-12-13</td>
                <td>08:00:00</td>
                <td>10:00:00</td>
            </tr>
            <tr>
                <td>2022-12-13</td>
                <td>08:00:00</td>
                <td>10:00:00</td>
        </tbody>
    </table>

    <div class="d-flex justify-content-center w-100 px-5 mt-4 mb-4">
        <a href="../room/roomList" class="btn btn-success">Lakukan Pemesanan</a>
    </div>

    <div class="d-flex justify-content-center w-100 px-5 mt-4 mb-5">
        <a href="../room/roomList" class="btn btn-outline-primary">Kembali ke Daftar</a>
    </div>

</div>
<!---->
<script src="../js/dateview.js"></script>
<script src="../js/datecolor.js"></script>
@endsection