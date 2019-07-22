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
                                    <th>RESET</th>
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
                                           @if ($item->status_email == "Belum Dikirim")
                                            <form action="{{url('send-mail')}}">
                                                @csrf
                                                <input type="hidden" name="pesan" value="Halo, {{$item->name}}, Detail Akun Email : {{$item->email}} & Password : 12345678">
                                                <input type="hidden" name="email" value="{{$item->email}}">
                                                <button type="submit" class="btn btn-primary btn-sm" id="klik_kirim" data-id-kirim="{{$item->id}}">Kirim</button>
                                            </form>
                                            @elseif($item->status_email == "Dikirim")
                                            <button class="btn btn-warning btn-sm disabled">Sudah Dikirim</button>
                                           @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" id="reset" data-id-reset="{{$item->id}}">Reset</a>
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
@section('script')
<script type="text/javascript">
$(document).on('click','#klik_kirim', function () {
    var id = $(this).attr('data-id-kirim');
        $.get(' {{Url("kirim-email")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
            swal.fire({
                html : "Detail Akun Berhasil Dikirim",
                showConfirmButton : true,
                type : "success",
                timer : 1000
            });
            location.reload();
        });
    });


$(document).on('click','#reset', function () {
var id = $(this).attr('data-id-reset');
    $.get(' {{Url("reset-password")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
        swal.fire({
            html : "Password Berhasil Direset",
            showConfirmButton : true,
            type : "success",
            timer : 1000
        });
        location.reload();
    });
});
</script>
@endsection