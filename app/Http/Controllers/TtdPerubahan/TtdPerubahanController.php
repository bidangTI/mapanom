<?php

namespace App\Http\Controllers\TtdPerubahan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TtdPerubahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('backend.ttdperubahan.ttd-perubahan');
    }
}
