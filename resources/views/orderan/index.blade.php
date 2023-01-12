@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Manage Orderan Hari Ini</h3>
                <hr/>
            </div>
        </div>
        <div id="tableOrderan" class="table-responsive">
            <table id="table-data" class="table table-hover myTable">
                <thead  class="text-center">
                    <tr>
                        <th>NO</th>
                        <th>Nama Hidangan</th>
                        <th>Harga</th>
                        <th>Keterangan</th>
                        <th>Nomor Kamar</th>
                        <th>Total Harga</th>
                        <th>Email</th>
                        <th  class="text-center">Status</th>
                        <th  class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($orderans as $no => $orderan)
                    <tr>
                        <form name="form" id="form-{{$orderan->id}}" action="{{route('dashboard.orderan.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$orderan->id}}" id="">
                            <td>{{$no+1}}</td>
                            <td>{{$orderan->nama_hidangan}}
                                <input type="hidden" name="nama_hidangan" value="{{$orderan->nama_hidangan}}"/>
                            </td>
                            <td>{{$orderan->harga}}
                                <input type="hidden" name="harga" value="{{$orderan->harga}}"/>
                            </td>
                            <td>{{$orderan->keterangan}}</td>
                            <td>{{$orderan->no_kamar}}
                                <input type="hidden" name="no_kamar" value="{{$orderan->no_kamar}}"/>
                            </td>
                            <td>{{$orderan->total_harga}}
                                <input type="hidden" name="total_harga" value="{{$orderan->total_harga}}"/>
                            </td>
                            <td>{{$orderan->email}}
                                <input type="hidden" name="email" value="{{$orderan->email}}"/>
                            </td>
                            <td><p class="badge badge-sm badge-info">Perlu Disetujui</p>
                                <input type="hidden" name="status_order" value="selesai">
                            </td>
                            <td>
                                <button type="button" onclick="order('{{$orderan->id}}')" id="data" class="btn-process-order btn btn-sm btn-success">Terima</button>
                            </td>
                        </form>
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
            function order(id) {
              var form = event.target.form;
                Swal.fire({
                icon: 'question',
                text: 'Anda Akan Memproses Orderan Ini?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Proses!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                  if (result.isConfirmed) {
                    form.submit();
                  }
              });

            };
    </script>
@endpush