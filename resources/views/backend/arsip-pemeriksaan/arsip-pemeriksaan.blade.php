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
                        <th>Nomor Pemeriksaan</th>
                        <th>NIK</th>
                        <th>No. Telp</th>
                        <th>Email</th>
                        <th>Tgl Pemeriksaan</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><input type="checkbox" name="" value="1" class="checkPengajuan"></th>
                        <td>1</td>
                        <td>David Setya</td>
                        <td>DR/XII/D-RG/...</td>
                        <td>35213888229910001</td>
                        <td>082421124222</td>
                        <td>david321@gmail.com</td>
                        <td>11 Oktober 2021</td>
                        <td><a href="" class="btn btn-danger">Delete</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row" id="penjadwalan" style="display: none">
            <div class="col">
                <a href="" class="btn btn-danger"><span class="fa fa-trash"></span> Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection
