@extends('App')
@section('Navbar')
    <!-- Navbar Mobile -->
        <div class="offcanvas-menu-overlay"></div>
        <div class="offcanvas-menu-wrapper">
            <div style="margin-right: 50px" class="offcanvas__nav__option">
                @guest
                <a href="{{url ('Check-Out')}}"><img src="{{asset ('assets/front/img/icon/cart.png')}}" alt=""></a>
                <div class="price">Rp.0</div>
                @else
                <?php
                $pesanan_utama = \App\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                if($pesanan_utama == null){
                    $notif = 0;
                }else{
                    $notif = \App\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                }
                ?>
                @if ($notif == 0)
                <a href="{{url ('/')}}"><img src="{{asset ('assets/front/img/icon/cart.png')}}" alt=""></a>
                <div class="price">Rp.0</div>
                @else    
                <a style="text-decoration: none; color: #212121" href="{{url ('Check-Out')}}"><img src="{{asset ('assets/front/img/icon/cart.png')}}" alt="">{{$notif}}</a>
                <div class="price">Rp.0</div>
                @endif
                @endguest
            </div>
            <div style="margin-top: 50px" id="mobile-menu-wrap"></div>
            <div class="offcanvas__option">
                <div class="offcanvas__links">
                    @guest
                    <a href="{{ route('login') }}">Sign in</a>
                    @else    
                    <a style="margin-bottom: 15px; margin-top: 15px" href="{{url ('/Profile')}}"><strong>Profile</strong></a>
                    <a style="margin-bottom: 30px" href="{{url ('/History')}}"><strong>Riwayat Pemesanan</strong></a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><strong>Keluar</strong> 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    <!-- End -->

    <!-- Navbar Web -->
        <header class="header">
            <div class="header__top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-7">
                            <div class="header__top__left">
                                <p>Selamat Datang di K-Style Outlet</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="header__top__right">
                                <div class="header__top__links">
                                    @guest
                                    <a href="{{ route('login') }}">Masuk</a>
                                    @else
                                    <div class="header__top__hover">
                                        <span><a href="{{url ('/Profile')}}"><strong>Profile</strong><i style="margin-left: 10px" class="arrow_carrot-down"></i></a></span>
                                        <ul style="background-color: #111; width: 210px; margin-top: 10px">
                                            <li style="padding-right: 56px; width: 250px; margin-top: 10px"><a href="{{url ('/History')}}"><strong>Riwayat Pemesanan</strong></a></li>
                                            <li style="padding-right: 103px; margin-top: 10px; margin-bottom: 10px"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><strong>Keluar</strong> 
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form></li>
                                        </ul>
                                    </div>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="header__logo">
                            <a href="{{url ('/')}}"><img style="height: 30px; background-color: white" src="{{asset ('assets/front/img/Logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <nav class="header__menu mobile-menu">
                            <ul style="font-size: 20px">
                                <li class="active"><a href="{{url ('/')}}">Beranda</a></li>
                                <li><a href="{{url ('Produk')}}">Produk</a></li>
                                <li><a href="{{url ('Kontak')}}">Kontak</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="header__nav__option">
                            @guest
                            <a href="{{url ('Check-Out')}}"><img src="{{asset ('assets/front/img/icon/cart.png')}}" alt=""></a>
                            @else
                            <?php
                            $pesanan_utama = \App\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                            if($pesanan_utama == null){
                                $notif = 0;
                            }else{
                            $notif = \App\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                            }
                            ?>
                            @if ($notif == 0)
                            <a href="{{url ('/')}}"><img src="{{asset ('assets/front/img/icon/cart.png')}}" alt=""></a>
                            @else    
                            <a style="text-decoration: none; color: #212121" href="{{url ('Check-Out')}}"><img src="{{asset ('assets/front/img/icon/cart.png')}}" alt="">{{$notif}}</a>
                            @endif
                            @endguest
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </header>
    <!-- End -->
@endsection
@section('Main')
    <!-- Hero Section Begin-->
        <section class="hero">
            @if (session('status'))
            <center>
            <div style="width: 65%" class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <center><img style="width: 15px; height: 15px" src="{{asset ('assets/front/img/icon/bell.png')}}" alt="Bell">
                    &nbsp;  {{ session('status')}}
                </center>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            </center>
            @endif
            <div class="hero__slider owl-carousel">
                <div class="hero__items set-bg" data-setbg="{{asset ('assets/front/img/banner/CelanaLeggingBlack.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 col-md-8">
                                <div class="hero__text">
                                    <h2 style="color: #e53637">Sport Center 2022</h2>
                                    <p>Spesial celana berbahan terbaik yang ada di toko K-Syle Outlet</p>
                                    <a href="{{url ('Produk')}}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="{{asset ('assets/front/img/banner/CelanaLeggingBlue.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 col-md-8">
                                <div class="hero__text">
                                    <h2 style="color: #e53637">Sport Center 2022</h2>
                                    <p>Spesial celana berbahan terbaik yang ada di toko K-Syle Outlet</p>
                                    <a href="{{url ('Produk')}}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
        <section class="banner spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 offset-lg-4">
                        <div class="banner__item">
                            <div class="banner__item__pic">
                                <img style="width: 500px; height: 500px" src="{{asset('assets/front/img/banner/CelanaLeggingBlack.jpg')}}" alt="">
                            </div>
                            <div class="banner__item__text">
                                <h2>Legging Black</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="banner__item banner__item--middle">
                            <div class="banner__item__pic">
                                <img src="{{asset('assets/front/img/banner/CelanaLeggingBlue.jpg')}}" alt="">
                            </div>
                            <div class="banner__item__text">
                                <h2>Lengging Blue</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
        <section class="product spad">
            <div class="container">
                <div class="row">
                    <div style="margin-top: 50px" class="col-lg-12">
                        <ul class="filter__controls">
                            <li class="active" data-filter="*">Produk Kami</li>
                        </ul>
                    </div>
                </div>
                <div class="row product__filter">
                        @forelse ($barangs as $item)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                            <div class="product__item">
                                <div><img src="{{asset ('images/'.$item->foto)}}" alt="{{$item->nama_barang}}"></div>
                                <div class="product__item__text">
                                    <h6>{{$item->nama_barang}}</h6>
                                    <a href="{{url('Pesan/'.$item->id)}}" class="add-cart">+ Detail Produk</a>
                                    <div class="rating">
                                        <i style="color: yellow" class="fa fa-star"></i>
                                        <i style="color: yellow" class="fa fa-star"></i>
                                        <i style="color: yellow" class="fa fa-star"></i>
                                        <i style="color: yellow" class="fa fa-star"></i>
                                        <i style="color: yellow" class="fa fa-star"></i>
                                    </div>
                                    <h5>Rp. {{number_format($item->harga, 0, ',', '.')}}</h5>
                                </div>
                            </div>
                        </div>
                    @empty
                    <ul class="filter__controls">
                        <li data-filter="*">Stok Barang Lagi Habis</li>
                    </ul>
                    @endforelse
                </div>
            </div>
        </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__about">
                            <div class="footer__logo">
                                <a href="{{url ('/')}}"><img style="height: 60px" src="{{asset ('assets/front/img/Logo.png')}}" alt=""></a>
                            </div>
                            <p>Selamat datang di toko K-Style Outlet dan selamat berbelanja</p>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                        <div class="footer__widget">
                            <h6>Produk</h6>
                            <ul>
                                <li><a href="{{url ('/Produk')}}">Celana Lari</a></li>
                                <li><a href="{{url ('/Produk')}}">Celana Joging</a></li>
                                <li><a href="{{url ('/Produk')}}">Celana Senam</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="footer__widget">
                            <h6>Menu</h6>
                            <ul>
                                <li><a href="{{url ('/')}}">Beranda</a></li>
                                <li><a href="{{url ('Produk')}}">Produk</a></li>
                                <li><a href="{{url ('Kontak')}}">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                        <div class="footer__widget">
                            <h6>Lokasi</h6>
                            <div class="footer__newslatter">
                                <p>ITC Abassador, Kuningan, Jakarta</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <!-- Footer Section End -->
@endsection