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
    @if (count($jadwalTgl)==0)
    <div class="col alert alert-info alert-dismissible fade show" role="alert">
        Tidak Ada Jadwal Pemeriksaan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="col-md-12 mb-4" id="accordion">
        @foreach ($jadwalTgl as $tgl)
        <div class="card mb-3 card-jadwal">
            <div class="card-header py-3" data-tgl="{{$tgl->tanggal}}" data-table="#table{{$loop->iteration}}" data-toggle="collapse" data-target="#collapse{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse{{$loop->iteration}}">
                Pemeriksaan Tanggal {{date('d M Y', strtotime($tgl->tanggal))}}
            </div>
            <div id="collapse{{$loop->iteration}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-custom td-grey" id="table{{$loop->iteration}}">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Alamat</th>
                                    <th>Keperluan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
