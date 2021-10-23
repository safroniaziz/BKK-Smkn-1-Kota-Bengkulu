<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumniId')->constrained('alumnis');
            $table->string('tempatKerja');
            $table->string('jabatan');
            $table->enum('penghasilan',['bawah_umr','umr','atas_umr']);
            $table->string('tahunMasuk');
            $table->string('tahunKeluar');
            $table->enum('jenisPekerjaan',['kontrak','tetap','magang','freelance']);
            $table->string('alamatKerja');
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
        Schema::dropIfExists('pekerjaans');
    }
}
