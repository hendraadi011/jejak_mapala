<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Progamdonasi;
use Illuminate\Http\Request;

class Donasimasukcontroller extends Controller
{
    public function donasimasuk(){
        $donasi = Donasi::all();
        $progamdonasi = Progamdonasi::all();

        return view('donasi.donasimasuk', compact('donasi','progamdonasi'));
    }
}
