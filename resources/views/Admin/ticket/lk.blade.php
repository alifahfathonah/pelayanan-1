@extends('layouts.tem_admin')
@section('title','Lembar Pengesahan')
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Lembar Pengesahan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Invoice</div>
        </div>
        </div>

        <div class="section-body">
        <div class="invoice">
            <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                <div class="invoice-title">
                    <h2>Lembar Pengesahan</h2>
                    <div class="invoice-number">No Pengaduan #{{$first->ticket}}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-1">
                    <address>
                        <strong>Customer :</strong><br>
                        {{$first->name}}<br>
                        {{$first->alamat}}<br>
                    </address>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-6 mb-1">
                        <address>
                            <strong>Produk :</strong><br>
                            {{$first->nama_produk}}<br>
                            {{$first->status}}<br>
                        </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                <div class="section-title">Note</div>
                <p class="section-lead">Note.</p>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-md">
                        <tr>
                            <td>
                                <textarea name="" id="" cols="10" rows="5" style="width:100%; height:140px" class="form-control" readonly>{{$first->note}}</textarea>
                            </td>
                        </tr>
                    </table>

                    <table class="table table-striped table-hover table-md">
                            <p class="section-lead">All items here cannot be deleted.</p>
                        <tr>
                            <td>
                                <textarea name="" id="" cols="10" rows="5" style="width:100%; height:140px" class="form-control" readonly></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12 text-right">
                    <hr class="mt-2 mb-2">
                    <div class="invoice-detail-item">
                        <div class="invoice-detail-name">TTD</div> <br><br><br><br>
                        <div class="invoice-detail-value invoice-detail-value-lg">Manager Gudang</div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <hr>
            <div class="text-md-right">
            <a href="{{url('cetak', $first->id)}}" class="btn btn-warning btn-icon icon-left" target="_blank"><i class="fas fa-print"></i> Print</a>
            </div>
        </div>
        </div>
    </section>
@endsection