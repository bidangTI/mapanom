<?php

namespace App\Http\Controllers\Display;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Persyaratan;
use App\Models\OrmasKetua;
use App\Models\OrmasSekretaris;
use App\Models\OrmasBendahara;
use App\Models\OrmasPendiri;
use App\Models\OrmasPembina;
use App\Models\OrmasPenasihat;
use App\Models\Dokumen;
use App\Models\Kategori;
use App\Models\AktaNotaris;

class DisplayController extends Controller
{
    // Folder Storage App View PDF
    public function displayImage($path, $filename)
    {
        $url = storage_path('app/' . $path . '/' . $filename);
        return response()->file($url);
    }

    // Menampilkan TTD Image To DomPDF HTML
    public function displayPDF($path, $filename)
    {
        $url = storage_path('app/public/' . $path . '/' . $filename); //File Lokasi Image TTD
        return response()->file($url);
    }
}
