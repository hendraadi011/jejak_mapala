<?php

namespace App\Http\Controllers;

use DB;
use File;
use App\Models\Anggota;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Concerns\FromCollection;

use App\Exports\AnggotaExport;
use Maatwebsite\Excel\Facades\Excel;




class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $anggotas = DB::table('users')->get();
    
        return view('anggota.list',compact('anggotas'))
          ;
    //   $anggotas = Anggota::latest()->paginate(5);
    
    //     return view('anggota.index',compact('anggotas'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function anggotaList()
    {
        $anggotas = DB::table('users')->get();
    
        return view('anggota.list',compact('anggotas'))
          ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan ke halaman form input
      return view('anggota.form');
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses 
         //proses input data
        if(!empty($request->foto)){
            $request->validate(
                ['foto'=>'image|mimes:png,jpg|max:2048']
            );
            $fileName = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$fileName);

        }else{
            $fileName = '';
        }
        DB::table('anggota')->insert(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'kampus'=>$request->kampus,
                'prodi'=>$request->prodi,
                'hp'=>$request->hp,
                'foto'=>$fileName,
            ]
          );

            return redirect()->route('anggota.index')
                 ->with('success','Data Anggota baru berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //menampilkan detil pengarang
        $anggotas = DB::table('anggota')
                    ->where('id','=',$id)->get();
        return view('anggota.show',compact('anggotas'));
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
         $data = DB::table('anggota')
                    ->where('id','=',$id)->get();
        return view('anggota.form_edit',compact('data'));
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
          //proses update data
          if(!empty($request->foto)){
           //ambil isi kolom foto lalu hapus file fotonya di folder images
           $foto = DB::table('anggota')->select('foto')->where('id','=',$id)->get();
           foreach($foto as $f){
               $namaFile = $f->foto;
           }
           File::delete(public_path('images/'.$namaFile));
           //proses upload file baru
           $request->validate([
               'foto'=>'image|mimes:jpg,jpeg,png,gif|max:2048',
           ]);
           $fileName = $request->nama.'.'.$request->foto->extension();
           //$fileName = $request -> nama.'jpg'
           $request->foto->move(public_path('images'),$fileName);
        }else{
            //ambil isi kolom foto lalu hapus file fotonya difolder images
            $foto = DB::table('anggota')->select('foto')->where('id','=',$id)
                  ->get();
                  foreach($foto as $f){
                      $namaFile = $f->foto;
                  }
                  $fileName = $namaFile;
        }
        DB::table('anggota')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'kampus'=>$request->kampus,
                'prodi'=>$request->prodi,
                'hp'=>$request->hp,
                'foto'=>$fileName
            ]
            );

            return redirect('/anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $foto = DB::table('anggota')->select('foto')->where('id','=',$id)->get();
        foreach($foto as $f){
            $namaFile = $f->foto;
        }
        File::delete(public_path('images/'.$namaFile));   
        
        //menghapus data 
        DB::table('anggota')->where('id',$id)->delete();
        return redirect('/anggota');
       
    }
    public function anggotaPDF()
    {
        
        $anggotas = DB::table('anggota')->get();
        $pdf = PDF::loadView('anggota.anggotapdf', ['anggotas'=>$anggotas]);
    
        return $pdf->download('anggotapdf.pdf');
    }
      public function anggotaExcel()
    {
        return Excel::download(new AnggotaExport, 'anggotaexcel.xlsx');
    }

    
}
