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
                            <a href="{{url ('/')}}"><img style="height: 25px; background-color: white" src="{{asset ('assets/front/img/Logo.png')}}" alt=""></a>
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
    <!-- Notification Section Begin -->
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
        @if (session('status biodata'))
        <center>
            <div style="width: 65%" class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                <center><img style="width: 15px; height: 15px" src="{{asset ('assets/front/img/icon/bell.png')}}" alt="Bell">
                    &nbsp;  {{ session('status biodata')}}
                </center>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </center>
        @endif
    <!-- Notification Section Begin -->

    <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__text">
                            <h4>Profile</h4>
                            <div class="breadcrumb__links">
                                <a href="{{url ('/')}}">Beranda</a>
                                <span>Profile</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
        <section style="height: 80%;" class="contact spad">
            <div class="container">
                <div style="width: 100%" class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="contact__form">
                            <form action="{{url ('/Profile/'.$users->id)}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label style="margin-bottom: 10px; font-size: 16px; color:#212121; margin-left: 5px" for="exampleInputEmail1">Nama</label>
                                        <input name="name" style="color: #212121; font-weight: bold;" type="text" class="@error('name') is-invalid @enderror" placeholder="Name" value="{{$users->name}}" disabled>
                                    </div>
                                    <div class="col-lg-12">
                                        <label style="margin-bottom: 10px; font-size: 16px; color:#212121; margin-left: 5px" for="exampleInputEmail1">Email</label>
                                        <input name="email" style="color: #212121; font-weight: bold;" type="email" class="@error('email') is-invalid @enderror" placeholder="Email" value="{{$users->email}}" disabled>
                                    </div>
                                    <div class="col-lg-12">
                                        <label style="margin-bottom: 10px; font-size: 16px; color:#212121; margin-left: 5px" for="exampleInputEmail1">No Handphone</label>
                                        <br>
                                        @error('nohp')
                                        <label style="margin-bottom: 10px; font-size: 14px; color:red; margin-left: 5px">{{$message}}</label>
                                        @enderror
                                        <input name="nohp" style="color: #212121; font-weight: bold;" type="text" class="@error('nohp') is-invalid @enderror" placeholder="Ex. 0817263321" value="{{$users->nohp}}" required autofocus>
                                    </div>
                                    <div class="col-lg-12">
                                        <label style="margin-bottom: 10px; font-size: 16px; color:#212121; margin-left: 5px" for="exampleInputEmail1">Alamat</label>
                                        <br>
                                        @error('nohp')
                                        <label style="margin-bottom: 10px; font-size: 14px; color:red; margin-left: 5px">{{$message}}</label>
                                        @enderror
                                        <textarea name="alamat" style="color: #212121; font-weight: bold;" class="@error('alamat') is-invalid @enderror" placeholder="Ex. Jln. Istimewa Jogja" required>{{$users->alamat}}</textarea>
                                    </div>
                                    <div class="col-lg-12">
                                    <button style="float: right" type="submit" class="site-btn">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Contact Section End -->
@endsection