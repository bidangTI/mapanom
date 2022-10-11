<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Bidang;
use App\Models\Subbidang;
use App\Models\SuratKeberadaan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isNull;

// Export PDF
use PDF;

// Export Excel
use App\Exports\ExcelExport;
use Maatwebsite\Excel\Facades\Excel;

class DataOrmasTerdaftar extends Component
{
    public function cetakPDF()
    {
        $dataOrmas = User::with(['persyaratan', 'ketua', 'sekretaris', 'bendahara'])->where('status_user', 'Y')->where('permohonan_id', 6)->get();
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        $kota = Kota::all();
        $bidang = Bidang::all();
        $subbidang = Subbidang::all();
        $keberadaan = SuratKeberadaan::where('status', 'Y')->where('id_ttd', '!=', 0)->get();
        $viewTgl = Carbon::now()->format('d-m-Y H-i-s');
        $content = [
            'dataOrmas' => $dataOrmas,
            'kelurahan' => $kelurahan,
            'kecamatan' => $kecamatan,
            'kota' => $kota,
            'bidang' => $bidang,
            'subbidang' => $subbidang,
            'keberadaan' => $keberadaan
        ];
        $DocumentPDF = PDF::loadView('livewire.laporan.pdf-data-ormas-terdaftar', $content)->setPaper('folio', 'landscape');
        return response()->streamDownload(
            fn () => print($DocumentPDF->output()),
            'ORMAS Terdaftar' . '_' . $viewTgl
        );
    }

    public function cetakExcel()
    {
        $viewTgl = Carbon::now()->format('d-m-Y H-i-s');
        return Excel::download(new ExcelExport, 'Laporan ORMAS Terdaftar_' . $viewTgl . '.xlsx');
    }

    public function render()
    {
        $dataOrmas = User::with(['persyaratan', 'ketua', 'sekretaris', 'bendahara'])->where('status_user', 'Y')->where('permohonan_id', 6)->get();
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        $kota = Kota::all();
        $bidang = Bidang::all();
        $subbidang = Subbidang::all();
        $keberadaan = SuratKeberadaan::where('status', 'Y')->where('id_ttd', '!=', 0)->get();
        return view('livewire.laporan.data-ormas-terdaftar', compact('dataOrmas', 'kelurahan', 'kecamatan', 'kota', 'bidang', 'subbidang', 'keberadaan'));
    }
}
