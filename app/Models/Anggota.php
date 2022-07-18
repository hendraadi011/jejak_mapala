<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
 
    use HasFactory;
    //mapping table
    protected $table ='anggota';
    protected $fillable = [
        'nama' ,'email' ,'kampus' ,'prodi' ,'hp' ,'foto'
    ];

    
}

