<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassporthilangController extends Controller

{
    public function index()
    {
        $data['philang'] = \DB::table('pengajuan as p')->select('p.id_pengajuan', 'p.nama','p.tipe','p.email','p.no_hp','p.nik','p.jenis_kelamin', 'p.tgl_pengajuan', 'p.no_surat_kehilangan', 'p.no_pengajuan', 'p.status')->where('p.status','0')->get();
        return view('backend/passport-hilang/p-hilang', $data);
    }
}
