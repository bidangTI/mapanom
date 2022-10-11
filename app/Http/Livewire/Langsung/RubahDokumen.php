<?php

namespace App\Http\Livewire\Langsung;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\User;
use App\Models\Dokumen;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use function PHPUnit\Framework\isNull;

class RubahDokumen extends Component
{
    use WithFileUploads;

    public $tempUrl, $folder, $namefile, $url;

    public
        $val_lambang,
        $valket_lambang,
        $val_stempel,
        $valket_stempel,
        $val_srtpermohonan,
        $valket_srtpermohonan,
        $val_srtkeputusan,
        $valket_srtkeputusan,
        $val_aktanotaris,
        $valket_aktanotaris,
        $val_adart,
        $valket_adart,
        $val_skahu,
        $valket_skahu,
        $val_srtrekom,
        $valket_srtrekom,
        $val_suketdomisili,
        $valket_suketdomisili,
        $val_kepemilikan,
        $valket_kepemilikan,
        $val_fotokantor,
        $valket_fotokantor,
        $val_badanhukum,
        $valket_badanhukum,
        $val_srtpernyataan,
        $valket_srtpernyataan,
        $val_proker,
        $valket_proker,
        $notifkirim,
        $statusdokumen;

    public
        $itersrtpermohonan,
        $iterlambang,
        $iterstempel,
        $iteraktanotaris,
        $iteradart,
        $itersrtkepengurusan,
        $itersrtpernyataan,
        $itersrtdomisili,
        $itersrtkepemilikan,
        $iterfotokantor,
        $iterskuha,
        $iterrekom,
        $iterkerjaormas;

    public
        $noreg,
        $noregcari,
        $srtpermohonan,
        $lambang,
        $stempel,
        $aktanotaris,
        $adart,
        $srtkepengurusan,
        $srtpernyataan,
        $srtdomisili,
        $srtkepemilikan,
        $fotokantor,
        $skuha,
        $rekom,
        $kerjaormas;

    public
        $srtpermohonanOld,
        $lambangOld,
        $stempelOld,
        $aktanotarisOld,
        $adartOld,
        $srtkepengurusanOld,
        $srtpernyataanOld,
        $srtdomisiliOld,
        $srtkepemilikanOld,
        $fotokantorOld,
        $skuhaOld,
        $rekomOld,
        $kerjaormasOld;

    public function mount()
    {
        $this->itersrtpermohonan = 0;
        $this->iterlambang = 0;
        $this->iterstempel = 0;
        $this->iteraktanotaris = 0;
        $this->iteradart = 0;
        $this->itersrtkepengurusan = 0;
        $this->itersrtpernyataan = 0;
        $this->itersrtdomisili = 0;
        $this->itersrtkepemilikan = 0;
        $this->iterfotokantor = 0;
        $this->iterskuha = 0;
        $this->iterrekom = 0;
        $this->iterkerjaormas = 0;

        // $data = User::find(Auth::user()->id);
        // $this->noreg = $data->no_register;
        // $this->cariData();
    }

    public function cariData()
    {
        $existDokumen = Dokumen::where('no_register', $this->noregcari)->first();
        if (!empty($existDokumen)) {
            $this->srtpermohonanOld = $existDokumen->surat_permohonan_ormaspol;
            $this->lambangOld = $existDokumen->lambang_ormaspol;
            $this->stempelOld = $existDokumen->stempel_ormaspol;
            $this->aktanotarisOld = $existDokumen->akta_notaris_ormaspol;
            $this->adartOld = $existDokumen->ad_art_ormaspol;
            $this->srtkepengurusanOld = $existDokumen->surat_keputusan_pengurus_ormaspol;
            $this->srtpernyataanOld = $existDokumen->surat_pernyataan_ormaspol;
            $this->srtdomisiliOld = $existDokumen->suket_domisili_ormaspol;
            $this->srtkepemilikanOld = $existDokumen->surat_kepemilikan_kantor_ormaspol;
            $this->fotokantorOld = $existDokumen->foto_kantor_ormaspol;
            $this->skuhaOld = $existDokumen->sk_kemenkumham_ormas;
            $this->rekomOld = $existDokumen->surat_rekom_ormas;
            $this->kerjaormasOld = $existDokumen->program_kerja_ormas;
            $this->val_lambang =  $existDokumen->val_lambang_ormaspol;
            $this->valket_lambang =  $existDokumen->valket_lambang_ormaspol;
            $this->val_stempel =  $existDokumen->val_stempel_ormaspol;
            $this->valket_stempel =  $existDokumen->valket_stempel_ormaspol;
            $this->val_srtpermohonan = $existDokumen->val_surat_permohonan_ormaspol;
            $this->valket_srtpermohonan =  $existDokumen->valket_surat_permohonan_ormaspol;
            $this->val_srtkeputusan =  $existDokumen->val_surat_keputusan_pengurus_ormaspol;
            $this->valket_srtkeputusan =  $existDokumen->valket_surat_keputusan_pengurus_ormaspol;
            $this->val_aktanotaris =  $existDokumen->val_akta_notaris_ormaspol;
            $this->valket_aktanotaris =  $existDokumen->valket_akta_notaris_ormaspol;
            $this->val_adart =  $existDokumen->val_ad_art_ormaspol;
            $this->valket_adart =  $existDokumen->valket_ad_art_ormaspol;
            $this->val_skahu =  $existDokumen->val_sk_kemenkumham_ormas;
            $this->valket_skahu =  $existDokumen->valket_sk_kemenkumham_ormas;
            $this->val_srtrekom =  $existDokumen->val_surat_rekom_ormas;
            $this->valket_srtrekom =  $existDokumen->valket_surat_rekom_ormas;
            $this->val_suketdomisili = $existDokumen->val_suket_domisili_ormaspol;
            $this->valket_suketdomisili =  $existDokumen->valket_suket_domisili_ormaspol;
            $this->val_kepemilikan =  $existDokumen->val_surat_kepemilikan_kantor_ormaspol;
            $this->valket_kepemilikan =  $existDokumen->valket_surat_kepemilikan_kantor_ormaspol;
            $this->val_fotokantor =  $existDokumen->val_foto_kantor_ormaspol;
            $this->valket_fotokantor =  $existDokumen->valket_foto_kantor_ormaspol;
            $this->val_badanhukum =  $existDokumen->val_badan_hukum_parpol;
            $this->valket_badanhukum =  $existDokumen->valket_badan_hukum_parpol;
            $this->val_srtpernyataan =  $existDokumen->val_surat_pernyataan_ormaspol;
            $this->valket_srtpernyataan =  $existDokumen->valket_surat_pernyataan_ormaspol;
            $this->val_proker =  $existDokumen->val_program_kerja_ormas;
            $this->valket_proker =  $existDokumen->valket_program_kerja_ormas;
            $this->noreg = $existDokumen->no_register;
            $this->noregcari = $existDokumen->no_register;
        } else {
            $this->cekRegister();
            $this->resetFUpload();
        }

        $this->resetValidation();
    }

    public function store_dokumen()
    {
        $this->validate(
            [
                'srtpermohonan' => empty($this->srtpermohonanOld) || !empty($this->srtpermohonan) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'lambang' => empty($this->lambangOld) || !empty($this->lambang) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'stempel' => empty($this->stempelOld) || !empty($this->stempel) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'aktanotaris' => empty($this->aktanotarisOld) || !empty($this->aktanotaris) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'adart' => empty($this->adartOld) || !empty($this->adart) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'srtkepengurusan' => empty($this->srtkepengurusanOld) || !empty($this->srtkepengurusan) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'srtpernyataan' => empty($this->srtpernyataanOld) || !empty($this->srtpernyataan) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'srtdomisili' => empty($this->srtdomisiliOld) || !empty($this->srtdomisili) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'srtkepemilikan' => empty($this->srtkepemilikanOld) || !empty($this->srtkepemilikan) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'fotokantor' => empty($this->fotokantorOld) || !empty($this->fotokantor) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'skuha' => empty($this->skuhaOld) || !empty($this->skuha) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'rekom' => empty($this->rekomOld) || !empty($this->rekom) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'kerjaormas' => empty($this->kerjaormasOld) || !empty($this->kerjaormas) ? 'required|file|mimes:pdf|max:512' : 'nullable'
            ],
            [
                'srtpermohonan.required' => 'Surat Permohonan Mohon Dilengkapi',
                'lambang.required' => 'Lambang Mohon Dilengkapi',
                'stempel.required' => 'Stempel Mohon Dilengkapi',
                'aktanotaris.required' => 'Akta Notaris Mohon Dilengkapi',
                'adart.required' => 'AD ART Mohon Dilengkapi',
                'srtkepengurusan.required' => 'Surat Kepengurusan Mohon Dilengkapi',
                'srtpernyataan.required' => 'Surat Pernyataan Mohon Dilengkapi',
                'srtdomisili.required' => 'Surat Domisili Kantor Mohon Dilengkapi',
                'srtkepemilikan.required' => 'Surat Kepemilikan Kantor Mohon Dilengkapi',
                'fotokantor.required' => 'Foto Kantor Mohon Dilengkapi',
                'skuha.required' => 'SK Mohon Dilengkapi',
                'rekom.required' => 'Rekomendasi Mohon Dilengkapi',
                'kerjaormas.required' => 'Program Kerja Mohon Dilengkapi',

                'srtpermohonan.mimes' => 'Format File Tidak Sesuai',
                'lambang.mimes' => 'Format File Tidak Sesuai',
                'stempel.mimes' => 'Format File Tidak Sesuai',
                'aktanotaris.mimes' => 'Format File Tidak Sesuai',
                'adart.mimes' => 'Format File Tidak Sesuai',
                'srtkepengurusan.mimes' => 'Format File Tidak Sesuai',
                'srtpernyataan.mimes' => 'Format File Tidak Sesuai',
                'srtdomisili.mimes' => 'Format File Tidak Sesuai',
                'srtkepemilikan.mimes' => 'Format File Tidak Sesuai',
                'fotokantor.mimes' => 'Format File Tidak Sesuai',
                'skuha.mimes' => 'Format File Tidak Sesuai',
                'rekom.mimes' => 'Format File Tidak Sesuai',
                'kerjaormas.mimes' => 'Format File Tidak Sesuai',

                'srtpermohonan.max' => 'Ukuran File Maximal 512 kb',
                'lambang.max' => 'Ukuran File Maximal 512 kb',
                'stempel.max' => 'Ukuran File Maximal 512 kb',
                'aktanotaris.max' => 'Ukuran File Maximal 512 kb',
                'adart.max' => 'Ukuran File Maximal 512 kb',
                'srtkepengurusan.max' => 'Ukuran File Maximal 512 kb',
                'srtpernyataan.max' => 'Ukuran File Maximal 512 kb',
                'srtdomisili.max' => 'Ukuran File Maximal 512 kb',
                'srtkepemilikan.max' => 'Ukuran File Maximal 512 kb',
                'fotokantor.max' => 'Ukuran File Maximal 512 kb',
                'skuha.max' => 'Ukuran File Maximal 512 kb',
                'rekom.max' => 'Ukuran File Maximal 512 kb',
                'kerjaormas.max' => 'Ukuran File Maximal 512 kb'
            ]
        );

        try {
            if ($this->srtpermohonan && $this->srtpermohonanOld != null) {
                Storage::delete($this->srtpermohonanOld);
            }
            if ($this->lambang && $this->lambangOld != null) {
                Storage::delete($this->lambangOld);
            }
            if ($this->stempel && $this->stempelOld != null) {
                Storage::delete($this->stempelOld);
            }
            if ($this->aktanotaris && $this->aktanotarisOld != null) {
                Storage::delete($this->aktanotarisOld);
            }
            if ($this->adart && $this->adartOld != null) {
                Storage::delete($this->adartOld);
            }
            if ($this->srtkepengurusan && $this->srtkepengurusanOld != null) {
                Storage::delete($this->srtkepengurusanOld);
            }
            if ($this->srtpernyataan && $this->srtpernyataanOld != null) {
                Storage::delete($this->srtpernyataanOld);
            }
            if ($this->srtdomisili && $this->srtdomisiliOld != null) {
                Storage::delete($this->srtdomisiliOld);
            }
            if ($this->srtkepemilikan && $this->srtkepemilikanOld != null) {
                Storage::delete($this->srtkepemilikanOld);
            }
            if ($this->fotokantor && $this->fotokantorOld != null) {
                Storage::delete($this->fotokantorOld);
            }
            if ($this->skuha && $this->skuhaOld != null) {
                Storage::delete($this->skuhaOld);
            }
            if ($this->rekom && $this->rekomOld != null) {
                Storage::delete($this->rekomOld);
            }
            if ($this->kerjaormas && $this->kerjaormasOld != null) {
                Storage::delete($this->kerjaormasOld);
            }

            if ($this->val_lambang == 1) {
                $val_lambang_rev = 1;
            } else {
                $val_lambang_rev = 0;
            }

            if ($this->val_srtpermohonan == 1) {
                $val_srtpermohonan_rev = 1;
            } else {
                $val_srtpermohonan_rev = 0;
            }

            if ($this->val_stempel == 1) {
                $val_stempel_rev = 1;
            } else {
                $val_stempel_rev = 0;
            }

            if ($this->val_aktanotaris == 1) {
                $val_aktanotaris_rev = 1;
            } else {
                $val_aktanotaris_rev = 0;
            }

            if ($this->val_adart == 1) {
                $val_adart_rev = 1;
            } else {
                $val_adart_rev = 0;
            }

            if ($this->val_srtkeputusan == 1) {
                $val_srtkeputusan_rev = 1;
            } else {
                $val_srtkeputusan_rev = 0;
            }

            if ($this->val_srtpernyataan == 1) {
                $val_srtpernyataan_rev = 1;
            } else {
                $val_srtpernyataan_rev = 0;
            }

            if ($this->val_suketdomisili == 1) {
                $val_suketdomisili_rev = 1;
            } else {
                $val_suketdomisili_rev = 0;
            }

            if ($this->val_kepemilikan == 1) {
                $val_kepemilikan_rev = 1;
            } else {
                $val_kepemilikan_rev = 0;
            }

            if ($this->val_fotokantor == 1) {
                $val_fotokantor_rev = 1;
            } else {
                $val_fotokantor_rev = 0;
            }

            if ($this->val_skahu == 1) {
                $val_skahu_rev = 1;
            } else {
                $val_skahu_rev = 0;
            }

            if ($this->val_srtrekom == 1) {
                $val_srtrekom_rev = 1;
            } else {
                $val_srtrekom_rev = 0;
            }

            if ($this->val_proker == 1) {
                $val_proker_rev = 1;
            } else {
                $val_proker_rev = 0;
            }

            $dataDokumen = array(
                'val_lambang_ormaspol' => $val_lambang_rev,
                'val_surat_permohonan_ormaspol' => $val_srtpermohonan_rev,
                'val_stempel_ormaspol' => $val_stempel_rev,
                'val_akta_notaris_ormaspol' => $val_aktanotaris_rev,
                'val_ad_art_ormaspol' => $val_adart_rev,
                'val_surat_keputusan_pengurus_ormaspol' => $val_srtkeputusan_rev,
                'val_surat_pernyataan_ormaspol' => $val_srtpernyataan_rev,
                'val_suket_domisili_ormaspol' => $val_suketdomisili_rev,
                'val_surat_kepemilikan_kantor_ormaspol' => $val_kepemilikan_rev,
                'val_foto_kantor_ormaspol' => $val_fotokantor_rev,
                'val_sk_kemenkumham_ormas' => $val_skahu_rev,
                'val_surat_rekom_ormas' => $val_srtrekom_rev,
                'val_program_kerja_ormas' => $val_proker_rev,
                'reg' => $this->noreg
            );

            if ($this->lambang != null) {
                $file_lambang = $this->lambang->getClientOriginalName();
                $filename_lambang = pathinfo($file_lambang, PATHINFO_FILENAME);
                $ext_lambang = $this->lambang->getClientOriginalExtension();
                $filename_lambang = $this->noreg . '_' . $filename_lambang . '_' . time() . '.' . $ext_lambang;
                $path_lambang = $this->lambang->storeAs('dok_lambang', $filename_lambang);
            }

            if ($this->stempel != null) {
                $file_stempel = $this->stempel->getClientOriginalName();
                $filename_stempel = pathinfo($file_stempel, PATHINFO_FILENAME);
                $ext_stempel = $this->stempel->getClientOriginalExtension();
                $filename_stempel = $this->noreg . '_' . $filename_stempel . '_' . time() . '.' . $ext_stempel;
                $path_stempel = $this->stempel->storeAs('dok_stempel', $filename_stempel);
            }

            if ($this->aktanotaris != null) {
                $file_aktanotaris = $this->aktanotaris->getClientOriginalName();
                $filename_aktanotaris = pathinfo($file_aktanotaris, PATHINFO_FILENAME);
                $ext_aktanotaris = $this->aktanotaris->getClientOriginalExtension();
                $filename_aktanotaris = $this->noreg . '_' . $filename_aktanotaris . '_' . time() . '.' . $ext_aktanotaris;
                $path_aktanotaris = $this->aktanotaris->storeAs('dok_aktanotaris', $filename_aktanotaris);
            }

            if ($this->adart != null) {
                $file_adart = $this->adart->getClientOriginalName();
                $filename_adart = pathinfo($file_adart, PATHINFO_FILENAME);
                $ext_adart = $this->adart->getClientOriginalExtension();
                $filename_adart = $this->noreg . '_' . $filename_adart . '_' . time() . '.' . $ext_adart;
                $path_adart = $this->adart->storeAs('dok_adart', $filename_adart);
            }

            if ($this->srtkepengurusan != null) {
                $file_srtkepengurusan = $this->srtkepengurusan->getClientOriginalName();
                $filename_srtkepengurusan = pathinfo($file_srtkepengurusan, PATHINFO_FILENAME);
                $ext_srtkepengurusan = $this->srtkepengurusan->getClientOriginalExtension();
                $filename_srtkepengurusan = $this->noreg . '_' . $filename_srtkepengurusan . '_' . time() . '.' . $ext_srtkepengurusan;
                $path_srtkepengurusan = $this->srtkepengurusan->storeAs('dok_kepengurusan', $filename_srtkepengurusan);
            }

            if ($this->srtpernyataan != null) {
                $file_srtpernyataan = $this->srtpernyataan->getClientOriginalName();
                $filename_srtpernyataan = pathinfo($file_srtpernyataan, PATHINFO_FILENAME);
                $ext_srtpernyataan = $this->srtpernyataan->getClientOriginalExtension();
                $filename_srtpernyataan = $this->noreg . '_' . $filename_srtpernyataan . '_' . time() . '.' . $ext_srtpernyataan;
                $path_srtpernyataan = $this->srtpernyataan->storeAs('dok_pernyataan', $filename_srtpernyataan);
            }

            if ($this->srtdomisili != null) {
                $file_srtdomisili = $this->srtdomisili->getClientOriginalName();
                $filename_srtdomisili = pathinfo($file_srtdomisili, PATHINFO_FILENAME);
                $ext_srtdomisili = $this->srtdomisili->getClientOriginalExtension();
                $filename_srtdomisili = $this->noreg . '_' . $filename_srtdomisili . '_' . time() . '.' . $ext_srtdomisili;
                $path_srtdomisili = $this->srtdomisili->storeAs('dok_domisili', $filename_srtdomisili);
            }

            if ($this->srtkepemilikan != null) {
                $file_srtkepemilikan = $this->srtkepemilikan->getClientOriginalName();
                $filename_srtkepemilikan = pathinfo($file_srtkepemilikan, PATHINFO_FILENAME);
                $ext_srtkepemilikan = $this->srtkepemilikan->getClientOriginalExtension();
                $filename_srtkepemilikan = $this->noreg . '_' . $filename_srtkepemilikan . '_' . time() . '.' . $ext_srtkepemilikan;
                $path_srtkepemilikan = $this->srtkepemilikan->storeAs('dok_kepemilikan', $filename_srtkepemilikan);
            }

            if ($this->fotokantor != null) {
                $file_fotokantor = $this->fotokantor->getClientOriginalName();
                $filename_fotokantor = pathinfo($file_fotokantor, PATHINFO_FILENAME);
                $ext_fotokantor = $this->fotokantor->getClientOriginalExtension();
                $filename_fotokantor = $this->noreg . '_' . $filename_fotokantor . '_' . time() . '.' . $ext_fotokantor;
                $path_fotokantor = $this->fotokantor->storeAs('dok_foto-kantor', $filename_fotokantor);
            }

            if ($this->skuha != null) {
                $file_skuha = $this->skuha->getClientOriginalName();
                $filename_skuha = pathinfo($file_skuha, PATHINFO_FILENAME);
                $ext_skuha = $this->skuha->getClientOriginalExtension();
                $filename_skuha = $this->noreg . '_' . $filename_skuha . '_' . time() . '.' . $ext_skuha;
                $path_skuha = $this->skuha->storeAs('dok_sk-uha', $filename_skuha);
            }

            if ($this->rekom != null) {
                $file_rekom = $this->rekom->getClientOriginalName();
                $filename_rekom = pathinfo($file_rekom, PATHINFO_FILENAME);
                $ext_rekom = $this->rekom->getClientOriginalExtension();
                $filename_rekom = $this->noreg . '_' . $filename_rekom . '_' . time() . '.' . $ext_rekom;
                $path_rekom = $this->rekom->storeAs('dok_remokendasi', $filename_rekom);
            }

            if ($this->srtpermohonan != null) {
                $file_srtpermohonan = $this->srtpermohonan->getClientOriginalName();
                $filename_srtpermohonan = pathinfo($file_srtpermohonan, PATHINFO_FILENAME);
                $ext_srtpermohonan = $this->srtpermohonan->getClientOriginalExtension();
                $filename_srtpermohonan = $this->noreg . '_' . $filename_srtpermohonan . '_' . time() . '.' . $ext_srtpermohonan;
                $path_srtpermohonan = $this->srtpermohonan->storeAs('dok_permohonan', $filename_srtpermohonan);
            }

            if ($this->kerjaormas != null) {
                $file_kerjaormas = $this->kerjaormas->getClientOriginalName();
                $filename_kerjaormas = pathinfo($file_kerjaormas, PATHINFO_FILENAME);
                $ext_kerjaormas = $this->kerjaormas->getClientOriginalExtension();
                $filename_kerjaormas = $this->noreg . '_' . $filename_kerjaormas . '_' . time() . '.' . $ext_kerjaormas;
                $path_kerjaormas = $this->kerjaormas->storeAs('dok_proker', $filename_kerjaormas);
            }

            if ($this->lambang) {
                $dataDokumen['lambang_ormaspol'] = $path_lambang;
            }
            if ($this->srtpermohonan) {
                $dataDokumen['surat_permohonan_ormaspol'] = $path_srtpermohonan;
            }
            if ($this->stempel) {
                $dataDokumen['stempel_ormaspol'] = $path_stempel;
            }
            if ($this->aktanotaris) {
                $dataDokumen['akta_notaris_ormaspol'] = $path_aktanotaris;
            }
            if ($this->adart) {
                $dataDokumen['ad_art_ormaspol'] = $path_adart;
            }
            if ($this->srtkepengurusan) {
                $dataDokumen['surat_keputusan_pengurus_ormaspol'] = $path_srtkepengurusan;
            }
            if ($this->srtpernyataan) {
                $dataDokumen['surat_pernyataan_ormaspol'] = $path_srtpernyataan;
            }
            if ($this->srtdomisili) {
                $dataDokumen['suket_domisili_ormaspol'] = $path_srtdomisili;
            }
            if ($this->srtkepemilikan) {
                $dataDokumen['surat_kepemilikan_kantor_ormaspol'] = $path_srtkepemilikan;
            }
            if ($this->fotokantor) {
                $dataDokumen['foto_kantor_ormaspol'] = $path_fotokantor;
            }
            if ($this->skuha) {
                $dataDokumen['sk_kemenkumham_ormas'] = $path_skuha;
            }
            if ($this->rekom) {
                $dataDokumen['surat_rekom_ormas'] = $path_rekom;
            }
            if ($this->kerjaormas) {
                $dataDokumen['program_kerja_ormas'] = $path_kerjaormas;
            }

            Dokumen::updateorCreate(['no_register' => $this->noreg], $dataDokumen);

            if (empty($this->notifkirim)) {
                User::updateorCreate(['no_register' => $this->noreg], [
                    'feedback_dokumen' => null
                ]);
            } elseif ($this->notifkirim == 'Y') {
                User::updateorCreate(['no_register' => $this->noreg], [
                    'feedback_dokumen' => 'Y'
                ]);
            }

            $this->success();
            $this->resetFUpload();
            // $this->cleanuplivewireTmp();
            // $this->cariData();
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function resetFUpload()
    {
        $this->reset(
            'srtpermohonan',
            'lambang',
            'stempel',
            'aktanotaris',
            'adart',
            'srtkepengurusan',
            'srtpernyataan',
            'srtdomisili',
            'srtkepemilikan',
            'fotokantor',
            'skuha',
            'rekom',
            'kerjaormas',
            'srtpermohonanOld',
            'lambangOld',
            'stempelOld',
            'aktanotarisOld',
            'adartOld',
            'srtkepengurusanOld',
            'srtpernyataanOld',
            'srtdomisiliOld',
            'srtkepemilikanOld',
            'fotokantorOld',
            'skuhaOld',
            'rekomOld',
            'kerjaormasOld',
            'noreg',
            'noregcari'
        );
        $this->resetvalidation();

        $this->itersrtpermohonan += 1;
        $this->iterlambang += 1;
        $this->iterstempel += 1;
        $this->iteraktanotaris += 1;
        $this->iteradart += 1;
        $this->itersrtkepengurusan += 1;
        $this->itersrtpernyataan += 1;
        $this->itersrtdomisili += 1;
        $this->itersrtkepemilikan += 1;
        $this->iterfotokantor += 1;
        $this->iterskuha += 1;
        $this->iterrekom += 1;
        $this->iterkerjaormas += 1;
    }

    public function success()
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Proses Berhasil',
            'toast' => 'true',
            'position' => 'top-end'
        ]);
    }

    public function error($msg = null)
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'error',
            'message' => 'Proses Gagal' . $msg,
            'toast' => 'true',
            'position' => 'top-end'
        ]);
    }

    // public function cleanuplivewireTmp()
    // {
    //     $oldFiles = Storage::files('livewire-tmp');
    //     foreach ($oldFiles as $file) {
    //         Storage::delete($file);
    //     }
    // }

    // Change Validasi FUpload
    public function updatedsrtpermohonan()
    {
        $this->validate(
            [
                'srtpermohonan' => 'file|mimes:pdf|max:512'
            ],
            [
                'srtpermohonan.mimes' => 'Format File pdf',
                'srtpermohonan.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }
    public function updatedkerjaormas()
    {
        $this->validate(
            [
                'kerjaormas' => 'file|mimes:pdf|max:512'
            ],
            [
                'kerjaormas.mimes' => 'Format File pdf',
                'kerjaormas.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }
    public function updatedlambang()
    {
        $this->validate(
            [
                'lambang' => 'file|mimes:pdf|max:512'
            ],
            [
                'lambang.mimes' => 'Format File pdf',
                'lambang.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }
    public function updatedstempel()
    {
        $this->validate(
            [
                'stempel' => 'file|mimes:pdf|max:512'
            ],
            [
                'stempel.mimes' => 'Format File pdf',
                'stempel.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }
    public function updatedaktanotaris()
    {
        $this->validate(
            [
                'aktanotaris' => 'file|mimes:pdf|max:512'
            ],
            [
                'aktanotaris.mimes' => 'Format File pdf',
                'aktanotaris.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }
    public function updatedadart()
    {
        $this->validate(
            [
                'adart' => 'file|mimes:pdf|max:512'
            ],
            [
                'adart.mimes' => 'Format File pdf',
                'adart.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }
    public function updatedsrtkepengurusan()
    {
        $this->validate(
            [
                'srtkepengurusan' => 'file|mimes:pdf|max:512'
            ],
            [
                'srtkepengurusan.mimes' => 'Format File pdf',
                'srtkepengurusan.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }
    public function updatedsrtpernyataan()
    {
        $this->validate(
            [
                'srtpernyataan' => 'file|mimes:pdf|max:512'
            ],
            [
                'srtpernyataan.mimes' => 'Format File pdf',
                'srtpernyataan.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }
    public function updatedsrtdomisili()
    {
        $this->validate(
            [
                'srtdomisili' => 'file|mimes:pdf|max:512'
            ],
            [
                'srtdomisili.mimes' => 'Format File pdf',
                'srtdomisili.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }
    public function updatedsrtkepemilikan()
    {
        $this->validate(
            [
                'srtkepemilikan' => 'file|mimes:pdf|max:512'
            ],
            [
                'srtkepemilikan.mimes' => 'Format File pdf',
                'srtkepemilikan.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }
    public function updatedfotokantor()
    {
        $this->validate(
            [
                'fotokantor' => 'file|mimes:pdf|max:512'
            ],
            [
                'fotokantor.mimes' => 'Format File pdf',
                'fotokantor.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }
    public function updatedskuha()
    {
        $this->validate(
            [
                'skuha' => 'file|mimes:pdf|max:512'
            ],
            [
                'skuha.mimes' => 'Format File pdf',
                'skuha.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }
    public function updatedrekom()
    {
        $this->validate(
            [
                'rekom' => 'file|mimes:pdf|max:512'
            ],
            [
                'rekom.mimes' => 'Format File pdf',
                'rekom.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }

    public function viewFile($folder, $namefile)
    {
        $this->url = $folder . '/' . $namefile;
        $this->dispatchBrowserEvent('openViewFile');
    }

    public function closeView()
    {
        $this->dispatchBrowserEvent('closeViewFile');
    }

    public function cekRegister()
    {
        $this->dispatchBrowserEvent('swal:cek', [
            'type' => 'info',
            'message' => 'Data Tidak Ditemukan'
            // 'toast' => 'true',
            // 'position' => 'top-end'
        ]);
    }

    public function render()
    {
        $dataPermohonan = User::with(['dokumen'])->where('no_register', $this->noreg)->get();
        return view('livewire.langsung.rubah-dokumen', compact('dataPermohonan'));
    }
}
