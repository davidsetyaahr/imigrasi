<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassportrusakController extends Controller
{
    public function index(Request $request)
    {
        $filter = [['p.status', '=','0'], ['p.tipe', '=','PRusak']];
        if($request->get('key')){
            array_push($filter,['p.nama','like','%'.$request->get('key').'%']);
        }

        $data['prusak'] = \DB::table('pengajuan as p')->select('p.id_pengajuan', 'p.nama','p.tipe','p.email','p.no_hp','p.nik','p.jenis_kelamin', 'p.tgl_pengajuan', 'p.status')->where($filter)->paginate(25);
        return view('backend/passport-rusak/p-rusak', $data);
    }
    function edit($id){
        $data['prusak'] = \DB::table('pengajuan as p')->select('*')->where('id_pengajuan',$id)->get();
        return view('backend/passport-rusak/p-rusak-edit', $data);
    }
    public function update(Request $request)
    {
        \DB::table('pengajuan')->where('id_pengajuan', $request->id_pengajuan)->update([
           'nama' => $request->nama,
           'NIK' => $request->NIK,
           'no_hp' => $request->no_hp,
           'email' => $request->email,
           'Alamat' => $request->alamat
        ]);
        return redirect('pengajuan-passport-rusak')->with('status', 'Data berhasil diperbarui.');
    }
    public function destroy($id){
        \DB::table('pengajuan')->where('id_pengajuan', $id)->delete();
        return redirect('pengajuan-passport-rusak')->with('status', 'Data berhasil dihapus.'); 
    }
}
