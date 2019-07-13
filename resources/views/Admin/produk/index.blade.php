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
    @foreach ($produk as $item)
    <div class="col-12 col-md-3 col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4>{{$item->kategori}}</h4>
                <div class="card-header-action">
                    <ul class="navbar-nav mr-3">
                        {{-- <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Hapus</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-2 text-muted">{{$item->nama}}</div>
                <div class="chocolat-parent">
                <a href="{{asset('data_file/'.$item->img)}}" class="chocolat-image" target="_blank" title="Just an example">
                    <div data-crop-image="190">
                    <img alt="image" src="{{asset('data_file/'.$item->img)}}" class="img-fluid">
                    </div>
                </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection