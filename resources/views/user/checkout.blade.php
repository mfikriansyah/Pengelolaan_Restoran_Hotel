@extends("user.index")
@section("content")
<div class="conten">
    <div class="window">
        <div class="order-info">
            <form action="{{route ('checkout-process')}}" id="checkout-form" method="POST">
                @csrf
            <div class="order-info-content">
                <h1 style="font-weight: bold;text-align:center">Order Recap</h1>
                @php $total = 0 @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                <table class="order-table">
                    <tbody>
                        <tr>
                            <td><img src="{{ asset('storage/gambar_hidangan/'.$details['gambar']) }}" class="img-fluid"/>
                            </td>
                            <td>
                                <br> <span style="font-weight:bold">{{ $details['nama'] }}</span>
                                <input type="hidden" name="nama_hidangan[]" value="{{ $details['nama'] }} ({{ $details['jumlah'] }}x)">
                                <br> Jumlah : {{ $details['jumlah'] }} <br> <span class="thin small">{{ $details['keterangan'] }} <br><br></span>
                                <input type="hidden" name="keterangan[]" value="{{$details['keterangan']}}">
                                <input type="hidden" name="id_hidangan[]" value="{{$details['id']}}">
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <div class="price">Rp. {{ $details['harga'] * $details['jumlah'] }}</div>
                                <input type="hidden" name="harga[]" value="{{ $details['harga'] * $details['jumlah'] }}">
                            </td>
                        </tr>
                    </tbody>
                    <hr/>
                </table>
                @endforeach
                <hr/>
                @endif
                @php $total = 0 @endphp
                @foreach((array) session('cart') as $id => $details)
                @php $total += $details['harga'] * $details['jumlah'] @endphp
                <input type="hidden" name="jumlah[]" value="{{$details['jumlah']}}">
                @endforeach
                <div class="total">
                    <strong><h3><span style="float:left;">
                        TOTAL
                    </span>
                    <span style="float:right; text-align:right;">
                        Rp. {{ $total }}
                        <input type="hidden" name="total_harga" value="{{$total}}" id="">
                    </span></h3></strong>
                </div>
            </div>
        </div>
        
        <div class="credit-info">
            <div class="credit-info-content">
                <table class="half-input-table">
                    <tr>
                        <td>Please select your card: </td>
                        <td>
                            <div class="dropdown" id="card-dropdown">
                                <div class="dropdown-btn" id="current-card">Visa</div>
                                <div class="dropdown-select">
                                    <ul>
                                        <li>Master Card</li>
                                        <li>American Express</li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <img src="https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png" height="80"
                    class="credit-card-image" id="credit-card-image">
                Card Number
                <input class="input-field" />
                Card Holder
                <input class="input-field" />
                <table class="half-input-table">
                    <tr>
                        <td> Expires
                            <input class="input-field" />
                        </td>
                        <td>CVC
                            <input class="input-field" />
                        </td>
                    </tr>
                </table>
                Email
                <p style="font-size: 10px">* For Invoice Order</p>
                <input class="input-field" name="email" type="email"/>
                <input type="hidden" name="no_kamar" value="{{Auth::user()->username}}">
                <input type="hidden" name="status_order" id="" value="0">
                <button type="button" id="pay-btn" class="pay-btn">Checkout</button>
            </form>
            </div>

        </div>
    </div>
</div>
@stop
@push('js')
<script>
    $("#pay-btn").click(function (e) {
        var form = event.target.form;
        e.preventDefault();
                Swal.fire({
                icon: 'warning',
                html: 'Ini adalah halaman terakhir <br> <strong> Konfirmasi Untuk Order </strong>?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Order!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                  if (result.isConfirmed) {
             //   form.submit();
                    $.ajax({
                    url: "{{route ('checkout-process')}}",
                    type: "post",
                    dataType: "JSON",
                    data: $('#checkout-form').serialize(),
                    success: function (response) {
                        if ($.isEmptyObject(response.error)) {
                            toast('success', response.success);
                            setTimeout(function() {
                                window.location.replace("{{route('index')}}");
                            //window.location.reload();
                        },1000);
                        } else {
                            toast('errors', response.error)
                            // printErrorMsg(response.error);
                        }
                    }
                });
        }
    });
    });

</script>
@endpush
