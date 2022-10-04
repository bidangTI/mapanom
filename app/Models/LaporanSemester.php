<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanSemester extends Model
{
    use HasFactory;
    public $table='laporan_semesters';
    public $timestamps = true;
    protected $guarded=['id'];

    public function laporan()
    {
        return $this->belongsTo(User::class, 'no_register', 'no_register');
    }
}
