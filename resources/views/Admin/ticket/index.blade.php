@extends('layouts.tem_admin')
@section('title','Data Ticket')
@section('content')
<div class="section-header">
    <h1>Ticket</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Ticket</div>
    </div>
</div>
{{-- @include('Admin.ticket.modal') --}}
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Ticket</h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>TICKET</th>
                                <th>NAMA PRODUK</th>
                                <th>PENGIRIM</th>
                                <th>PESAN</th>
                                <th>STATUS</th>
                                <th>NOTE</th>
                                <th>FOTO</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($ticket as $item)
                                <tr>
                                    <td width="10">{{$no}}</td>
                                    <td width="130"><p style="font-weight:bold">{{$item->ticket}}</p></td>
                                    <td width="400">{{$item->nama_produk}}</td>
                                    <td width="400">{{$item->id_user}}</td>
                                    <td width="300">{{$item->pesan}}</td>
                                    <td width="200"><span class="badge badge-secondary">{{$item->status}}</span></td>
                                    <td width="200">
                                        @if ($item->status == "Pengajuan")
                                            @if ($item->note == "")
                                                <button type="button" class="btn btn-warning btn-sm" id="note" data-id-note="{{$item->id}}">Isi Note</button>
                                            @else
                                                Sudah Diisi
                                            @endif
                                        @elseif($item->status == "Proses")
                                        <button class="btn btn-warning btn-sm disabled" id="modal-1">Note</button>
                                        @elseif($item->status == "Selesai")
                                        <button class="btn btn-warning btn-sm disabled" id="modal-1">Note</button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="thumbnail">
                                            <a href="{{asset('data_file/')}}/{{$item->foto}}" target="_blank">
                                            <img src="{{asset('data_file/')}}/{{$item->foto}}" style="height:60px;width:60px;">
                                            </a>
                                        </div>
                                    </td>
                                    <td width="400">
                                        @if ($item->status == "Pengajuan")
                                            <a href="" class="btn btn-primary btn-sm" id="klik_proses" data-id-proses="{{$item->id}}">Proses</a>
                                        @elseif($item->status == "Proses")
                                            <a href="" class="btn btn-info btn-sm" id="klik_selesai" data-id-selesai="{{$item->id}}">Selesai</a>
                                        @else
                                            <button class="btn btn-success btn-sm">Ticket Sudah Selesai</button>
                                        @endif
                                        <a href="{{url('view', $item->id)}}" class="btn btn-primary btn-sm">View</a>
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
$(document).on('click','#klik_proses', function(){
    var id = $(this).attr('data-id-proses');
    $.get('{{url("proses-ticket")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
        swal({
            html : "Status Pengajuan Berhasil Diubah",
            showConfirmButton : true,
            type : "success",
            timer : 1000
        });
        location.reload();
    });
});

$(document).on('click','#klik_selesai', function(){
    var id = $(this).attr('data-id-selesai');
    $.get('{{url("selesai-ticket")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
        swal({
            html : "Status Proses Berhasil Diubah",
            showConfirmButton : true,
            type: "success",
            timer:1000
        });
        location.reload();
    });
});

$(document).on('click', '#note', function(e) {
    var id = $(this).attr('data-id-note');
    swal.fire({
        input: 'text',
        inputPlaceholder:'Isi Note Disini ...',
        }).then(function (text) {
            if (text.value == "") {
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Note Wajib Diisi !',
                })
            } else {

                notedisini(String(text.value),id);
            }
        })
});

function notedisini(note,id){           
    $.ajax({
    headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    dataType: 'html',
    url   : 'isi/note',
    data  : 'q=isi/note&note=' + note + '&id=' + id,
    success : function(data){
        swal.fire({
            html: 'Berhasil Menambahkan Note Untuk Customer',
                        showConfirmButton :  false,
                        type: "success",
                        timer: 1000
            });
        window.location.href = "{{URL::to('/ticket')}}"
    },
    error: function (xhr, ajaxOptions, thrownError) {
    swal.fire({
                html: "Terjadi Kesalahan , Silakan Hubungi IT"
        });
    }
});
}
</script>
@endsection