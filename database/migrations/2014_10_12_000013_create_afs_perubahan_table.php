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
        Schema::create('afs_perubahan', function (Blueprint $table) {
            $table->id();
            $table->string('no_register', 20)->index()->nullable();
            $table->string('nama_ormaspol')->nullable();
            $table->string('singkatan_ormaspol')->nullable();
            $table->string('alamat_kantor_ormaspol')->nullable();
            $table->unsignedBigInteger('kelurahan')->nullable();
            $table->unsignedBigInteger('kecamatan')->nullable();
            $table->unsignedBigInteger('kota')->nullable();
            $table->string('no_sk_ahu')->nullable();
            $table->date('tgl_ahu')->nullable();
            $table->year('tahun_ahu')->nullable();
            $table->string('sk_kemenkumham_ormas')->nullable();
            $table->integer('status')->nullable();
            $table->bigInteger('id_surat')->nullable();
            $table->timestamps();

            $table->foreign('no_register')->references('no_register')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afs_perubahan');
    }
};
