<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Exports\PengurusExport;
use Maatwebsite\Excel\Facades\Excel;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $penguruss = DB::table('pengurus')
        ->join('jabatan','jabatan.id','=','pengurus.jabatan_id')
        ->join('anggota','anggota.id','=','pengurus.anggota_id')
        ->select('pengurus.*','jabatan.nama AS str','anggota.nama AS agt','anggota.foto AS fta')


        ->get();
        return view('pengurus.index',compact('penguruss'));
    }
    public function pengurusList()
    {
        $penguruss = DB::table('pengurus')
        ->join('jabatan','jabatan.id','=','pengurus.jabatan_id')
        ->join('anggota','anggota.id','=','pengurus.anggota_id')
        ->select('pengurus.*','jabatan.nama AS str','anggota.nama AS agt','anggota.foto AS fta','anggota.kampus')

         ->get();
        return view('pengurus.list',compact('penguruss'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('pengurus.form');
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
          DB::table('pengurus')->insert(
            [
                'anggota_id'=>$request->anggota_id,
                'jabatan_id'=>$request->jabatan_id,
                //'foto'=>$request->foto
            ]
          );

            return redirect()->route('pengurus.index')
                 ->with('success','Data pengurus berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penguruss = DB::table('pengurus')
                    ->where('id','=',$id)->get();
        return view('pengurus.show',compact('penguruss'));
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
         $data = DB::table('pengurus')
                    ->where('id','=',$id)->get();
        return view('pengurus.form_edit',compact('data'));
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
         DB::table('pengurus')->where('id','=',$id)->update(
            [
                'anggota_id'=>$request->anggota_id,
                'jabatan_id'=>$request->jabatan_id,
              
            ]
            );

            return redirect('/pengurus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pengurus')->where('id',$id)->delete();
        return redirect('/pengurus');
    }
     public function pengurusPDF()
    {
         $penguruss = DB::table('pengurus')
        ->join('jabatan','jabatan.id','=','pengurus.jabatan_id')
        ->join('anggota','anggota.id','=','pengurus.anggota_id')
        ->select('pengurus.*','jabatan.nama AS str','anggota.nama AS agt','anggota.foto AS fta')


        ->get();
        $pdf = PDF::loadView('pengurus.penguruspdf', ['penguruss'=>$penguruss]);
    
        return $pdf->download('penguruspdf.pdf');
    }

    public function pengurusExcel()
    {
        return Excel::download(new PengurusExport, 'pengurusexcel.xlsx');
    }
}
