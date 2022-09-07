<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrmasPembina extends Model
{
    use HasFactory;
    public $table = 'afs_pembina';
    public $timestamps = true;
    protected $primaryKey = 'no_register';
    protected $keyType = 'string';
    protected $fillable = [
        'nama',
        'nik',
        'no_register',
        'verifikasi',
        'keterangan_verifikasi'
    ];

    public function ormas_pembina()
    {
        return $this->belongsTo(User::class, 'no_register', 'no_register');
    }
}
