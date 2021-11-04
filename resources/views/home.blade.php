@extends('backend.template')

@section('container')
<div class="alert alert-success custom-alert">
    <span class="fa fa-passport sticky"></span>
    <label>Selamat datang di Aplikasi PAPALASAK</label>
    <br>
    <label class="font-weight-normal">{{date('d M Y')}}</label>
</div>
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card card-dashboard py-2 {{$pemeriksaanHariIni>0 ? 'has-notif' : ''}}">
            <div class="card-body">    
                <div class="row">
                    <div class="col-md-8 pr-0">
                        <h2 class="color-primary font-weight-bold">{{$pemeriksaanHariIni}}</h2>
                        Jadwal Pemeriksaan Hari Ini
                    </div>
                    <div class="col-md-4 pl-0 text-center">
                        <span class="fas fa-fw fa-calendar fa-4x"></span>
                    </div>
                </div>
                <hr>
                <a href="{{url('jadwal')}}">Lihat Detail</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card card-dashboard py-2 {{$hilang>0 ? ' has-notif' : ''}}">
            <div class="card-body">    
                <div class="row">
                    <div class="col-md-8 pr-0">
                        <h2 class="color-primary font-weight-bold">{{$hilang}}</h2>
                        Pengajuan Paspor Hilang
                    </div>
                    <div class="col-md-4 pl-0 text-center">
                        <span class="fas fa-fw fa-passport fa-4x"></span>
                    </div>
                </div>
                <hr>
                <a href="{{url('pengajuan-passport-hilang')}}">Lihat Detail</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card card-dashboard py-2 {{$rusak>0 ? ' has-notif' : ''}}">
            <div class="card-body">    
                <div class="row">
                    <div class="col-md-8 pr-0">
                        <h2 class="color-primary font-weight-bold">{{$rusak}}</h2>
                        Pengajuan Paspor Rusak
                    </div>
                    <div class="col-md-4 pl-0 text-center">
                        <span class="fas fa-fw fa-passport fa-4x"></span>
                    </div>
                </div>
                <hr>
                <a href="{{url('pengajuan-passport-rusak')}}">Lihat Detail</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card card-dashboard py-2">
            <div class="card-body">    
                <figure class="highcharts-figure">
                    <div id="container"></div>
                  </figure>
            </div>
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<?php
    $bulan = array(
        1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
    );
?>
<script>
Highcharts.setOptions({
    colors: ['#50B432', '#3c4099',]
});    
Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: "Persentase PAPALASAK Bulan <?= $bulan[date('n')].' '.date('Y') ?>"
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.y} BAP</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
      }
    }
  },
  series: [{
    name: 'Jumlah',
    colorByPoint: true,
    data: [{
      name: 'Paspor Hilang',
      y: <?= $chartHilang ?>,
      sliced: true,
      selected: true
    }, {
        name: 'Paspor Rusak',
        y: <?= $chartRusak ?>,
    }]
  }]
});    
</script>

@endsection
