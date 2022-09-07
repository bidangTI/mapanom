<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;
    public $table = 'afs_persyaratan';
    public $timestamps = true;
    protected $primaryKey = 'no_register';
    protected $keyType = 'string';
    protected $fillable = [
        'nama_ormaspol',
        'singkatan_ormaspol',
        'akta_id_ormas',
        'nama_notaris_ormaspol',
        'no_akta_notaris_ormaspol',
        'tgl_akta_notaris_ormaspol',
        'no_surat_permohonan_ormaspol',
        'tgl_surat_permohonan_ormaspol',
        'bidang_id_ormas',
        'subbidang_id_ormas',
        'alamat_kantor_ormaspol',
        'tempat_pendirian_ormas',
        'tgl_pendirian_ormas',
        'no_sk_kepengurusan_ormaspol',
        'tujuan_ormas',
        'program_kerja_ormas',
        'keputusan_tinggi_ormas',
        'kepengurusan_id_ormas',
        'npwp_ormaspol',
        'sumber_dana',
        'no_sk_ahu',
        'tgl_ahu',
        'tahun_ahu',
        'no_register',
        'verifikasi',
        'keterangan_verifikasi'
    ];

    public function persyaratan()
    {
        return $this->belongsTo(User::class, 'no_register','no_register');
    }
}
