<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateSurat extends Model
{
    use HasFactory;
    public $table='afs_template_surat';
    public $timestamps=true;
    protected $fillable=['kategori_id','file_surat'];
}
