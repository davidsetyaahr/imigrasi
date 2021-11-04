@extends('backend.template')

@section('container')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card card-dashboard">
            <div class="card-body">    
                <form action="" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Dari</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                                <input type="text" name="dari" class="datepicker form-control" id="" autocomplete="off" value="{{isset($_GET['dari']) ? $_GET['dari'] : ''}}">
                            </div>                        
                        </div>
                        <div class="col-md-4">
                            <label for="">Sampai</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                                <input type="text" name="sampai" class="datepicker form-control" id="" autocomplete="off" value="{{isset($_GET['dari']) ? $_GET['sampai'] : ''}}">
                            </div>                        
                        </div>
                        <div class="col-md-4">
                            <label for="">Tipe Pengajuan</label>
                            <select name="tipe" id="" class="form-control">
                                <option value="all" <?= isset($_GET['tipe']) && $_GET['tipe']=='all' ? 'selected' : '' ?>>Semua Tipe Pengajuan</option>
                                <option value="PHilang" <?= isset($_GET['tipe']) && $_GET['tipe']=='PHilang' ? 'selected' : '' ?>>Paspor Hilang</option>
                                <option value="PRusak" <?= isset($_GET['tipe']) && $_GET['tipe']=='PRusak' ? 'selected' : '' ?>>Paspor Rusak</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"><span class="fa fa-filter"></span> Filter</button>
                            &nbsp;
                            <button type="reset" class="btn btn-default"><span class="fa fa-times"></span> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php 
            if(isset($rekap)){
        ?>
        <br>
        <?php 
            if($_GET['tipe']=='all'){
        ?>
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
        <?php } ?>
            <b class="mt-4 text-primary">Total : <?= count($rekap) ?> Data BAP</b>
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Nomor Pemeriksaan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Tipe Pengajuan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekap as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->NIK}}</td>
                            <td>{{$item->no_pemeriksaan}}</td>
                            <td>{{date('d M Y', strtotime($item->tgl_pengajuan))}}</td>
                            <td>{{date('d M Y', strtotime($item->tgl_pemeriksaan))}}</td>
                            <td>{{$item->tipe=='Philang' ? 'Paspor Hilang' : 'Paspor Rusak'}}</td>
                            <td><a href="{{url('pemeriksaan/berkas/'.$item->id_pengajuan)}}" class="btn btn-default"><span class="fa fa-download"></span> Download Berkas</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        <?php
            }
        ?>
    </div>
</div>
<?php 
if(isset($rekap) && $_GET['tipe']=='all'){
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
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
        text: "Persentase PAPALASAK"
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
<?php
    }
?>

@endsection