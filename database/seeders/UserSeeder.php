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
     */
    public function run(): void
    {
        // 1. AKUN UTAMA: STAKEHOLDER PT HEN (ADMIN PUSAT)
        User::updateOrCreate(
            ['email' => 'adminoil@gmail.com'], 
            [
                'name' => 'Direksi PT HEN Pusat',
                'password' => Hash::make('admin123'),
                'role' => 'stakeholder',
            ]
        );

        // 2. AKUN SAMPEL: MITRA PENGEPUL (HUB TENGAH)
        User::updateOrCreate(
            ['email' => 'salwa@gmail.com'],
            [
                'name' => 'Salwa Sakinah',
                'password' => Hash::make('pengepul123'),
                'role' => 'pengepul',
            ]
        );

        // 3. AKUN SAMPEL: MASYARAKAT (PENYETOR HULU)
        User::updateOrCreate(
            ['email' => 'febi@gmail.com'],
            [
                'name' => 'Febiyanti Eka Puri',
                'password' => Hash::make('warga123'),
                'role' => 'masyarakat',
            ]
        );
    }
}