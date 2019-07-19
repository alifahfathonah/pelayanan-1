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
            <div class="profile-widget-name">{{Auth::user()->name}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
            Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
            </div>
           
        </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
            <form method="post" class="needs-validation" action="{{url('update-user', $user->id)}}">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h4>Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                        </div>
                        <div class="form-group col-md-12 col-12">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{$user->alamat}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" name="hp" value="{{$user->hp}}" required>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-sm">Edit</button>
                    <a href="{{route('home')}}" class="btn btn-danger btn-sm">Cancel</a>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
@endsection