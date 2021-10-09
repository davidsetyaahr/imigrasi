<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    public function pemeriksaan($id_jadwal)
    {
        $data['pageInfo'] = 'Pemeriksaan Paspor';
        $data['detail'] = \DB::table('penjadwalan as j')->join('pengajuan as p','j.id_pengajuan','p.id_pengajuan')->select('j.tanggal','p.*')->where('j.id_jadwal',$id_jadwal)->first();
        $data['pertanyaan'] = \DB::table('jawab_pertanyaan as jp')->select('p.pertanyaan','jp.jawaban')->join('pertanyaan as p','jp.id_pertanyaan','p.id_pertanyaan')->where('id_pengajuan',$data['detail']->id_pengajuan)->get();
        return view('backend/jadwal/pemeriksaan',$data);
    }
    public function diperiksa(request $request)
    {
        $id_pengajuan = $request->input('id_pengajuan');
        $getNik = \DB::table('pengajuan')->select('NIK')->where('id_pengajuan',$id_pengajuan)->first();
        
        \DB::table('pengajuan')
        ->where('id_pengajuan',$id_pengajuan)
        ->update(['no_pemeriksaan' => $request->input('nomor'), 'tgl_pemeriksaan' => date('Y-m-d')]);

        \DB::table('penjadwalan')
        ->where('id_pengajuan',$id_pengajuan)
        ->delete();

        return redirect('pemeriksaan/berkas/'.$id_pengajuan);
    }
    public function berkas($id_pengajuan)
    {
        $data['detail'] = \DB::table('pengajuan')->where('id_pengajuan',$id_pengajuan)->first();
        $data['pertanyaan'] = \DB::table('jawab_pertanyaan as jp')->select('p.pertanyaan','jp.jawaban')->join('pertanyaan as p','jp.id_pertanyaan','p.id_pertanyaan')->where('id_pengajuan',$data['detail']->id_pengajuan)->get();
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Berkas-pemeriksaan-".$data['detail']->no_pemeriksaan.".docx");
        $data['url'] = url('jadwal');
    
        return view('backend/jadwal/berkas-pemeriksaan',$data);
    }
}
