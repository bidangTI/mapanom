<?php

namespace App\Models;

use App\Models\TemplateSurat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    public $table = 'afs_kategori';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function datasurat()
    {
        return $this->belongsTo(TemplateSurat::class, 'id','kategori_id');
    }
}
