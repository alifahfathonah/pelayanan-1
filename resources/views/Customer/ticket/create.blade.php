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
                <form action="{{route('customer.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nomor Produk</label>
                        <input type="text" class="form-control" name="no_produk">
                    </div>

                    <div class="form-group">
                        <label>Nama Produk</label>
                        <select name="nama_produk" class="form-control">
                            <option value="">Pilih Kategori</option>
                            <?php
                                $produk = App\produk::all();
                            ?>
                            @foreach ($produk as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="hidden" name="id_user">

                    <input type="hidden" name="status">

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
