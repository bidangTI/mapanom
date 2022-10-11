<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

use App\Models\RubahData;
use App\Models\SuratKeberadaan;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardAdmin extends Component
{
    public function render()
    {
        $jmlPengguna = User::where(['roles' => 3, 'status_user' => 'Y'])->count();
        $jmlPenggunaTerdaftar = User::where(['roles' => 3, 'permohonan_id' => 6, 'status_user' => 'Y'])->count();
        $jmlPenggunaDaftar = User::where(['roles' => 3, 'permohonan_id' => 1, 'status_user' => 'Y'])->count();
        $jmlPenggunaData = User::where(['roles' => 3, 'permohonan_id' => 2, 'status_user' => 'Y'])->count();
        $jmlPenggunaLapangan = User::where(['roles' => 3, 'permohonan_id' => 3, 'status_user' => 'Y'])->count();
        $jmlPenggunaTTD = User::where(['roles' => 3, 'status_user' => 'Y'])->where('permohonan_id', 4)->orwhere('permohonan_id', 5)->count();

        $jmlVerifikator = User::where(['roles' => 2, 'status_user' => 'Y'])->count();
        $jmlPejabat = User::where(['roles' => 4, 'status_user' => 'Y'])->count();
        $jmlReport = User::where(['roles' => 5, 'status_user' => 'Y'])->count();

        $jmlOrmas = User::where(['permohonan_id' => 6, 'status_user' => 'Y', 'kategori_id' => 1])->count();
        $jmlParpol = User::where(['permohonan_id' => 6, 'status_user' => 'Y', 'kategori_id' => 2])->count();
        return view(
            'livewire.dashboard.dashboard-admin',
            compact(
                'jmlOrmas',
                'jmlParpol',
                'jmlPengguna',
                'jmlPenggunaTerdaftar',
                'jmlPenggunaDaftar',
                'jmlPenggunaData',
                'jmlPenggunaLapangan',
                'jmlPenggunaTTD',
                'jmlVerifikator',
                'jmlPejabat',
                'jmlReport'
            )
        );
    }
}
