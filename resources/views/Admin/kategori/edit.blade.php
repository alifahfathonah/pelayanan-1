@extends('layouts.tem_admin')
@section('title','Edit Kategori Produk')
@section('content')
<div class="section-header">
    <h1>Kategori Produk</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Kategori Produk</div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header">
            <h4>Form Edit Kategori Produk</h4>
            </div>
            <div class="card-body">
           <form action="{{route('kategori.update', $kategori->id_kategori)}}" method="POST">
            {{csrf_field()}}
            @method('PUT')
                    <div class="form-group">
                        <label>Nama Kategori Produk</label>
                        <input type="text" class="form-control" value="{{$kategori->nama_kategori}}" name="nama_kategori" autocomplete="off" >
                           @if ($errors->has('hari'))
                                <span class="invalid-feedback" role="alert"> 
                                  <strong>{{ $errors->first('nama_kategori') }}</strong>
                                </span>
                           @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a type="reset" href="{{route('kategori.index')}}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection