<?php

namespace App\Exports;

use App\Models\Pengurus;
use App\Models\Jabatan;
use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PengurusExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $penguruss = DB::table('pengurus')
        ->join('jabatan','jabatan.id','=','pengurus.jabatan_id')
        ->join('anggota','anggota.id','=','pengurus.anggota_id')
        ->select('pengurus.*','jabatan.nama AS str','anggota.nama AS agt','anggota.foto AS fta')

        ->get();
        return $penguruss;
    }

    public function headings(): array
    {
        return['No. Id', 'Anggota Id', 'Jabatan_Id', 'Jabatan' , 'Nama'];
    }
}
