<?php

namespace App\Http\Controllers;

use App\Bobot;
use App\Data;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
        $bobot = Bobot::all();
        $nilai_data = Data::all('jenis_kucing')->count();
        return view ('admin.A_dashboard',compact('bobot','nilai_data'));
        // dd ($nilai_data);
    }

    public function data()
    {
        $data = Data::all();
        return view ('admin.A_data',compact('data'));
    }

    public function cari_data(Request $request)
    {
        if($request -> has('cari')){
            $data = \App\Data::where('jenis_kucing','LIKE','%'. $request -> cari.'%')->get();
        } 
        else{
            
            
            $data = Data::all();
        }
        return view('admin.A_data',(compact('data')));
    }

    public function login()
    {
        return view ('admin.login_admin');
    }

    public function edit_data(data $data)
    {
        // return $data;
        // $data = Data::all();
        // dd($data);
        return view ('admin.A_edit_data',compact('data'));
    }

    public function tambah_data()
    {
        return view ('admin.A_tambah_data');
    }

    public function update_data(request $request,data $data)
    {
        Data::where('id',$data->id)
        ->update([
            'id' => $request -> id,
            'jenis_kucing' => $request -> jenis_kucing,
            'Penjelasan' => $request -> penjelasan,
            'foto' => $request -> foto,
            'biaya_adopsi' => $request -> biaya_adopsi,
            'perawatan' => $request -> perawatan,
            'ling_hidup' => $request -> ling_hidup,
            'sifat' => $request -> sifat,
            'penampilan' => $request -> penampilan,
            'ketenaran' => $request -> ketenaran
        ]);
        
        if($request -> hasFile('foto')){
            $request->file('foto') -> move('images/kucing/',$request->file('foto')->getClientOriginalName());
            $data -> foto = $request -> file('foto')-> getClientOriginalName();
            $data -> save();
        }

        return redirect('/admin_data')->with('status','Data berhasil diedit');
    }

    public function tambahkan_data(Request $request)
    {
        $data = new Data();
        $data -> id = $request->id;
        $data -> jenis_kucing= $request->jenis_kucing;
        $data -> penjelasan = $request->penjelasan;
        $data -> foto = $request->foto;
        $data -> biaya_adopsi = $request->biaya_adopsi;
        $data -> perawatan = $request->perawatan;
        $data -> ling_hidup = $request->ling_hidup;
        $data -> sifat = $request->sifat;
        $data -> penampilan = $request->penampilan;
        $data -> ketenaran = $request->ketenaran;

        if($request -> hasFile('foto')){
            $request->file('foto') -> move('images/kucing/',$request->file('foto')->getClientOriginalName());
            $data -> foto = $request -> file('foto')-> getClientOriginalName();
        }

        $data->save();
        return redirect('/admin_data')->with('status','data berhasil ditambahkan');
    }

    public function hapus_data(Data $data)
    {
        Data::destroy($data -> id);
        return redirect('/admin_data')->with ('status','Data Isi Berita Berhasil Dihapus');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
