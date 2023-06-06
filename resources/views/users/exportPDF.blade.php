<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>exportPDF</title>
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    #myTable {
      width: 100%;
      border-collapse: collapse;
    }
    #myTable th,
    #myTable td {
      border: 1px solid black;
      padding: 8px;
    }
    p {
      text-align: left;
      font-size: 40px;
      margin-left: 20px;
    }
  </style>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <table id="myTable">
    <tr>
        <td>tanggal</td>
        <td>{{$acara->tanggal_pelaksanaan}}</td>
    </tr>
    <tr>
        <td>waktu</td>
        <td>{{$acara->mulai}}</td>
    </tr>
    <tr>
        <td>acara</td>
        <td>{{$acara->judul}}</td>
    </tr>

  </table>

  <br>

  
  <table id="myTable">
    <thead>
      <tr>
        <th class="p-3 text-left" style="background-color: blue; color: white;">Nama</th>
        <th class="p-3 text-left" style="background-color: blue; color: white;">NIP</th>
        <th class="p-3 text-left" style="background-color: blue; color: white;">Instansi</th>
        <th class="p-3 text-left" style="background-color: blue; color: white;">Divisi</th>
        <th class="p-3 text-left" style="background-color: blue; color: white;">Jabatan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($peserta as $item)
      <tr>
        <td>{{ $item->nama}}</td>
        <td>{{ $item->nip }}</td>
        <td>{{ $item->instansi }}</td>
        <td>{{ $item->divisi }}</td>
        <td>{{ $item->jabatan }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <script>
    window.print();
  </script>
</body>
</html>
