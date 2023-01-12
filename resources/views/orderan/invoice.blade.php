<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style-user.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"
        integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="conten" style="margin-top: 10%">
        <div class="order-info">
            <div class="order-info-content">
                <h1 style="font-weight: bold;text-align:center">Order Recap</h1>
                <table class="order-table">
                    <tbody>
                        @php
                            $hidangans = explode(",",$orderan->nama_hidangan);
                            array_pop($hidangans);
                            $hargas = explode(",",$orderan->harga);
                            array_pop($hargas);
                        @endphp
                                    @foreach ($hidangans as $no => $hidangan)
                                <tr>
                            <td>
                                <br> <span style="font-weight:bold">{{$hidangan}}</span>
                                <div class="price">Rp. {{$hargas[$no]}}</div>
                            </td>
                        </tr>
                            @endforeach 
                    </tbody>
                    <hr/>
                </table>
                <hr/>
                <div class="total">
                    <strong><h3><span style="float:left;">
                        TOTAL &nbsp;&nbsp;
                    </span>
                    <span style="float:right; text-align:right;">
                        {{$orderan->total_harga}}
                    </span></h3></strong>
                </div>
            </div>
        </div>
    </div>
</body>
</html>