@extends('layouts.tem_admin')
@section('title','Data Customer')
@section('content')
<div class="section-header">
    <h1>Customer</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Customer</div>
    </div>
</div>
    
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Customer</h4>
                    <a href="{{route('pelanggan.create')}}" class="btn btn-primary btn-sm">Tambah Customer</a>
                    </div>
                     @include('layouts._flash')
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>NO. HP</th>
                                    <th>ALAMAT</th>
                                    <th>KELAMIN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach ($customer as $item)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td>{{$item->hp}}</td>
                                        <td>
                                            @if ($item->kelamin == "L")
                                                Laki-laki
                                            @else
                                                Perempuan
                                            @endif
                                        </td>
                                        <td>
                                           {{-- <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="nav-icon fa fa-wrench"></i></a> || <a href="{{ route('produk.delete',$item->id)}}" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-trash"></i></a> --}}
                                           <a href="" class="btn btn-primary btn-sm">Kirim</a>

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