<?php

namespace App\Models;

use App\Models\User;
use App\Models\Persyaratan;
use App\Models\Dokumen;
use App\Models\SuratKeberadaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubahData extends Model
{
    use HasFactory;
    public $table = 'afs_perubahan';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function rubahpersyaratan()
    {
        return $this->hasOne(Persyaratan::class, 'no_register', 'no_register');
    }
    public function rubahdokumen()
    {
        return $this->hasOne(Dokumen::class, 'no_register', 'no_register');
    }

    public function ambildata()
    {
        return $this->belongsTo(User::class, 'no_register','no_register');
    }

    public function datasurat()
    {
        return $this->hasOne(SuratKeberadaan::class, 'perubahan_id', 'id');
    }
}
