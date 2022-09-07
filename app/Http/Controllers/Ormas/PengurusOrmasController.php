<?php

namespace App\Http\Controllers\Ormas;

use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengurusOrmasController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('backend.ormas.pengurus-ormas');
    }
}
