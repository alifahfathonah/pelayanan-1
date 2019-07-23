@extends('layouts.tem_customer')
@section('title','Halamam Customer')
@section('content')
<div class="section-header">
        <h1>Data Diri</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Data Diri</div>
        </div>
    </div>
        
    <div class="section-body">
            
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
            <div class="profile-widget-header">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
            <div class="profile-widget-items">
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Transaksi</div>
                    <div class="profile-widget-item-value">{{$transaksi}}</div>
                </div>
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Ticket Keluar</div>
                    <div class="profile-widget-item-value">{{$ticket}}</div>
                </div>
            </div>
            </div>
            <div class="profile-widget-description">
            <div class="profile-widget-name">{{Auth::user()->name}} <div class="text-muted d-inline font-weight-normal"></div></div>
                Selamat Datang, {{Auth::user()->pt}}, ini adalah halaman Customer.
            </div>
           
        </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
            <form method="post" class="needs-validation" novalidate="">
            <div class="card-header">
                <h4>Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{$user->name}}" readonly>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control" value="{{$user->alamat}}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 col-12">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{$user->email}}" readonly>
                    </div>
                    <div class="form-group col-md-5 col-12">
                        <label>Phone</label>
                        <input type="tel" class="form-control" value="{{$user->hp}}" readonly>
                    </div>
                </div>
                <a href="{{url('edit-user', $user->id)}}" class="btn btn-warning btn-sm">Edit</a>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
@endsection