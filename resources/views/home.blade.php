@extends('backend.template')

@section('container')
<div class="alert alert-success custom-alert">
    <span class="fa fa-passport sticky"></span>
    <label>Selamat datang di Aplikasi PAPALASAK</label>
    <br>
    <label class="font-weight-normal">{{date('d M Y, H:m')}}</label>
</div>
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card card-dashboard py-2 has-notif">
            <div class="card-body">    
                <div class="row">
                    <div class="col-md-8 pr-0">
                        <h2 class="color-primary font-weight-bold">5</h2>
                        Jadwal Pemeriksaan Hari Ini
                    </div>
                    <div class="col-md-4 pl-0 text-center">
                        <span class="fas fa-fw fa-calendar fa-4x"></span>
                    </div>
                </div>
                <hr>
                <a href="{{url('persediaan/kategori-barang')}}">Lihat Detail</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card card-dashboard py-2">
            <div class="card-body">    
                <div class="row">
                    <div class="col-md-8 pr-0">
                        <h2 class="color-primary font-weight-bold">5</h2>
                        Pengajuan Paspor Hilang
                    </div>
                    <div class="col-md-4 pl-0 text-center">
                        <span class="fas fa-fw fa-passport fa-4x"></span>
                    </div>
                </div>
                <hr>
                <a href="{{url('persediaan/kategori-barang')}}">Lihat Detail</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card card-dashboard py-2">
            <div class="card-body">    
                <div class="row">
                    <div class="col-md-8 pr-0">
                        <h2 class="color-primary font-weight-bold">5</h2>
                        Pengajuan Paspor Rusak
                    </div>
                    <div class="col-md-4 pl-0 text-center">
                        <span class="fas fa-fw fa-passport fa-4x"></span>
                    </div>
                </div>
                <hr>
                <a href="{{url('persediaan/kategori-barang')}}">Lihat Detail</a>
            </div>
        </div>
    </div>
</div>

@endsection
