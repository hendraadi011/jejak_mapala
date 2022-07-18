<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('progamdonasi_id')->constrained('progamdonasis')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_donatur',100);
            $table->string('no_hp',100);
            $table->string('email',100);
            $table->string('doa')->nullable();
            $table->string('foto',100);
            $table->integer('nominal');
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
        Schema::dropIfExists('donasis');
    }
}
