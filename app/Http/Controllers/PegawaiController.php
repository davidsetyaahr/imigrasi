<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PegawaiModel;
use App\Models\User;
use Validator;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('key')){
            $data['pegawai'] = \DB::table('petugas as p')->select('u.id','p.id_petugas','p.nama','p.nip','u.level','u.email')->join('users as u','p.id_petugas','u.id_petugas')
            ->where('nama','like',"%".$request->get('key')."%");
        }
        else{
            $data['pegawai'] = \DB::table('petugas as p')->select('u.id','p.id_petugas','p.nama','p.nip','u.level','u.email')->join('users as u','p.id_petugas','u.id_petugas');
        }
        $data['pegawai'] = $data['pegawai']->paginate(25);

        return view('backend/pegawai/list-pegawai',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'nama' => old('nama'),
            'nip' => old('nip'),
            'pangkat' => old('pangkat'),
            'jabatan' => old('jabatan'),
            'email' => old('email'),
            'password' => old('password'),
            're_password' => old('re_password'),
            'level' => old('level'),
        );
        $data['inputPassword'] = true;
        $data['url'] = route('pegawai.store');
        $data['method'] = 'post';
        return view('backend/pegawai/form-pegawai',$data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'nip' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            're_password' => 'required|same:password',
        ];
        
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $pegawai = new PegawaiModel;
        $pegawai->nama = $request->input('nama');
        $pegawai->nip = $request->input('nip');
        $pegawai->pangkat = $request->input('pangkat');
        $pegawai->jabatan = $request->input('jabatan');
        $pegawai->save();
        
        $user = new User;
        $user->id_petugas = $pegawai->id;
        $user->nip = $request->input('nip');
        $user->email = $request->input('email');
        $user->password = \Hash::make($request->input('password'));
        $user->level = $request->input('level');
        $user->save();
        
        return redirect()->back()->with('status', 'Pegawai Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = \DB::table('petugas as p')->select('p.pangkat','p.jabatan','p.id_petugas','p.nama','p.nip','u.level','u.email')->join('users as u','p.id_petugas','u.id_petugas')->where('p.id_petugas',$id)->first();
        $data = array(
            'nama' => old('nama',$petugas->nama),
            'nip' => old('nip',$petugas->nip),
            'pangkat' => old('pangkat',$petugas->pangkat),
            'jabatan' => old('jabatan',$petugas->jabatan),
            'email' => old('email',$petugas->email),
            'level' => old('level',$petugas->level),
        );

        $data['url'] = route('pegawai.update',$id);
        $data['method'] = 'put';
        return view('backend/pegawai/form-pegawai',$data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama' => 'required',
            'nip' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'email' => "required|email|unique:users,email,$id,id_petugas",
        ];
        
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        $petugas = array(
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'pangkat' => $request->input('pangkat'),
            'jabatan' => $request->input('jabatan'),
        );
        \DB::table('petugas')->where('id_petugas',$id)->update($petugas);
        
        $user = array(
            'nip' => $request->input('nip'),
            'email' => $request->input('email'),
            'level' => $request->input('level'),
        );
        \DB::table('users')->where('id_petugas',$id)->update($user);
        
        return redirect()->back()->with('status', 'Pegawai Berhasil Diperbarui');

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::table('petugas')->where('id_petugas',$id)->delete();
        \DB::table('users')->where('id_petugas',$id)->delete();
        return redirect()->back()->with('status', 'Pegawai Berhasil Berhasil Direset');
        //
    }
    public function reset($id)
    {
        \DB::table('users')->where('id',$id)->update(['password' => \Hash::make('password')]);

        return redirect()->back()->with('status', 'Password Berhasil Direset');
    }
}
