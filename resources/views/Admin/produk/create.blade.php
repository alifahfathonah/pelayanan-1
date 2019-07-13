@extends('layouts.tem_admin')
@section('title','Tambah Produk')
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
            <h4>Form Tambah Produk</h4>
            </div>
            <div class="card-body">
                <form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control">
                            <option value="">Pilih Kategori</option>
                            <option value="Ayam">Ayam</option>
                            <option value="Sapi">Sapi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="img" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection