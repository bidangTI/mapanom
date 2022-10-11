<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    use HasFactory;
    public $table='afs_histori';
    public $timestamps=true;

    protected $guarded=['id'];
}
