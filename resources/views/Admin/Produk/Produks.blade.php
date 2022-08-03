@extends('AppAdmin')
@section('Page Title')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Produk</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('Content')
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
                                                <strong class="card-title">Table Produk</strong>
                                                <div class="pull-right">
                                                    <a href="{{route ('Produks.create')}}">
                                                        <button type="button" class="btn btn-success btn-sm">
                                                            <i class="ti-plus"></i> Tambah
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table id="bootstrap-data-table" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Nama Produk</th>
                                                            <th scope="col">Harga</th>
                                                            <th scope="col">Stok</th>
                                                            <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp; Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($barangs as $item)
                                                        <tr>
                                                            <td>{{$loop -> iteration}}</td>
                                                            <td>{{$item -> nama_barang}}</td>
                                                            <td>Rp. {{number_format($item->harga, 0, ',', '.')}}</td>
                                                            <td>{{$item -> stok}} Buah Celana</td>
                                                            <td class="inline text-center">
                                                                <a href="{{url('Produks/'.$item->id)}}" class="btn btn-warning btn-sm">
                                                                    <i class="ti-eye"></i>
                                                                </a>
                                                                <a href="{{url('Produks/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                                                                    <i class="ti-pencil"></i>
                                                                </a>
                                                                <form action="{{url('Produks/'.$item->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus data ini ?')">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="btn btn-danger btn-sm">
                                                                        <i class="ti-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <div class="alert alert-danger" role="alert">
                                                            <center>Data tidak ada ! <a href="{{route('Produks.create')}}" class="alert-link">Tambah Data Produk</a>. Tolong, tambah data terlebih dahulu.</center>
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
