@extends('AppAdmin')
@section('Page Title')
  <div class="breadcrumbs">
      <div class="col-sm-4">
          <div class="page-header float-left">
              <div class="page-title">
                  <h1>Tambah Produk</h1>
              </div>
          </div>
      </div>
  </div>
@endsection
@section('Content')
  <div class="content mt-3">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                  <strong>Tambah Produk</strong>
                  <br>
                  Form tambah produk K-Style Outlet
              </div>
              <div class="card-body card-block">
                  <form action="{{route ('Produks.store')}}" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="col-md-6">
                        <label for="inputNamaBarang" class="form-label"><h6>Nama Produk</h6></label>
                        <input name="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" value="{{old('nama_barang')}}" id="inputNamaBarang" placeholder="Ex.Celana Olahraga" autofocus>
                        @error('nama_barang')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="col-md-2 mb-1">
                        <label for="inputHarga" class="form-label"><h6>Harga</h6></label>
                        <input name="harga" type="text" class="form-control @error('harga') is-invalid @enderror" value="{{old('harga')}}" id="inputHarga" placeholder="Ex.250000">
                        @error('harga')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="col-md-4">
                        <label for="inputStok" class="form-label"><h6>Stok</h6></label>
                        <input name="stok" type="text" class="form-control @error('stok') is-invalid @enderror" value="{{old('stok')}}" id="inputStok" placeholder="Ex.15">
                        @error('stok')
                          <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="col-md-12 mb-1">
                        <label for="inputFoto" class="form-label"><h6>Foto Produk</h6></label>
                        <input name="foto" class="form-control form-control @error('foto') is-invalid @enderror" value="{{old('foto')}}" type="file" id="inputFoto" multiple>
                        @error('foto')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="col-md-12">
                        <label for="inputKeterangan" class="form-label"><h6>Keterangan</h6></label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="inputKeterangan" rows="2">{{old('keterangan')}}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">
                          <i class="ti-save"></i> Simpan
                        </button>
                        <a href="{{route ('Produks.index')}}">
                          <button type="button" class="btn btn-secondary">
                            <i class="ti-back-left"></i> Kembali
                          </button>
                        </a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
@endsection