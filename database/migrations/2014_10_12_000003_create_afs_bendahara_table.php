<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afs_bendahara', function (Blueprint $table) {
            $table->string('no_register', 20)->primary();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->date('masa_bakti_awal')->nullable();
            $table->date('masa_bakti_akhir')->nullable();
            $table->integer('verifikasi')->nullable();
            $table->text('keterangan_verifikasi')->nullable();
            $table->string('file_ktp')->nullable();
            $table->integer('file_ktp_v')->nullable();
            $table->string('file_foto')->nullable();
            $table->integer('file_foto_v')->nullable();
            $table->string('file_cv')->nullable();
            $table->integer('file_cv_v')->nullable();
            $table->timestamps();

            $table->foreign('no_register')->references('no_register')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afs_bendahara');
    }
};
