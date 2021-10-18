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
        <form action="{{url('arsip-pemeriksaan/delete')}}" id="submitConfirm" data-info="Apakah Anda Yakin Akan Mengahapus Arsip?" method="post">
            @csrf
        <div class="table-responsive">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="" id="checkAll"></th>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Nomor Pemeriksaan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Tanggal Pemeriksaan</th>
                        <th>Tipe Pengajuan</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($arsip)==0)
                        <tr>
                            <th colspan="8" class="text-center">Data Kosong</th>                            
                        </tr>
                    @endif

                    @foreach ($arsip as $item)
                    <tr>
                        <th><input type="checkbox" name="id_pengajuan[]" value="{{$item->id_pengajuan}}" class="checkPengajuan"></th>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->NIK}}</td>
                        <td>{{$item->no_pemeriksaan}}</td>
                        <td>{{date('d M Y', strtotime($item->tgl_pengajuan))}}</td>
                        <td>{{date('d M Y', strtotime($item->tgl_pemeriksaan))}}</td>
                        <td>{{$item->tipe=='Philang' ? 'Paspor Hilang' : 'Paspor Rusak'}}</td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
        </div>
        <div class="row" id="penjadwalan" style="display: none">
            <div class="col-md-2">
                <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span> Hapus</button>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection
