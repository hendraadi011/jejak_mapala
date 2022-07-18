<?php

namespace App\Exports;

use App\Models\Berita;
use App\Models\Kategoriberita;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;


class BeritaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Berita::all();
        $beritas = DB::table('berita')
        ->join('kategori_berita','kategori_berita.id','=','berita.kategori_berita_id')
        ->select('berita.*','kategori_berita.nama AS nmk')


        ->get();
        return $beritas;
    }

    public function headings(): array
    {
        return['No. Id', 'Judul', 'Konten', 'Penulis', 'Tanggal Liris', 'Tanggal Akhir', 'Jam', 'Foto', 'Kategori Berita'];
    }
}
