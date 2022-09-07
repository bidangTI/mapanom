<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrmasBendahara extends Model
{
    use HasFactory;
    public $table = 'afs_bendahara';
    public $timestamps = true;
    protected $primaryKey = 'no_register';
    protected $keyType = 'string';
    protected $fillable = [
        'nama',
        'nik',
        'masa_bakti_awal',
        'masa_bakti_akhir',
        'no_register',
        'verifikasi',
        'keterangan_verifikasi',
        'file_ktp',
        'file_ktp_v',
        'file_foto',
        'file_foto_v',
        'file_cv',
        'file_cv_v'
    ];

    public function ormas_bendahara()
    {
        return $this->belongsTo(User::class, 'no_register', 'no_register');
    }
}

