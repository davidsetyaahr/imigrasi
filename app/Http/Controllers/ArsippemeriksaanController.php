<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanModel;

class ArsippemeriksaanController extends Controller
{
    public function index()
    {
        $data['arsip'] = PengajuanModel::where('tgl_pemeriksaan','!=',NULL)->get();
        return view('backend/arsip-pemeriksaan/arsip-pemeriksaan',$data);
    }
    public function delete(request $request)
    {
        foreach ($request->input('id_pengajuan') as $key => $value) {
            \DB::table('pengajuan')
            ->where('id_pengajuan',$value)
            ->delete();
            \DB::table('jawab_pertanyaan')
            ->where('id_pengajuan',$value)
            ->delete();
        }
        return redirect()->back()->with('status', 'Hapus Berhasil');

    }
}
