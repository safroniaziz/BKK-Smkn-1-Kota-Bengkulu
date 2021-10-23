<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar_kerjas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lowonganId')->constrained('lowongan_kerjas');
            $table->string('namaPendaftar');
            $table->string('email');
            $table->string('alamat');
            $table->string('telephone');
            $table->string('pendidikanTerakhir');
            $table->string('cv');
            $table->string('ijazahTerakhir');
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
        Schema::dropIfExists('pendaftar_kerjas');
    }
}
