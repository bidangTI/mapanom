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
        Schema::create('afs_persyaratan', function (Blueprint $table) {
            $table->string('nama_ormaspol');
            $table->string('singkatan_ormaspol');
            $table->integer('akta_id_ormas');
            $table->string('nama_notaris_ormaspol');
            $table->string('no_akta_notaris_ormaspol');
            $table->date('tgl_akta_notaris_ormaspol');
            $table->string('no_surat_permohonan_ormaspol');
            $table->date('tgl_surat_permohonan_ormaspol');
            $table->integer('bidang_id_ormas');
            $table->integer('subbidang_id_ormas');
            $table->string('alamat_kantor_ormaspol');
            $table->string('tempat_pendirian_ormas');
            $table->date('tgl_pendirian_ormas');
            $table->string('no_sk_kepengurusan_ormaspol');
            $table->text('tujuan_ormas');
            $table->string('keputusan_tinggi_ormas');
            $table->integer('kepengurusan_id_ormas');
            $table->string('npwp_ormaspol');
            $table->string('sumber_dana');
            $table->string('no_sk_ahu')->nullable();
            $table->date('tgl_ahu')->nullable();
            $table->year('tahun_ahu')->nullable();
            $table->string('no_register', 20)->primary();
            $table->integer('verifikasi');
            $table->text('keterangan_verifikasi')->nullable();
            $table->unsignedBigInteger('kelurahan');
            $table->unsignedBigInteger('kecamatan');
            $table->unsignedBigInteger('kota');
            $table->timestamps();

            $table->foreign('no_register')->references('no_register')->on('users')->onDelete('cascade');
            // $table->foreign('kelurahan')->references('id')->on('afs_kelurahan')->onDelete('set null');
            // $table->foreign('kecamatan')->references('id')->on('afs_kecamatan')->onDelete('set null');
            // $table->foreign('kota')->references('id')->on('afs_kota')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afs_persyaratan');
    }
};
