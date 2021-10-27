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
        ->update(['no_pemeriksaan' => $request->input('nomor'), 'tgl_pemeriksaan' => date('Y-m-d'),'id_petugas' => auth()->user()->id_petugas]);

        \DB::table('penjadwalan')
        ->where('id_pengajuan',$id_pengajuan)
        ->delete();

        return redirect(url('jadwal'))->with('status', 'Pemeriksaan Berhasil')->with('id_pengajuan',$id_pengajuan);
    }
    public function berkas($id_pengajuan,$redirect="")
    {
        $data['detail'] = \DB::table('pengajuan as p')->select('p.*','peg.nama as nama_petugas','peg.nip','peg.jabatan','peg.pangkat')->join('petugas as peg','p.id_petugas','peg.id_petugas')->where('p.id_pengajuan',$id_pengajuan)->first();
        $data['pertanyaan'] = \DB::table('jawab_pertanyaan as jp')->select('p.pertanyaan','jp.jawaban')->join('pertanyaan as p','jp.id_pertanyaan','p.id_pertanyaan')->where('id_pengajuan',$id_pengajuan)->get();
        $data['url'] = $redirect;
        $day = date('w',strtotime($data['detail']->tgl_pemeriksaan));
        $month = date('m',strtotime($data['detail']->tgl_pemeriksaan));
        $tgl = date('d',strtotime($data['detail']->tgl_pemeriksaan));
        $thn = date('Y',strtotime($data['detail']->tgl_pemeriksaan));
        $jam = date('H:i',strtotime($data['detail']->tgl_pemeriksaan));
        switch ($day) {
            case 0:
                $hari = 'Minggu';
                break;
            case 1:
                $hari = 'Senin';
                break;
            case 2:
                $hari = 'Selasa';
                break;
            case 3:
                $hari = 'Rabu';
                break;
            case 4:
                $hari = 'Kamis';
                break;
            case 5:
                $hari = "Jum'at";
                break;
            case 6:
                $hari = "Sabtu";
                break;
        }

        switch ($month) {
            case 1:
                $bulan = 'Januari';
                break;
            case 2:
                $bulan = 'Februari';
                break;
            case 3:
                $bulan = 'Maret';
                break;
            case 4:
                $bulan = 'April';
                break;
            case 5:
                $bulan = 'Mei';
                break;
            case 6:
                $bulan = 'Juni';
                break;
            case 7:
                $bulan = 'Juli';
                break;
            case 8:
                $bulan = 'Agustus';
                break;
            case 9:
                $bulan = 'September';
                break;
            case 10:
                $bulan = 'Oktober';
                break;
            case 11:
                $bulan = 'November';
                break;
            case 12:
                $bulan = 'Desember';
                break;
        }

        function penyebut($nilai) {
            $nilai = abs($nilai);
            $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
            $temp = "";
            if ($nilai < 12) {
                $temp = " ". $huruf[$nilai];
            } else if ($nilai <20) {
                $temp = penyebut($nilai - 10). " belas";
            } else if ($nilai < 100) {
                $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
            } else if ($nilai < 200) {
                $temp = " seratus" . penyebut($nilai - 100);
            } else if ($nilai < 1000) {
                $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
            } else if ($nilai < 2000) {
                $temp = " seribu" . penyebut($nilai - 1000);
            } else if ($nilai < 1000000) {
                $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
            } else if ($nilai < 1000000000) {
                $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
            } else if ($nilai < 1000000000000) {
                $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
            } else if ($nilai < 1000000000000000) {
                $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
            }     
            return $temp;
        }
        $data['hari'] = $hari;        
        $data['bulan'] = $bulan;        
        $data['tgl'] = penyebut($tgl);        
        $data['thn'] = penyebut($thn);        
        $data['jam'] = $jam;        
        header('Content-Type: application/vnd.msword');
        header('Content-Disposition: attachment; filename="BAP-'.$data['detail']->no_pemeriksaan.'.doc"');
        header('Cache-Control: private, max-age=0, must-revalidate');
        
        return view('backend/jadwal/berkas-pemeriksaan',$data);
    }
}
