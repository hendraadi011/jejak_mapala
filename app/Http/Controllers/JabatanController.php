<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatans = DB::table('jabatan')->get();
        return view('jabatan.index',compact('jabatans'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('jabatan.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        DB::table('jabatan')->insert(
            [
                'nama'=>$request->nama,
                'keterangan'=>$request->keterangan,
             
            ]
          );

            return redirect()->route('jabatan.index')
                 ->with('success','Data jabatan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $jabatans = DB::table('jabatan')
                    ->where('id','=',$id)->get();
        return view('jabatan.show',compact('jabatans'));
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
         $data = DB::table('jabatan')
                    ->where('id','=',$id)->get();
        return view('jabatan.form_edit',compact('data'));
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
          
      
        DB::table('jabatan')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'keterangan'=>$request->keterangan,
               
            ]
            );

            return redirect('/jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //menghapus data 
        DB::table('jabatan')->where('id',$id)->delete();
        return redirect('/jabatan');
    }
}
