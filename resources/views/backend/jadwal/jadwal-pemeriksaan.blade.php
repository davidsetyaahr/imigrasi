@extends('backend.template')

@section('container')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card mb-3">
            <div class="card-header py-3 jadwal-clicked">
                Pemeriksaan Tanggal 26 September 2021
                <span class="float-right fa fa-chevron-up"></span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-custom td-grey">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>David Setya</td>
                                <td>12147443184</td>
                                <td width="20%"><a href="" class="btn btn-success">Lakukan Pemeriksaan</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header py-3 color-primary">
                Pemeriksaan Tanggal 25 September 2021
                <span class="float-right fa fa-chevron-down"></span>
            </div>
        </div>
    </div>
</div>

@endsection
