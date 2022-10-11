<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\RubahData;
use App\Models\SuratKeberadaan;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;

class DashboardVerifikator extends Component
{
    public function render()
    {
        $infVerifikasiData = User::where('permohonan_id', 2)->count();
        $infSurvey = User::where('permohonan_id', 3)->count();
        $ajukanTTD = SuratKeberadaan::where('status', 'A')->count();
        $ajukanTTDPerubahan = SuratKeberadaan::where('status', 'P')->count();
        $Perubahan = RubahData::where('status', 0)->count();
        $totalNotifikasi = $infVerifikasiData + $infSurvey + $ajukanTTD + $Perubahan + $ajukanTTDPerubahan;

        $jmlOrmas = User::where(['permohonan_id' => 6, 'status_user' => 'Y', 'kategori_id' => 1])->count();
        $jmlParpol = User::where(['permohonan_id' => 6, 'status_user' => 'Y', 'kategori_id' => 2])->count();
        // USER
        $Persyaratan = User::where(['status_persyaratan' => 'N', 'notifikasi_kirim' => 'Y'])->count();
        $Pengurus = User::where(['status_pengurus' => 'N', 'notifikasi_kirim' => 'Y'])->count();
        $Dokumen = User::where(['status_dokumen' => 'N', 'notifikasi_kirim' => 'Y'])->count();
        $TotalUser = $Persyaratan + $Pengurus + $Dokumen;

        return view('livewire.dashboard.dashboard-verifikator', compact('infVerifikasiData', 'infSurvey', 'ajukanTTD', 'ajukanTTDPerubahan', 'Perubahan', 'totalNotifikasi', 'Persyaratan', 'Pengurus', 'Dokumen', 'TotalUser','jmlOrmas','jmlParpol'));
    }
}
