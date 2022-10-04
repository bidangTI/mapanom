<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AlurPersyaratanController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
     
    public function index()
    {
        return view('backend.admin.alur-persyaratan');
    }
}