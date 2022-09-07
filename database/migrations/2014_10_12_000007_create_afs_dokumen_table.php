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
        Schema::create('afs_dokumen', function (Blueprint $table) {
            $table->string('no_register', 20)->primary();
            $table->string('lambang_ormaspol');
            $table->integer('val_lambang_ormaspol');
            $table->text('valket_lambang_ormaspol')->nullable();
            $table->string('stempel_ormaspol');
            $table->integer('val_stempel_ormaspol');
            $table->text('valket_stempel_ormaspol')->nullable();
            $table->string('surat_permohonan_ormaspol');
            $table->integer('val_surat_permohonan_ormaspol');
            $table->text('valket_surat_permohonan_ormaspol')->nullable();
            $table->string('surat_keputusan_pengurus_ormaspol');
            $table->integer('val_surat_keputusan_pengurus_ormaspol');
            $table->text('valket_surat_keputusan_pengurus_ormaspol')->nullable();
            $table->string('akta_notaris_ormaspol');
            $table->integer('val_akta_notaris_ormaspol');
            $table->text('valket_akta_notaris_ormaspol')->nullable();
            $table->string('ad_art_ormaspol');
            $table->integer('val_ad_art_ormaspol');
            $table->text('valket_ad_art_ormaspol')->nullable();
            $table->string('sk_kemenkumham_ormas');
            $table->integer('val_sk_kemenkumham_ormas');
            $table->text('valket_sk_kemenkumham_ormas')->nullable();
            $table->string('surat_rekom_ormas');
            $table->integer('val_surat_rekom_ormas');
            $table->text('valket_surat_rekom_ormas')->nullable();
            $table->string('suket_domisili_ormaspol');
            $table->integer('val_suket_domisili_ormaspol');
            $table->text('valket_suket_domisili_ormaspol')->nullable();
            $table->string('surat_kepemilikan_kantor_ormaspol');
            $table->integer('val_surat_kepemilikan_kantor_ormaspol');
            $table->text('valket_surat_kepemilikan_kantor_ormaspol')->nullable();
            $table->string('foto_kantor_ormaspol');
            $table->integer('val_foto_kantor_ormaspol');
            $table->text('valket_foto_kantor_ormaspol')->nullable();
            $table->string('badan_hukum_parpol')->nullable();
            $table->integer('val_badan_hukum_parpol')->nullable();
            $table->text('valket_badan_hukum_parpol')->nullable();
            $table->string('surat_pernyataan_ormaspol');
            $table->integer('val_surat_pernyataan_ormaspol');
            $table->text('valket_surat_pernyataan_ormaspol')->nullable();
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
        Schema::dropIfExists('afs_dokumen');
    }
};
