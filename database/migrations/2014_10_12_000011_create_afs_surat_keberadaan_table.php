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
        Schema::create('afs_surat_keberadaan', function (Blueprint $table) {
            $table->id();
            $table->string('no_register', 20)->index()->nullable();
            $table->string('nomor_surat')->nullable();
            $table->string('hari')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->string('status', 1)->nullable();
            $table->integer('jml_view')->nullable();
            $table->integer('id_ttd')->nullable();
            $table->integer('cetak')->nullable();
            $table->string('file_surat')->nullable();
            $table->date('tanggal_exp')->nullable();
            $table->bigInteger('perubahan_id')->nullable();
            $table->timestamps();

            $table->foreign('no_register')->references('no_register')->on('users')->onDelete('restrict');
            // $table->foreign('no_register')->references('no_register')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afs_surat_keberadaan');
    }
};
