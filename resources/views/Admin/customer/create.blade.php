@extends('layouts.tem_admin')
@section('title','Tambah Customer')
@section('content')
<div class="section-header">
    <h1>Customer</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Customer</div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header">
            <h4>Form Tambah Customer</h4>
            </div>
            <div class="card-body">
                <form action="{{route('pelanggan.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Customer</label>
                        <input type="text" class="form-control" name="name" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input type="text" class="form-control" name="pt" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>No. HP</label>
                        <input type="number" name="hp" class="form-control" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Kelamin</label>
                        <select name="kelamin" class="form-control">
                            <option value="">--Pilih Kelamin--</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('pelanggan.index')}}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection