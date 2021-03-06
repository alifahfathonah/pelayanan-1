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
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Data Kategori Produk</h4>
                    <a href="{{route('kategori.index')}}" class="btn btn-primary btn-sm">Tambah Kategori Produk</a>
                    </div>
                        @include('layouts._flash')
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAMA KATEGORI</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach ($kategoris as $item)
                                    <tr>
                                        <td width="10">{{$no}}</td>
                                        <td width="300">{{$item->nama_kategori}}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm disabled"><i class="nav-icon fa fa-wrench"></i></a> || 
                    
                                                <a class="btn btn-danger btn-sm disabled"><i class="nav-icon fa fa-trash"></i></a>

                                        </td> 
                                    </tr>
                                    <?php $no++; ?>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
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