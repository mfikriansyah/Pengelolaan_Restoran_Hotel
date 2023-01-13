<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <table id="table-data" class="table table-bordered myTable">
        <thead  class="text-center">
            <tr>
                <th>NO</th>
                <th>No Kamar</th>
                <th>Nama Hidangan</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Email</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody id="table-body">
            @foreach ($rekaps as $no => $rekap)
            <tr>
                    <td>{{$no+1}}</td>
                    <td>{{$rekap->no_kamar}}</td>
                    <td>{{$rekap->nama_hidangan}}</td>
                    <td>{{$rekap->total_harga}}</td>
                    <td><p class="badge badge-sm badge-success">{{$rekap->status_order}}</p></td>
                    <td>{{$rekap->email}}</td>
                    <td>{{$rekap->created_at}}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>