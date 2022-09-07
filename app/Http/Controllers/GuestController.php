<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class GuestController extends Controller
{
    public function pendaftaran()
    {
        $kategori = Kategori::all();
        return view('frontend.daftar', compact('kategori'));
    }

    public function alur()
    {
        return view('frontend.alur');
    }
}
