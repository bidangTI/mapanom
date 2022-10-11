<?php

namespace App\Http\Livewire\Template;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Kategori;
use App\Models\TemplateSurat;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;

use file;
use PDF;



class Surat extends Component
{
    use WithFileUploads;
    public $idKategoriSurat, $filesurat, $filesuratOld, $iterfilesurat;
    public $tempUrl, $folder, $namefile, $url;

    protected $listeners = [
        'DelPengguna' => 'delete_pengguna'
    ];

    public function mount()
    {
        $this->iterfilesurat = 0;

    }

    public function viewFile($folder, $namefile)
    {
        $this->url = $folder . '/' . $namefile;
        $this->dispatchBrowserEvent('openViewFile');
    }
    public function closeView()
    {
        $this->resetFUpload();
        $this->dispatchBrowserEvent('closeViewFile');
    }

    public function FileSurat($id)
    {
        $resSurat = TemplateSurat::where('kategori_id', $id)->first();
        $this->idKategoriSurat = $id;

        if(empty($resSurat)){
            $this->filesuratOld = $this->filesurat;
        }else{
            $this->filesuratOld = $resSurat->file_surat;
        }
        $this->dispatchBrowserEvent('openFileSurat');
    }
   
    public function updatedfilesurat()
    {
        $this->validate(
            [
                'filesurat' => 'file|mimes:docx|max:1026',
            ],
            [
                'filesurat.mimes' => 'Format File Tidak Sesuai',
                'filesurat.max' => 'Ukuran File Maximal 512 kb'
            ]
        );
    }

    public function upload_template()
    {
        $this->validate(
            [
                'filesurat' => empty($this->filesuratOld) || !empty($this->filesurat) ? 'required|file|mimes:docx|max:1026' : 'nullable'
            ],
            [
                'filesurat.required' => 'File Mohon Dilengkapi',
                'filesurat.mimes' => 'Format File Tidak Sesuai',
                'filesurat.max' => 'Ukuran File Maximal 1 Mb'
            ]
        );

        try {

            if ($this->filesurat && $this->filesuratOld != null) {
                Storage::delete($this->filesuratOld);
            }
            if ($this->filesurat != null) {
                $file_surat = $this->filesurat->getClientOriginalName();
                $filename_surat = pathinfo($file_surat, PATHINFO_FILENAME);
                $ext_surat = $this->filesurat->getClientOriginalExtension();
                $filename_surat = $filename_surat . '_' . time() . '.' . $ext_surat;
                $path_surat = $this->filesurat->storeAs('surat_template', $filename_surat);
            }
            if ($this->filesurat) {
                $updateData['file_surat'] = $path_surat;
            }

            $cariID = TemplateSurat::where('kategori_id', $this->idKategoriSurat)->first();
            if (empty($cariID)) {
                TemplateSurat::create(
                    [
                        'kategori_id' => $this->idKategoriSurat,
                        'file_surat' => $path_surat
                    ]
                );
            } else {
                TemplateSurat::where('kategori_id', $this->idKategoriSurat)->update($updateData);
            }

        } catch (\Throwable $th) {
            $this->error($th);
        }
        $this->success();
        $this->resetFUpload();
        // $this->cleanuplivewireTmp();
        $this->resetValidation();
        $this->dispatchBrowserEvent('closeFileSurat');
    }

    public function resetFUpload()
    {
        $this->reset(
            'filesurat'
        );
        $this->resetvalidation();
        $this->iterfilesurat += 1;
    }

    // public function cleanuplivewireTmp()
    // {
    //     $oldFiles = Storage::files('livewire-tmp');
    //     foreach ($oldFiles as $file) {
    //         Storage::delete($file);
    //     }
    // }

    public function resetForm()
    {
        $this->reset(['filesurat']);

        $this->resetValidation();
    }

    public function success()
    {
        $this->dispatchBrowserEvent('swal:success', [
            'type' => 'success',
            'message' => 'Proses Berhasil',
            'toast' => 'false',
            'position' => 'top-end'
        ]);
    }

    public function error($msg = null)
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'error',
            'message' => 'Proses Gagal !' . $msg,
            'toast' => 'true',
            'position' => 'top-end'
        ]);
    }

    public function render()
    {
        $dataLoadlist = Kategori::with(['datasurat'])->get();
        return view('livewire.template.surat', compact('dataLoadlist'));
    }
}
