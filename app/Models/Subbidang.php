<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subbidang extends Model
{
    use HasFactory;
    public $table = 'afs_subbidang';
    public $timestamps = true;
    protected $fillable = [
        'bidang_id',
        'subbidang'
    ];
}
