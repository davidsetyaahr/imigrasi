<?php

namespace App\Http\Controllers;
use App\Models\PertanyaanModel;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;
use Validator;

class PengajuanController extends Controller
{

    public function index()
    {
        $data['pRusak'] = PertanyaanModel::where('is_p_rusak','1')->where('status','1')->get();
        $data['pHilang'] = PertanyaanModel::where('is_p_hilang','1')->where('status','1')->get();
        return view('frontend/pengajuan',$data);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'status_pernikahan' => 'required',
            'pekerjaan' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ];
        $getPertanyaan = PertanyaanModel::select('id_pertanyaan')->where('status','1');        
        
        if($request->input('tipe')=='PHilang'){
            $getPertanyaan->where('is_p_hilang','1');
            $field = 'soal_hilang';
        }
        else{
            $getPertanyaan->where('is_p_rusak','1');
            $field = 'soal_rusak';
        }
        $pertanyaan = $getPertanyaan->get();
        
        foreach ($pertanyaan as $key => $value) {
            $rules[$field.$value->id_pertanyaan] = 'required'; 
        }

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }   
        $pengajuan = new PengajuanModel;
        $pengajuan->tipe = $request->input('tipe');
        $pengajuan->nama = $request->input('nama');
        $pengajuan->email = $request->input('email');
        $pengajuan->no_hp = $request->input('no_hp');
        $pengajuan->alamat = $request->input('alamat');
        $pengajuan->nik = $request->input('nik');
        $pengajuan->tempat_lahir = $request->input('tempat_lahir');
        $pengajuan->tgl_lahir = $request->input('tgl_lahir');
        $pengajuan->agama = $request->input('agama');
        $pengajuan->status_pernikahan = $request->input('status_pernikahan');
        $pengajuan->pekerjaan = $request->input('pekerjaan');
        $pengajuan->nik = $request->input('nik');
        $pengajuan->jenis_kelamin = $request->input('jenis_kelamin');
        $pengajuan->tgl_pengajuan = date('Y-m-d');
        $pengajuan->no_pemeriksaan = 0;
        $pengajuan->id_petugas = 0;
        $pengajuan->status = '0';
        $pengajuan->send_email = '0';
        $pengajuan->save();

        foreach ($pertanyaan as $key => $value) {
            $jawabPertanyaan = array(
                'id_pengajuan' => $pengajuan->id,
                'id_pertanyaan' => $value->id_pertanyaan,
                'jawaban' => $request->input($field.$value->id_pertanyaan)
            );
            \DB::table('jawab_pertanyaan')->insert($jawabPertanyaan);
        }

        return redirect()->back()->with('status', '<b>Data Berhasil Dikirim.</b> <br> Data anda akan kami proses, kami akan memberikan informasi selanjutnya via email terkait jadwal pemeriksaan.<br> <b>Note: Kepada pemohon diharapkan membawa dokumen asli dan foto copy: KTP,Kartu Keluarga,Akte Lahir/Ijazah/Buku Nikah dan Surat Keterangan Hilang Kepolisian</b>');

    }

}
