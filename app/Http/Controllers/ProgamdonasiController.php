<?php

namespace App\Http\Controllers;

use App\Models\Progamdonasi;
use App\Models\Donasi;
use Illuminate\Http\Request;

class ProgamdonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $progamdonasi = Progamdonasi::all();     
        return view('progamdonasi.index',compact('progamdonasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $progamdonasi = Progamdonasi::all(); 
      
        return view('progamdonasi.form',compact('progamdonasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses input data gedung
        $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'deskripsi' => ['string'],
            'no_rekening' => ['string', 'max:100'],
            'foto' => 'image|mimes:jpeg,png,n5jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('foto')) {
            $destinationPath = 'images/';
            $profileImage = time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }
        /*
        Ruangan::create($input);
     
        return redirect()->route('ruangan.index')
                        ->with('success','Ruangan created successfully.');
        */
        try {
            Progamdonasi::create($input);

            //return redirect()->back()
            return redirect()->route('progamdonasi.index')
                ->with('success', 'Progamdonasi Created successfully!');
        } catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('progamdonasi.index')
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
         $progamdonasi = Progamdonasi::find()
                    ->where('id','=',$id)->get();
        return view('berita.view',compact('progamdonasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Progamdonasi $progamdonasi)
    {
         return view('progamdonasi.form_edit',compact('progamdonasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progamdonasi $progamdonasi)
    {
           $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'deskripsi' => ['string'],
            'tgl_berakhir' => ['date'],
            'no_rekening' => ['string','max:100'],
            'foto' => 'image|mimes:jpeg,png,n5jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all(); 
            
        //--------proses update data lama & upload file foto baru--------
        $image = $request->file('foto');
        if(!empty($image)) //kondisi akan upload foto baru
        {
            if(!empty($progamdonasi->foto)){ //kondisi ada nama file foto di tabel
                //hapus foto lama
                unlink('images/'.$progamdonasi->foto);
            }
            //proses upload foto baru
            $destinationPath = 'images/';
            $profileImage = time() . "." . $image->getClientOriginalExtension();
            //print_r($profileImage); die();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }
        else //kondisi user hanya update data saja, bukan ganti foto
        {
            $input['foto'] = $progamdonasi->foto; //nama file foto masih yg lama
        }    

        try {
            $progamdonasi->update($input);
            //return redirect()->back()
            return redirect()->route('progamdonasi.index')
                ->with('success', 'Prodonasi Updated successfully!');
        } catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('progamdonasi.index')
                ->with('error', 'Error during the creation!');
        }   
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
    public function detailProgam($id)
    {
        $donasi = Donasi::all();
        
        $jumlah = Donasi::where('progamdonasi_id','=',$id)->sum('nominal');

        $jumlahdonatur = Donasi::where('progamdonasi_id','=',$id)->count();
        $progamdonasi = Progamdonasi::find($id)->where('id','=',$id)->get();
                    
        return view('progamdonasi.detail',compact('progamdonasi','jumlah','jumlahdonatur','donasi'));
    }
     public function delete($id)
    {

        $progamdonasi = Progamdonasi::find($id);

        if(!empty($progamdonasi->foto)) unlink('images/'.$progamdonasi->foto);
        //dd($ruangan); 
        
        Progamdonasi::where('id', $id)->delete();
        return redirect()->back();
    }

    public function viewProgam($id)
    {
    
       

        $jumlah = Donasi::where('progamdonasi_id','=',$id)->sum('nominal');

        
        $jumlahdonatur = Donasi::where('progamdonasi_id','=',$id)->count();
        $progamdonasi = Progamdonasi::find($id)->where('id','=',$id)->get();
                    
        return view('progamdonasi.view',compact('progamdonasi','jumlah','jumlahdonatur'));
    }
    public function donasi(Request $request ){

  
        $input = $request->all();
  
        if ($image = $request->file('foto')) {
            $destinationPath = 'images/';
            $profileImage = time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }
        /*
        Ruangan::create($input);
     
        return redirect()->route('ruangan.index')
                        ->with('success','Ruangan created successfully.');
        */
       
            Donasi::create($input);

            //return redirect()->back()
            return redirect()->back()
                ->with('success', 'Progamdonasi Created successfully!');
        
         
        //  $donasi = Donasi::create($request->all());
       

        // return redirect()->back()
        //          ->with('success','Data jabatan berhasil disimpan.');
    }

    
}