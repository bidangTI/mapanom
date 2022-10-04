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
        Schema::create('laporan_semesters', function (Blueprint $table) {
            $table->id();
            $table->string('no_register', 20);
            $table->string('nama_ormas');
            $table->string('jenis_kegiatan');
            $table->mediumText('deskripsi_kegiatan');
            $table->enum('semester', ['1', '2']);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('dokumentasi');
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
        Schema::dropIfExists('laporan_semesters');
    }
};
