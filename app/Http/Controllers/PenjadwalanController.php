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
        $data['jadwalTgl'] = \DB::table('penjadwalan as j')->join('pengajuan as p','j.id_pengajuan','p.id_pengajuan')->select('j.tanggal')->orderBy('j.tanggal','asc')->where('p.status','1')->distinct()->get();
        return view('backend/jadwal/jadwal-pemeriksaan',$data);
    }
    public function detail()
    {
        $jadwal = \DB::table('penjadwalan as j')->join('pengajuan as p','j.id_pengajuan','p.id_pengajuan')->select('j.id_jadwal','p.nama','p.tipe','p.email','p.no_hp','p.nik','p.alamat')->where('j.tanggal',$_GET['tgl'])->where('p.status','1')->orderBy('j.id_jadwal','asc')->get();

        echo json_encode($jadwal);
    }
    public function batal($id)
    {
        $getIdPengajuan = PenjadwalanModel::select('id_pengajuan')->where('id_jadwal',$id)->first();
        PenjadwalanModel::where('id_jadwal',$id)->delete();
        \DB::table('pengajuan')->where('id_pengajuan',$getIdPengajuan->id_pengajuan)->update(['status' => '0']);
        return redirect()->back()->withStatus('Penjadwalan Berhasil Dibatalkan');
    }
    public function store(request $request)
    {
        foreach ($request->input('id_pengajuan') as $key => $value) {
            $arr = array(
                'tanggal' => $request->input('tanggal'),
                'id_pengajuan' => $value
            );

            PenjadwalanModel::insert($arr);
            \DB::table('pengajuan')->where('id_pengajuan',$value)->update(['status' => '1']);
        }
        return redirect()->back()->withStatus('Penjadwalan Berhasil Dilakukan');
    }
}
