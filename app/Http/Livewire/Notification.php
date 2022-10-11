<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RubahData;
use App\Models\SuratKeberadaan;
use App\Models\User;


class Notification extends Component
{
    public function render()
    {
        // VERIFIKATOR
        $infVerifikasiData = User::where('permohonan_id', 2)->count();
        $infSurvey = User::where('permohonan_id', 3)->count();
        $ajukanTTD = SuratKeberadaan::where('status', 'A')->count();
        $ajukanTTDPerubahan = SuratKeberadaan::where('status', 'P')->count();
        $Perubahan = RubahData::where('status', 0)->count();
        $totalNotifikasi = $infVerifikasiData + $infSurvey + $ajukanTTD + $Perubahan + $ajukanTTDPerubahan;

        $totalTTD = $ajukanTTD + $ajukanTTDPerubahan;

        // USER
        $Persyaratan = User::where(['status_persyaratan' => 'N', 'notifikasi_kirim' => 'Y'])->count();
        $Pengurus = User::where(['status_pengurus' => 'N', 'notifikasi_kirim' => 'Y'])->count();
        $Dokumen = User::where(['status_dokumen' => 'N', 'notifikasi_kirim' => 'Y'])->count();
        $TotalUser = $Persyaratan + $Pengurus + $Dokumen;

        return view('livewire.notification', compact('infVerifikasiData', 'infSurvey', 'ajukanTTD', 'ajukanTTDPerubahan', 'Perubahan', 'totalNotifikasi', 'Persyaratan', 'Pengurus','Dokumen', 'TotalUser','totalTTD'));
    }
}
