<?php

namespace Database\Seeders;

use App\Models\Laporan;
use App\Models\SuratKeluar;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SuratMasuk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin PKK',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',

        ]);
        User::create([
            'name' => 'ketua PKK',
            'email' => 'ketua@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'ketua',
        ]);
        User::create([
            'name' => 'sekretaris PKK',
            'email' => 'sekte@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'sekretaris',
        ]);
        SuratMasuk::factory()->count(2)->create();
        SuratKeluar::factory()->count(2)->create();
        Laporan::factory()->count(2)->create();
    }
}
