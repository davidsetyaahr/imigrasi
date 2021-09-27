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
                                <th>Nomor Surat Tanda Kehilangan</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal</th>
                                <th>No. Telp</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>David Setya</td>
                                <td>DR/XII/D-RG/...</td>
                                <td>35213888229910001</td>
                                <td>Laki-laki</td>
                                <td>2 Oktober 2021</td>
                                <td>082421124222</td>
                                <td>david321@gmail.com</td>
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
