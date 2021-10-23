<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuliahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumniId')->constrained('alumnis');
            $table->string('tempatKuliah');
            $table->string('jurusan');
            $table->string('tahunMasuk');
            $table->string('alamat');
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
        Schema::dropIfExists('kuliahs');
    }
}
