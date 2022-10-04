<?php

namespace App\Models;

use App\Models\SyaratAdministrasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    public $table = 'afs_kategori';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function persyaratan()
    {
        return $this->hasMany(SyaratAdministrasi::class);
    }
}
