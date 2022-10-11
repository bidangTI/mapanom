<?php

namespace App\Models;

use App\Models\Kecamatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    public $table = 'afs_kelurahan';
    public $timestamps=true;
    protected $guarded=['id'];

    public function datakecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id','id');
    }
}
