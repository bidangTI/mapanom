<?php

namespace App\Http\Livewire\Ormas;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\User;
use App\Models\Dokumen;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use function PHPUnit\Framework\isNull;

class DokumenOrmas extends Component
{
    use WithFileUploads;

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
        $iterrekom;

    public
        $noreg,
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
        $rekom;

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
        $rekomOld;

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

        $data = USer::find(Auth::user()->id);
        $this->noreg = $data->no_register;
        $this->loadExistingData();
    }

    public function loadExistingData()
    {
        $existDokumen = Dokumen::where('no_register', $this->noreg)->first();
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
        }
        $this->resetValidation();
    }

    public function store_dokumen()
    {
        $this->validate(
            [
                'srtpermohonan' => empty($this->srtpermohonanOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'lambang' => empty($this->lambangOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'stempel' => empty($this->stempelOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'aktanotaris' => empty($this->aktanotarisOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'adart' => empty($this->adartOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'srtkepengurusan' => empty($this->srtkepengurusanOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'srtpernyataan' => empty($this->srtpernyataanOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'srtdomisili' => empty($this->srtdomisiliOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'srtkepemilikan' => empty($this->srtkepemilikanOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'fotokantor' => empty($this->fotokantorOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'skuha' => empty($this->skuhaOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'rekom' => empty($this->rekomOld) ? 'required|file|mimes:pdf|max:512' : 'nullable'
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
                'fotokantor.required' => 'Foto KAntor Mohon Dilengkapi',
                'skuha.required' => 'SK Dari Kemenkum HAM Mohon Dilengkapi',
                'rekom.required' => 'Rekomendasi Mohon Dilengkapi',

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
                'rekom.max' => 'Ukuran File Maximal 512 kb'
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

            $dataDokumen = array(
                'val_lambang_ormaspol' => 0,
                'val_surat_permohonan_ormaspol' => 0,
                'val_stempel_ormaspol' => 0,
                'val_akta_notaris_ormaspol' => 0,
                'val_ad_art_ormaspol' => 0,
                'val_surat_keputusan_pengurus_ormaspol' => 0,
                'val_surat_pernyataan_ormaspol' => 0,
                'val_suket_domisili_ormaspol' => 0,
                'val_surat_kepemilikan_kantor_ormaspol' => 0,
                'val_foto_kantor_ormaspol' => 0,
                'val_sk_kemenkumham_ormas' => 0,
                'val_surat_rekom_ormas' => 0,
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

            Dokumen::updateorCreate(['no_register' => $this->noreg], $dataDokumen);

            // $dataUpdateReg = ['reg' => $this->noreg];
            // $updateReg = Dokumen::where('no_register', $this->noreg)->update($dataUpdateReg);

            $this->success();
            $this->resetFUpload();
            $this->cleanuplivewireTmp();
            $this->loadExistingData();
        } catch (\Throwable $th) {
            $this->error($th);
            // dd($th);
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
            'rekom'
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

    public function cleanuplivewireTmp()
    {
        $oldFiles = Storage::files('livewire-tmp');
        foreach ($oldFiles as $file) {
            Storage::delete($file);
        }
    }

    public function render()
    {
        $dataPermohonan = User::where('no_register', $this->noreg)->get();
        return view('livewire.ormas.dokumen-ormas', compact('dataPermohonan'));
    }
}
