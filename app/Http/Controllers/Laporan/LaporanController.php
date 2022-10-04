<?php

namespace App\Http\Controllers\Laporan;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use App\Exports\LaporanExport;
use App\Models\LaporanSemester;
use App\Models\User;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('backend.laporan.data-laporan');
    }

    public function export_pdf()
    {
        $data = User::find(Auth::user()->id);

        $this->noreg = $data->no_register;
        $laporan = LaporanSemester::where('no_register', $this->noreg)->get();
        $lap = [
            'data' => $laporan
        ];
        $pdf = PDF::loadView('backend.admin.laporan-export', $lap)->setPaper('a4', 'landscape');
        return $pdf->download('laporan.pdf');
        //$pdf->SetWidths(array(15, 55, 60, 40, 35, 35, 18));
        //return Excel::download(new LaporanExport, 'Laporan.pdf');
        // return (new LaporanExport)->download('laporan.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
}
