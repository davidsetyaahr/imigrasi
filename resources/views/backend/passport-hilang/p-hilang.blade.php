@extends('backend.template')

@section('container')
<div class="row">
    @if (session('status'))
    <div class="col alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="col-md-12 mb-4">
        <form action="{{url('jadwal/store')}}" id="submitConfirm" data-info="Penjadawalan Akan Dilakukan Kepada Item Yang Terpilih." method="post">
            @csrf
        <div class="table-responsive">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="" id="checkAll"></th>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No. Telp</th>
                        <th>Email</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Tipe</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($philang)==0)
                        <tr>
                            <th colspan="8" class="text-center">Data Kosong</th>                            
                        </tr>
                    @endif
                
                    <?php $no=1;?>
                    @foreach ($philang as $data)
                    <tr>
                        <th><input type="checkbox" name="id_pengajuan[]" value="{{$data->id_pengajuan}}" class="checkPengajuan"></th>
                        <td>{{ $no }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->no_hp }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <?php
                            $date = new DateTime($data->tgl_pengajuan);
                            echo $date->format("d-m-Y");
                            ?>
                        </td>
                        @if($data->tipe =='PHilang')                  
                            <td>Pengajuan Kehilangan</td>
                        @else
                            <td>Pengajuan Rusak</td>
                        @endif
                        <td><a href="pengajuan-passport-hilang/edit-passport-hilang/{{ $data->id_pengajuan }}" class="btn btn-success">Edit</a> <a href="pengajuan-passport-hilang/hapus-passport-hilang/{{ $data->id_pengajuan }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php $no++ ;?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row" id="penjadwalan" style="display: none">
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <input type="text" placeholder="Pilih Jadwal Pemeriksaan" name="tanggal" id="" class="form-control datepicker">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><span class="fa fa-calendar"></span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Jadwalkan</button>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection
