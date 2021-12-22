<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurusanId')->constrained('jurusans');
            $table->string('usernameLogin');
            $table->string('namaAlumni');
            $table->enum('jenisKelamin',['L','P']);
            $table->string('tahunMasuk');
            $table->string('tahunLulus');
            $table->string('tempatLahir');
            $table->string('tanggalLahir');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('isPengangguran',['iya','tidak'])->default('iya');
            $table->string('password');
            $table->enum('isAktif',['aktif','nonaktif']);
            $table->string('uploadIjazah')->nullable();
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
        Schema::dropIfExists('users');
    }
}
