<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

use App\Models\User;
use App\Models\OrmasKetua;
use App\Models\OrmasSekretaris;
use App\Models\OrmasBendahara;
use App\Models\OrmasPendiri;
use App\Models\OrmasPembina;
use App\Models\OrmasPenasihat;
use App\Models\Persyaratan;
use App\Models\Dokumen;
use App\Models\Histori;
use App\Models\SuratKeberadaan;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Response;

class DashboardUser extends Component
{

    public $url, $folder, $namefile, $tempUrl, $grab;

    public function mount()
    {
        $data = User::find(Auth::user()->id);
        $this->noreg = $data->no_register;
    }


    public function viewFile($id)
    {
        $tempData = SuratKeberadaan::where('id', $id)->first();
        $tempUrl = $tempData->file_surat;
        $grab = explode('/', $tempUrl);
        $folder = $grab[0];
        $namefile =$grab[1];
        $this->url = $folder . '/' . $namefile;
        $this->dispatchBrowserEvent('openViewFile');

        $jml = $tempData->jml_view;
        $saveView = ['jml_view' => $jml + 1];
        SuratKeberadaan::where('id', $id)->update($saveView);
    }
    
    public function closeView()
    {
        $this->dispatchBrowserEvent('closeViewFile');
    }

    public function render()
    {
        $cekData = User::with(['ketua', 'sekretaris', 'bendahara', 'pendiri', 'pembina', 'penasihat', 'persyaratan', 'dokumen'])->where('no_register', $this->noreg)->get();
        $cekHistori = Histori::where('no_register', $this->noreg)->get();
        $dataSurat = SuratKeberadaan::where('no_register', $this->noreg)->get();
        $namaormas = Persyaratan::where('no_register', $this->noreg)->first();

            return view('livewire.dashboard.dashboard-user', compact('cekData','cekHistori','dataSurat','namaormas'));
    }
}
