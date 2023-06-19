<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
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

</body>
</html>
