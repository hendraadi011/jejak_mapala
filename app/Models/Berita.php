<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $guarded =['id'];
    
    public function komentar(){
        return $this->hasMany(Komentar::class);
    }
    public function kategoriberitas(){
        return $this->belongsTo(Kategoriberita::class, 'kategori_berita_id');
    }
   
    
}

