<?php

namespace App\Http\Controllers\Rnomor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NomorRubahController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('backend.rbhnomor.rubah-nomor');
    }
}
