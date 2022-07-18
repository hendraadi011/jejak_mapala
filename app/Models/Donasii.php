<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasii extends Model
{
    use HasFactory;
    protected $table = 'donasii';
    protected $guarded =['id'];

    public function progamdonasi(){
        return $this->belongsTo(Progamdonasi::class);
    }

    public function donatur(){
        return $this->belongsTo(Donatur::class);
    }

}
