<?php

namespace App\Http\Controllers\wToPdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

use file;
use PDF;

class WordToPdfController extends Controller
{
    public function convertWordToPDF()
    {
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        $template = new TemplateProcessor(storage_path('app/surat_template/' . 'Template Surat Keberadaan ORMAS_1662994209.docx'));      

        $template->setImageValue('logo', (asset('backafs/assets/images/app/icon_login.png')));
        $template->setValue('tanggal_surat', date('d-m-Y'));
        $template->setValue('nama_ormas', 'Mr.X');
        $template->setValue('alamat_ormas', 'Coba alamat');
        $template->setValue('nama_pejabat', 'ARDI MULYA');
        $template->setValue('nip_pejabat', '19800614 2004 1 002');

        $saveDocPath = storage_path('app/surat_docx/' . 'hasil_doc.docx');
        $template->saveAs($saveDocPath);
        
        $Content = IOFactory::load($saveDocPath);

        $savePdfPath = storage_path('app/surat_pdf/' . 'hasil_pdf.pdf');
        if (Storage::exists($savePdfPath)) {
            Storage::delete($savePdfPath);
        }

        $PDFWriter = IOFactory::createWriter($Content, 'PDF');
        $PDFWriter->save($savePdfPath);
        echo 'File has been successfully converted';
        
        if (Storage::exists($saveDocPath)) {
            Storage::delete($saveDocPath);
        }


        // $domPdfPath = base_path('vendor/dompdf/dompdf');
        // \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        // \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        // $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/surat_template/' . 'Template Surat Keberadaan ORMAS_1662994209.docx'));

        // $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        // $fontStyle->setBold(true);
        // $fontStyle->setName('Tahoma');
        // $fontStyle->setSize(13);        

        // $template->setImageValue('logo', (asset('backafs/assets/images/app/icon_login.png')));
        // $template->setValue('tanggal_surat', date('d-m-Y'));
        // $template->setValue('nama_ormas', 'Mr.X');
        // $template->setValue('alamat_ormas', 'Coba alamat');
        // $template->setValue('nama_pejabat', 'ARDI MULYA');
        // $template->setValue('nip_pejabat', '19800614 2004 1 002');

        // $saveDocPath = storage_path('app/surat_docx/' . 'hasil_doc.docx');
        // $template->saveAs($saveDocPath);
        
        // $Content = \PhpOffice\PhpWord\IOFactory::load($saveDocPath);

        // $savePdfPath = storage_path('app/surat_pdf/' . 'hasil_pdf.pdf');

        // if (Storage::exists($savePdfPath)) {
        //     Storage::delete($savePdfPath);
        // }

        // $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content, 'PDF');
        // $PDFWriter->save($savePdfPath);
        // echo 'File has been successfully converted';
        
        // if (Storage::exists($saveDocPath)) {
        //     Storage::delete($saveDocPath);
        // }
    }
}
