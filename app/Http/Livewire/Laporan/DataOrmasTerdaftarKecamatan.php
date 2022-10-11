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
use App\Models\Persyaratan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isNull;

// Export PDF
use PDF;

// Export Excel
use App\Exports\ExcelExportKecamatan;
use Maatwebsite\Excel\Facades\Excel;

class DataOrmasTerdaftarKecamatan extends Component
{
    public $dataKecamatan;
    public $kecamatan, $kelurahan, $kota, $bidang, $subbidang, $keberadaan;

    public function mount()
    {
        $this->dataKecamatan = Kecamatan::all();
        $this->kelurahan = Kelurahan::all();
        $this->kota = Kota::all();
        $this->bidang = Bidang::all();
        $this->subbidang = Subbidang::all();
        $this->keberadaan = SuratKeberadaan::where('status', 'Y')->where('id_ttd', '!=', 0)->get();
    }

    // public function updatedKecamatan()
    // {
    //         $this->dispatchBrowserEvent('init-datatable');
    // }

    public function cetakPDF()
    {
        $kec = $this->kecamatan;
        $dataOrmas = User::with([
            'persyaratan' => function ($query) use ($kec) {
                $query->where('kecamatan', '=', $kec);
            },
            'ketua',
            'sekretaris',
            'bendahara'
        ])
            ->where('status_user', 'Y')
            ->where('permohonan_id', 6)
            ->whereHas('persyaratan', function ($query) use ($kec) {
                $query->where('kecamatan', '=', $kec);
            })
            ->get();

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
        $DocumentPDF = PDF::loadView('livewire.laporan.pdf-data-ormas-terdaftar-kecamatan', $content)->setPaper('folio', 'landscape');
        return response()->streamDownload(
            fn () => print($DocumentPDF->output()),
            'ORMAS Terdaftar' . '_' . $viewTgl
        );
    }

    public function cetakExcel()
    {
        $kec = $this->kecamatan;
        $viewTgl = Carbon::now()->format('d-m-Y H-i-s');
        return Excel::download(new ExcelExportKecamatan($kec), 'Laporan ORMAS Terdaftar Kecamatan_' . $viewTgl . '.xlsx');
    }

    public function render()
    {
        $kec = $this->kecamatan;
        $dataOrmas = User::with([
            'persyaratan' => function ($query) use ($kec) {
                $query->where('kecamatan', '=', $kec);
            },
            'ketua',
            'sekretaris',
            'bendahara'
        ])
            ->where('status_user', 'Y')
            ->where('permohonan_id', 6)
            ->whereHas('persyaratan', function ($query) use ($kec) {
                $query->where('kecamatan', '=', $kec);
            })
            ->get();

        return view('livewire.laporan.data-ormas-terdaftar-kecamatan', compact('dataOrmas'));
    }
}
