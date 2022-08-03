@extends('AppAdmin')
@section('Page Title')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('Content')
    <div class="content mt-3">
        <a href="{{route ('Produks.index')}}">
            <div style="margin-left: 5px" class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-view-list text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Jumlah Produk</div>
                                <div class="stat-digit">{{$barangs->count()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{route ('Transaksis.index')}}">
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-calendar text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Jumlah Transaksi</div>
                                <div class="stat-digit">{{$pesanans->count()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <!-- Table -->
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Data Transaksi</strong>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Id Transaksi</th>
                                                <th scope="col">Nama Pemesan</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pesanans as $item)
                                            <tr>
                                            <td>{{$item->tanggal}}</td>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->User->name}}</td>
                                            <td>
                                                @if ($item->ongkir == null)
                                                    Menunggu Konfirmasi
                                                    @elseif ($item->status == 1)
                                                        Belum Dibayar
                                                @else
                                                    Lunas
                                                @endif
                                            </td>
                                            <td>Rp. {{number_format($item->jumlah_harga + $item->ongkir, 0, ',', '.')}}</td>
                                            </tr>
                                            @empty
                                            <div class="alert alert-danger" role="alert">
                                                <center>Data transaksi masih kosong!</center>
                                             </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- End -->
@endsection
