<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


User::create([
    'name' => 'Pasien 1',
    'email' => 'pasien@example.com',
    'password' => bcrypt('password'),
    'role' => 'pasien',
]);

User::create([
    'name' => 'Dokter 1',
    'email' => 'dokter@example.com',
    'password' => bcrypt('password'),
    'role' => 'dokter',
]);

    }
}
