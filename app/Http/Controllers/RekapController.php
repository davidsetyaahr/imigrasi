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
            $rekap = PengajuanModel::where('tgl_pemeriksaan','>=',$_GET['dari']." 00:00")->where('tgl_pemeriksaan','<=',$_GET['sampai']." 23:59")->where('tgl_pemeriksaan','!=',NULL);
            if($_GET['tipe']!='all'){
                $data['rekap'] = $rekap->where('tipe',$_GET['tipe'])->orderBy('tgl_pemeriksaan','asc')->get();
            }
            else{
                $data['chartRusak'] = PengajuanModel::where('tgl_pemeriksaan','>=',$_GET['dari']." 00:00")->where('tgl_pemeriksaan','<=',$_GET['sampai']." 23:59")->where('tgl_pemeriksaan','!=',NULL)->where('tipe','PRusak')->count();
                $data['chartHilang'] = PengajuanModel::where('tgl_pemeriksaan','>=',$_GET['dari']." 00:00")->where('tgl_pemeriksaan','<=',$_GET['sampai']." 23:59")->where('tgl_pemeriksaan','!=',NULL)->where('tipe','PHilang')->count();
                $data['rekap'] = $rekap->orderBy('tgl_pemeriksaan','asc')->get();
            }
        }
        return view('backend/rekap',$data);
    }
}
