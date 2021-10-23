<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurusanId')->constrained('jurusans');
            $table->string('namaAlumni');
            $table->enum('jenisKelamin',['L','P']);
            $table->string('tahunMasuk');
            $table->string('tahunLulus');
            $table->string('tempatLahir');
            $table->string('tanggalLahir');
            $table->string('email');
            $table->string('telephone');
            $table->text('alamat');
            $table->boolean('isPengangguran')->default(0);
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
        Schema::dropIfExists('alumnis');
    }
}
