<?php

namespace App\Exports;

use App\Models\Donasii;
use App\Models\Progamdonasi;
use App\Models\Donatur;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class donasi implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
          $donasi = DB::table('donasii')
        ->join('donatur','donatur.id','=','donasii.donatur_id')
        ->join('progmdonasi','progamdonasi.id','=','donasii.progamdonasi_id')
        ->select('donasii.*','donatur.nama AS str','progamdonasi.nama AS agt','progamdonsi.foto AS fta')

        ->get();
        return $donasi;
    }
}
