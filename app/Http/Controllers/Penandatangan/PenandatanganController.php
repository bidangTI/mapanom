<?php

namespace App\Http\Controllers\Penandatangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenandatanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('backend.Penandatangan.data-penandatangan');
    }
}
