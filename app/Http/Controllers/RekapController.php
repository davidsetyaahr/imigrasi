<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanModel;

class RekapController extends Controller
{
    public function index()
    {
        $data['pageInfo'] = 'Rekap Pemeriksaan Pengajuan Paspor';
        if(isset($_GET['dari'])){
            $rekap = PengajuanModel::where('tgl_pemeriksaan','>=',$_GET['dari'])->where('tgl_pemeriksaan','<=',$_GET['dari'])->where('status','1');
            if($_GET['dari']!='all'){
                $data['rekap'] = $rekap->where('tipe',$_GET['dari'])->orderBy('tgl_pemeriksaan','asc')->get();
            }
            else{
                $data['rekap'] = $rekap->orderBy('tgl_pemeriksaan','asc')->get();
            }
        }
        return view('backend/rekap',$data);
    }
}
