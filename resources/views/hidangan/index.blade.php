@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Manage Hidangan</h3>
                <hr />
                <button class="btn btn-sm btn-primary create" name="button" data-toggle="modal"
                    data-target="#modalCreateHidangan"><i class="fa fa-plus"></i>
                    Tambah Data</button>
                <hr />
            </div>
        </div>
        <div id="tableHidangan" class="table-responsive">
            <table id="table-data" class="table table-hover myTable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Hidangan</th>
                        <th>Jenis Hidangan</th>
                        <th>Deskripsi Hidangan</th>
                        <th>Gambar Hidangan</th>
                        <th>Harga Hidangan</th>
                        <th>Stok Hidangan</th>
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
@include('hidangan.modalEdit')
@include('hidangan.modalCreate')
@endsection
@push('js')
    <script>
        $(function () {
            var table = $(".myTable").DataTable({
                processing: true,
                ajax: "{{ route('dashboard.hidangan') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_hidangan',
                        name: 'Nama Hidangan'
                    },
                    {
                        data: 'jenis_hidangan',
                        name: 'Jenis Hidangan'
                    },
                    {
                        data: 'deskripsi_hidangan',
                        name: 'Deskripsi Hidangan',
                        "render": function (data) {
                            var deskripsi = data.substr(0,50);
                            return deskripsi;
                        }
                    },
                    {
                        data: 'gambar_hidangan',
                        name: 'Gambar Hidangan',
                        "render": function (data) {
                            if (data !== null) {
                                return '<img class="" src="storage/gambar_hidangan/' + data + '">';
                            } else {
                                return '[Gambar Tidak Tersedia]';
                            }
                        }
                    },
                    {
                        data: 'harga_hidangan',
                        name: 'Harga Hidangan'
                    },
                    {
                        data: 'stok_hidangan',
                        name: 'Stok Hidangan'
                    },
                    {
                        data: 'status',
                        name: 'Status',
                        "render": function (data) {
                            if (data == 0) {
                                return '<p class="badge badge-sm badge-danger">Nonaktif</p>';
                            } else {
                                return '<p class="badge badge-sm badge-success">Aktif</p>';
                            }
                        }
                    },
                    {
                        data: 'aksi',
                        name: 'Aksi'
                    },
                ],
            });

            $(document).on('click', "#btnEditHidangan", function () {
                let id = $(this).data('id');
                $("#image-area").empty();
                $.ajax({
                    url: "{{ url('hidangan/edit') }}/" + id,
                    type: 'get',
                    dataType: 'json',
                    success: function (res) {
                        $('#nama_hidangan').val(res.nama_hidangan);
                        $('#jenis_hidangan').append(`<option selected value="` + res
                            .jenis_hidangan + `">` + res.jenis_hidangan + `</option>`);
                        if(res.status == 1){
                            $('#status').append(`<option selected value="1">Aktif</option>`);
                        }else{
                            $('#status').append(`<option selected value="0">Nonaktif</option>`);
                        }
                        $('#harga_hidangan').val(res.harga_hidangan);
                        $('#deskripsi_hidangan').val(res.deskripsi_hidangan);
                        $('#id_hidangan').val(res.id);
                        $('#old_gambar_hidangan').val(res.gambar_hidangan);
                        $('#stok_hidangan').val(res.stok_hidangan);
                        if (res.gambar_hidangan !== null) {
                            $('#image-area').append(
                                `<img src="` + baseurl + `/storage/gambar_hidangan/` +
                                res.gambar_hidangan + `" width="200px"/>`
                            );
                        } else {
                            $('#image-area').append(`[Belum Menggunggah Gambar]`);
                        }
                    },
                });

            });
        });

    </script>
@endpush
