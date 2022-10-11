<?php

namespace App\Http\Controllers\RLangsung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RubahLangsungController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('backend.rlangsung.rubah-langsung');
    }

    public function persyaratan()
    {
        return view('backend.rlangsung.rubah-persyaratan');
    }

    public function pengurus()
    {
        return view('backend.rlangsung.rubah-pengurus');
    }

    public function dokumen()
    {
        return view('backend.rlangsung.rubah-dokumen');
    }
}
