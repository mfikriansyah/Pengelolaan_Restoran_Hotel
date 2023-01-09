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
                                <br> Jumlah : {{ $details['jumlah'] }} <br> <span class="thin small">{{ $details['keterangan'] }} <br><br></span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="price">Rp. {{ $details['harga'] * $details['jumlah'] }}</div>
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
                    @endforeach
                <div class="total">
                    <strong><h3><span style="float:left;">
                        TOTAL
                    </span>
                    <span style="float:right; text-align:right;">
                        Rp. {{ $total }}
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
                <input class="input-field" />
                <button type="button" class="pay-btn">Checkout</button>
            </form>
            </div>

        </div>
    </div>
</div>
@stop
