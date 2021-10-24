@extends('backend.template')

@section('container')
<div class="row">
    <div class="col-md-12 mb-4">
        @if (session('status'))
        <div class="d-block alert alert-success alert-dismissible fade show" role="alert">
            <?= session('status') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row justify-content-between">

            <div class="col-md-2">
                <a href="pegawai/create" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Pegawai</a>
            </div>
            <div class="col-md-4">
                <form action="" method="get">
                <div class="input-group">
                        <input type="text" name="key" class="form-control" placeholder="Cari Berdasarkan Nama Disini..." aria-label="Username" aria-describedby="basic-addon1" value="{{ isset($_GET['key']) ? $_GET['key'] : '' }}">
                        <div class="input-group-prepend">
                            <button class="btn btn-primary"><span class="fa fa-search"></span></button>
                        </div>
                    </div>                
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th width="23%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($pegawai)==0)
                        <tr>
                            <th colspan="6" class="text-center">Data Kosong</th>                            
                        </tr>
                    @endif

                    <?php $no=1;?>
                    @foreach ($pegawai as $data)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->level==1 ? 'Super Admin' : 'Petugas' }}</td>
                        <td><a href="pegawai/reset/{{ $data->id }}" class="btn-sm btn btn-primary confirm-alert" data-alert="Password akan direset menjadi 'password'">Reset Password</a> <a href="{{ route('pegawai.edit', $data->id_petugas) }}" class="btn-sm btn btn-success">Edit</a> 
                        <form action="{{ route('pegawai.destroy', $data->id_petugas) }}" class="d-inline submitConfirm" id="form<?= $no ?>" data-info="Data Akan Terhapus" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn-sm btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </tr>
                    <?php $no++ ;?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
            {{$pegawai->appends(Request::all())->links('backend.pagination.custom')}}
        </div>        
    </div>
</div>

@endsection
