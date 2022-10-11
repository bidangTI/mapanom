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
        Schema::create('afs_template_surat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id')->index();
            $table->string('file_surat');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('afs_kategori')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afs_template_surat');
    }
};
