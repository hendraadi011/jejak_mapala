<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Kategoriberita;
use Illuminate\Http\Request;

class KategoriberitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $kategoris = Kategoriberita::all();
        return view('kategori_berita.index',compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('kategori_berita.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Kategoriberita::insert(
            [
                'nama'=>$request->nama,
                'keterangan'=>$request->keterangan
              
            ]
          );

            return redirect()->route('kategori.index')
                 ->with('success','Data kategori berita berhasil disimpan.');
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
          //mengarahkan ke halaman form edit data
         $data = DB::table('kategori_berita')
                    ->where('id','=',$id)->get();
        return view('kategori_berita.form_edit',compact('data'));
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
         
      
        DB::table('kategori_berita')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'keterangan'=>$request->keterangan
            ]
            );

            return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table('kategori_berita')->where('id',$id)->delete();
        return redirect('/kategori');
    }
}
