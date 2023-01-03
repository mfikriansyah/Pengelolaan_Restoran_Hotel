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
        <div id="tableKategori" class="table-responsive">
            <table id="table-data" class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>Nama Hidangan</th>
                        <th>Jenis Hidangan</th>
                        <th>Deskripsi Hidangan</th>
                        <th>Gambar Hidangan</th>
                        <th>Harga Hidangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hidangans as $no => $hidangan)
                        <tr class="text-center">
                            <td>{{ $no+1 }}</td>
                            <td>{{ $hidangan->nama_hidangan }}</td>
                            <td>{{ $hidangan->jenis_hidangan }}</td>
                            <td>{{ $hidangan->deskripsi_hidangan }}</td>
                            @if($hidangan->gambar_hidangan != null)
                                <td><img src="{{ asset('storage/gambar_hidangan/'.$hidangan->gambar_hidangan) }}"
                                        alt=""></td>
                            @else
                                <td>[Belum Menggunggah Gambar]</td>
                            @endif
                            <td>{{ $hidangan->harga_hidangan }}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalEditHidangan"
                                    id="btnEditHidangan" data-id="{{ $hidangan->id }}" class="btn btn-warning">
                                    Edit</button>
                            </td>
                        </tr>
                    @endforeach
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
        $(document).ready(function () {
            $(document).on("submit", "form", function (e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr("action"),
                    type: $(this).attr("method"),
                    dataType: "JSON",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (response) {
                        if ($.isEmptyObject(response.error)) {
                            toast('success', response.success);
                            document.getElementById("formTambahHidangan").reset();
                            $('#table-data').load(document.URL + ' #table-data');
                            $('#modalCreateHidangan').modal('hide');
                        } else {
                            toast('errors', response.error)
                            // printErrorMsg(response.error);
                        }

                    }
                });

            });
            // function printErrorMsg (msg) {
            //     $(".print-error-msg").find("ul").html('');
            //     $(".print-error-msg").css('display','block');
            //     $.each( msg, function( key, value ) {
            //         $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            //     });
            // }
            $(document).on('click',"#btnEditHidangan",function () {
                let id = $(this).data('id');
                console.log(id);
                $("#image-area").empty();
                $.ajax({
                    url: "{{ url('hidangan/edit') }}/" + id,
                    type: 'get',
                    dataType: 'json',
                    success: function (res) {
                        $('#nama_hidangan').val(res.nama_hidangan);
                        $('#jenis_hidangan').append(`<option selected value="` + res
                            .jenis_hidangan + `">` + res.jenis_hidangan + `</option>`);
                        $('#harga_hidangan').val(res.harga_hidangan);
                        $('#deskripsi_hidangan').val(res.deskripsi_hidangan);
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
