<?php

namespace Database\Seeders;

use App\Models\Kepengurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            RoleSeeder::class,
            PermohonanSeeder::class,
            KategoriSeeder::class,
            AktaNotarisSeeder::class,
            KepengurusanSeeder::class,
            SliderSeeder::class,
            SyaratAdministrasiSeeder::class,
            UserSeeder::class,
        ]);
    }
}
