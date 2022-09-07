<?php

namespace App\Models;

use App\Models\Subbidang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    public $table='afs_bidang';
    public $timestamps=true;
    protected $guarded=['id'];

    public function sub_bidang()
    {
        return $this->hasMany(Subbidang::class, 'bidang_id','id');
    }
}
