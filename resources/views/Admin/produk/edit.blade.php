@extends('layouts.tem_admin')
@section('title','Edit Produk')
@section('content')
<div class="section-header">
    <h1>Produk</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Produk</div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header">
            <h4>Form Edit Produk</h4>
            </div>
            <div class="card-body">
                <form action="{{route('produk.update', $produk->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama" value="{{$produk->nama}}" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control">
                            <option value="{{$produk->kategori}}" selected>{{$produk->nama_kategori}}</option>
                            @foreach($kategori_list as $item)
                            <option value="{{$item->id_kategori}}">{{$item->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="{{$produk->quantity}}" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" value="{{$produk->harga}}" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="img" class="form-control" autocomplete="off">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a type="reset" href="{{route('produk.index')}}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection