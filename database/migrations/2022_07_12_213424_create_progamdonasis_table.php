<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgamdonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progamdonasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama',100);
            $table->string('no_rekening',100);
            $table->string('deskripsi')->nullable();
            $table->string('foto',100)->nullable();
            $table->date('tgl_berakhir');
            $table->enum('bank',['bri','bni','mandiri','bca']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progamdonasis');
    }
}
