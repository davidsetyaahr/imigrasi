<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjadwalanModel;
use App\Models\PengajuanModel;

class PenjadwalanController extends Controller
{
    public function index()
    {
        $data['pageInfo'] = 'Jadwal Pemeriksaan';
        $data['jadwalTgl'] = \DB::table('penjadwalan as j')->join('pengajuan as p','j.id_pengajuan','p.id_pengajuan')->select('j.tanggal')->orderBy('j.tanggal','asc')->where('p.status','0')->distinct()->get();
        return view('backend/jadwal/jadwal-pemeriksaan',$data);
    }
    public function detail()
    {
        $jadwal = \DB::table('penjadwalan as j')->join('pengajuan as p','j.id_pengajuan','p.id_pengajuan')->select('p.nama','p.tipe','p.email','p.no_hp','p.nik','p.alamat')->where('j.tanggal',$_GET['tgl'])->where('p.status','0')->orderBy('j.id_jadwal','asc')->get();

        echo json_encode($jadwal);
    }
}
