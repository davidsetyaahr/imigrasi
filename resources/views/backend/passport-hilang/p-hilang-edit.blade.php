@extends('backend.template')

@section('container')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
            @foreach($philang as $data)
                <form action="{{url('pengajuan-passport-hilang/update')}}" method="post">
                @csrf
                <input type="hidden" name="id_pengajuan" value="{{ $data->id_pengajuan }}">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
                <br>
                <label for="">NIK</label>
                <input type="text" class="form-control" name="NIK" value="{{$data->NIK}}">
                <br>
                <label for="">No. Telepon</label>
                <input type="text" class="form-control" name="no_hp" value="{{$data->no_hp}}">
                <br>
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="{{$data->email}}">
                <br>
                <label for="">Alamat</label>
                <textarea  class="form-control" name="alamat">{{$data->alamat}}</textarea>
                <br>
                <label for="">Tipe</label>
                <select id="" class="form-control" name="tipe" disabled>
                    <option value="">--Pilih Tipe--</option>
                    <option value="Philang" {{ $data->tipe == 'PHilang' ? 'selected' : '' }} >Hilang </option>
                    <option value="Prusak" {{ $data->tipe == 'PRusak' ? 'selected' : '' }} >Rusak</option>
                </select>
                <br>

                <button class="btn btn-primary" type="submit"><span class="mdi mdi-content-save"></span>  Simpan</button>
                <button class="btn btn-secondary" type="reset"><span class="mdi mdi-refresh"></span> Reset</button>
            </form>
            @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
