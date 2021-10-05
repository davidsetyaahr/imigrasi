<?php

namespace App\Http\Controllers;
use App\Models\PertanyaanModel;
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

        $pengajuan = array(
            'tipe' => $request->input('tipe'),
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
            'nik' => $request->input('nik'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tanggal_pengajuan' => date('Y-m-d'),
            'status' => '0'
        );

    
    }

}
