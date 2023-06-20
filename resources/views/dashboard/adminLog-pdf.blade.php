<!DOCTYPE html>
<html>
<head>
    <style>
        .d-none {
            display: none;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        .title {
            margin: 20px 0px;
            text-align: center;
            font-size: 20px;
        }

        .sub-title {
            text-align: center;
            font-size: 14px;
            font-style: italic;
        }

    </style>
</head>
<body>

<h2 class="title">Admin Log</h2>
<p class="sub-title">Export data dilakukan pada tanggal {{ date("d-m-Y") }} jam {{ date("H:i:s") }}</p>
<p></p>

<!-- RUANGAN -->
<h1 class="title">LOG PEMESANAN RUANGAN</h1>

<table>
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Ruangan</th>
            <th scope="col">Username</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Waktu Mulai</th>
            <th scope="col">Waktu Selesai</th>
            <th scope="col">Status Pemesanan</th>
            <th scope="col">Status Dokumen</th>
        </tr>
        <tbody>
            <div class="d-none">
                {{ $iterator = 1; }}
            </div>
            @foreach ($orders['ruangan_order_list'] as $order)
                <tr>
                    <td>{{ $iterator }}</td>
                    <td>{{ $order['nama'] }}</td>
                    <td>{{ $order['username'] }}</td>
                    <td>{{ $order['tanggal'] }}</td>
                    <td>{{ explode(" ", $order['waktu_mulai'])[1] }}</td>
                    <td>{{ explode(" ", $order['waktu_selesai'])[1] }}</td>
                    <td>{{ $order['status_pesanan'] }}</td>
                    @if ($order['status_dokumen'] == 1)
                        <td>
                            <input type="checkbox" checked>
                        </td>
                    @elseif ($order['status_dokumen'] == 0)
                        <td>
                            <input type="checkbox">
                        </td>
                    @endif
                </tr>

                <div class="d-none">
                    {{ $iterator = $iterator + 1 }}
                </div>
            @endforeach
        </tbody>
    </thead>
</table>
<!--  -->

<!-- KENDARAAN -->
<h1 class="title">LOG PEMESANAN KENDARAAN</h1>

<table>
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Jenis Kendaraan</th>
            <th scope="col">Nomor Plat</th>
            <th scope="col">Username</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Waktu Mulai</th>
            <th scope="col">Waktu Selesai</th>
            <th scope="col">Status Pemesanan</th>
            <th scope="col">Status Dokumen</th>
        </tr>
        <tbody>
            <div class="d-none">
                {{ $iterator = 1; }}
            </div>
            @foreach ($orders['kendaraan_order_list'] as $order)
                <tr>
                    <td>{{ $iterator }}</td>
                    <td>{{ $order['nama'] }}</td>
                    <td>{{ $order['nomor_plat'] }}</td>
                    <td>{{ $order['username'] }}</td>
                    <td>{{ $order['tanggal'] }}</td>
                    <td>{{ explode(" ", $order['waktu_mulai'])[1] }}</td>
                    <td>{{ explode(" ", $order['waktu_selesai'])[1] }}</td>
                    <td>{{ $order['status_pesanan'] }}</td>
                    @if ($order['status_dokumen'] == 1)
                        <td>
                            <input type="checkbox" checked>
                        </td>
                    @elseif ($order['status_dokumen'] == 0)
                        <td>
                            <input type="checkbox">
                        </td>
                    @endif
                </tr>

                <div class="d-none">
                    {{ $iterator = $iterator + 1 }}
                </div>
            @endforeach
        </tbody>
    </thead>
</table>
<!--  -->

</body>
</html>
