<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderGambar extends Model
{
    use HasFactory;
    public $table = 'sliders';
    public $timestamps = true;
    protected $guarded = [
        'id',
    ];
}
