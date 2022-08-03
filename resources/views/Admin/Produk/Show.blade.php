@extends('AppAdmin')
@section('Page Title')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Detail Produk</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('Content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Detail Produk</strong>
                            <div class="pull-right">
                                <a href="{{route('Produks.index')}}">
                                    <button type="button" class="btn btn-secondary btn-sm">
                                        <i class="ti-back-left"></i> Kembali
                                    </button>
                                </a>
                            </div>
                        </div> 
                        <div class="offset-md-3 mb-5 mt-5">
                            <div class="card mb-3" style="max-width: 700px;">
                                <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{asset('images/'.$barangs->foto)}}" style="height: 220px; width: 290px;" alt="{{$barangs->foto}}">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                    <h2 class="card-title">{{$barangs->nama_barang}}</h2>
                                    <p class="card-text">{{$barangs->keterangan}}</p>
                                    <p class="card-text"><small> Stok Produk : {{$barangs->stok}}, &nbsp; Harga : {{$barangs->harga}}</small></p>
                                    <br>
                                    <p class="card-text text-right"><small class="text-muted">Terakhir dibuat {{$barangs->created_at->format('d/m/Y')}}</small></p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection