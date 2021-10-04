@extends('backend.template')

@section('container')
<div class="row">
    <div class="col-md-12 mb-4">
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
                    <?php $no=1;?>
                    @foreach ($philang as $data)
                    <tr>
                        <th><input type="checkbox" name="" value="{{$data->id_pengajuan}}" class="checkPengajuan"></th>
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
                    <input type="text" placeholder="Pilih Jadwal Pemeriksaan" name="" id="" class="form-control datepicker">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2"><span class="fa fa-calendar"></span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <a href="" class="btn btn-primary">Jadwalkan</a>
            </div>
        </div>
    </div>
</div>

@endsection
