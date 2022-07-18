<?php

namespace App\Http\Controllers;
use DB;
use File;
use PDF;
use Item;
use App\Models\Berita;
use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Exports\BeritaExport;
use App\Models\Kategoriberita;
use Maatwebsite\Excel\Facades\Excel;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        //  $beritas = DB::table('berita')
        // ->join('kategori_berita','kategori_berita.id','=','berita.kategori_berita_id')
        // ->select('berita.*','kategori_berita.nama AS nmk')


        // ->get();
        $beritas = Berita::all();
        $kategoriberitas = Kategoriberita::all();
       
        return view('berita.index',compact('beritas' ,'kategoriberitas'));
    }
    public function beritaList()
    {  
       
        $beritas = Berita::all();
        $kategoriberitas = Kategoriberita::all();
       
        return view('berita.list',compact('beritas' ,'kategoriberitas'));

    }
    public function beritaView($id){
        $jumlah = Komentar::where('berita_id','=',$id)->count();
        $beritas = Berita::find($id)
                    ->where('id','=',$id)->get();
        return view('berita.view',compact('beritas','jumlah'));
         
        //  $beritas = DB::table('berita')
        //             ->where('id','=',$id)->get();
        // return view('berita.view',compact('beritas'));
        // return view('berita.view',compact(['berita']));
    }

    public function cari(Request $request){
        // menangkap data pencarian
		$cari = $request->cari;
     
    		// mengambil data dari table pegawai sesuai pencarian data
		$beritas = DB::table('berita')
         ->join('kategori_berita','kategori_berita.id','=','berita.kategori_berita_id')
        ->select('berita.*','kategori_berita.nama AS nmk')
		->where('judul','LIKE',"%".$cari."%")->get();
       
    		// mengirim data pegawai ke view index
        return view('berita.list',compact('beritas'));


		
    }
     public function komentar(Request $request ){
         
         $komentar = Komentar::create($request->all());
       
        // DB::table('komentar')->insert(
        //     [
               
        //         'nama'=>$request->nama,
        //         'komentar'=>$request->komentar,
        //         'berita_id'=>$request->berita_id,
             
        //     ]
        //   );

            return redirect()->back()
                 ->with('success','Data jabatan berhasil disimpan.');
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beritas = Berita::all(); 
      
        return view('berita.form',compact('beritas'));
        //  return view('berita.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //proses input data
        if(!empty($request->foto)){
            $request->validate([
                'foto1' => 'image|mimes:jpg,jpeg,png,giff|max:2048'
            ]);
            $fileName = $request->judul.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$fileName);

        }else{
            $fileName = '';
        }
        
          
       
         /*   return redirect()->route('berita.index')
                 ->with('success','Data berita baru berhasil disimpan.'); */
         try {
            Berita::create([
                'judul'=>$request->judul,
                'penulis'=>$request->penulis,
                'tgl_akhir'=>$request->tgl_akhir,
                'konten'=>$request->konten,
                'kategori_berita_id'=>$request->kategori_berita_id,
                'foto'=>$fileName
            ]);

            //return redirect()->back()
            return redirect()->route('berita.index')
                ->with('success', 'Berita Created successfully!');
        } catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('berita.index')
                ->with('error', 'Error during the creation!');
        }                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beritas = Berita::all();
        $kategoriberitas = Kategoriberita::all();
       
        return view('berita.show',compact('beritas' ,'kategoriberitas'));
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
         $data = DB::table('berita')
                    ->where('id','=',$id)->get();
        return view('berita.form_edit',compact('data'));
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
           $foto = DB::table('berita')->select('foto')->where('id','=',$id)->get();
           foreach($foto as $f){
               $namaFile = $f->foto;
           }
           File::delete(public_path('images'.$namaFile));
           //proses upload file baru
           $request->validate([
               'foto'=>'image|mimes:jpg,jpeg,png,gif|max:2048',
           ]);
           $fileName = $request->judul.'.'.$request->foto->extension();
           //$fileName = $request -> nama.'jpg'
           $request->foto->move(public_path('images'),$fileName);



        }else{
            //ambil isi kolom foto lalu hapus file fotonya difolder images
            $foto = DB::table('berita')->select('foto')->where('id','=',$id)
                  ->get();
                  foreach($foto as $f){
                      $namaFile = $f->foto;
                  }
                  $fileName = $namaFile;
        }
         
            //return redirect('/berita');
        try{
            Berita::where('id','=',$id)->update(
            [
                'judul'=>$request->judul,
                'konten'=>$request->konten,
                'penulis'=>$request->penulis,
    
                'tgl_akhir'=>$request->tgl_akhir,

                'kategori_berita_id'=>$request->kategori_berita_id,
                'foto'=>$fileName
            ]
          );
          return redirect()->route('berita.index')->with('success','Berita Update successfully!');
                      
        }catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('berita.index')
                ->with('error', 'Error during the creation!');
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    
        $user = Berita::find($id);

        if(!empty($user->foto)) unlink('images/'.$user->foto);
        //dd($ruangan); 
        
        Berita::where('id', $id)->delete();
        return redirect()->back();
       
    }

    public function komentarDelete($id){
        $komentar = Komentar::find($id);
         Komentar::where('id',$id)->delete();

         return redirect()->back();


    }
    // public function delete($id)
    // {
    //      $beritas = Berita::find($id);

    //     if(!empty($beritas->foto)) unlink('images/'.$beritas->foto);
    //     //dd($ruangan); 
        
    //     $delete = Berita::where('id', $id)->delete();
    //     return redirect()->back();

    //     //  $foto = DB::table('berita')->select('foto')->where('id','=',$id)->get();
    //     // foreach($foto as $f){
    //     //     $namaFile = $f->foto;
    //     // }
    //     // File::delete(public_path('images/'.$namaFile));   
        
    //     // //menghapus data 
    //     // DB::table('berita')->where('id',$id)->delete();
    //     // return redirect('/berita');
    // }



    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to Jejak Mapala',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('berita.myPDF', $data);
    
        return $pdf->download('berita.pdf');
    }

    public function beritaPDF()
    {
         $beritas = DB::table('berita')
        ->join('kategori_berita','kategori_berita.id','=','berita.kategori_berita_id')
        ->select('berita.*','kategori_berita.nama AS nmk')


        ->get();
        $pdf = PDF::loadView('berita.beritapdf', ['beritas'=>$beritas]);
    
        return $pdf->download('beritapdf.pdf');
    }

    public function beritaExcel()
    {
        return Excel::download(new BeritaExport, 'beritaexcel.xlsx');
    }

   
}
