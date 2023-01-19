@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-xl-0">
                <h3 class="font-weight-bold">Manage Rekap Order</h3>
                <hr />
                @if(empty($tanggal))
                <a href="{{ route('dashboard.rekapOrder.print') }}" class="btn btn-sm btn-info btn-icon-text">
                    Print PDF
                    <i class="ti-printer btn-icon-append"></i>
                </a>
                    <a href="{{ route('dashboard.rekapOrder.export') }}" target="_blank"
                        class="btn btn-sm btn-success btn-icon-text">
                        Export Excel
                        <i class="mdi mdi-file-excel btn-icon-append"></i>
                    </a>
                    @else
                    <a href="{{ route('dashboard.rekapOrder.print',['tanggal' => $tanggal]) }}"
                        target="_blank" class="btn btn-sm btn-info btn-icon-text">
                        Print PDF
                        <i class="ti-printer btn-icon-append"></i>
                    </a>
                    <a href="{{ route('dashboard.rekapOrder.export',['tanggal' => $tanggal]) }}"
                        target="_blank" class="btn btn-sm btn-success btn-icon-text">
                        Export Excel
                        <i class="mdi mdi-file-excel btn-icon-append"></i>
                    </a>
                @endif
                <hr />
            </div>
            <div class="col-12">
                <form action="{{ route('dashboard.rekapOrder') }}" method="get" id="formTanggal">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Filter Sesuai Tanggal</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" id="tanggal" name='tanggal'>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('dashboard.rekapOrder') }}" class="btn btn-sm btn-info"
                                rel="noopener noreferrer">
                                Tampilkan Semua</a>
                        </div>
                    </div>
                </form>
                <hr />
            </div>
        </div>
        <div id="tableOrderan" class="table-responsive">
            <table id="table-data" class="table table-hover myTable">
                <thead class="text-center">
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
                    @foreach($rekaps as $no => $rekap)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $rekap->no_kamar }}</td>
                            <td>{{ $rekap->nama_hidangan }}</td>
                            <td>{{ $rekap->total_harga }}</td>
                            <td>
                                <p class="badge badge-sm badge-success">{{ $rekap->status_order }}</p>
                            </td>
                            <td>{{ $rekap->email }}</td>
                            <td>{{ $rekap->created_at }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
    @push('js')
        <script>
            $("#tanggal").change(function (e) {
                e.preventDefault();
                $("#formTanggal").submit();
            });

        </script>
    @endpush
