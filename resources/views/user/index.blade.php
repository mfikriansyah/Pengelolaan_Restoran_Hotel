<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">

    <title> Feane </title>

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

<body class="sub_page">

    <div class="hero_area">
        <div class="bg-box">
            <img src="images/hero-bg.jpg" alt="">
        </div>
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <span>
                            Feane
                        </span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  mx-auto ">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('index') }}">Menu <span
                                        class="sr-only">(current)</span> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Book Table</a>
                            </li>
                            @if(Route::has('login'))
                                @auth
                                    <li class="nav-item">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="nav-link">
                                            <i class="ti-power-off text-primary"></i>
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}"
                                            method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endauth
                            @endif
                        </ul>
                        <div class="user_option">
                            <a href="" class="user_link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown">
                            @if(Route::has('login'))
                            @auth
                            <button class="btn btn-outline-light dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                                <span class="badge badge-pill badge-secondary">{{ count((array) session('cart')) }}</span>
                            </button>
                            @else
                            <button data-toggle="modal" data-target="#modalLogin" class="btn btn-outline-light" id="cart"><i class="fas fa-shopping-cart" aria-hidden="true"></i>
                                <span class="badge badge-pill badge-secondary">{{ count((array) session('cart')) }}</span>
                            </button>
                            @endauth
                            @endif
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="row total-header-section">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                        </div>
                                        @php $total = 0 @endphp
                                        @foreach((array) session('cart') as $id => $details)
                                            @php $total += $details['harga'] * $details['jumlah'] @endphp
                                        @endforeach
                                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                            <p>Total: <span class="text-info">Rp. {{ $total }}</span></p>
                                        </div>
                                    </div>
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            <div class="row cart-detail">
                                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                    <img src="{{asset('storage/gambar_hidangan/'.$details['gambar'])}}" />
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-Hidangan">
                                                    <p>{{ $details['nama'] }}</p>
                                                    <span class="Harga text-info">Rp. {{ $details['harga'] }} </span> <span class="count text-secondary">     
                                                        Jumlah: <strong> {{ $details['jumlah'] }} </strong>&nbsp; 
                                                        <button data-id="{{$id}}" class="float-right btn btn-danger btn-sm remove-from-cart" id="{{ $details['nama'] }}"><i class="fa fa-trash"></i></button></span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-center checkout">  
                                            <a href="{{ route('cart') }}" class="text-dark badge badge-primary order_online">View all</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="form-inline">
                                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                            @if(Route::has('login'))
                                @auth
                                    <a class="order_online">
                                        {{ Auth::user()->username }}
                                    </a>
                                @else
                                    <button type="button" data-toggle="modal" data-target="#modalLogin"
                                        class="order_online">
                                        Login
                                    </button>
                                @endauth
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
    </div>
  
<br/>

    <!-- food section -->
    <section class="food_section layout_padding-bottom">
        <div class="container">
            @yield('content')
        </div>
    </section>
    <!-- end food section -->

    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                        <h4>
                            Contact Us
                        </h4>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Location
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +01 1234567890
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    demo@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                        <a href="" class="footer-logo">
                            Feane
                        </a>
                        <p>
                            Necessary, making this the first true generator on the Internet. It uses a dictionary of
                            over 200 Latin words, combined with
                        </p>
                        <div class="footer_social">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-pinterest" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <h4>
                        Opening Hours
                    </h4>
                    <p>
                        Everyday
                    </p>
                    <p>
                        10.00 Am -10.00 Pm
                    </p>
                </div>
            </div>
            <div class="footer-info">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a href="https://html.design/">Free Html Templates</a><br><br>
                    &copy; <span id="displayYear"></span> Distributed By
                    <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
                </p>
            </div>
        </div>
    </footer>
    @include('user.modalLogin')
    <!-- footer section -->

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>
    {{-- <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map --> --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{asset('js/alerts.js')}}"></script>
  <script src="{{asset('js/ajax.js')}}"></script>
  <!-- End custom js for this page-->
    @stack('js')
    <script type="text/javascript">
        $(".jumlah").change(function (e) {
            e.preventDefault();
      
            var ele = $(this);
      
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id"), 
                    jumlah: ele.parents("tr").find(".jumlah").val()
                },
                success: function (response) {
                    toast('success', response.success);
                    // $('#cart').load(document.URL + ' #cart');
                        setTimeout(function() {
                            window.location.reload();
                        },1000);
                }
            });
        });
        $(".keterangan").change(function (e) {
            e.preventDefault();
      
            var ele = $(this);
      
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id"), 
                    keterangan: ele.parents("tr").find(".keterangan").val()
                },
                success: function (response) {
                    toast('success', response.success);
                    // $('#cart').load(document.URL + ' #cart');
                        setTimeout(function() {
                            window.location.reload();
                        },1000);
                }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            let id = $(this).data('id')
      
            var ele = $(this);
                    Swal.fire({
                    icon: 'warning',
                    html: 'Anda Akan Membatalkan<br><strong>' + $(this).attr("id") + '</strong> ?',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                      if (result.isConfirmed) {
                            $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: id
                    },
                    success: function (response) {
                        toast('success', response.success);
                        //$('#cart').load(document.URL + ' #cart');
                        // ele.parents("tr").attr("data-id")
                        setTimeout(function() {
                            window.location.reload();
                        },1500);
                    }
                });
            }
        });
    });
    $(".pay-btn").click(function (e) {
            e.preventDefault();
            var form = $("#checkout-form");
      
            var ele = $(this);
                    Swal.fire({
                    icon: 'warning',
                    html: 'Ini adalah halaman terakhir <br> <strong> Konfirmasi Untuk Order </strong>?',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                      if (result.isConfirmed) {
                            $.ajax({
                    url: '{{ route('checkout-process') }}',
                    method: "POST",
                    data: new FormData(form),
                    dataType: JSON,
                    success: function (response) {
                        toast('success', response.success);
                        //$('#cart').load(document.URL + ' #cart');
                        // ele.parents("tr").attr("data-id")
                        setTimeout(function() {
                            window.location.reload();
                        },1500);
                    }
                });
            }
        });
    });
      
    </script>
    

</body>

</html>
