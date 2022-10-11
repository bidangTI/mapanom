<?php

namespace App\Models;
use App\Models\User;
use App\Models\Permohonan;
use App\Models\OrmasKetua;
use App\Models\OrmasSekretaris;
use App\Models\OrmasBendahara;
use App\Models\OrmasPendiri;
use App\Models\OrmasPembina;
use App\Models\OrmasPenasihat;
use App\Models\Persyaratan;
use App\Models\Dokumen;
use App\Models\Role;
use App\Models\Histori;
use App\Models\TandaTangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeberadaan extends Model
{
    use HasFactory;
    public $table = 'afs_surat_keberadaan';
    public $timestamps=true;
    protected $fillable = ['no_register','nomor_surat','hari','tanggal_surat','cetak','status','jml_download','id_ttd','perubahan_id'];

    public function listperubahan()
    {
        return $this->belongsTo(User::class, 'no_register','no_register');
    }

    public function ketua()
    {
        return $this->hasOne(OrmasKetua::class, 'no_register', 'no_register');
    }

    public function sekretaris()
    {
        return $this->hasOne(OrmasSekretaris::class, 'no_register', 'no_register');
    }

    public function bendahara()
    {
        return $this->hasOne(OrmasBendahara::class, 'no_register', 'no_register');
    }

    public function pendiri()
    {
        return $this->hasOne(OrmasPendiri::class, 'no_register', 'no_register');
    }

    public function pembina()
    {
        return $this->hasOne(OrmasPembina::class, 'no_register', 'no_register');
    }

    public function penasihat()
    {
        return $this->hasOne(OrmasPenasihat::class, 'no_register', 'no_register');
    }

    public function persyaratan()
    {
        return $this->hasOne(Persyaratan::class, 'no_register', 'no_register');
    }

    public function dokumen()
    {
        return $this->hasOne(Dokumen::class, 'no_register', 'no_register');
    }

}
