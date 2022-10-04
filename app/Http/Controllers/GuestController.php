<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\SliderGambar;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\SyaratAdministrasi;

class GuestController extends Controller
{
    public function pendaftaran()
    {
        $kategori = Kategori::all();
        return view('frontend.daftar', compact('kategori'));
    }

    public function persyaratan()
    {
        $persyaratan = SyaratAdministrasi::all();
        $slider = SliderGambar::all();
        return view('frontend.home', compact('persyaratan','slider'));
    }

    public function alur()
    {
        $alur = Permohonan::all();
        return view('frontend.alur', compact('alur')); 
    }
    

}
