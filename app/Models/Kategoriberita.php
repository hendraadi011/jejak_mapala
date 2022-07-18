<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriberita extends Model
{
    use HasFactory;
    protected $table ='kategori_berita';
    protected $guarded = ['id'];

     public function berita(){
        return $this->hasMany(Berita::class);
    }
}
