@extends('layouts.tem_admin')
@section('title','Administrator')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-user-plus"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4 class="text-dark">Jumlah Customer</h4>
              </div>
              <div class="card-body">
                {{$customer}}
              </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-user-secret"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4 class="text-dark">Ticket Masuk</h4>
                </div>
                <div class="card-body">
                {{$masuk}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-ticket-alt"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4 class="text-dark">Ticket Dalam Proses</h4>
                </div>
                <div class="card-body">
                {{$proses}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-check-square"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4 class="text-dark">Ticket Selesai</h4>
                </div>
                <div class="card-body">
                {{$selesai}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <!-- LINE CHART -->
        <div class="card">
            <div class="card-body">
            <h4 class="card-title m-b-0 text-dark">Grafik Jumlah Customer Masuk</h4>
        </div>
            <div class="card-body">
            <div class="amp-pxl m-t-90" style="height: 390px;" id="linechart"></div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <div class="col-lg-6">
        <!-- Column -->
        <div class="card card-default">
            <div class="card-header">
                <div class="card-actions">
                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                    <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                    <a class="btn-close" data-action="close"><i class="ti-close"></i></a>
                </div>
                <h4 class="card-title m-b-0" style="font-size:25px">Ticket Stats</h4>
            </div>
            <div class="card-body collapse show">
            <div id="morris-donut-chart" class="ecomm-donute" style="height: 317px;"></div>
                <ul class="list-inline m-t-20 text-center" >
                    <li >
                        <h6 class="text-dark"><i class="fa fa-circle text-primary "></i> Ticket Masuk</h6>
                        <h4 class="m-b-0 text-dark">{{$masuk}}</h4>
                    </li>
                    <li>
                        <h6 class="text-dark"><i class="fa fa-circle text-success"></i> Ticket Proses</h6>
                        <h4 class="m-b-0 text-dark">{{$proses}}</h4>
                    </li>
                    <li>
                        <h6 class="text-dark"> <i class="fa fa-circle text-danger"></i> Ticket Selesai</h6>
                        <h4 class="m-b-0 text-dark">{{$selesai}}</h4>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
$(function () {
    $('#linechart').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Jumlah Customer Masuk'
        },
        yAxis: {
            title: {
                text: 'Jumlah Jumlah Customer Masuk'
            }

        },
        credits: {enabled: false},
        xAxis: {
            categories: [{{$_tgl}}],
            crosshair: true
        },series: [{
            name: 'Jumlah',
            data: [{{$_nilai}}],
        }]
    });
});

$(function () {
   // ============================================================== 
   // Morris donut chart
   // ==============================================================       
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Ticket Masuk",
            value: [{{$masuk}}],

        }, {
            label: "Ticket Proses",
            value: [{{$proses}}],
        }, {
            label: "Ticket Selesai",
            value: [{{$selesai}}]
        }],
        resize: true,
        colors:['#6777ef', '#63ed7a', '#ef5350']
    });
    // ============================================================== 
    // sales difference
    // ==============================================================
    
    // ============================================================== 
    // sparkline chart
    // ==============================================================
    var sparklineLogin = function() { 
       $('#sparklinedash').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#26c6da'
        });
         $('#sparklinedash2').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#7460ee'
        });
          $('#sparklinedash3').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#03a9f3'
        });
           $('#sparklinedash4').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#f62d51'
        });
       
   }
    var sparkResize;
 
        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineLogin, 500);
        });
        sparklineLogin();
});
</script>
@endsection