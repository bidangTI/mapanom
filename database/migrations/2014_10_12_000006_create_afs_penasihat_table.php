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
        Schema::create('afs_penasihat', function (Blueprint $table) {
            $table->string('no_register', 20)->primary();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->integer('verifikasi')->nullable();
            $table->text('keterangan_verifikasi')->nullable();
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
        Schema::dropIfExists('afs_penasihat');
    }
};
