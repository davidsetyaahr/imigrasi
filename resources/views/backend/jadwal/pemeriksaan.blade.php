@extends('backend.template')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="card p-4 d-block">
            <h5 class="color-primary font-weight-bold">Data Pribadi</h5>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Tipe Pengajuan</th>
                        <td>:</td>
                        <td>{{$detail->tipe=='PHilang' ? 'Paspor Hilang' : 'Paspor Rusak'}}</td>
                        <th>Nama Lengkap</th>
                        <td>:</td>
                        <td>{{$detail->nama}}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>:</td>
                        <td>{{$detail->NIK}}</td>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>{{$detail->alamat}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td>{{$detail->email}}</td>
                        <th>No Hp</th>
                        <td>:</td>
                        <td>{{$detail->no_hp}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        <td>{{$detail->jenis_kelamin}}</td>
                        <th>Tanggal Pengajuan</th>
                        <td>:</td>
                        <td>{{date('d-m-Y',strtotime($detail->tgl_pengajuan))}}</td>
                    </tr>
                </table>
            </div>
            <form action="diperiksa" id="submitConfirm" data-info="Data akan ditandai sebagai data yang sudah diperiksa dengan nomor pemeriksaan yang diisi dan akan masuk kedalam arsip." method="post">
            <h5 class="mt-4 color-primary font-weight-bold">Pertanyaan</h5>
            <br>
            @foreach ($pertanyaan as $item)
                <h6> {{$loop->iteration}}. {{$item->pertanyaan}}</h6>
                <input type="hidden" value="{{$item->id_jawab}}" name="id_jawab[]">
                <input type="text" value="{{$item->jawaban}}" class="form-control" name="jawaban[]">
                <br>
            @endforeach
            <hr>
                @csrf
                <input type="hidden" name="id_pengajuan" value="{{$detail->id_pengajuan}}" required>
                <label for="">Nomor Pemeriksaan</label>
                <input type="text" class="form-control" name="nomor">
                <br>
                <button class="btn btn-primary"><span class="fa fa-check"></span> Tandai Sudah Pemeriksaan dan Download Berkas</button>
            </form>
        </div>
    </div>
</div>
@endsection
