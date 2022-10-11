<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    public $table = 'afs_kota';
    public $timestamps = true;
    protected $guarded = ['id'];
}
