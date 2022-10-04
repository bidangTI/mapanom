<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Exports\LaporanExport;
use App\Models\LaporanSemester;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Http\Request;

class LaporanAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('backend.admin.data-laporan');
    }

    public function export_xlsx()
    {
        return Excel::download(new LaporanExport, 'Laporan.xlsx');
        // return (new LaporanExport)->download('laporan.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function export_csv()
    {
        return Excel::download(new LaporanExport, 'Laporan.csv');
        // return (new LaporanExport)->download('laporan.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function export_pdf()
    {
        $laporan = LaporanSemester::get();
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
