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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->nullable();
            $table->string('name');
            $table->string('jabatan')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nik', 20)->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->tinyInteger('jenis_kelamin')->nullable();
            $table->text('alamat')->nullable();
            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('scan_ktp')->nullable();
            $table->tinyInteger('roles');
            $table->string('no_register', 20)->index()->nullable();
            $table->rememberToken();
            $table->unsignedBigInteger('permohonan_id')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->string('status_persyaratan')->nullable();
            $table->string('status_pengurus')->nullable();
            $table->string('status_dokumen')->nullable();
            $table->string('notifikasi_kirim')->nullable();

            $table->string('feedback_persyaratan')->nullable();
            $table->string('feedback_pengurus')->nullable();
            $table->string('feedback_dokumen')->nullable();
            $table->string('status_user');
            $table->string('status_ttd', 1)->nullable();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('afs_kategori')->onDelete('no action');
            $table->foreign('permohonan_id')->references('id')->on('afs_permohonan')->onDelete('no action');
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
};
