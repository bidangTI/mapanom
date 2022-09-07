<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Giatsmt extends Model
{
    use HasFactory;
    public $table='ai_giatsmt';
    protected $guarded=['id'];
    public $timestamps=true;
}
