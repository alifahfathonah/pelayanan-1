@extends('layouts.tem_customer')
@section('title','Buat Ticket')
@section('content')
<div class="section-header">
    <h1>Buat Ticket</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Buat Ticket</div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header">
            <h4>Form Buat Ticket</h4>
            </div>
            <div class="card-body">
                <form action="{{route('customer.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Nama Produk</label>
                        <select name="no_produk" class="form-control">
                            <option value="">Pilih Barang</option>
                            <?php
                                $produk = App\transaksi::selectRaw('transaksis.id,transaksis.id_user,transaksis.invoice,transaksis.id_barang,a.nama,a.harga,b.name as nama_cus')
                                            ->leftJoin('produks as a','a.id', '=' ,'transaksis.id_barang')
                                            ->leftJoin('users as b' ,'b.id' ,'=' ,'transaksis.id_user')
                                            ->get();
                            ?>
                            @foreach ($produk as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea class="form-control" name="pesan" cols="30" rows="10" style="height:100px"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
