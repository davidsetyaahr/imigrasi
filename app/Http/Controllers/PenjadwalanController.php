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
        try{
            foreach ($request->input('id_pengajuan') as $key => $value) {
                $penjadwalan = new PenjadwalanModel;
                $penjadwalan->tanggal = $request->input('tanggal');
                $penjadwalan->id_pengajuan = $value;
                $penjadwalan->save();
    
                \DB::table('pengajuan')->where('id_pengajuan',$value)->update(['status' => '1','send_email' => '1']);
                $this->sendEmail($penjadwalan->id);
            }
            return redirect()->back()->withStatus('Penjadwalan Berhasil Dilakukan');
        }
        catch(\Exception $e){
            return redirect()->back()->withError('Terjadi kesalahan : '. $e->getMessage());
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError('Terjadi kesalahan pada database : '. $e->getMessage());
        }

    }
    public function sendEmail($id_jadwal)
    {
        $getJadwal = \DB::table('penjadwalan as j')->select('j.tanggal','p.email')->join('pengajuan as p','j.id_pengajuan','p.id_pengajuan')->where('j.id_jadwal',$id_jadwal)->first();
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $tgl = explode('-', $getJadwal->tanggal);       
        $details = [
            'tanggal' => $tgl[2].' '.$bulan[(int)$tgl[1]].' '.$tgl[0],
            'tempat' => 'KANTOR IMIGRASI KELAS I TPI JEMBER'
        ];
       
        \Mail::to($getJadwal->email)->send(new \App\Mail\SendEmail($details));
       
        // dd("Email is Sent.");
    
    }
}
