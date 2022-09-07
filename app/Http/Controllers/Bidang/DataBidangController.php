<?php

namespace App\Http\Controllers\Bidang;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataBidangController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('backend.bidang.data-bidang');
    }
}
