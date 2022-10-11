<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


use App\Models\SliderGambar;


use PhpParser\Node\Stmt\TryCatch;



class Slider extends Component
{
    use WithFileUploads;

    public
    $tempUrl, 
    $folder, 
    $namefile, 
    $request,
    $url;

    
    public
    $gambar,

    $itergambar,
    $gambarOld,
    $valgambar,


    $sliderID;

    protected $listeners = [
        'destroy1' => 'delete_slider'
    ];

    public function AddSlider()
    {
     
        $this->dispatchBrowserEvent('open_add_slider_modal');
    }


    public function store_slider()
    {
        $this->validate(
            [

                'gambar' => empty($this->gambarOld) || !empty($this->gambar) ? 'required|image|mimes:png,jpg,jpeg,jfif|max:512' : 'nullable',

            ],
            [
                'gambar.required' => 'Gambar Mohon Dilengkapi',

                'gambar.mimes' => 'Format File Tidak Sesuai',

                'gambar.max' => 'Ukuran File Maximal 512 kb',


            ]
        );

        try {

            if ($this->gambar && $this->gambarOld != null) {
                Storage::delete($this->gambarOld);
            }

            // $dataDokumen = array(
            // 'valgambar' => $val_gambar
            // );

            if ($this->gambar != null) {
                $file_gambar = $this->gambar->getClientOriginalName();
                $filename_gambar = pathinfo($file_gambar, PATHINFO_FILENAME);
                $ext_gambar = $this->gambar->getClientOriginalExtension();
                $filename_gambar = $filename_gambar . '_' . time() . '.' . $ext_gambar;
                $path_gambar = $this->gambar->storeAs('public',$filename_gambar);
            }

            // if ($this->gambar) {
            //     $dataDokumen['gambar'] = $path_gambar;
            // }



            SliderGambar::create([
                'gambar'       => $path_gambar
            ]);

            $this->success();
            $this->resetFields();
            $this->dispatchBrowserEvent('close_add_slider_modal');

            
        } catch (\Throwable $th) {
            $this->error($th);
            dd($th);
        }
    }

    public function resetFields()
    {
        $this->reset([
            'gambar'
        ]);
        $this->itergambar = +1;
        $this->emit('gambar');
        $this->resetValidation();
    }

    // Show Modal ID
    public function tempID($id)
    {
        $resSlider = SliderGambar::where('id', $id)->first();
        $this->sliderID = $resSlider->id;
        $this->gambar = $resSlider->gambar;
        $this->dispatchBrowserEvent('openFormModal');
    }

    //Edit
    // public function edit_slider($id)
    // {
    //     $resSlider = SliderGambar::where('id', $id)->first();
    //     $this->sliderID = $resSlider->id;
    //     $this->judulupdate = $resSlider->judul;
    //     $this->gambarupdate = $resSlider->gambar;
    //     $this->deskripsiupdate = $resSlider->deskripsi;
    //     $this->dispatchBrowserEvent('open_edit_slider_modal');
    // }

    public function loadExistingData()
    {
        $exist = SliderGambar::where('id', $id)->first();
        if (!empty($exist)) {
            $this->gambarOld = $existDokumen->gambar;

        }
        $this->resetValidation();
    }

    public function cleanuplivewireTmp()
    {
        $oldFiles = Storage::files('livewire-tmp');
        foreach ($oldFiles as $file) {
            Storage::delete($file);
        }
    }

    // public function update_slider()
    // {
    //     $this->validate(
    //         [
    //             'judul'    => 'required',
    //             'deskripsi' => 'required',
    //             'gambar' => empty($this->gambarOld) || !empty($this->gambar) ? 'required|image|mimes:png,jpg,jpeg|max:1024' : 'nullable',
    //         ],
    //         [
    //             'judul.required'  => 'Status tidak boleh kosong',
    //             'deskripsi.required' => 'Langkah tidak boleh kosong',
    //             'gambar.required' => 'gambar Mohon Dilengkapi',

    //             'gambar.mimes' => 'Format File Tidak Sesuai',

    //             'gambar.max' => 'Ukuran File Maximal 512 kb',
                
    //         ]
    //     );

    //     try {

    //         if ($this->gambar && $this->gambarOld != null) {
    //             Storage::delete($this->gambarOld);
    //         }

    //         // $dataDokumen = array(
    //         // 'valgambar' => $val_gambar
    //         // );

    //         if ($this->gambar != null) {
    //             $file_gambar = $this->gambar->getClientOriginalName();
    //             $filename_gambar = pathinfo($file_gambar, PATHINFO_FILENAME);
    //             $ext_gambar = $this->gambar->getClientOriginalExtension();
    //             $filename_gambar = $filename_gambar . '_' . time() . '.' . $ext_gambar;
    //             $path_gambar = $this->gambar->storeAs('dok_gambar', $filename_gambar);
    //         }
            
    //         SliderGambar::find($this->sliderID)
    //         -> update([
    //             'judul'        => $this->judulupdate,
    //             'gambar'       => $this->gambarupdate,
    //             'deskripsi'     => $this->deskripsiupdate]);
    //         $this->success();
    //         $this->resetFields();
    //         $this->dispatchBrowserEvent('close_edit_slider_modal');
    //     } catch (\Throwable $th) {
    //         $this->error();
    //         // dd($th);
    //     }
    // }
    
    public function confirm_slider($id)
    {
        $this->dispatchBrowserEvent('swal:confirm1', [
            'id' => $id,
            'type' => 'info',
            'message' => 'Slider yang dihapus tidak dapat dikembalikan '
        ]);
    }

    public function delete_slider(SliderGambar $slider)
    {
        try {
                if($slider->gambar){
                    Storage::delete($slider->gambar);
                }
                SliderGambar::destroy($slider->id);
                $this->success();
                $this->resetFields();
        
        } catch (\Throwable $th) {
            $this->error();
        
    }
    }

    public function success()
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Proses Berhasil',
            'toast' => 'true',
            'position' => 'top-end'
        ]);
        $this->dispatchBrowserEvent('closeFormModal');
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

    public function viewFile($folder, $namefile)
    {
        $this->url = $folder . '/' . $namefile;
        $this->dispatchBrowserEvent('openViewFile');
    }

    public function closeView()
    {
        $this->dispatchBrowserEvent('closeViewFile');
    }

    public function render()
    {
            $resData = SliderGambar::all();
            // $contents = Storage::disk('public')->get($resData->gambar);
            // $temporary = explode('/',$resData->gambar);
            // $folder = $temporary[0];
            // $namafile = $temporary[1];
            // $url = $folder.'/'.$namafile;
            return view('livewire.admin.slider', compact('resData'));
        
    }
}