<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Administrator',
            'email' => 'super@admin.dev',
            'password' => Hash::make('!123123'),
            'email_verified_at' => date('Y-m-d H:m:s'),
            'roles' => 1
        ]);
        User::create([
            'name' => 'User Pendaftar',
            'email' => 'user@admin.dev',
            'password' => Hash::make('!123123'),
            'email_verified_at' => date('Y-m-d H:m:s'),
            'roles' => 3,
            'kategori_id' => 1,
            'permohonan_id' => 1,
            'no_register' => '14000120220811ABC'
        ]);
    }
}
