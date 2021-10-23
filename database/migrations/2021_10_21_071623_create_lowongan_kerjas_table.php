<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowonganKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongan_kerjas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kerjaSamaId')->constrained('kerjasamas');
            $table->string('gambar');
            $table->string('usiaMinimal');
            $table->string('usiaMaksimal');
            $table->enum('jenisKelamin',['L','P','S']);
            $table->string('pendidikanMinimal');
            $table->string('bidangPekerjaan');
            $table->integer('besaranGaji')->nullable();
            $table->string('jurusanDibutuhkan');
            $table->string('tanggalAkhir');
            $table->string('informasiTambahan');
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
        Schema::dropIfExists('lowongan_kerjas');
    }
}
