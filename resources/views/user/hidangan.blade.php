@extends('user.index')
@section('content')

        <div class="heading_container heading_center">
            <h1>
                Our Menu
            </h1>
            <form class="form-inline mt-4" id="formItem">
                <input class="form-control mr-sm-2" type="search" placeholder="Search"  id="keyword" aria-label="Search">
                <button class="btn btn-outline-secondary my-2 my-sm-0 nav_search-btn" id="btn-search" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </div>
        <ul class="filters_menu">
            <li class="active" data-filter="*">All</li>
            <li data-filter=".Berat">Makanan Berat</li>
            <li data-filter=".Dingin">Minuman Dingin</li>
            <li data-filter=".Panas">Minuman Panas</li>
            <li data-filter=".Ringan">Makanan Ringan</li>
            <li data-filter=".Penutup">Makanan Penutup</li>
        </ul>

        <div class="filters-content">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div> 
            @endif
            <div class="row grid"> 
                @foreach($hidangans as $hidangan)
                    <div id="{{ $hidangan->id }}" class="col-sm-6 col-lg-4 all {{ $hidangan->nama_hidangan }} {{ $hidangan->jenis_hidangan }}">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="{{ asset('storage/gambar_hidangan/'.$hidangan->gambar_hidangan) }}"
                                        alt="">
                                </div>
                                <div class="detail-box">
                                    <h5 class="name">
                                        {{ $hidangan->nama_hidangan }}
                                    </h5>
                                    <p>
                                        {{ $hidangan->deskripsi_hidangan }}
                                    </p>
                                    <div class="options">
                                        <h5>
                                            Rp. {{ $hidangan->harga_hidangan }}
                                        </h5>
                                        @if(Route::has('login'))
                                        @auth 
                                        <a href="{{ route('add.to.cart', $hidangan->id) }}" class="btn btn-outline-dark order_online add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                        @else
                                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#modalLogin">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                        @endauth
                                        @endif
                                    </div>
                                    Tersedia : {{ $hidangan->stok_hidangan }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <div class="btn-box">
            <a href="">
                View More
            </a>
        </div> --}}
@stop