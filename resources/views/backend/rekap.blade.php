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
                                <input type="text" name="dari" class="datepicker form-control" id="" autocomplete="off">
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
                                <input type="text" name="sampai" class="datepicker form-control" id="" autocomplete="off">
                            </div>                        
                        </div>
                        <div class="col-md-4">
                            <label for="">Tipe Pengajuan</label>
                            <select name="tipe" id="" class="form-control">
                                <option value="all">Semua Tipe Pengajuan</option>
                                <option value="PHilang">Paspor Hilang</option>
                                <option value="PHilang">Paspor Rusak</option>
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
            <div class="table-responsive mt-4">
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
@endsection