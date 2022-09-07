<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    public $table = 'afs_dokumen';
    public $timestamps = true;
    protected $primaryKey = 'no_register';
    protected $keyType = 'string';
    protected $fillable = [
        'no_register',
        'lambang_ormaspol',
        'val_lambang_ormaspol',
        'valket_lambang_ormaspol',
        'stempel_ormaspol',
        'val_stempel_ormaspol',
        'valket_stempel_ormaspol',
        'surat_permohonan_ormaspol',
        'val_surat_permohonan_ormaspol',
        'valket_surat_permohonan_ormaspol',
        'surat_keputusan_pengurus_ormaspol',
        'val_surat_keputusan_pengurus_ormaspol',
        'valket_surat_keputusan_pengurus_ormaspol',
        'akta_notaris_ormaspol',
        'val_akta_notaris_ormaspol',
        'valket_akta_notaris_ormaspol',
        'ad_art_ormaspol',
        'val_ad_art_ormaspol',
        'valket_ad_art_ormaspol',
        'sk_kemenkumham_ormas',
        'val_sk_kemenkumham_ormas',
        'valket_sk_kemenkumham_ormas',
        'surat_rekom_ormas',
        'val_surat_rekom_ormas',
        'valket_surat_rekom_ormas',
        'suket_domisili_ormaspol',
        'val_suket_domisili_ormaspol',
        'valket_suket_domisili_ormaspol',
        'surat_kepemilikan_kantor_ormaspol',
        'val_surat_kepemilikan_kantor_ormaspol',
        'valket_surat_kepemilikan_kantor_ormaspol',
        'foto_kantor_ormaspol',
        'val_foto_kantor_ormaspol',
        'valket_foto_kantor_ormaspol',
        'badan_hukum_parpol',
        'val_badan_hukum_parpol',
        'valket_badan_hukum_parpol',
        'surat_pernyataan_ormaspol',
        'val_surat_pernyataan_ormaspol',
        'valket_surat_pernyataan_ormaspol'
    ];

    public function dokumen()
    {
        return $this->belongsTo(User::class, 'no_register','no_register');
    }
}
