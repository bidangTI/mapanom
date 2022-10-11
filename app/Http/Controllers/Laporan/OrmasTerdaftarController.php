<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrmasTerdaftarController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('backend.laporan.data-ormas-terdaftar');
    }

    public function kecamatan()
    {
        return view('backend.laporan.data-ormas-terdaftar-kecamatan');
    }

    public function kelurahan()
    {
        return view('backend.laporan.data-ormas-terdaftar-kelurahan');
    }
}
