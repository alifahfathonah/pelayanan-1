@extends('layouts.tem_admin')
@section('title','Data Produk')
@section('content')
<div class="section-header">
    <h1>Produk</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Produk</div>
    </div>
</div>
    
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Produk</h4>
                    <a href="{{route('produk.create')}}" class="btn btn-primary btn-sm">Tambah Produk</a>
                    </div>
                     @include('layouts._flash')
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAMA PRODUK</th>
                                    <th>NAMA KATEGORI</th>
                                    <th>QUANTITY</th>
                                    <th>HARGA</th>
                                    <th>GAMBAR</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach ($produk as $item)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->nama_kategori}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->harga}}</td>
                                        <td><img src="{{asset('data_file/')}}/{{$item->img}}" style="height:60px;width:60px;"></td>
                                        <td>
                                           <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="nav-icon fa fa-wrench"></i></a> || <a href="{{ route('produk.delete',$item->id)}}" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-trash"></i></a>

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
    </div>
@endsection