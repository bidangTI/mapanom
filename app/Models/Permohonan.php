<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;
    public $table = 'afs_permohonan';
    protected $guarded = ['id'];
    public $timestamps = true;
}
