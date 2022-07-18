<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $table = 'komentar';
     protected $guarded =['id'];
 
   
    public function Berita(){
        return $this->belongsTo(Berita::class, 'berita_id');
    }
}
