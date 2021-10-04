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

@endsection
