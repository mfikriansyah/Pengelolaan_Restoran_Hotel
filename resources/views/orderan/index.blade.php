@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Manage Orderan</h3>
            </div>
        </div>
        <div id="tableOrderan" class="table-responsive">
            <table id="table-data" class="table table-hover myTable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Hidangan</th>
                        <th>Keterangan</th>
                        <th>Nomor Kamar</th>
                        <th>Total Harga</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-body">

                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
@push('js')
    <script>
        $(function () {
            var table = $(".myTable").DataTable({
                processing: true,
                ajax: "{{ route('dashboard.orderan') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        "render": function (data) {
                            return '<form action="{{route(\'dashboard.orderan.store\')}}" method="post">'+
                                '@csrf';
                        }
                    },
                    {
                        data: 'nama_hidangan',
                        name: 'Nama Hidangan',
                        "render": function (data) {
                            return '<input type="hidden" name=""';
                        }
                    },
                    {
                        data: 'keterangan',
                        name: 'Keterangan'
                    },
                    {
                        data: 'no_kamar',
                        name: 'Nomor Kamar',
                    },
                    {
                        data: 'total_harga',
                        name: 'Total Harga',
                    },
                    {
                        data: 'email',
                        name: 'Email'
                    },
                    {
                        data: 'status',
                        name: 'Status',
                        "render": function (data) {
                            if (data === 1) {
                                return '<p class="badge badge-sm badge-success">Disetujui</p>';
                            } else {
                                return '<p class="badge badge-sm badge-warning">Perlu Disetujui</p>';
                            }
                        }
                    },
                    {
                        data: 'id',
                        name: 'Aksi',
                        "render": function (data) {
                            return '<button type="submit" id="data" "data-toggle="tooltip" class="btn-hapus btn btn-warning">Terima</button></form>';
                        }
                    },
                ],
            });

        });

    </script>
@endpush