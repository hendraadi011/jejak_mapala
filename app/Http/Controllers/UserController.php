<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $anggotas = DB::table('users')->get();
    
        // return view('user.index',compact('anggotas'))
        //   ;
         $anggotas = User::all(); 
      
        return view('user.index',compact('anggotas'));
    }
    public function userList()
    {
         $user = User::all(); 
      
        return view('user.userlist',compact('user'));
    }

     public function anggota(){
         $anggotas = User::all();   
        return view('user.anggota',compact('anggotas'));
    }
    
    public function pengurus(){
         $anggotas = User::all();   
        return view('user.pengurus',compact('anggotas'));
    }



     public function cari(Request $request){
    //    $cari = $request->cari;
     
    // 		// mengambil data dari table pegawai sesuai pencarian data
	// 	$anggotas = User::all()
         
	// 	->where('name','LIKE',"%".$cari."%")->get();
       
    // 		// mengirim data pegawai ke view index
    //     return view('user.index',compact('anggotas'));

		
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
          $user = User::all(); 
      
        return view('user.form',compact('user'));
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
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'kampus' => ['string', 'max:50'],
            'prodi' => ['string', 'max:100'],
            'no_hp' => ['string', 'max:20'],
           
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('foto')) {
            $destinationPath = 'images/';
            $profileImage = time(). "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }
        /*
        Ruangan::create($input);
     
        return redirect()->route('ruangan.index')
                        ->with('success','Ruangan created successfully.');
        */
        try {
            User::create($input);

            //return redirect()->back()
            return redirect()->route('user.index')
                ->with('success', 'User Created successfully!');
        } catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('user.index')
                ->with('error', 'Error during the creation!');
        }                
    //     if(!empty($request->foto)){
    //         $request->validate([
    //             'foto' => 'image|mimes:jpg,jpeg,png,giff|max:2048'
    //         ]);
    //         $fileName = $request->name.'.'.$request->foto->extension();
    //         $request->foto->move(public_path('images'),$fileName);

    //     }else{
    //         $fileName = '';
    //     }
    //     try{ User::create([
    //         'name' => $request['name'],
    //         'email' => $request['email'],
    //         'kampus' => $request['kampus'],
    //         'prodi' => $request['prodi'],
    //         'no_hp' => $request['no_hp'],
    //         'foto' => $fileName,
    //         'password' => Hash::make($request['password']),
    //     ]);
    //     return redirect()->route('user.index')
    //             ->with('error', 'Error during the creation!');
    //    }
    //     catch (\Exception $e){
    //         //return redirect()->back()
    //         return redirect()->route('user.index')
    //             ->with('error', 'Error during the creation!');
    //     }    
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
    public function edit(User $user)
    {
      
        return view('user.form_edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //proses input data gedung
        $request->validate([
             'username' => ['required', 'string', 'max:50'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'kampus' => ['string', 'max:50'],
            'prodi' => ['string', 'max:100'],
            'no_hp' => ['string', 'max:20'],
            
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all(); 
            
        //--------proses update data lama & upload file foto baru--------
        $image = $request->file('foto');
        if(!empty($image)) //kondisi akan upload foto baru
        {
            if(!empty($user->foto)){ //kondisi ada nama file foto di tabel
                //hapus foto lama
                unlink('images/'.$user->foto);
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
            $input['foto'] = $user->foto; //nama file foto masih yg lama
        }    

        try {
            $user->update($input);
            //return redirect()->back()
            return redirect()->route('user.index')
                ->with('success', 'user Updated successfully!');
        } catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('user.index')
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
        $user = User::find($id);

        if(!empty($user->foto)) unlink('images/'.$user->foto);
        //dd($ruangan); 
        
        User::where('id', $id)->delete();
        return redirect()->back();
    }
}
