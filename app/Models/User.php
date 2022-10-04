<?php

namespace App\Models;

use App\Models\Kategori;
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

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'roles'
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function level()
    {
        return $this->belongsTo(Role::class, 'roles', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class, 'permohonan_id', 'id');
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

    public function histori()
    {
        return $this->belongsTo(Histori::class,'no_register', 'no_register');
    }

    public function laporan()
    {
        return $this->hasMany(LaporanSemester::class, 'no_register', 'no_register');
    }
}
