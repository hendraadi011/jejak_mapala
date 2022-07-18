<?php

namespace App\Exports;
use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;



class AnggotaExport implements FromCollection, WithHeadings
{
     /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $anggotas = DB::table('anggota')->get();
        return $anggotas;
    }

    public function headings(): array
    {
        return['No. Id', 'Nama', 'Email', 'Kampus', 'Prodi', 'HP', 'foto'];
    }
}
