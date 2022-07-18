<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Progamdonasi;

use DB;
use Illuminate\Http\Request;

class DonasiiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $jumlah =Donasi::count();
        $donasis = Donasi::all()
                ;

        // $don = DB::table('donasis')
        // ->join('progamdonasis','progamdonasis.id','=','donasis.progamdonasi_id')
        // ->select([\DB::raw('sum(nominal) as jumlah'),
                 
        // ])
        // ->where('progamdonasi_id','=',$id)
        // ->get()
        // ->toArray();


       
            
         return view('donasi.index',compact('donasis','jumlah'));

       
    }
    public function total($id){
        $donasis = DB::table('donasis')
        ->join('progamdonasis','progamdonasis.id','=','donasis.progamdonasi_id')
        ->select([\DB::raw('sum(nominal) as jumlah'),
                 
        ])
        ->where('progamdonasi_id','=',$id)
        ->get()
        ->toArray();
         return view('donasi.index',compact('donasis'));

    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
         $progamdonasi = Progamdonasi::all(); 
         $donasi = Donasi::all(); 

        return view('donasi.form_donasi',compact('donasi','progamdonasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
           
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
            Donasi::create($input);

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