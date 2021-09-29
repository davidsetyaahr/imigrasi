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
        $data['hilang'] = PengajuanModel::where('tipe','Philang')->count();
        $data['rusak'] = PengajuanModel::where('tipe','Prusak')->count();
        return view('home',$data);
    }
}
