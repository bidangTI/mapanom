<?php

namespace App\Models;

use App\Models\User;
use App\Models\AktaNotaris;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

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
        'keputusan_tinggi_ormas',
        'kepengurusan_id_ormas',
        'npwp_ormaspol',
        'sumber_dana',
        'no_sk_ahu',
        'tgl_ahu',
        'tahun_ahu',
        'no_register',
        'verifikasi',
        'keterangan_verifikasi',
        'kecamatan',
        'kelurahan',
        'kota'
    ];

    public function persyaratan()
    {
        return $this->belongsTo(User::class, 'no_register', 'no_register');
    }

    public function akta()
    {
        return $this->belongsTo(AktaNotaris::class, 'bidang_id_ormas', 'id');
    }
    
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan', 'id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan', 'id');
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class, 'kota','id');
    }
}
