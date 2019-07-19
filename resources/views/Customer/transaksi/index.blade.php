@extends('layouts.tem_customer')
@section('title','Data Transaksi')
@section('content')
<div class="section-header">
    <h1>Transaksi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Transaksi</div>
    </div>
</div>
    
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Transaksi Barang</h4>
                </div>
                    @include('layouts._flash')
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>INVOICE</th>
                                <th>NAMA BARANG</th>
                                <th>HARGA</th>
                                <th>PEMESAN</th>
                                {{-- <th>ACTION</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($transaksi as $item)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$item->invoice}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{Rupiah::getRupiah($item->harga)}}</td>
                                    <td>{{$item->nama_cus}}</td>
                                    {{-- <td>
                                        <a href="" class="btn btn-primary btn-sm">Komplain</a>

                                    </td>  --}}
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