<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{

    // use HasFactory;
    protected $table = 'donasis';
    protected $guarded =['id'];
 
     public function progamdonasi(){
        return $this->belongsTo(Progamdonasi::class,'progamdonasi_id');
    }

    
}
