@extends('Template.head')
@section('main_content')
<!-- TITLE -->
<div class="container pt-4">
    <div class="d-flex justify-content-left w-100 px-5 mt-4 mb-3">
        <a href="/admin" class="btn btn-primary">Back to Admin Page</a>
    </div>
    <div class="d-flex justify-content-left w-100 px-5 mt-4 mb-3">
        <a href="/adminLog/export" class="btn btn-success">Export PDF</a>
    </div>
    <h1 class="text-center text-dark border-5 py-2">ADMIN LOG</h1>


    <!-- RUANGAN -->
    <table class="container table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Status Dokumen</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu Mulai</th>
                    <th scope="col">Waktu Selesai</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Nama</th>
                </tr>
            </thead>
            <tbody>
                <div class="d-none">
                    {{
                        $iterator = 1;
                     }}
                </div>
                @foreach ($orders as $order)

                        @csrf
                        <tr>
                            <td>{{ $iterator }}</td>
                            <td>{{ $order['username'] }}</td>
                            <td><input name="status_pesanan" type="text" value="{{ $order['status_pesanan'] }}" readonly="readonly"></td>
                            <td><input name="tanggal_pesanan" type="date" value="{{ $order['tanggal'] }}" readonly="readonly"></td>
                            <td><input name="waktu_mulai" type="time" value="{{ explode(" ", $order['waktu_mulai'])[1] }}" readonly="readonly"></td>
                            <td><input name="waktu_selesai" type="time" value="{{ explode(" ", $order['waktu_selesai'])[1] }}" readonly="readonly"></td>
                            <td><input name="jenis" type="text" value="{{ $order['jenis'] }}" readonly="readonly"></td>
                            <td><input name="nama" type="text" value="{{ $order['nama'] }}" readonly="readonly"></td>
                        </tr>

                    <div class="d-none">
                        {{ $iterator = $iterator + 1 }}
                    </div>
                @endforeach
            </tbody>
        </table>
    <!--  -->

    
</div>
@endsection
