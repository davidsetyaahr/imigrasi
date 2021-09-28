@extends('backend.template')

@section('container')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-custom td-grey">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Nomor Surat Tanda Kehilangan</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>No. Telp</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;?>
                            @foreach ($philang as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->no_surat_kehilangan }}{{ $data->no_pengajuan }}</td>
                                <td>{{ $data->nik }}}}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->no_hp }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->tgl_pengajuan }}</td>
                                <td width="30%"><a href="/edit-p_hilang/{{ $data->id_pengajuan }}" class="btn btn-success">Edit</a> <a href="hapus-p_hilang/{{ $data->id_pengajuan }}" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php $no++ ;?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
