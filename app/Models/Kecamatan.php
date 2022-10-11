<?php

namespace App\Models;

use App\Models\Kelurahan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    public $table = 'afs_kecamatan';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function datakelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'id','kecamatan_id');
    }
}
