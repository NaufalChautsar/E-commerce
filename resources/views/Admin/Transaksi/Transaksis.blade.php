@extends('AppAdmin')
@section('Page Title')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Transaksi</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('Content')
    <!-- Table Transaksi Begin -->
        <div class="content mt-3">
            <div class="animated fadeIn">
                @if (session('status'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success"><i class="ti-bell"></i></span>
                    &nbsp;  {{ session('status')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content mt-2">
                            <div class="animated fadeIn">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Table Transaksi</strong>
                                            </div>
                                            <div class="card-body">
                                                <table id="bootstrap-data-table" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Id Transaksi</th>
                                                            <th scope="col">Nama Pemesan</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Total</th>
                                                            <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp; Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($pesanans as $item)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
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
                                                                <td class="inline text-center">
                                                                    <a href="{{url('Transaksis/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                                                                        <i class="ti-pencil"></i>
                                                                    </a>
                                                                </td>
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
                    </div>
                </div>
            </div>
        </div>
@endsection