@extends('user.index')
@section('content')
<div class="table-responsive">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>Hidangan</th>
                <th>Harga</th>
                <th style="width:8%">Jumlah</th>
                <th>Subtotal</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['harga'] * $details['jumlah'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Hidangan" class="justify-content-center">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset('storage/gambar_hidangan/'.$details['gambar']) }}" width="100px" height="100px" class="img-fluid"/></div>
                                <div class="col-sm-9">
                                    <h4 class="ms-2">{{ $details['nama'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Harga">Rp. {{ $details['harga'] }}</td>
                        <td data-th="Jumlah">
                            <input type="number" value="{{ $details['jumlah'] }}" class="form-control jumlah update-cart" />
                        </td>
                        <td data-th="Subtotal" class="text-center">Rp. {{ $details['harga'] * $details['jumlah'] }}</td>
                        <td data-th="Keterangan">
                            <textarea class="form-control keterangan update-cart">{{ $details['keterangan'] }} </textarea>
                        </td>
                        <td class="actions" data-th="Aksi">
                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{$id}}" id="{{ $details['nama'] }}"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right"><h3><strong>Total Rp. {{ $total }}</strong></h3></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Tambah Hidangan</a>
                    <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@stop

