@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Manage Rekap Order</h3>
                <hr/>
                <a href="{{route('dashboard.rekapOrder.print')}}" target="_blank" class="btn btn-sm btn-info btn-icon-text">
                    Print PDF
                    <i class="ti-printer btn-icon-append"></i>
                </a>
                <a href="{{route('dashboard.rekapOrder.export')}}" target="_blank" class="btn btn-sm btn-success btn-icon-text">
                    Export Excel
                    <i class="mdi mdi-file-excel btn-icon-append"></i>
                </a>
                <hr />
            </div>
        </div>
        <div id="tableOrderan" class="table-responsive">
            <table id="table-data" class="table table-hover myTable">
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
        </div>
    </div>
</div>
@stop