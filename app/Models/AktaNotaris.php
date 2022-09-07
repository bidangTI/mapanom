<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaNotaris extends Model
{
    use HasFactory;
    public $table = 'afs_akta_notaris';
    public $timestamps = true;
    protected $guarded = ['id'];
}
