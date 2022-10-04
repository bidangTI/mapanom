<?php

namespace App\Exports;

use App\Models\LaporanSemester;
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


class UserExport implements FromView, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        //return LaporanSemester::all();
        return view('backend.admin.laporan-export',[
            'data' => LaporanSemester::where('no_registrasi', $this->noreg)->get()
        ]);

    }

    
    // public function getDrawings():array
    // {
    //     $rowNum = 2;
    //     $drawings = [];

    //     foreach ($this->collection() as $row) {

    //         $drawing = new Drawing();
    //         $drawing->setPath($row->dokumentasi);
    //         $drawing->setCoordinates('A'.$rowNum);
    //         $drawings[] = $drawing;

    //         $rowNum++;
    //     }

    //     return $drawings;
    // }

    public function registerEvents(): array
    {
        return [
            // BeforeSheet::class => function (BeforeSheet $event) {
            //     $event->sheet
            //         ->getPageSetup()
            //         ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            // },
            
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet
                ->getPageSetup()
                ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

            },
            // AfterSheet::class => function (AfterSheet $event) {
            //     $workSheet = $event->sheet->getDelegate();

            //     // insert images
            //     foreach ($this->getDrawings() as $drawing) {
            //         $drawing->setWorksheet($workSheet);
            //     }
            // },
        ];
    }
    
}
