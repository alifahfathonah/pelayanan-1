@extends('layouts.tem_admin')
@section('title','Tambah Transaksi')
@section('content')
<div class="section-header">
    <h1>Transaksi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Transaksi</div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header">
            <h4>Form Tambah Transaksi</h4>
            </div>
            <div class="card-body">
                <form action="{{route('transaksi.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Customer</label>
                        <select name="id_user" class="form-control" required>
                            <option value="">Pilih Customer</option>
                            <?php 
                                $user = App\user::where('auth','Customer')->get();
                            ?>
                            @foreach ($user as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <select name="id_barang" id="id" class="form-control" required>
                            <option value="">Pilih Barang</option>
                            <?php
                                $barang = App\produk::all();
                            ?>
                            @foreach ($barang as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span id="select-harga"></span>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('pelanggan.index')}}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 col-lg-4">
        <div class="card">
            <div class="card-header">TEST</div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script type="text/javascript">
    $(document).ready(function() {
       var id = $("#id").val();
            $.get('{{ Url("/harga-produk") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
            $("#select-harga").html(resp);
        });
    });

    $(document).on('change', '#id', function (e) { 
        var id = $(this).val();
            $.get('{{ Url("/harga-produk") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
            $("#select-harga").html(resp);
        });
    });
</script>
@endsection