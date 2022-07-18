<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progamdonasi extends Model
{
    use HasFactory;
    protected $table = 'progamdonasis';

    protected $guarded = ['id'];

    public function donasi(){
        return $this->hasMany(Donasi::class);
    }
    public function donasi_latest(){
        return $this->hasOne(Donasi::class)->latestOfMany();
    }
    public function donasi_lat(){
        return $this->hasOne(Donasi::class);
    }
    

}
