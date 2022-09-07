<?php

namespace App\Http\Controllers\Ormas;

use App\Http\Controllers\Controller;

use App\Models\AktaNotaris;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataOrmasController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('backend.ormas.data-ormas');
    }
}
