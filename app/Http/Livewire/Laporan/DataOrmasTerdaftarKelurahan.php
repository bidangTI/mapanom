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
use App\Exports\ExcelExportKelurahan;
use Maatwebsite\Excel\Facades\Excel;


class DataOrmasTerdaftarKelurahan extends Component
{
    public $dataKecamatan,$ResKelurahan;
    public $kecamatan, $kelurahan, $kota, $bidang, $subbidang, $keberadaan;

    public function mount()
    {
        $this->dataKecamatan = Kecamatan::all();
        // $this->dataKelurahan = Kelurahan::orderBy('nama_kelurahan','ASC')->get();
        $this->ResKelurahan = Kelurahan::with(['datakecamatan'])->orderBy('nama_kelurahan','ASC')->orderBy('kecamatan_id','ASC')->get();
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
        $kel = $this->kelurahan;
        $dataOrmas = User::with([
            'persyaratan' => function ($query) use ($kel) {
                $query->where('kelurahan', '=', $kel);
            },
            'ketua',
            'sekretaris',
            'bendahara'
        ])
            ->where('status_user', 'Y')
            ->where('permohonan_id', 6)
            ->whereHas('persyaratan', function ($query) use ($kel) {
                $query->where('kelurahan', '=', $kel);
            })
            ->get();

        $kelurahan = Kelurahan::with(['datakecamatan'])->orderBy('nama_kelurahan','ASC')->orderBy('kecamatan_id','ASC')->get();
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
        $DocumentPDF = PDF::loadView('livewire.laporan.pdf-data-ormas-terdaftar-kelurahan', $content)->setPaper('folio', 'landscape');
        return response()->streamDownload(
            fn () => print($DocumentPDF->output()),
            'ORMAS Terdaftar Kelurahan' . '_' . $viewTgl
        );
    }

    public function cetakExcel()
    {
        $kel = $this->kelurahan;
        $viewTgl = Carbon::now()->format('d-m-Y H-i-s');
        return Excel::download(new ExcelExportKelurahan($kel), 'Laporan ORMAS Terdaftar Kelurahan' . $viewTgl . '.xlsx');
    }

    public function render()
    {
        $kel = $this->kelurahan;
        $dataOrmas = User::with([
            'persyaratan' => function ($query) use ($kel) {
                $query->where('kelurahan', '=', $kel);
            },
            'ketua',
            'sekretaris',
            'bendahara'
        ])
            ->where('status_user', 'Y')
            ->where('permohonan_id', 6)
            ->whereHas('persyaratan', function ($query) use ($kel) {
                $query->where('kelurahan', '=', $kel);
            })
            ->get();

            return view('livewire.laporan.data-ormas-terdaftar-kelurahan', compact('dataOrmas'));
    }
}
