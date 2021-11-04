<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanModel;
use App\Models\PenjadwalanModel;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['pemeriksaanHariIni'] = PenjadwalanModel::where('tanggal',date('Y-m-d'))->count();
        $data['hilang'] = PengajuanModel::where('tipe','PHilang')->where('status','0')->count();
        $data['rusak'] = PengajuanModel::where('tipe','PRusak')->where('status','0')->count();
        $data['chartHilang'] = PengajuanModel::where('tipe','PHilang')->where('status','1')->whereMonth('tgl_pemeriksaan',date('m'))->whereYear('tgl_pemeriksaan',date('Y'))->count();
        $data['chartRusak'] = PengajuanModel::where('tipe','PRusak')->where('status','1')->whereMonth('tgl_pemeriksaan',date('m'))->whereYear('tgl_pemeriksaan',date('Y'))->count();
        return view('home',$data);
    }
}
