<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Bidang;
use App\Models\Subbidang;
use App\Models\SuratKeberadaan;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class ExcelExportKecamatan implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $kecamatan, $kelurahan, $kota, $bidang, $subbidang, $keberadaan;

    protected $kec;

    public function __construct($kec)
    {
        $this->kec = $kec;
    }

    public function view(): View
    {
        $kec = $this->kec;
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

        // dd($dataOrmas);

        return view('livewire.laporan.excel-data-ormas-terdaftar-kecamatan', [
            'kelurahan' => $kelurahan,
            'kecamatan' => $kecamatan,
            'kota' => $kota,
            'bidang' => $bidang,
            'subbidang' => $subbidang,
            'keberadaan' => $keberadaan,
            'dataOrmas' => $dataOrmas
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet
                    ->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

                $event->sheet->getStyle('A6:J6')->applyFromArray([
                    'font' => [
                        'name'      =>  'Calibri',
                        'size'      =>  10,
                        'bold'      =>  true
                    ],
                ]);

                // $event->sheet->getStyle('A5:I5')->applyFromArray([
                //     'borders' => [
                //         'allBorders' => [
                //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                //             'color' => ['argb' => '000000'],
                //         ],
                //     ],
                // ]);
            },
        ];
    }
}
