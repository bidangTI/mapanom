<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SyaratAdministrasi extends Model
{
    use HasFactory;
    public $table = 'syarat_administrasi';
    public $timestamps = true;
    protected $fillable = [
        'kategori_id',
        'dasar_hukum',
        'syarat'
    ];

    public function kategori() 
    {
        return $this->belongsTo(Kategori::class);
    }
}
