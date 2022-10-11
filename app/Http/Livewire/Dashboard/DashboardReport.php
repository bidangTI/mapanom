<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

use App\Models\RubahData;
use App\Models\SuratKeberadaan;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardReport extends Component
{
    public function render()
    {
        $jmlOrmas = User::where(['permohonan_id' => 6, 'status_user' => 'Y', 'kategori_id' => 1])->count();
        $jmlParpol = User::where(['permohonan_id' => 6, 'status_user' => 'Y', 'kategori_id' => 2])->count();
        return view('livewire.dashboard.dashboard-report', compact('jmlOrmas','jmlParpol'));
    }
}
