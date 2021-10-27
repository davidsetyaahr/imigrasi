@extends('backend.template')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="card p-4 d-block">
            @if (session('status'))
            <div class="col alert alert-success alert-dismissible fade show" role="alert">
                <?= session('status') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{$url}}" method="post">
                @csrf
                @method($method)
                <label for="">Nama Pegawai</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="" placeholder="RIZKY NUR ADIYAT " value="{{$nama}}">
                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <label for="">NIP</label>
                <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value=" {{$nip}}">
                @error('nip')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <label for="">Pangkat</label>
                <input type="text" name="pangkat" class="form-control @error('pangkat') is-invalid @enderror"  value="{{$pangkat}}" placeholder="Penata Muda Tingkat I (III/b)">
                @error('pangkat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <label for="">Jabatan</label>
                <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"  value="{{$jabatan}}" placeholder="Kepala Subseksi Penindakan Keimigrasian">
                @error('jabatan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <label for="">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{$email}}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if(isset($inputPassword))
                <br>
                <label for="">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{$password}}">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <label for="">Ulangi Password</label>
                <input type="password" name="re_password" class="form-control @error('re_password') is-invalid @enderror"  value="{{$re_password}}">
                @error('re_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @endif
                <br>
                <label for="">Level</label>
                <select name="level" class="form-control" id="">
                    <option value="1" {{$level==1 ? 'selected' : ''}}>Super Admin</option>
                    <option value="2" {{$level==2 ? 'selected' : ''}}>Petugas</option>
                </select>
                <br>
                <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                <button class="btn btn-default" type="reset"><span class="fa fa-times"></span> Batal</button>
            </form>
        </div>
    </div>
</div>
@endsection