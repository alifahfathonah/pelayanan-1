@extends('layouts.tem_admin')
@section('title','Data Kategori Produk')
@section('content')
<div class="section-header">
    <h1>Kategori Produk</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Kategori Produk</div>
    </div>
</div>
    
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Kategori Produk</h4>
                    <a href="{{route('kategori.create')}}" class="btn btn-primary btn-sm">Tambah Kategori Produk</a>
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
                                @foreach ($kategori as $item)
                                    <tr>
                                        <td width="10">{{$no}}</td>
                                        <td width="400">{{$item->nama_kategori}}</td>
                                        <td>
                                           <a href="{{ route('kategori.edit', $item->id_kategori) }}" class="btn btn-warning btn-sm"><i class="nav-icon fa fa-wrench"></i></a> || 
                    
                                             <a href="{{ route('kategori.delete',$item->id_kategori)}}" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-trash"></i></a>

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