<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TandaTangan extends Model
{
    use HasFactory;
    public $table = 'afs_tte';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function tte()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
